<?php

$filename = "http://search.msn.com/news/results.aspx?q=$keyword_feed&format=rss&FORM=RSNR";
$feed = implode('', file($filename));

		preg_match_all('#<title>(.*?)</title>#', $feed, $title, PREG_SET_ORDER); 
		preg_match_all('#<link>(.*?)</link>#', $feed, $link, PREG_SET_ORDER);
		preg_match_all('#<description>(.*?)</description>#', $feed, $description, PREG_SET_ORDER); 		
 
		$nr = count($title); 
		
		if($nr == 1){
			
		echo "No news is good news.<br><br>";
		}
		
		elseif($nr > 1){
			
		for ($counter = 1; $counter < 11; $counter++ ){
			
			if(empty($title[$counter][1])){
				echo "";
			}
			elseif(!empty($title[$counter][1])){
			
			$title[$counter][1] = str_replace("&amp;", "&", $title[$counter][1]);
			$title[$counter][1] = str_replace("&apos;", "'", $title[$counter][1]); 	
			
			$description[$counter][1] = str_replace("&amp;", "&", $description[$counter][1]);
			$description[$counter][1] = str_replace("&apos;", "'", $description[$counter][1]); 	
				
			echo "<h3>".$title[$counter][1]."</h3>";
			echo "<p>".$description[$counter][1]."</p>";
			echo "<a href=\"".$link[$counter][1]."\" rel=\"nofollow\" target=\"_blank\">Read more</a><br><br><hr size=1>";
			}
		}
		
		}
		
		

?>
