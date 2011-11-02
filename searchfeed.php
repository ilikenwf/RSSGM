<?

$sfkey = str_replace("-","+",$keyword_feed);
$sfkey = str_replace(" ","+",$sfkey);

$result=file("http://www.searchfeed.com/rd/feed/TextFeed.jsp?trackID=".$sf_track_id."&pID=".$sf_account_id."&excID=&cat=".$sfkey."&nl=5&page=1&ip=".$_GET['yourip']);

if ($result) {
       $data = implode($result);
       $final = explode("Title|",$data);
       for($x=1;$x<=5;$x++) {
          $fields = explode("|",$final[$x]);
          if ($final[$x]) {
            $searchfeed .= "<p><h3><a href='".$fields[7]."'onmouseover=\" window.status='http://www." .
            $fields[4] .
            "/'; return true\" onmouseout=\"window.status=''; return true\" target=_blank>" .
            $fields[1] .
            "</a></h3> <p> - " .
            $fields[10] .
            "<br /> -- http://www." .
            $fields[4] .
            "/ &nbsp;
            ";
           }
       }
}


echo $searchfeed;

?>
