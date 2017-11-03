<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8"><link type="text/css" rel="stylesheet" href="css/css_002.css">
<style type="text/css">.gm-style .gm-style-cc span,.gm-style .gm-style-cc a,.gm-style .gm-style-mtc div{font-size:10px}</style>
<style type="text/css">@media print {  .gm-style .gmnoprint, .gmnoprint {    display:none  }}@media screen {  .gm-style .gmnoscreen, .gmnoscreen {    display:none  }}</style><style type="text/css">.gm-style{font-family:Roboto,Arial,sans-serif;font-size:11px;font-weight:400;text-decoration:none}.gm-style img{max-width:none}</style>
    <meta charset="UTF-8">
	<title>fieldguidetodemocracy.org</title>
    <meta name="description" content="">
    <meta name="author" content="">
	
	<!-- Mobile Specific Meta -->	
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->

    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Magnific Popup style -->
    <link rel="stylesheet" href="css/magnific-popup.css">
 
    <!-- Animate.css style -->
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/languages.css">
 
	<!-- Owl-carousel style -->
    <link rel="stylesheet" href="css/owl.css">
    <link rel="stylesheet" href="css/owl_002.css">

    <!-- Custom stylesheet-->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
    
    
    <!-- Font awesome -->
    <link rel="stylesheet" href="css/font-awesome.css">

    <!-- Added google font -->
    <link href="css/css.css" rel="stylesheet" type="text/css">

    <!--Fav and touch icons-->
     
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  <script type="text/javascript" charset="UTF-8" src="js/common.js" style=""></script>
 <script type="text/javascript" charset="UTF-8" src="js/util.js"></script>
 <script type="text/javascript" charset="UTF-8" src="js/marker.js"></script>
 <script type="text/javascript" charset="UTF-8" src="js/stats.js"></script>
 


<script type="text/javascript" charset="UTF-8" src="js/onion.js"></script>
<script type="text/javascript" charset="UTF-8" src="js/controls.js"></script></head>
<script type="text/javascript" src="js/jquery-1.8.0.min.js"></script>
<script type="text/javascript">
$(function(){
$(".search").keyup(function() 
{ 
var searchid = $(this).val();
var dataString = 'search='+ searchid;
if(searchid!='')
{
	$.ajax({
	type: "POST",
	url: "main_search",
	data: dataString,
	cache: false,
	success: function(html)
	{
	$("#result").html(html).show();
	}
	});
}return false;    
});

jQuery("#result").live("click",function(e){ 
	var $clicked = $(e.target);
	var $name = $clicked.find('.name').html();
	var decoded = $("<div/>").html($name).text();
	$('#searchid').val(decoded);
});
jQuery(document).live("click", function(e) { 
	var $clicked = $(e.target);
	if (! $clicked.hasClass("search")){
	jQuery("#result").fadeOut(); 
	}
});
$('#searchid').click(function(){
	jQuery("#result").fadeIn();
});
});
</script>
<style type="text/css">
	<!---->
	#result
	{
    background-color: hsl(0, 0%, 100%);
    border: 1px solid hsl(0, 0%, 80%);
    margin-top: -1px;
    overflow: auto;
    padding: 0;
    position: absolute;
    width: 243px;
    z-index: 500;
}
	.show
	{
		padding:10px; 
		border-bottom:1px #999 dashed;
		font-size:15px; 
		height:50px;
	}
	.show:hover
	{
		background:#4c66a4;
		color:#FFF;
		cursor:pointer;
	}
	
</style>  

 
	    <!-- header start -->
	    <header class="navbar-fixed-top" style="display: block;">
	      <nav class="navbar navbar-default" role="navigation">
		  
	        <div class="container">
			  <div class="row">
			<div class="col-sm-12 serach ">
 <div class="col-sm-5">
 </div>
 <div class="col-sm-4 KO">
 <form action="action_page">
  <DIV CLASS="glo">
  <i class="fa fa-search" aria-hidden="true"></i>
<input type="search" class="search" id="searchid" placeholder="Type Your Search Here" name="googlesearch">
 <div id="result"></div>
</div>
  
  <input  class="nb" value="Search" type="submit">
</form>
 </div>
 <div class="col-sm-3 padin">
  <a href="#"><button type="button" class="default btn-lg bun-1" >Join Us <i class="fa fa-user" aria-hidden="true"></i>
</button></a>
 <?php if($_SESSION['name']!=''){?>
  <a href="<?php echo $site_url;?>logout"> <button type="button" class="default btn-lg bun-1" >Logout<i class="fa fa-user" aria-hidden="true"></i></a>
  <?php } else {?>
  <a href="login"> <button type="button" class="default btn-lg bun-1" >Login <i class="fa fa-user" aria-hidden="true"></i></a>
  <?php } ?>
  <a href="login-page.html"> <button type="button" class="default btn-lg bun-1" >Feedback</button> </a>
 </div>
 </div>
 </div>
			</div>
	        <div class="container">
	          <div class="row">
	            <div class="col-sm-3">
	              <!-- Brand and toggle get grouped for better mobile display -->
	              <div class="navbar-header">
	                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
	                  <span class="sr-only">Toggle navigation</span>
	                  <span class="icon-bar"></span>
	                  <span class="icon-bar"></span>
	                  <span class="icon-bar"></span>
	                </button>
	                <h1 class="nav-logo"><a class="nav-brand" href="index.html"> <img class="mat"src="img/logo-white.png" ></a></h1>
	              </div>
	            </div>
	            <div class="col-sm-9 text-center">
	              <!-- Collect the nav toggling -->
	              <div class="collapse navbar-collapse navbar-geo" style="float:right;" id="bs-example-navbar-collapse-1">
	                <ul class="nav navbar-nav mar">
	                  <li class=""><a href="#">Directory</a></li>
	                  <li class=""><a href="#">News</a></li>
	                  <li class=""><a href="#">Testimonials</a></li>
	                  <li class=""><a href="#">Learn More </a></li>
	                  <li class=""><a href="#">Glossary</a></li>
	                  <li class=""><a href="#">About Us</a></li>
	                 
	                </ul>             
	              </div><!-- /.navbar-collapse -->
	            </div>
				


	           
	          </div>
	        </div><!-- /.container -->
	      </nav>
	    </header>