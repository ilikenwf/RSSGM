<?PHP
/* this is an experimental script to generate an RSS feed of the 25 most recently visited pages.
*/
//require_once ('./config.php');

$recent = 4;

//lets try and see what is most recently visited.
   $path = '../cache/';
   $dh = @opendir($path);

   while (false !== ($file=readdir($dh)))
   {
     if (substr($file,0,1)!="." && $file!="feed.rss")
         $files[]=array(filemtime($path.$file),$file);  #2-D array
   }
   closedir($dh);

   if ($files)
   {
     rsort($files);

    for ($i=0;$i<$recent;$i++){
        $f[]=$files[$i][1];
    }
   }
//$f is now an array with the $recent most recent files

//not sure what to put in the rss feed but here goes.

foreach ($f as $fi){
    //open the cached file
    $con=file_get_contents($path.$fi);
    //now lets build the description.
    $d=explode('content_in',$con);
    $d=$d[1];
    $d=explode('</script>',$d);
    $d=$d[2];
    $d=substr(strip_tags($d),0,150);
    //print $d;
    $desc[]=$d;
    $lrss[]=$fi;
}
$xml="<?xml version='1.0' ?>
<rss version='2.0'>
<channel>
<title>RSS feed for ".$mysitename."</title>
<link>".$sitexml."sitemap.php</link>
<description>RSS feed for ".$mysitename."</description>
<language>en-us</language>
";
$x=0;
foreach($lrss as $li){
    if ($li!="." && $li!=""){
//replace the .html with .php
    $li=substr($li,0,-5).'.php';
    $xml.='<item>
';
    $xml.='<title>'.str_replace('-',' ',substr($li,0,-4)).'</title>';
    $xml.='<link>'.$sitexml.$li.'</link>
';
    $xml.='<description>'.$desc[$x].'</description>
';
    $xml.='</item>
';
    $x++;
    }
}
$xml.='</channel></rss>';
$fh=fopen('../feed.rss','w+');
fwrite($fh,$xml);
fclose($fh);
?>