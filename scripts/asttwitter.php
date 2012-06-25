#!/usr/bin/php -q

<?php

# Aqui cargamos el script twitter.php y el phpagi que descargamos antes.
require_once("/var/lib/asterisk/agi-bin/twitter.php");
require_once("/var/lib/asterisk/agi-bin/phpagi/phpagi.php");

# Creamos un nuevo objeto tipo AGI
$agi = new AGI();

$tweet = $argv[1];

$agi->verbose($tweet);

# Aqui ponemos las credeciales que obtuvimos antes, en el mismo orden
$consumerKey = 'mCnQoPEk8XsEX4qeKoTzQ';
$consumerSecret = 'kwu8KB9dIlntJ7XFBC3BqL0uBYCAACVuGXwByYtvM';
$accessToken = '618043100-xGaD0ct6ULEx30kWEkQtzM9kQZguYVY27lGQfNbv';
$accessTokenSecret = 'AJewECM297VULfsEowpeuicOYXmYyDExLgHX0bBpJJw';

# Ya en adelante simplemente lo que hacemos es utilizando las funciones del script Twitter-Oauth publicamos en Twitter nustro Tweet
try
{
$t = new Twitter($consumerKey, $consumerSecret);
$t->setOAuthToken($accessToken);
$t->setOAuthTokenSecret($accessTokenSecret);

$retArray = $t->statusesUpdate($tweet);
$retString = "SUCCESS: Tweet id " . $retArray['id_str'] . " posted at " . $retArray['created_at'];
}
catch(Exception $e)
{
$retString = "FAILURE: " . $e->getMessage();
}

$agi->verbose($retString);

?>
