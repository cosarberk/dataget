
<?php
echo "<body style='background-color:black;color:white;'>";
echo "<style>a{color:gray;}</style>";
include "error.php";

$ktg=$_POST['ktg'];
$ktg_id = $_POST['ktg_id'];
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
    //    echo $node->html();
    return $node;

});
foreach($crawlers as $node){
      $kkk = $node->filter('div.sub-nav')->html();
array_push($array,$kkk);

}
//print_r($array[0]);
preg_match_all('@<a href="(.*?)" class="sub-category-header">(.*?)</a>@',$array[$ktg],$d);

print_r($d[1][$ktg_id]);

?>
 
