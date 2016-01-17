<?php
header("Content-Type: text");
require_once "../lib/bot.php";

$bot = \bot\bot::getInstance();

//testing GET
$req = new \bot\request("http://httpbin.org/get");
//$req->debug();
$res = $bot->execute($req);
$res->debug();
print_r($res->getContent());


//testing POST
$postData = array("name" => "abc", "m" => "chillin");
$header = array("Connection: keep-alive");
$req->POST($postData, "http://httpbin.org/post?o=1");
$req->setAgent("myBot/1.0");
$req->setHeader($header);
//$req->debug();
$res = $bot->execute($req);
$res->debug();
print_r($res->getContent());
?>