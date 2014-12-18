<?php
ini_set("display_error",1);
/**
 * Created by PhpStorm.
 * User: Naveen
 * Date: 12/14/14
 * Time: 6:33 PM
 */
include_once 'config.php';
include_once 'simple_html_dom.php';
include_once 'simple_html_dom_utility.php';


//get the brand list


$html = file_get_html('http://www.gsmarena.com/');

//echo $html;
//echo "<pre>";

$brantsStr = <<<HTML
<ul>
<li><a href="samsung-phones-9.php">Samsung</a></li>
<li class="on"><a href="apple-phones-48.php">Apple</a></li>
<li><a href="microsoft-phones-64.php">Microsoft</a></li>
<li><a href="nokia-phones-1.php">Nokia</a></li>
<li><a href="sony-phones-7.php">Sony</a></li>
<li><a href="lg-phones-20.php">LG</a></li>
<li><a href="htc-phones-45.php">HTC</a></li>
<li><a href="motorola-phones-4.php">Motorola</a></li>
<li><a href="huawei-phones-58.php">Huawei</a></li>
<li><a href="lenovo-phones-73.php">Lenovo</a></li>
<li><a href="xiaomi-phones-80.php">Xiaomi</a></li>
<li><a href="acer-phones-59.php">Acer</a></li>
<li><a href="asus-phones-46.php">Asus</a></li>
<li><a href="blackberry-phones-36.php">BlackBerry</a></li>
<li><a href="alcatel-phones-5.php">Alcatel</a></li>
<li><a href="zte-phones-62.php">ZTE</a></li>
<li><a href="toshiba-phones-44.php">Toshiba</a></li>
<li><a href="vodafone-phones-53.php">Vodafone</a></li>
<li><a href="t_mobile-phones-55.php">T-Mobile</a></li>
<li><a href="gigabyte-phones-47.php">Gigabyte</a></li>
<li><a href="pantech-phones-32.php">Pantech</a></li>
<li><a href="xolo-phones-85.php">XOLO</a></li>
<li><a href="lava-phones-94.php">Lava</a></li>
<li><a href="micromax-phones-66.php">Micromax</a>
</li><li><a href="blu-phones-67.php">BLU</a></li>
<li><a href="spice-phones-68.php">Spice</a></li>
<li><a href="prestigio-phones-86.php">Prestigio</a>
</li><li><a href="verykool-phones-70.php">verykool</a></li>
<li><a href="maxwest-phones-87.php">Maxwest</a></li>
<li><a href="celkon-phones-75.php">Celkon</a></li>
<li><a href="gionee-phones-92.php">Gionee</a></li>
<li><a href="vivo-phones-98.php">vivo</a></li>
<li><a href="niu-phones-79.php">NIU</a></li>
<li><a href="yezz-phones-78.php">Yezz</a></li>
<li><a href="parla-phones-81.php">Parla</a></li>
<li><a href="plum-phones-72.php">Plum</a></li>
</ul>

HTML;
//$html = str_get_html($brantsStr);
echo "<pre>";

$category  = array();


foreach($html->find('div#brandmenu') as $ul){
    foreach($ul->find('li') as $li){
        $link =  str_get_html($li->innertext) ;
        $href = $link->find('a');
        // var_dump($href[0]->attr['href']);
        $category[] = "http://www.gsmarena.com/".$href[0]->attr['href'];
        //echo "<br>";
        //exit;
    }

    //print_r($category);
    //echo $li->href;

    exit;
}

// get all the phones
$category[] = "http://www.gsmarena.com/samsung-phones-9.php";
$phoneLinks = array();
 foreach($category as $cat ){
     $html = file_get_html($cat);
     echo $html;
     foreach($html->find('div.makers') as $ul ){
         foreach($ul->find('li') as $li){
             $link =  str_get_html($li->innertext) ;
             $href = $link->find('a');
             // var_dump($href[0]->attr['href']);
             $phoneLinks[] = "http://www.gsmarena.com/".$href[0]->attr['href'];
         }
     }

 }

print_r($phoneLinks);


