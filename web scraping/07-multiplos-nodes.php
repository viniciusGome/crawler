<?php

/**
 * quando pegamos multiplos nodes ou itens ao invez de um texto
 * a função retorna um itereitor
 * 
 */

use Symfony\Component\BrowserKit\HttpBrowser;
use Symfony\Component\HttpClient\HttpClient;
require_once "/vendor/autoload.php";

$browser = new HttpBrowser(HttpClient::create());

$crawler = $browser->request("GET","url");

$nomes = $crawler->filter('article .tile')->each(function($node){
    return $node->text();
});

print_r($nomes);