<?php

use Symfony\Component\BrowserKit\HttpBrowser;
use Symfony\Component\HttpClient\HttpClient;

require_once "/vendor/autoload.php";

$browser = new HttpBrowser(HttpClient::create([
    'header' => [
        'User-agent' => 'o que o site precisa'
    ]
]));

$browser->request("GET","url");
$browser->clickLink('Login');
$crawler = $browser->submitForm('Go',[
    'username' => 'usuario',
    'password' => 'uma senha muito secreta'
]);
$crawler = $browser->back();
var_dump($crawler->html());


/*

// outra forma de fazer.

$browser->setServerParameter('HTTP_USER_AGENT','Mozila/4.0/(compatible; MSIE 6.0; Windows NT 5.1; SV1)');

$browser->request('GET','url');
print_r($browser->getRequest());

*/