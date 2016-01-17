<?php

/**
 * scams a page for images and lists them
 **/

header("Content-Type: text");
require_once "../lib/bot.php";

$bot = \bot\bot::getInstance();


$req = new \bot\request("http://www.w3schools.com/html/html_images.asp");
$res = $bot->execute($req);

$pattern = '/img.*src=".*\..{3,4}"/';
preg_match_all($pattern, $res->getContent(), $matches, PREG_OFFSET_CAPTURE);

print_r($matches);
?>