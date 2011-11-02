<?php

function chitikaAds($ch_ad_format, $color_border="FFFFFF", $color_bg="FFFFFF", $color_title="1480CD", $color_text="000000") {
global $show_chitika, $chitika_pub, $chitika_channel, $keyword, $mainkeyword;

if ($show_chitika == "1") {

switch($ch_ad_format) {

//Text only ads
case "728x90": //Leaderboard
$ad_width = "728";
$ad_height = "90";
break;

case "468x60": //Banner
$ad_width = "468";
$ad_height = "60";
break;

case "300x250": //Medium Rectangle
$ad_width = "300";
$ad_height = "250";
break;

case "250x250": //Square
$ad_width = "250";
$ad_height = "250";
break;

case "180x150": //Small Rectangle
$ad_width = "180";
$ad_height = "150";
break;

case "160x600": //Wide Skyscraper
$ad_width = "160";
$ad_height = "600";
break;

case "120x600": //Skyscraper
$ad_width = "120";
$ad_height = "600";
break;

case "160x160": //Small Square
$ad_width = "160";
$ad_height = "160";
break;

case "468x180": //Blog Banner
$ad_width = "468";
$ad_height = "180";
break;

case "336x160": //Rectangle
$ad_width = "336";
$ad_height = "160";
break;
}
$ad = "\n\t\t\t\t\t"."<script type=\"text/javascript\"><!--
ch_client = \"$chitika_pub\";
ch_width = $ad_width;
ch_height = $ad_height;
ch_color_border = \"$color_border\";
ch_color_bg = \"$color_bg\";
ch_color_title = \"$color_title\";
ch_color_text = \"$color_text\";
ch_non_contextual = \"1\";
ch_sid = \"$chitika_channel\";
var ch_queries = new Array('$keyword', '$mainkeyword');
var ch_selected=Math.floor((Math.random()*ch_queries.length));
ch_query = ch_queries[ch_selected];
ch_default_tab = \"Deals\";
//--></script>
<script  src=\"http://scripts.chitika.net/eminimalls/mm.js\" type=\"text/javascript\">
</script>";

} else {
$ad = "&nbsp;";
}

return $ad;
}
?>
