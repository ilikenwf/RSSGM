<?php

$cdir = realpath("../cache/");

if ($handle = opendir($cdir)) {
   while (false !== ($file = readdir($handle))) {
    if ($file != "." && $file != "..") {
        $f2 = $cdir."/".$file;
unlink($f2);     
       }
   }
   
   closedir($handle);
}

echo "Done! All files in the cache folder were deleted.";
?>
