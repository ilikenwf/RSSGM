<?php

include("config.php");

$kwdir = "keywords"; 

if ($handle = opendir($kwdir)) {
   while (false !== ($file = readdir($handle))) {
   	if ($file != "." && $file != ".." && $file != "index.php") {
          $filename = $kwdir."/".$file;   	   
       }
   }
   
   closedir($handle);
}

$handle = fopen($filename, "rb");

if($handle == false){
	
	echo "Please upload a keyword list.";
	exit;
}
elseif ($handle == true){

$keyword_list = fread($handle, filesize($filename));
fclose($handle);

$patterns = " ";
$replacements = "-";

$keyword_list_2 = str_replace(" ", "-", $keyword_list); 

$keywords_dashes = explode("\n", $keyword_list_2);

$keywords_spaces = explode("\n", $keyword_list);

$nr_keywords = count($keywords_dashes);

for($counter=0; $counter < $nr_keywords; $counter++){
	
	$page_temp = glob('pages*.php');
	shuffle($page_temp);
	$rnd = rand(1, $template_number);
	$template_pages = ($page_temp[$rnd]);
	echo $template_pages;

	$keywords_dashes[$counter] = rtrim($keywords_dashes[$counter]);
	$siteip = "<?php \$clientip = \$_SERVER['REMOTE_ADDR']; ?>";
	$site_inc = $siteip."<?php include(\"$site/rssgm/$template_pages?keyword=$keywords_dashes[$counter]&yourip=\$clientip\"); ?>"; 
	
	$filename = "../".$keywords_dashes[$counter].".php";
	
	$handle = fopen($filename,"w");
	chmod($filename, 0777);
	fwrite($handle, $site_inc);
		
}


//--
$indexip = "<?php \$clientip = \$_SERVER['REMOTE_ADDR']; ?>";
$index_code = $indexip."<?php include(\"$site/rssgm/$template_index?yourip=\$clientip\"); ?>";
	
$index = "../index.php";
$handle_index = fopen($index, "w");
chmod($index, 0777); 
fwrite($handle_index, $index_code);

//--

include("sitemap_xml_code.php");

$sitemap_xml = "../sitemap.xml";

$handle_sitemap_xml = fopen($sitemap_xml, "w");
chmod($sitemap_xml, 0777); 
fwrite($handle_sitemap_xml, $sitemap_xml_code);

//--
$sitemapip = "<?php \$clientip = \$_SERVER['REMOTE_ADDR']; ?>";
$sitemap_code = $sitemapip."<?php include(\"$site/rssgm/$template_sitemap?yourip=\$clientip\"); ?>";
	
$sitemap = "../sitemap.php";
$handle_sitemap = fopen($sitemap, "w");
chmod($sitemap, 0777); 
fwrite($handle_sitemap, $sitemap_code);

//--

$robots_code = "
User-agent: *
Disallow: /rssgm/
";
	
$robots = "../robots.txt";
$handle_robots = fopen($robots, "w");
chmod($robots, 0777); 
fwrite($handle_robots, $robots_code);

//--
mkdir("../cache", 0777);
//--

echo "Done! Please visit <a href=\"$site/sitemap.php\">your site</a> to view the sitemap.";
}
?>
