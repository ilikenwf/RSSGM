<?php

	$myip = $_SERVER[REMOTE_ADDR];
	$filename = "http://feed.peakclick.com/res.php?aff=851&ip=$myip&keyword=$keyword_feed$num=10&xml=1";
	$feed = implode('', file($filename));
	
		preg_match_all('#<title>(.*?)</title>#', $feed, $title, PREG_SET_ORDER); 
		preg_match_all('#<click>(.*?)</click>#', $feed, $link, PREG_SET_ORDER);
		preg_match_all('#<description>(.*?)</description>#', $feed, $description, PREG_SET_ORDER); 		
		
		$no = 0;
		
$nl = count($link);
if($nl == 0){
	
	echo "Hi! There are no links available for that keyword.";
}
elseif ($nl > 0){

		for ($counter = $no; $counter < 11; $counter++ ){
			
		$link_display = $link[$counter][1];
			
		$chars = 77;

		$link_display = strtolower($link_display);
	    $link_display = $link_display." ";
     	$link_display = substr($link_display,0,$chars);
        $link_display = substr($link_display,0,strrpos($link_display,' '));
        $link_display = $link_display;
			
			$title[$counter][1] = str_replace("&amp;", "&", $title[$counter][1]);
			$title[$counter][1] = str_replace("&apos;", "'", $title[$counter][1]); 	
			
			$description[$counter][1] = str_replace("&amp;", "&", $description[$counter][1]);
			$description[$counter][1] = str_replace("&apos;", "'", $description[$counter][1]); 
			
			$img = $link[$counter][1];
			
			echo "<table><tr><td valign=\"middle\"><img src=\"http://thumbnails.alexa.com/image_server.cgi?size=small&url=$img\"></td><td>&nbsp;</td>";
			echo "<td><h4><a href=\"".$link[$counter][1]."\" rel=\"nofollow\" target=\"_blank\">".$title[$counter][1]."</a></h4>";
			echo "<p>".$description[$counter][1]."</p></div></td></tr></table>";
			
		}
		
		
}
?>
