-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 21, 2017 at 05:16 PM
-- Server version: 5.5.55-cll
-- PHP Version: 5.6.30

SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dppms_fieldguide`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_publishers`
--

CREATE TABLE `tbl_publishers` (
  `pub_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `web` varchar(255) DEFAULT NULL,
  `mission` text,
  `m_info` text,
  `c_name` varchar(255) DEFAULT NULL,
  `c_email` varchar(200) DEFAULT NULL,
  `c_phone` int(12) DEFAULT NULL,
  `c_url` varchar(255) DEFAULT NULL,
  `c_address` varchar(255) DEFAULT NULL,
  `o_name` varchar(255) DEFAULT NULL,
  `o_address` varchar(255) DEFAULT NULL,
  `o_phone` int(12) DEFAULT NULL,
  `o_email` varchar(255) DEFAULT NULL,
  `o_skype` varchar(255) DEFAULT NULL,
  `o_other` varchar(255) DEFAULT NULL,
  `pic` varchar(255) DEFAULT NULL,
  `grade` text,
  `subject` text,
  `format` text,
  `distribution` text,
  `license` text,
  `language` text,
  `msa` text,
  `wcag` text,
  `pub_available` text,
  `curriculum` text,
  `edu_usage` text,
  `edu_content` text,
  `assessment` text,
  `content_usage` text,
  `content_other` text,
  `content_quality` text,
  `interest1` text,
  `interest2` text,
  `interest3` text,
  `interest4` text,
  `add_date` date NOT NULL,
  `last_update` date NOT NULL,
  `status` varchar(255) NOT NULL
);

--
-- Indexes for table `tbl_publishers`
--
ALTER TABLE `tbl_publishers`
  ADD PRIMARY KEY (`pub_id`);

--
-- AUTO_INCREMENT for table `tbl_publishers`
--
ALTER TABLE `tbl_publishers`
  MODIFY `pub_id` int(11) NOT NULL AUTO_INCREMENT;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_resources`
--

CREATE TABLE `tbl_resources` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `mem_id` int(11) NOT NULL,
  `pub_id` int(11) NOT NULL,
  `pub_date` date NOT NULL,
  `a_fname` varchar(255) DEFAULT NULL,
  `a_lname` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `description` text,
  `publication` varchar(255) NOT NULL,
  `availability` varchar(255) NOT NULL,
  `interest1` text,
  `interest2` text,
  `interest3` text,
  `interest4` text,
  `add_date` date NOT NULL,
  `last_update` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pro_democracy`
--

CREATE TABLE `pro_democracy` (
  `pro_id` int(12) NOT NULL,
  `name` varchar(255) NOT NULL,
  `weblink` varchar(255) NOT NULL,
  `establish_year` year(4) NOT NULL,
  `tax_exempt` varchar(100) DEFAULT NULL,
  `legal_status` varchar(255) NOT NULL,
  `location` varchar(255) DEFAULT NULL,
  `l_other` varchar(255) DEFAULT NULL,
  `curr_priorities` varchar(255) DEFAULT NULL,
  `curr_action` varchar(255) DEFAULT NULL,
  `achievements` varchar(255) DEFAULT NULL,
  `associated_org` varchar(255) DEFAULT NULL,
  `more_info` varchar(255) DEFAULT NULL,
  `logo` varchar(255) NOT NULL,
  `pdf` varchar(111) DEFAULT NULL,
  `seeking` varchar(255) DEFAULT NULL,
  `work_type` varchar(255) DEFAULT NULL,
  `w_other` varchar(255) NOT NULL,
  `mission` varchar(255) DEFAULT NULL,
  `strategies` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `volenters` varchar(255) DEFAULT NULL,
  `add_info` varchar(255) DEFAULT NULL,
  `history` varchar(255) DEFAULT NULL,
  `cw_priorities` varchar(255) DEFAULT NULL,
  `entry_points` varchar(255) DEFAULT NULL,
  `emp_no` int(12) NULL,
  `board` varchar(255) DEFAULT NULL,
  `budget` varchar(255) DEFAULT NULL,
  `c_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` int(12) NOT NULL,
  `email` varchar(200) NOT NULL,
  `skype` varchar(200) NOT NULL,
  `other` varchar(200) NOT NULL,
  `o_name` varchar(255) NOT NULL,
  `o_address` varchar(255) NOT NULL,
  `o_phone` varchar(250) NOT NULL,
  `o_email` varchar(250) NOT NULL,
  `o_skype` varchar(250) NOT NULL,
  `o_other` varchar(250) NOT NULL,
  `add_date` date NOT NULL,
  `status` varchar(200) NOT NULL,
  `last_update` date NOT NULL,
  `grade` VARCHAR(255) NOT NULL,
  `format` VARCHAR(255) NOT NULL
) ;

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `r_id` int(11) NOT NULL,
  `vid` int(11) NOT NULL,
  `oid` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `review` varchar(250) NOT NULL,
  `title` varchar(250) NOT NULL,
  `r_date` date NOT NULL
) ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(250) NOT NULL,
  `admin_email` varchar(250) NOT NULL,
  `admin_pass` varchar(250) NOT NULL,
  `admin_status` enum('y','n') NOT NULL DEFAULT 'y',
  `admin_joindate` datetime NOT NULL,
  `admin_lastlogin` datetime NOT NULL
) ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_individual_member`
--

CREATE TABLE `tbl_individual_member` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mob` bigint(15) DEFAULT NULL,
  `off_phone` bigint(15) DEFAULT NULL,
  `o_phone` bigint(15) DEFAULT NULL,
  `skype` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `street` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `zip` varchar(255) DEFAULT NULL,
  `dob` date NOT NULL,
  `pic` varchar(255) NOT NULL,
  `citizenship` varchar(255) DEFAULT NULL,
  `l_name` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `purpose` text,
  `interest1` text,
  `interest2` text,
  `interest3` text,
  `interest4` text,
  `status` varchar(200) NOT NULL,
  `add_date` date NOT NULL,
  `last_update` date NOT NULL,
  `publisher` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_individual_member`
--
ALTER TABLE `tbl_individual_member`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_individual_member`
--
ALTER TABLE `tbl_individual_member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_news`
--

CREATE TABLE `tbl_news` (
  `id` int(11) NOT NULL,
  `title` varchar(1111) NOT NULL,
  `short_desc` varchar(1111) NOT NULL,
  `content` text NOT NULL,
  `image` varchar(1111) NOT NULL,
  `status` int(11) NOT NULL,
  `date` varchar(111) NOT NULL
) ;

--
-- Dumping data for table `tbl_news`
--

INSERT INTO `tbl_news` (`id`, `title`, `short_desc`, `content`, `image`, `status`, `date`) VALUES
(1, 'top headlines', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec pellentesque dui risus, vitae congue mi pulvinar vitae. Nam in nisl id est rhoncus egestas id non quam. Aenean vel eleifend nulla. Donec eu dui sed tellus pulvinar porta. Vestibulum tincidunt, enim nec sodales fermentum, mi mauris lacinia diam, condimentum consectetur metus diam et nisi. Fusce ultrices ex eu felis tristique, nec aliquam mauris vehicula. Mauris et enim lacus. Maecenas sit amet enim odio. Donec tempor vestibulum condimentum. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. <br>', '<font color=\"#555555\" face=\"Arial, sans-serif\"><span style=\"font-size: 12.16px;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec pellentesque dui risus, vitae congue mi pulvinar vitae. Nam in nisl id est rhoncus egestas id non quam. Aenean vel eleifend nulla. Donec eu dui sed tellus pulvinar porta. Vestibulum tincidunt, enim nec sodales fermentum, mi mauris lacinia diam, condimentum consectetur metus diam et nisi. Fusce ultrices ex eu felis tristique, nec aliquam mauris vehicula. Mauris et enim lacus. Maecenas sit amet enim odio. Donec tempor vestibulum condimentum. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.&nbsp;</span></font><br>', '11bn.png', 1, '21-04-2017'),
(2, 'Carol, NH Rebellion', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec pellentesque dui risus, vitae congue mi pulvinar vitae. Nam in nisl id est rhoncus egestas id non quam. Aenean vel eleifend nulla. Donec eu dui sed tellus pulvinar porta. Vestibulum tincidunt, enim nec sodales fermentum, mi mauris lacinia diam, condimentum consectetur metus diam et nisi. Fusce ultrices ex eu felis tristique, nec aliquam mauris vehicula. Mauris et enim lacus. Maecenas sit amet enim odio. Donec tempor vestibulum condimentum. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. <br>', '<span style=\"color: rgb(85, 85, 85); font-family: Arial, sans-serif; font-size: 12.16px; background-color: rgb(255, 255, 255);\">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span><br>', '3bn.jpg', 1, '21-04-2017'),
(4, 'testing news panell', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec pellentesque dui risus, vitae congue mi pulvinar vitae. Nam in nisl id est rhoncus egestas id non quam. Aenean vel eleifend nulla. Donec eu dui sed tellus pulvinar porta. Vestibulum tincidunt, enim nec sodales fermentum, mi mauris lacinia diam, condimentum consectetur metus diam et nisi. Fusce ultrices ex eu felis tristique, nec aliquam mauris vehicula. Mauris et enim lacus. Maecenas sit amet enim odio. Donec tempor vestibulum condimentum. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. <br>', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec pellentesque dui risus, vitae congue mi pulvinar vitae. Nam in nisl id est rhoncus egestas id non quam. Aenean vel eleifend nulla. Donec eu dui sed tellus pulvinar porta. Vestibulum tincidunt, enim nec sodales fermentum, mi mauris lacinia diam, condimentum consectetur metus diam et nisi. Fusce ultrices ex eu felis tristique, nec aliquam mauris vehicula. Mauris et enim lacus. Maecenas sit amet enim odio. Donec tempor vestibulum condimentum. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. <br>', '3bn.jpg', 1, '21-04-2017');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pages`
--

CREATE TABLE `tbl_pages` (
  `id` int(11) NOT NULL,
  `pagename` varchar(1111) NOT NULL,
  `content` text NOT NULL,
  `status` varchar(111) NOT NULL
) ;

--
-- Dumping data for table `tbl_pages`
--

INSERT INTO `tbl_pages` (`id`, `pagename`, `content`, `status`) VALUES
(2, 'glossary', '<div style=\"text-align: justify;\"><div><div><font size=\"5\" color=\"#006699\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<b>&nbsp;<u>Campaign Finance Terminology</u></b></font></div><div><br></div><h4><font size=\"5\" color=\"#990066\" face=\"arial\">Contribution</font></h4><div>Funds given to â€œsocial welfareâ€ organizationsâ€”sometimes called by their tax code statusâ€œ501c(4)â€â€”that are then used to influence elections. Originally conceived as a way to allow traditional charities also to take part in political action, they have grown massively in the last decade. By law, these organizations are required to devote a majority of their activities to social welfare rather than political purposes, so they wouldnâ€™t appear to be an efficient channel for campaign funds. But, for donors who prefer to keep their identities secret, they work: Neither the FEC nor IRS requires 501c(4) organizations to disclose the sources of their funds. Thus the moniker â€œdark money.â€<br></div><div>Example: Jane is running for president. John gives money to a 501c(4) organization, which in turn donates that money to a campaign or super PAC, effectively hiding Johnâ€™s name from the record.<br></div><div><br></div><div><span style=\"color: rgb(153, 51, 102); font-size: x-large;\">Federal Election Commission (FEC)</span></div><div>Established by Congress through a 1974 amendment to the â€œFederal Election Campaign Act,â€ the FEC began its work in 1975. Its mandate is to oversee and enforce campaign finance rules, though a series of court cases have removed or weakened some of the rules that the agency was established to enforce. The FECâ€™s six commissioners are appointed by the president with approval from Congress. By law, no more than three can be affiliated with the same political party. Commissioner Ann Ravel observes that many FEC rules are not currently being enforced because â€œthree Commissioners repeatedly and consistently vote against enforcing the law,â€ even though, she stresses,such deadlock has not been the historic pattern.<br></div><div><span style=\"color: rgb(153, 51, 102); font-size: x-large;\">Independent expenditure</span><br></div><div><br></div><div>Coordination</div><div>The FEC mandates a â€œthree-pronged testâ€ to determine whether a communication is coordinated:<br></div><div>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 1) Who paid for it? &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</div><div>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 2) Is its content an election communication?</div><div>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 3) Did it result from a request or suggestion from the candidate, campaign, or committee?&nbsp;</div><div>All three â€œprongsâ€ must point to coordination for a communication to be deemed â€œcoordinated.â€ Given the explosive growth of independent expenditures, however, Commissioner Ravel notes that relevant FEC rules need updating. &nbsp;<br></div><div>Example: Jane is running for president. Without consulting Jane or her campaign, John spends money on his own or donates it to a super PAC to support Janeâ€™s winning the presidency.<br></div><div>Any spending by an individual or group for political objectives that is not coordinated with a candidate or the candidateâ€™s campaign committee or party; and therefore is not restricted.<br></div><div><span style=\"color: rgb(153, 51, 102); font-size: x-large;\">Dark money</span><br></div><div><br></div><div>A joint fundraising committee (JFC) allows a single entity [SM1] to raise funds on behalf of</div><div><br></div><div>Â· &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;National campaign committees</div><div><br></div><div>Â· &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;State campaign committees</div><div><br></div><div>Â· &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;National political party committees</div><div><br></div><div>Â· &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;State political party committees</div><div><br></div><div>Â· &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Multiple candidates</div><div>Rather than a donor giving the legal individual maximum to those groups individually, the donor can write a single check for the combined legal maximum values to a JFC. For donors, this doesnâ€™t change the possible total amount that could be donated, but it greatly simplifies &nbsp;the process by allowing them to give large amounts of money at once. For the committees that make up the JFC, it allows them to combine fundraising costs and then split the proceeds.<br></div><div>Use of JFCs:<br></div><div><br></div><div><b>Pre-McCutcheon:</b></div><div>Individual total giving was limited -- the more committees there were in a JFC meant each committee got a smaller amount of the money given, as the total amount of money from an individual cannot change. Therefore, there was less incentive to band together.&nbsp;<br></div><div><br></div><div><b>Post-McCutcheon:</b></div><div>Individual total giving is not limited -- more committees in a JFC means a larger single check an individual can write, enabling wealthy individuals to easily give massive donations.&nbsp;<br></div><div>Example: Jane wants to run for President. Rather than asking her wealthy donor to give to her party, her national campaign, and 50 different individual state campaigns, Jane can ask for one very large donation to her joint fundraising committee. This committee will then do the work of dispersing the money appropriately according to individual contribution limits for each group in the committee.<br></div><div><br></div><div><font size=\"5\" color=\"#990066\">PAC (Political Action Committee)</font></div><div><br></div><div>Originating in 1944, a political action committee is a group affiliated with a party, issue, or candidate that raises or spends money for political purposes. Regulated by theFEC, PACs must reveal the source of their donations in regular reports. Contributors to PACs are limited in what they can donate and PACs themselves are limited in what they can donate to other political bodies. Unlike super PACs (see below), however, these groups may coordinate directly with candidates and campaigns. &nbsp;</div><div>Example: Jane is running for president. Any group that wants to work with Janeâ€™s campaign can form a PAC, but that group will have to register with the FEC and report its donations and spending to the FEC.<br></div><div><br></div><div><font size=\"4\" color=\"#990066\">Political spending</font></div><div>Any money spent for political ends. In addition to contributions (see above), this term also includes expenditures directly by candidates, PACs, and parties, as well as independent expenditures by groups or individuals. Of all the types of political spending, courts have ruled that only contributions directly given to registered PACs, parties, or candidates can be limited by the law.<br></div><div>Example: Jane is running for president. Anyone, including Jane, who spends any money to support (or counter) Janeâ€™s campaign through any means is engaging in political spending.<br></div><div><br></div><div><span style=\"color: rgb(153, 51, 102); font-size: x-large;\">Super PACs</span></div><div>Technically known as â€œIndependent Expenditure-Only Political Action Committees,â€ these groups emerged following two major 2010 court decisions (Citizens United v. FEC, SpeechNow.org v.FEC), which made them legal. These groups are required to submit records of donors and political spending to the FEC, but are not limited in terms of how much they can collect or spend. Unlike regular PACâ€™s, however, these groups can only make independent expenditures.<br></div><div>Example: A group collects as much money as theyâ€™d like and spends it on commercials to support Jane for president. As long as they donâ€™t â€œcoordinateâ€ with Jane or her campaign, they can raise and spend as much money as they like.<br></div><div><span style=\"color: rgb(153, 0, 102); font-size: large;\">\"Super-Duper PACs\"</span><br></div><div><br></div><div>As of early 2016, several efforts are underway to create hybrid PAC models that have separate accounts so they can (A) collect and spend all they want on independent expenditures like a super PAC from one account, and (B) give directly to candidates like a regular PAC from another account. Only spending under section B would be regulated by the FEC and therefore subject to limits on donors and spending. Courts have not weighed in on this modelâ€™s constitutionality.</div><div>Types of Organizations<br></div><div>501c(3) (Charity of Public Charity)</div><div>Nongovernmental organizations that range from charities to advocacy organizations, including a majority of the groups in this Guide. They can advocate for causes but are forbidden from contributing to political campaigns.<br></div><div><br></div><div>â€‹<span style=\"color: rgb(153, 0, 102); font-size: x-large;\">501c(4) (Social Welfare Organization)</span></div><div><br></div><div>Similar to charities except these groups are allowed to engage in political campaigns as long as this work does not use more than 50% of their resources in a given year. Because they are not required to report the source of donations, these groups are used by those who prefer to hide their identity. Their political spending is thus called â€œdark money.â€</div><div><br></div><div><b>527 (PACs, Political Parties, Political Committees or Super PACs)</b></div><div>PACs, Political Parties, Political Committees:<br></div><div>Strictly political groups monitored by the FEC and subject to all FEC requirements and limits. They are allowed to work directly with candidates and campaigns to coordinate activity. &nbsp;</div><div><br></div><div><font size=\"4\"><b>â€‹Super PACs:</b></font></div><div>PACs that only make independent expenditures (see above). They are exempt from FEC spending and fundraising limits.</div><div><br></div><div>â€‹<span style=\"font-size: large;\"><font color=\"#990066\">PACs, Political Parties, Political Committees (527)</font></span></div><div><br></div><div>Strictly political groups monitored by the FEC and subject to all FEC requirements and limits. They are allowed to work directly with candidates and campaigns to coordinate activity.</div><div><br></div><div><font size=\"4\"><font color=\"#990066\">Social Welfare Organization (501c(4))</font></font></div><div>Similar to charities except these groups are allowed to engage in political campaigns as long as this work does not use more than 50% of their resources in a given year. Because they are not required to report the source of donations, these groups are used by those who prefer to hide their identity. Their political spending is thus called â€œdark money.â€<br></div><div><br></div><div>â€‹<span style=\"color: rgb(153, 0, 102); font-size: large;\">Super PACs (527)</span></div><div>PACs that only make independent expenditures (see above). They are exempt from FEC spending and fundraising limits.&nbsp;<br></div><div><br></div><div><font size=\"4\" color=\"#990066\">â€‹Major U.S. Supreme Court Cases</font></div><div>Buckley v. Valeo (1976)</div><div><br></div><div><b>Decision by Supreme Court except where noted otherwise:</b></div><div>Limits on contributions to individual parties or campaigns are constitutional. But limits on most types of independent, total political spending by an individual are not constitutional because they limit free speech.</div><div><br></div><div><b>Resulting Rule Change:</b></div><div>All limits are eliminated for:</div><div>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;1.) &nbsp; Independent expenditures by individuals</div><div>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;2.) &nbsp; Total campaign spending by a campaign itself</div><div>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;3.) &nbsp; Use of personal funds by a candidate or candidateâ€™s family for a campaign.</div><div>&nbsp;<font size=\"4\" color=\"#990066\">Citizens United v. FEC (2010)</font><br></div><div><b>Decision by Supreme Court except where noted otherwise:</b><br></div><div>Corporations acting as groups of individuals have many of the same &nbsp;political rights as the individuals within that group. Therefore, the 1976 Buckley v. Valeo decision applies equally &nbsp;to corporations and individuals.</div><div><b>Resulting Rule Change:</b><br></div><div>Corporations and unions can now, like individuals, spend unlimited &nbsp;amounts on independent expenditures.</div><div><br></div><div><font size=\"4\" color=\"#990066\">â€‹McCutcheon v. FEC (2014)</font></div><div><b>Decision by Supreme Court except where noted otherwise:</b><br></div><div>While limits on contributions to PACs, parties, and candidates are &nbsp;constitutional, aggregate limits for individual contributions to these entities are not.</div><div><br></div><div><font size=\"4\" color=\"#990066\">â€‹Resulting Rule Change:</font></div><div>Since 1976, individuals and groups have been limited in how much they &nbsp;could give directly to a candidate, party, or PAC; and until McCutcheon, &nbsp;total political contributions within a given two-year period were also limited. This ruling, however, eliminated aggregate limits so that individuals &nbsp;and groups can now give the maximum legal amount directly to campaigns, parties, or PACs in every race during every electoral season.</div><div><br></div><div><span style=\"color: rgb(153, 0, 102); font-size: large;\">SpeechNow.org v. FEC (2010)</span></div><div><b>Decision by Supreme Court except where noted otherwise:</b><br></div><div>The D.C. Court of Appeals, in the first major decision to cite Citizens United, rules that if individuals and corporations can make unlimited &nbsp;independent expenditures, it is unconstitutional to limit contributions to &nbsp;independent expenditure-only political groups. &nbsp; &nbsp; &nbsp;</div><div><br></div><div><b>Resulting Rule Change:</b></div><div>The decision enabled the emergence of super PACsâ€”a.k.a. independent &nbsp;expenditure-only organizationsâ€”that can receive and pool unlimited &nbsp;contributions and spend as much as they want, as long as that spending is not â€œcoordinatedâ€ with a campaign or party.&nbsp;</div></div><div><br></div></div>', '1'),
(4, 'about', '<div align=\"center\"><h4><font color=\"#0000FF\"><b><font size=\"5\">The Small Planet Institute</font></b></font></h4></div><div><br></div><div><font color=\"#000066\">hThe Small Planet Instituteâ€™s motto is â€œliving democracy, feeding hope,â€ so we are delighted to share with you our Field Guide to the Democracy Movement.</font></div><div><font color=\"#000066\">For us, democracy is the â€œmother of all issues.â€ Whether oneâ€™s first â€œloveâ€ is ending hunger, addressing climate change, or fixing our biased justice system, we at the Small Planet Institute believe that progress depends on governance accountable to citizens.<br></font></div><div><font color=\"#000066\"><br></font></div><div><font color=\"#000066\">And we are not alone. Today more and more citizens recognize that getting money out of politics and ensuring the right to vote are essential to realizing the America we want and need. Weâ€™re heartened by this powerful upsurge of passion for achieving equality of citizensâ€™ voices.<br></font></div><div><font color=\"#000066\">Such profound change cannot happen overnight, of course. It will come only through a vibrant, inclusive, compelling, sustained, and powerful Democracy Movement achieving step-by-step gains. Those steps include electing pro-reform officials who will pass tough campaign-finance legislation and ensure voting rights from local to national elections.&nbsp;<br></font></div><div><font color=\"#000066\"><br></font></div><div><font color=\"#000066\">We created this Field Guide to serve the emerging Democracy Movement. Here we share our learning about dozens of organizations that are the ever-growing foundation of this movementâ€”those working to prevent big, private wealth from dominating U.S. politics and to ensure the right to vote for all Americans.</font></div><div><font color=\"#000066\"><br></font></div><div><font color=\"#000066\">In composing this guide, it dawned on us that roughly two-thirds of the groups presented here are quite newâ€”launched in 2000 or after: yet another sign of the accelerating pace of the Democracy Movementâ€™s growth.</font></div><div><font color=\"#000066\">Like democracy itself, the Field Guide is not a â€œone-offâ€ project. It is an iterative undertaking in which we need and want your help. So please send us your thoughts on how this guide could be more useful to you.</font><br></div><div><br></div><div><span style=\"color: rgb(0, 0, 102); font-size: large;\"><b>The Crisis of Money in Politics</b></span></div><div><br></div><div><font color=\"#000066\">Imagine a crowded auditorium in which everyone is assured the right to speak, but only a very few are allowed to bring in electronic megaphones. Their earsplitting sound easily drowns out everyone else. This scene captures the essence of our election rules today: They allow money to become those deafening megaphones, as the biggest donorsâ€”individuals, corporations, and special interestsâ€”line the pockets of candidates, fund super PACs, and pay lobbyists to bend policy to their benefit.</font></div><div><font color=\"#000066\">Americans get it. Seventy-nine percent of us agree that â€œlarge political contributions prevent Congress from tackling important questions.â€ This unprecedented bipartisan alarm is spurred by the staggering increase in political spending, with the aggregate cost of all federal races climbing from $4 billion in 2004 to over $5 billion in 2008, more than $6 billion in 2012, and an estimated almost $7 billion in 2016. This increase has been enabled by a series of Supreme Court decisions beginning in 1976 that removed limits on private spending and increased secrecy in elections.<br></font></div><div><font color=\"#000066\">The billions flooding our political system come from a tiny sliver of the American populace. Less than 1 percent of 1 percent of the U.S. population contributed 60 percent of all the super PAC money spent in the 2012 election cycle, notes Professor Larry Lessig, legal scholar and activist. As a result, voices of regular citizens are increasingly drowned out by the cacophony of big money. A study of policy outcomes during the 80s and 90s document this truth: It found that average citizens had near-zero influence whereas the elite class had significant policy impact.<br></font></div><div><font color=\"#000066\">This stark imbalance generates anger and political alienation, no doubt contributing to the election of Donald Trump.<br></font></div><div><font color=\"#000066\"><br></font></div><div><font color=\"#000066\" size=\"4\">Defending and Extending Voting Rights</font></div><div><font color=\"#000066\">Voting is not guaranteed in our constitution. Indeed, the first American elections were reserved only for white, landowning men. It took centuries of struggle and three constitutional amendments for all socioeconomic groups, women, and people of color to gain the right to vote. &nbsp;Even after passage of the Voting Rights Act in 1965, as Ari Berman recounts in his book Give Us the Ballot, systematic and insidious efforts have worked to keep people from voting.<br></font></div><div><font color=\"#000066\">Recently, barriers to voting have grown.<br></font></div><div><font color=\"#000066\">In the past decade alone, more than twenty states have enacted laws requiring voters to show certain government-issued identification at the pollsâ€”including photo IDs that many Americans do not own. Many states have also eliminated state-sponsored voter registration drives, shortened the early-voting period, eliminated election-day registration, and even abolished pre-registration for sixteen and seventeen-year olds. These anti-democracy steps disproportionately affect communities of color, the elderly, and youth (especially students).<br></font></div><div><font color=\"#000066\">Much like its rulings on campaign-finance laws, the Supreme Court has actually abetted this assault. In the 2013 Shelby County v. Holder ruling, the Supreme Court cut the heart out of the Voting Rights Act.<br></font></div><div><font color=\"#000066\">Joining the Democracy Movement<br></font></div><div><font color=\"#000066\">Removing big money from control of our political system and ensuring the right to vote are essential to solving our nationâ€™s challenges. Without these foundational elements, Americans will continue to feel shut out and betrayedâ€”in a sense, evicted from their own home, democracy itself.<br></font></div><div><font color=\"#000066\">Though achieving such foundational reform will be difficult, millions in the Democracy Movement are already committed. As more and more of us join them, we generate people power and in this process become grounds for hope ourselves. Together we wage the â€œgood fightâ€â€”an historic struggle for the heart and soul of American democracy. Please join us all in this deeply rewarding work.&nbsp;</font><br></div><div><br></div>', '1'),
(5, 'learn', 'There will be interesting articles here<br>', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_testimony`
--

CREATE TABLE `tbl_testimony` (
  `id` int(11) NOT NULL,
  `title` varchar(1111) NOT NULL,
  `short_desc` text NOT NULL,
  `content` text NOT NULL,
  `image` varchar(1111) NOT NULL,
  `status` int(11) NOT NULL
) ;

--
-- Dumping data for table `tbl_testimony`
--

INSERT INTO `tbl_testimony` (`id`, `title`, `short_desc`, `content`, `image`, `status`) VALUES
(2, 'Carol, NH Rebellion', 'http://dppms.com/demo-projects/scaffold/scaffold-projects/<br>', '<span style=\"color: rgb(0, 0, 0); font-family: futura-lt-w01-light, sans-serif; font-size: 16px; text-align: center;\">If you want to live in a democracy, you have to take responsibility for it.</span><br>', 'nc dashboard.png', 1),
(3, 'Meet Chrissex', '<span style=\"color: rgb(85, 85, 85); font-family: \" open=\"\" sans\",=\"\" sans-serif;=\"\" font-size:=\"\" 14px;=\"\" text-align:=\"\" center;\"=\"\">Once you start organizing, itâ€™s really just socializing with a focus. You learn just by doing it, and there is nothing preventing anyone from getting involved with activism.g</span><br>', '<p class=\"font_8\" style=\"margin-bottom: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; background: transparent; font-stretch: normal; font-size: 16px; line-height: normal; font-family: \" open=\"\" sans\",=\"\" sans-serif;=\"\" color:=\"\" rgb(0,=\"\" 48,=\"\" 91);\"=\"\"><span style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; background: transparent; font-size: 15px;\">If you have heard about money-out-of-politics work at the University of New Hampshire (UNH), it has likely been in the context of the pop-up Edward Sharpe and the Magnetic Zeros / Young the Giant / Bernie Sanders extravaganza that drew thousands to the campus&nbsp;February 2016, kicking off the 2016 Democratic primary season. After gradually longer sets by the two bands, Bernie finally hit the stage, delivering a rousing speech, the centerpiece of which was a compelling portrait of American electoral systems. In the echoing university hockey stadium, he explained, â€œDemocracy is not a spectator sport. In fact it is a radical idea... not just kings and queens, czars&nbsp;and billionaires, but all people have a right to determine the future of their country... there are people who are very wealthy and very powerful who control what goes on in our economic and political life. They would not like you to vote. They would like things to remain as they are, where big money is able to buy elections.â€</span></p><p class=\"font_8\" style=\"margin-bottom: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; background: transparent; font-stretch: normal; font-size: 15px; line-height: normal; font-family: \" open=\"\" sans\",=\"\" sans-serif;=\"\" color:=\"\" rgb(0,=\"\" 48,=\"\" 91);\"=\"\"><span style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; background: transparent;\">â€‹</span></p><p class=\"font_8\" style=\"margin-bottom: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; background: transparent; font-stretch: normal; font-size: 15px; line-height: normal; font-family: \" open=\"\" sans\",=\"\" sans-serif;=\"\" color:=\"\" rgb(0,=\"\" 48,=\"\" 91);\"=\"\"><span style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; background: transparent;\">As Chris Grinley,&nbsp;senior and activist at UNH, described it to me, Bernie is something of a regular on campus, thanks to the work of the Universityâ€™s money-out-of-politics activists, who hosted him on two occasions prior to this event. Chris, who has worked with these organizations during his time at UNH, is a campus organizer for Democracy Matters, an organization that helps undergraduate students&nbsp;build awareness around money in politics. I had the chance to speak with Chris about his work with Democracy Matters in August 2016.</span></p><p class=\"font_8\" style=\"margin-bottom: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; background: transparent; font-stretch: normal; font-size: 15px; line-height: normal; font-family: \" open=\"\" sans\",=\"\" sans-serif;=\"\" color:=\"\" rgb(0,=\"\" 48,=\"\" 91);\"=\"\"><span style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; background: transparent;\">â€‹</span></p><p class=\"font_8\" style=\"margin-bottom: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; background: transparent; font-stretch: normal; font-size: 15px; line-height: normal; font-family: \" open=\"\" sans\",=\"\" sans-serif;=\"\" color:=\"\" rgb(0,=\"\" 48,=\"\" 91);\"=\"\"><span style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; background: transparent;\"><span style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; background: transparent; font-style: italic;\">This interview has been edited for clarity and succinctness.</span></span></p>', '3bn.jpg', 1),
(4, 'Carol, NH Rebellion', '<span style=\"color: rgb(85, 85, 85); background-color: rgb(245, 245, 245);\">Once you start organizing, itâ€™s really just socializing with a focus. You learn just by doing it, and there is nothing preventing anyone from getting involved with activism.g</span><br>', '<span style=\"color: rgb(85, 85, 85); background-color: rgb(245, 245, 245);\">Once you start organizing, itâ€™s really just socializing with a focus. You learn just by doing it, and there is nothing preventing anyone from getting involved with activism.g</span><br>', 'test.png', 1),
(5, 'Carol, NH Rebellion', '<span style=\"color: rgb(85, 85, 85); background-color: rgb(245, 245, 245);\">Once you start organizing, itâ€™s really just socializing with a focus. You learn just by doing it, and there is nothing preventing anyone from getting involved with activism.g</span><br>', '<span style=\"color: rgb(85, 85, 85); background-color: rgb(245, 245, 245);\">Once you start organizing, itâ€™s really just socializing with a focus. You learn just by doing it, and there is nothing preventing anyone from getting involved with activism.g</span><br>', 'test.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `volunteer`
--

CREATE TABLE `volunteer` (
  `id` int(11) NOT NULL,
  `oid` varchar(1111) NOT NULL,
  `vid` varchar(1111) NOT NULL,
  `r_date` varchar(1111) NOT NULL
) ;

--
-- Dumping data for table `volunteer`
--

INSERT INTO `volunteer` (`id`, `oid`, `vid`, `r_date`) VALUES
(16, '84', '114', '2017/04/20 06:15:48pm'),
(9, '70', '101', '2017/04/12 05:31:06pm'),
(8, '75', '101', '2017/04/12 05:28:39pm'),
(10, '51', '101', '2017/04/12 05:32:46pm'),
(7, '58', '101', '2017/04/12 04:55:56pm'),
(13, '79', '114', '2017/04/13 05:36:23pm'),
(15, '81', '101', '2017/04/15 03:10:17pm'),
(17, '48', '114', '2017/04/20 06:36:03pm'),
(18, '84', '120', '2017/04/21 09:05:46pm'),
(19, '82', '15', '2017/04/26 05:42:25pm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pro_democracy`
--
ALTER TABLE `pro_democracy`
  ADD PRIMARY KEY (`pro_id`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);


--
-- Indexes for table `tbl_news`
--
ALTER TABLE `tbl_news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_pages`
--
ALTER TABLE `tbl_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_testimony`
--
ALTER TABLE `tbl_testimony`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `volunteer`
--
ALTER TABLE `volunteer`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for table `pro_democracy`
--
ALTER TABLE `pro_democracy`
  MODIFY `pro_id` int(12) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_news`
--
ALTER TABLE `tbl_news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_pages`
--
ALTER TABLE `tbl_pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_testimony`
--
ALTER TABLE `tbl_testimony`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `volunteer`
--
ALTER TABLE `volunteer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
