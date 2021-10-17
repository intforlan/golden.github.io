<?php

//require 'simple_html_dom.php';

function obtener(){

//$opts = array('http'=>array('header' => "User-Agent:MyAgent/1.0\r\n"));
//$context = stream_context_create($opts);
//$header = file_get_contents('https://goldbroker.com/charts/gold-price',false,$context);
//
//
//echo $header;


	
	$html = file_get_contents("http://goldbroker.com/charts/gold-price");
	file_put_contents('dof.html',$html);
	
	$xml = new DomDocument();
	
	@$xml->loadHTML($html);
	$xml->normalizeDocument();
	$xpath = new DOMXPath($xml);
	
	$titulos = $xpath->query('//th[@class="ounce"]');
	
    $array = [];
	foreach($titulos as $item){
		//print_r($item);
		//echo $item->textContent;
    }

    
    echo($item->textContent);
	
    


/*
$url = 'https://goldbroker.com/charts/gold-price';
$html = file_get_html( $url );

$posts = $html->find('th[class=ounce]'); //dev string

$string = implode("", $posts);//une elementos del arry en string

$arr = str_split($string); // divide el strig en un array

$array = []; 
foreach($arr as $arrItem){
    if($arrItem == "1" or $arrItem == "2" or $arrItem == "3" or $arrItem == "4" or $arrItem == "5" or $arrItem == "6" or $arrItem == "7" or $arrItem == "8" or $arrItem == "9" or $arrItem == "0" or $arrItem == "." ){
        array_push($array,$arrItem); //añade
    }
}

$stringFinal = implode("",$array);  

echo $stringFinal;
echo gettype($stringFinal);

echo "<br>";

$float = (float)$stringFinal;

echo $float+800;*/

}

return obtener();
?>