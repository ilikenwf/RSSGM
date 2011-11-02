<?PHP
/* article generation frontend */
?>

<HTML>
<HEAD><TITLE>Article generation for RSSGM</TITLE></HEAD>
<BODY>
<P>Articles are fetched from wikipedia and Yahoo<br />
The two sources are then combined and spun into the number of articles you specifiy on a per keyword basis
</P>
<form method="POST" action="wiki.php">
<table><TR><TD>Keywords:</TD>
<td><textarea cols="50" rows="25" name="keywords">Enter keywords one per line</textarea></td></TR>
<tr><TD>Number of Articles to produce per keyword</TD><TD><input type="text" name="artnum" size="3"></TD></tr>
<tr><TD>Number of words per article</TD><td><input type="text" name="numwords" size="2"></TD></tr>
<tr><TD>Markov granuality </TD><TD><input type="text" name="gran" size="2"></TD></tr>
</table>
<input type="submit" name="submit" value="Do it">
</form>
</BODY>
</HTML>