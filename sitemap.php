<?php
		
		include("config.php");
	
		
		$dir = realpath("../");
	

if ($handle = opendir($dir)) {
	
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
   	
          echo "<a class=\"sidelink\" href=\"".$file."\">$file_name</a>";
          
   	}
   }

   closedir($handle);
}

?>
