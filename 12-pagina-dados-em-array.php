<?php
/**
 * nessa aula foi baixado o css eo js de um site.
 */

use Symfony\Component\BrowserKit\HttpBrowser;
use Symfony\Component\HttpClient\HttpClient;
require_once "/vendor/autoload.php";


$browser = new HttpBrowser(HttpClient::create());

$crawler = $browser->request("GET","url");
$totalPaginas = $crawler->filter('header')->text();
$totalPaginas = preg_replace('/\D/','',$totalPaginas);
$totalPaginas = ceil($totalPaginas /10);

$modelos = $crawler->filter('article')->each(
    function($node){
        $return['modelo'] = $node->filter('.title')->text();

        $atributos = $node->filter('th')->each(
            function($attr){
                return $attr->text();
            }
        );

        $values = $node->filter('td')->each(
            function($attr){
                return $attr->text();
            }
        );

        $return = array_merge($return, array_combine($atributos,$values));
        return $return;
    }
);

print_r($modelos);

for($i = 2; $i <= $totalPaginas; $i++){
    $crawler = $browser->request('GET','url'.$i);

    $modelos = array_merge(
        $modelos, 
        $crawler->filter('article .title')->each(
            function($node){
                return $node->text();
            }
        )
    );
}

