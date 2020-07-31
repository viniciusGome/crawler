<?php

use Symfony\Component\BrowserKit\HttpBrowser;
use Symfony\Component\HttpClient\HttpClient;
require_once "/vendor/autoload.php";

$browser = new HttpBrowser(HttpClient::create());

$crawler = $browser->request("GET","url");

$lista = $crawler->filter('article .img-thumbnail')->each(function($node){
    return $node->attr('alt');
});


/**
 * Alternativa correta! O método extract encontra-se no
 * link da documentação informada no enunciado, e serve para extrair 
 * mais de um atributo de um elemento, por isso estamos tratando o 
 * retorno dele como um array e pegando a primeira posição desse array.
 */

 /**
  * outro modo de fazer é com a função extract
  */
  
$attr = $crawler->filter('img')->each(function($node){
    return $node->extract(['alt'])[0];
});