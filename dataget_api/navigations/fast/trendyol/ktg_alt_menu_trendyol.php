
<?php
echo "<body style='background-color:black;color:white;'>";
echo "<style>a{color:gray;}</style>";
include "error.php";

$ktg_menu_id=$_POST['ktg_menu_id'];
$ktg_di=$_POST['ktg_di'];


//$ktg_menu_id=0;

//$ktg_di=0;

 require "vendor/autoload.php";
 use Symfony\Component\DomCrawler\Crawler;


$url = "https://www.trendyol.com";
    
$ch = curl_init();
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US) AppleWebKit/525.13 (KHTML, like Gecko) Chrome/0.A.B.C Safari/525.13");
$source = curl_exec($ch);
if(htmlentities(strstr($source, "ROBOTS"))) { echo '<p style="color:red;">Trendyol yanıt vermiyor</p>';}
curl_close($ch);

$array = array();
$crawler = new Crawler($source);

$crawlers = $crawler->filter('li.tab-link')->each(function (Crawler $node, $i) {
    // echo $node->html();
      return $node;

});

 foreach($crawlers as $node){
      $kkk = $node->filter('div.sub-nav')->html();

      // print_r($kkk);
      array_push($array,$kkk);

}

$tarray = array();
preg_match_all('@<ul class="sub-item-list">(.*?)</ul>@si',$array[$ktg_menu_id],$d);
preg_match_all('@<a href="(.*?)">(.*?)</a>@si',$d[0][$ktg_di],$e);

//$a =  implode("",$e[2]);
 
 foreach($e[2] as $a){
     array_push($tarray,$a);

 }


foreach($e[1] as $key => $a){
     
     echo "<div id='kt_box_ktg_menu' title='".$a."' class='kt_box'> <div id='alt_menu_ktg'  class='select_box_text_menu'> ".$tarray[$key]." </div></div>";
 }


  
?>
 
