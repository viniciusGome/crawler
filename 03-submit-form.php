<?php

use Symfony\Component\BrowserKit\HttpBrowser;
use Symfony\Component\HttpClient\HttpClient;

require_once "/vendor/autoload.php";

$browser = new HttpBrowser(HttpClient::create());

$crawler = $browser->request("GET","url");

$html = $crawler->html();
$crawler = $browser->submitForm('Go',[
    "username" => "usuario",
    "password" => "123456"
],"GET");