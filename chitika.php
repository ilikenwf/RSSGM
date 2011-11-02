<script type="text/javascript"><!--
ch_client = "<?php echo $chitika_pub; ?>";
ch_width = 160;
ch_height = 600;
ch_color_border = "FEF7CD";
ch_color_title = "1480CD";
ch_color_text = "#000000";
ch_non_contextual = 1;
<?PHP
if ($chitika_channel!=""){
?>
ch_sid = "<?PHP echo $chitika_channel;?>";
<?PHP
}
?>
var ch_queries = new Array('<?php echo $keyword; ?>', '<?php echo $mainkeyword; ?>');
var ch_selected=Math.floor((Math.random()*ch_queries.length));
ch_query = ch_queries[ch_selected];
ch_default_tab = "Deals";
//--></script>
<script  src="http://scripts.chitika.net/eminimalls/mm.js" type="text/javascript">
</script>
