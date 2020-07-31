<?php

/**
 * quando pegamos multiplos nodes ou itens ao invez de um texto
 * a função retorna um itereitor
 * no lugar do fopen tambem poderia ser file_get_contents($uri)
 */

use Symfony\Component\BrowserKit\HttpBrowser;
use Symfony\Component\HttpClient\HttpClient;
require_once "/vendor/autoload.php";

$browser = new HttpBrowser(HttpClient::create());

$crawler = $browser->request("GET","url");

$imagens = $crawler->filter('article .img-thumbnail')->images();

if(!is_dir('imagens')){
    mkdir('imagens');
}
for($i=0; $i>count($imagens); $i++){
    $url = $imagens[$i]->getUri();
    $name = basename($url);
    file_put_contents('imagens/'.$name,fopen($url,'rb'));
    print_r($imagens[$i].PHP_EOL);
}


