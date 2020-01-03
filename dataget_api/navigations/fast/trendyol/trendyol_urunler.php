
<?php
// header("Content-Type: application/xml; charset=utf-8");
//Header('Content-type: text/xml');
include "error.php";

$ktg_menu_url=$_POST['ktg_menu_url'];
//$ktg_menu_url="kadin+elbise";
//$ana_menu="kadin";
$ana_menu=$_POST['ana_menu'];
//$alt_menu = "giyim";
$alt_menu=$_POST['alt_menu'];
//$alt_ktg_a = "elbise";
$alt_ktg_a=$_POST['alt_ktg_a'];
require "vendor/autoload.php";


$url = "https://www.trendyol.com".$ktg_menu_url."";
//$url = "https://www.trendyol.com";
  
$ch = curl_init();
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US) AppleWebKit/525.13 (KHTML, like Gecko) Chrome/0.A.B.C Safari/525.13");
$source = curl_exec($ch);
if(htmlentities(strstr($source, "ROBOTS"))) { echo '<p style="color:red;">Trendyol yanıt vermiyor</p>';}
curl_close($ch);

preg_match_all('@<script type="application/javascript"> window.__SEARCH_APP_INITIAL_STATE__ =(.*?)</script>@si',$source,$menu);
$urunler= implode("",$menu[1]);
$snc_urunler = str_replace(";","",$urunler);
//echo $snc_urunler;
$json_urunler =  json_decode($snc_urunler);

//print_r($menu[1][0]);
$anaKlasor = "XML_trendyol"; 
$anaKtg = "XML_trendyol/".$ana_menu."";
$altKtg = "".$anaKtg."/".$alt_menu."";
$altKtgMenu = "".$altKtg."/".$alt_ktg_a."";
if (file_exists($anaKlasor)){   }else{mkdir($anaKlasor);}
  if (file_exists($anaKtg)){  }else{mkdir($anaKtg);}    
     if (file_exists($altKtg)){  }else{mkdir($altKtg);} 
       if (file_exists($altKtgMenu)){  }else{mkdir($altKtgMenu);} 
    


if (file_exists($anaKlasor) && file_exists($anaKtg) && file_exists($altKtg) && file_exists($altKtgMenu) ){

               $json_urun = $json_urunler->products;
               $ktm_menu = new SimpleXMLElement('<?xml version="1.0" encoding="utf-8"?><trendyol></trendyol>');
               //               $ana_ktg = $ktg_menu->addChild($ana_menu);
               //               $alt_ktg = $ana_ktg->addChild($alt_menu);
               //               $ktg_menum = $alt_ktg->addChild($alt_ktg_a);
                 foreach($json_urun as $urun){
                     $ktg_menu = $ktm_menu->addChild("item");
                     $ktg_menu->addChild("id",$urun->id);
                     $ktg_menu->addChild("urun_adi",htmlspecialchars($urun->brand->name));
                     $images =$ktg_menu->addChild("images");
                     $images->addChild("img-a","https://www.trendyol.com/".$urun->images[0]);
                     $images->addChild("img-b","https://www.trendyol.com/".$urun->images[1]);
                     $images->addChild("img-c","https://www.trendyol.com/".$urun->images[2]);
                     $images->addChild("img-d","https://www.trendyol.com/".$urun->images[3]);//  or  $images->addChild("img-d"," ");
                     $images->addChild("img-e","https://www.trendyol.com/".$urun->images[4]);//  or  $images->addChild("img-e"," ");
                     $images->addChild("img-f","https://www.trendyol.com/".$urun->images[5]);//  or  $images->addChild("img-f"," ");
                     $ktg_menu->addChild("urun_aciklamasi",$urun->name);
                       $ktg_menu->addChild("urun_stok","999");
                     $ktg_menu->addChild("ceo",$urun->name);
                     $ktg_menu->addChild("urun_kelimeleri",$urun->categoryHierarchy);
                     $ktg_menu->addChild("meta_basligi",htmlspecialchars($urun->brand->name));
                     $ktg_menu->addChild("meta_aciklaması",$urun->campaignName);
                     $ktg_menu->addChild("urun_etikeleri",str_replace("/","-",$urun->categoryHierarchy));
                     $ktg_menu->addChild("urun_anaFiyati",$urun->price->originalPrice);
                     $ktg_menu->addChild("urun_indirimOrani",htmlspecialchars($urun->promotions[0]->name));// or $ktg_menu->addChild("urun_indirimOrani","indirim yok");
                     $ktg_menu->addChild("urun_satis_fiyati",$urun->price->discountedPrice);
                     $ktg_menu->addChild("urun_kategorisi",$urun->categoryHierarchy);
               //    $ktg_menu->addChild("urun_adı",$urun->name);
               //    $ktg_menu->addChild("urun_adı",$urun->name);

                 }
                 $xml_yol = "".$altKtgMenu."/trendyol-".$ana_menu."-".$alt_menu."-".$alt_ktg_a.".xml";
            fopen($xml_yol,"w") or die("olmadi");
            file_put_contents($xml_yol,$ktm_menu->asXML());


}else{echo "hata";}


?>
 
