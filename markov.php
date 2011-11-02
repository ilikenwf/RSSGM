<?php

/*
#
# Generates a text matching word frequency of input text.
# the units manipulated are "words" rather than individual
# letters.
# Command-line options:
# The granularity--the number of words to use to determine
#         the next word. Defaults to 3.
#   The number of words to output. Defaults to 25.
# Input text file.
#

Converted by newbiemobster to PHP based on Perl code found at 
http://syndk8.net/forum/index.php/topic,2048.msg18276.html#msg18276

Major difference between PERL and PHP versions:
You must specify all command line options in the correct order.
Only if there is a problem (like not giving a number when one 
is expected), will the defaults be used.

Comparison to PERL version:
Very similar. During testing, they both produced the same 
output sometimes. That was taken as a Good Thing(TM).

Modified by jluk for use with rssgm
*/

function markov($combo,$gran,$numwords){
$G = $gran;
$O = $numwords;
$output ="";
$combo = $combo;
//Set number of letters per line in output
$LETTERS_LINE = 65;

$textwords = array();
$textwords = explode(" ", $combo);

$loopmax = count($textwords) - ($G - 2) - 1;

$frequency_table = array();

for ($j = 0; $j < $loopmax; $j++) {
$key_string = "";
$end = $j + $G;
for ($k = $j; $k < $end; $k++) {
//build the key string (G - 1) words
$key_string .= $textwords[$k] . ' ';
}
$frequency_table[$key_string] .= $textwords[$j + $G] . " ";

}

$buffer="";
$lastwords = array();

for ($i = 0; $i < $G; $i ++) {
$lastwords[] = $textwords[$i];
$buffer .= " " . $textwords[$i];
}

for ($i = 0; $i < $O; $i++){
$key_string = "";   
for ($j = 0; $j < $G; $j++) {
$key_string .= $lastwords[$j] . " ";
}
if ($frequency_table[$key_string]){
$possible = explode(" ", trim($frequency_table[$key_string]));
mt_srand();
$c = count($possible);
$r = mt_rand(1, $c) -1;
$nextword = $possible[$r];
$buffer .= " $nextword";
if(strlen($buffer) >= $LETTERS_LINE) {
//echo $buffer . "\n";
$output .= $buffer;
$buffer = "";
}
for($l = 0; $l < $G - 1; $l++){ 
$lastwords[$l] = $lastwords[$l+1]; 
}
$lastwords[$G - 1] = $nextword;
}
else{    
$lastwords = array_splice($lastwords, 0, count($lastwords));
for ($l = 0; $l < $G; $l++) {
$lastwords[] = $textwords[$l]; 
$buffer .= ' ' . $textwords[$l];
}
}
}
//if((strlen($buffer)) > 0) {
// $output = $buffer;
//}


return $output;

}
?>