<?php
/**
 * nessa aula foi baixado o css eo js de um site.
 */
use Symfony\Component\BrowserKit\HttpBrowser;
use Symfony\Component\HttpClient\HttpClient;
require_once "/vendor/autoload.php";

$browser = new HttpBrowser(HttpClient::create());

$crawler = $browser->request("GET","url");

$codigo = $crawler->filter('link[rel="stylesheet"],script[src]')->each(function($node){
    if($node->attr('src')){
        return $node->attr('src');
    }
    return $node->attr('href');
});

print_r($codigo);

/**
 * Alternativa correta! A vírgula foi utilizada para juntar o resultado
 * de três seletores, um pega a tag link, outro a tag script e outro a 
 * tag img. O seletor para pegar blocos de script que não são inline
 * precisa filtrar apenas tags script que possuem o atributo src, por 
 * isso está script[src].
 */
  
