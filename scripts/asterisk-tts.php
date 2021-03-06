#!/usr/bin/php -q
<?php

require_once("/var/lib/asterisk/agi-bin/phpagi/phpagi.php");
$agi = new AGI();
$traduccion = $argv[1];

$agi->verbose($traduccion);

// Aqui descargamos el fichero Mp3 haciendo pensar a Google que somos un Navegador
shell_exec("wget --header='User-Agent:Mozilla/4.0' 'http://translate.google.com/translate_tts?tl=es&ie=UTF-8&q=".$traduccion."' -O /tmp/google-tts.mp3");

// Y convertimos el fichero con .lame. a wav que es reconocible por Asterisk
shell_exec("sox /tmp/google-tts.mp3 -r 8000 -c 1 -t raw -s /var/lib/asterisk/sounds/google-tts.sln");

$retString = "Fin de la conversion";
$agi->verbose($retString);
?>
