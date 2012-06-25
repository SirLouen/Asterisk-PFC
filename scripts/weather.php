#!/usr/bin/php -q
<?php

require_once("/var/lib/asterisk/agi-bin/phpagi/phpagi.php");

$agi = new AGI();

//$place = "cadiz";
$place = $argv[1];

//Initialize CURL
$ch = curl_init();
$timeout = 0;

//Set CURL options
curl_setopt ($ch, CURLOPT_URL, 'http://www.google.com/ig/api?weather='.urlencode($place).'&hl=es&ie=UTF-8');
curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
$xml_str=curl_exec($ch);
$xml_str=utf8_encode($xml_str);
//close CURL cause we dont need it anymore
curl_close($ch);

// Parse the XML response
libxml_use_internal_errors(true); 
try
{
 $xml = new SimplexmlElement($xml_str);
 $forecast = $xml->xpath("/xml_api_reply/weather/forecast_conditions");
 $tiempo=$forecast[1]->condition['data'];
 $agi->verbose($tiempo);
 $agi->set_variable("textotts",$tiempo);

} 
catch (Exception $e)
{
 $tiempo=0;
 $agi->set_variable("textotts",$tiempo);
}

?>
