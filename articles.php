<?php
$i = 0;

$dir_articles = "articles/";

$nr_files = count(glob($dir_articles.'*'));

if (is_dir($dir_articles)) {
   if ($dh = opendir($dir_articles)) {
       while (($file = readdir($dh)) !== false) {
       
       	     if($file == "." || $file == ".." || empty($file)){$my_dump[] = $file;}
       	     else{
       	 
             $my_array[] = $file;
     
       	     }
       	     if($i >= $nr_files){$i = 0;}elseif($i < $nr_files){
        ++$i;}
       }
       closedir($dh);
   }
}
elseif(!is_dir($dir_articles)){
	echo "";
}

$path = $dir_articles.$my_array[$rand];

$count2 = count($my_array);

$count = $count2 - 1;

mt_srand((double)microtime()*1000000);

$rand = mt_rand(0, $count);

if(empty($my_array)){
	echo "";
}
elseif(!empty($my_array)){
	
echo "<h3>$keyword Article</h3><p>";

$path = $dir_articles.$my_array[$rand];

	    $handle = fopen($path, "r");
		$article = fread($handle, filesize($path));
		fclose($handle);

	 	echo $article;
}




?> 
