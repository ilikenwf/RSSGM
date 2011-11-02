<?php
		
		include("config.php");
	
		
		$dir = realpath("../");
	

		$sitemap_xml_code = '<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.google.com/schemas/sitemap/0.84"
xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
xsi:schemaLocation="http://www.google.com/schemas/sitemap/0.84
http://www.google.com/schemas/sitemap/0.84/sitemap.xsd">';
		
if ($handle = opendir($dir)) {
	
   while (false !== ($file = readdir($handle))) {  	 
   	
   	   if($file == "error_log" 
   	   || $file == "." 
   	   || $file == ".." 
   	   || $file == "index.php" 
   	   || $file == "rssgm" 
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
   		
    $file = rtrim($file);
   		
   	  
   	 $sitemap_xml_code.= '
   <url>
     <loc>
     ';
     
   	 $sitemap_xml_code .= $sitexml.$file;
     
     $sitemap_xml_code .= '
     </loc>
   </url>
     ';    
          
   	}
   }

   closedir($handle);
}

$sitemap_xml_code .= '</urlset>';

?>
