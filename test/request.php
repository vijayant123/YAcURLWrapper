<?php
header("Content-Type: text");
require_once "../lib/request.php";

$req = new \bot\request("http://www.google.com");
$req->debug();



?>