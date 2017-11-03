#!/bin/bash

#variables
RTPASS=rootpass
DBUSER=dppms
DBPASS=dfHGf$3987Jgf


# Updating repository
sudo apt-get -y update

# Installing Apache
sudo apt-get -y install apache2

# Installing MySQL and it's dependencies, Also, setting up root password for MySQL as it will prompt to enter the password during installation
sudo debconf-set-selections <<< "mysql-server-5.5 mysql-server/root_password password $RTPASS"
sudo debconf-set-selections <<< "mysql-server-5.5 mysql-server/root_password_again password $RTPASS"
sudo apt-get -y install mysql-server

# Installing PHP and it's dependencies
sudo apt-get -y install php5 libapache2-mod-php5 php5-mcrypt

# Apache Config
sudo a2enmod rewrite
sed -i "s/AllowOverride None/AllowOverride All/g" /etc/apache2/apache2.conf

#PHP Config
sed -i "s/error_reporting = .*/error_reporting = E_ALL/" /etc/php5/apache2/php.ini
sed -i "s/display_errors = .*/display_errors = On/" /etc/php5/apache2/php.ini

#Restart Apache
sudo /etc/init.d/apache2 restart

#Install unzip package
sudo apt-get -y install unzip

cd /var/www/html
sudo wget https://github.com/ole-vi/oleCDT/archive/master.zip
sudo unzip master.zip
sudo mv oleCDT-master fieldguide

#create DB User
if [ ! -z `ls /var/www/html/fieldguide/db/*.sql` ]; then
	
	DBNAME=`ls /var/www/html/fieldguide/db/*.sql | cut -d '/' -f 7 | sed s/.sql//`
	#create database
	mysqladmin -u root -p$RTPASS CREATE $DBNAME;
	#import sql into db
	`mysql -u root -p$RTPASS $DBNAME < /var/www/html/fieldguide/db/$DBNAME.sql`
	#create user
	`mysql -u root -p$RTPASS -e "\
		GRANT ALL PRIVILEGES ON $DBNAME.* TO $DBUSER@'%' \
		IDENTIFIED BY '$DBPASS' WITH GRANT OPTION; \
		FLUSH PRIVILEGES; "`
fi
		

# insert/update hosts entry
#ip_address='127.0.0.1'
#host_name='cdt.ole'
# find existing instances in the host file and save the line numbers
#matches_in_hosts="$(grep -n $host_name /etc/hosts | cut -f1 -d:)"
#host_entry="${ip_address} ${host_name}"

#if [ ! -z "$matches_in_hosts" ]
#then
 #   echo "Updating existing hosts entry."
    # iterate over the line numbers on which matches were found
  #  while read -r line_number; do
        # replace the text of each line with the desired host entry
   #     sudo sed -i '' "${line_number}s/.*/${host_entry} /" /etc/hosts
   # done <<< "$matches_in_hosts"
#else
 #   echo "Adding new hosts entry."
  #  echo "$host_entry" | sudo tee -a /etc/hosts > /dev/null
#fi

