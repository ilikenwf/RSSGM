<?php
		

$break = 1;
$nr = 5;


include("config.php");
		
$dir = realpath("../");
$counter = 0;	

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
           || $file == "feed.rss"
   	   || $file == "text-links.txt"
   	   ){
   		
   		echo "";
   	}
   	else{
   		++$counter;
	
   		$file_name_1 = str_replace("-", " ", $file);
   		$file_name_2 = str_replace(".php", " ", $file_name_1);
   		$file_name_3 = ucwords($file_name_2); 
   		$file_name = rtrim($file_name_3);
   	
          $display1 = highlight_string("<a href=\"".$site.$file."\">$file_name</a><br>");
          $display1 .= "<br>";
          $display = str_replace("1", "", $display1);
          
          echo  $display;
          
          if($break == 1){
          if(is_int($counter / $nr)){
          	
          echo "#BREAK#";
          echo "<br>";
          }
          }
          
   	}
   }

   closedir($handle);
}

?>
