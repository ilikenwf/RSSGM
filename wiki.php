<?PHP
/* wiki scraper */

if ($_REQUEST['submit']==""){
    print '<P>you\'re not supposed to call this file directly DOH.<br />
How the fish are we supposed to know what to fetch.</P><P>Why not try the <a href="article_gen.php">Article fetcher interface</a></P>';
    exit;
    }

//$keyword = 'ringtone';
//first load the variables passed in from the form.
$keywords = $_REQUEST['keywords'];
$artnum = $_REQUEST['artnum'];
$numwords = $_REQUEST['numwords'];
$gran = $_REQUEST['gran'];

//lets set some defaults
if ($keywords == ""){
    print 'go set some fishing keywords up, what are we psychic';
    exit;
    }
if ($artnum == "" ){
    $artnum = 10;
    }
if ($numwords == "" ){
    $numwords = 150;
    }
if ($gran == "") {
    $gran = 2;
    }

//$keywords = nl2br($keywords);
$keywords = explode("\r\n",$keywords);

function fetchtext($url){
    /* function to fetch the url passed in */
    require_once('Snoopy.class.php');
    $snoop=new Snoopy;
    //wiki bans the default snoopy user agent, so make it look like IE.
    $snoop->agent = "(compatible; MSIE 4.01; MSN 2.5; AOL 4.0; Windows 98)";

    $snoop -> fetchtext($url);
    return $snoop->results;

}

function fetch($url){
    /* function to fetch the url passed in */
    require_once('Snoopy.class.php');
    $snoop=new Snoopy;
    //wiki bans the default snoopy user agent, so make it look like IE.
    $snoop->agent = "(compatible; MSIE 4.01; MSN 2.5; AOL 4.0; Windows 98)";

    $snoop -> fetch($url);
    return $snoop->results;

}
//print_r($keywords);
foreach ($keywords as $keyword){
$keyword=urlencode(trim(ltrim($keyword)));
$Surl = 'http://en.wikipedia.org/wiki/Special:Search?search='.$keyword.'&go=Go';
//print $Surl;
$wiki = fetchtext ($Surl);
//print $wiki;

// now lets try and filter out some of the crap that is returned.
$wiki = preg_match('/search(.+?)\[edit\] See also/s',$wiki,$w);
$wiki = $w[1];
$wiki = str_replace('[edit]','',$wiki);
//print $wiki;
print '<B>SCRAPED CONTENT FOR '.$keyword.'</B><br />';
//$wiki now contains all the useful text from the page.

// now scrape the serps.
//$Surl = 'http://www.altavista.com/web/results?q='.$keyword.'&nbq=30';
$Surl = 'http://search.yahoo.com/search?va='.$keyword.'&fl=0&n=30&ei=UTF-8&pstart=$
num&b=1';
$scrape = fetch($Surl);
preg_match_all('/yschabstr>(.+?)<\/div/s',$scrape,$s);
foreach($s[1] as $sa){
    $serps.=$sa;
    }
//now remove any tags and consecutive dots, -
$serps = preg_replace('/\.+/','',$serps);
$serps = preg_replace('/\-+/','',$serps);
$serps = strip_tags($serps);
//print $serps;
//combine serps & wiki
$combo = $wiki.' '.$serps;
//now run through markov

require_once('markov.php');
for ($i=0;$i<$artnum;$i++){
    $art=markov($combo,$gran,$numwords);
    //write file
    $file = './articles/'.$keyword.$i;
    $fh=fopen($file,'w+');
    fwrite($fh,$art);
    fclose($fh);
    }

print $artnum.' pages created <br />';

}
?>