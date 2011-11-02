<?php

if( $_thumbs ){
	$url = "http://feed.peakclick.com/res.php?aff=$_aff&subaff=$_subaff" . ( $keyword_feed != "" ? "&keyword=" . urlencode( $keyword_feed ) : "" ) . "&num=$_numResults&ip=$yourip&thumbs=1";
	$lines = file( $url );

	if( !substr_count( join( "", $lines ), "ERROR:" ) ){
		if( count( $lines ) ){
			foreach ( $lines as $line_num => $line ){
				$result = explode( "|", $line );
				$tur = explode( "/", str_replace( 'https://', '', $result[3] ) );
				$targetUrlReal = $tur[0];
				$targetUrl = str_replace( 'https://', '', str_replace( 'http://', '', $result[4] ) );

				if ( $targetUrl && $targetUrlReal && $result[2] ){
					echo "<table border=\"0\" cellspacing=\"0\" cellpadding=\"2\">\n";
					echo "	<tr><td><a rel=\"nofollow\" href=\"http://$targetUrl\">$result[6]</a></td>\n";
					echo "		<td valign=\"top\">\n";
					echo "			<p><b><a rel=\"nofollow\" href=\"http://$targetUrl\">$result[1]</a></b><br>\n";
					echo "			$result[2]<br>\n";
					echo "			<a rel=\"nofollow\" href=\"http://$targetUrl\">$targetUrlReal</a>\n";
					echo "		</td>";
					echo "	</tr>";
					echo "	</table>";
				}
			}
		}
		else{
			echo "No news is good news.";
		}
	}
	else{
		echo "No news is good news. IP problem.";
	}
}
else{
	$url = "http://feed.peakclick.com/res.php?aff=$_aff&subaff=$_subaff" . ( $keyword_feed != "" ? "&keyword=" . urlencode( $keyword_feed ) : "" ) . "&num=$_numResults&ip=$yourip";
	$lines = file( $url );

	if( !substr_count( join( "", $lines ), "ERROR:" ) ){
		if( count( $lines ) ){
			foreach ( $lines as $line_num => $line ){
				$result = explode( "|", $line );
				$tur = explode( "/", str_replace( 'https://', '', $result[3] ) );
				$targetUrlReal = $tur[0];
				$targetUrl = str_replace( 'https://', '', str_replace( 'http://', '', $result[4] ) );

				if ( $targetUrl && $targetUrlReal && $result[2] ){
					echo "<p><b><a rel=\"nofollow\" href=\"http://$targetUrl\">$result[1]</a></b><br>";
					echo "$result[2]<br>";
					echo "<a rel=\"nofollow\" href=\"http://$targetUrl\">$targetUrlReal</a>\n";
				}
			}
		}
		else{
			echo "No news is good news.";
		}
	}
	else{
		echo "No news is good news. No IP.";
	}
}
?>
