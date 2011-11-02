<?php
include("config.php");
		
$dir_links = realpath("../");
	
if ($handle = opendir($dir_links)) {

   while (false !== ($file = readdir($handle))) {  	 
   	
   	   if($file == "error_log" 
   	   || $file == "." 
   	   || $file == ".." 
   	   || $file == "index.php" 
   	   || $file == "$rssgmfoldername" 
   	   || $file == ".htaccess" 
   	   || $file == "Cgi Bin" 
   	   || $file == "cgi-bin" 
   	   || $file == "error" 
   	   || $file == "stats" 
   	   || $file == "phpinfo.php" 
   	   || $file == "sitemap.php" 
   	   || $file == "sitemap.xml" 
   	   || $file == "robots.txt"
   	   || $file == "text-links.txt"
   	   || $file == "cache"
   	   ){
   		
   		echo "";
   	}
   	else{
   		
   		$file_name_1 = str_replace("-", " ", $file);
   		$file_name_2 = str_replace(".php", " ", $file_name_1);
   		$file_name_3 = ucwords($file_name_2); 
   		$file_name = rtrim($file_name_3); 
   		$file = str_replace("", "/", $file);
   	
          $hreflist[] = "<a class=\"sidelink\" href=\"".$file."\">$file_name</a>";
          
   	}
   }

   closedir($handle);
   
$nr1 = count($hreflist);

if($nr1 < $nr_links){
	
	$nr_links = $nr1;
}
   
for ($x = 0; $x < $nr_links; $x++) {    
	mt_srand((double)microtime()*1000000);
    $RandomNumber = rand (1, count($hreflist)-1);
    print($hreflist[$RandomNumber]);
}
   
}

?>
