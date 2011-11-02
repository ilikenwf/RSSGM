<?php

$mysitename = "Your Site Name";

$adsense_pub = "pub-8720587178527143";   // Adsense pub code.						
$chitika_pub = "marketsformore"; // Chitika pub code

#################### SERP.PHP #########################

$_aff = 851; # Your PeakClick Affiliate ID
$_subaff = 1; # Your PeakClick Subaffiliate ID
$_numResults = 5; # Number of search results displayed
$_thumbs = 1; # Set to 0 if you want to disable thumbs

############################################################

//----------------------------------//
//DON'T EDIT UNLESS A RSSG DEVELOPER//
//----------------------------------//

$site = "http://"; 

$site .= $HTTP_SERVER_VARS["HTTP_HOST"]; 

$sitexml = $site."/";

$full = $HTTP_SERVER_VARS["REQUEST_URI"]; 

$dir = dirname($full);

$dir = str_replace("/rssg", "", $dir);

$site .= $dir;

//--

$nr_links = 25;

$template_index = "theindex.php";    

$template_pages = "pages.php";
$page1template = "pages.php"; // 3 random pages
$page2template = "pages2.php"; // Add more in generator.php
$page3template = "pages3.php";

$template_sitemap = "thesitemap.php";  

//----------------------------------//

?>
