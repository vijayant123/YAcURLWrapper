<?php
header("Content-Type: text");
require_once "../lib/request.php";

//testing GET
$req = new \bot\request("http://www.test1.com");
$req->debug();


//testing POST
$postData = array("name" => "abc", "m" => "chillin");
$header = array("Connection: keep-alive");
$req->POST($postData, "http://www.test2.com/o=1");
$req->setAgent("myBot/1.0");
$req->setHeader($header);
$req->debug();
print_r($req->getRequest());
?>