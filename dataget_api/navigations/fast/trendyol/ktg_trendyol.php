<?php


include "error.php";
//require ("vendor/autoload.php");
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


$crawler = new Crawler($source);

$crawlers = $crawler->filter('a.category-header')->each(function (Crawler $node, $i) {

    return $node;
 
});


 foreach($crawlers as $key => $node){
        $kategori = $node->filter('a')->text();
        //echo "</br>";
        echo '<div id="'.$kategori.'" class="kt_box"> <div title="'.$kategori.'" id="'.$key.'" class="select_box_text_ktg">'.$kategori.'</div></div>';
 }

?>
