<?php
if ($article_type!="seed"){
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


$count2 = count($my_array);

$count = $count2 - 1;

mt_srand((double)microtime()*1000000);

$rand = mt_rand(0, $count);

$path = $dir_articles.$my_array[$rand];

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

}else{
include ('markov.class.php');

$markov = new Markov("2","300");

   $path = 'seed/';
   $dh = @opendir($path);

   while (false !== ($file=readdir($dh)))
   {
     if (substr($file,0,1)!=".")
         $files[]=$file;
   }
   closedir($dh);
//randomize teh order of $files - it annoys me that the first 20 words seemt to always be the same
foreach($files as $article){
$markov->inputFile($path.$article);
}

if ($markov->frequencyTable())  // frequency was generated correctly
print $markov->generate();
}


?> 
