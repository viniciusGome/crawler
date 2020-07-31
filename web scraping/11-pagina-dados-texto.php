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



$modelos = $crawler->filter('article .title')->each(
    function($node){
        return $node->text();
    }
);

/**
 * modelos se trata de um modelo de celular no caso é um titulo 
 * de um article do html.
 */

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

print_r($modelos);


/*
    https://regex101.com/
    É possível pegar dados dentro de textos de diversas formas.
    Expressões regulares são uma excelente solução para fazer isso.
    Um ótimo site para testar sua expressão regular é o regex101. 
    Nele, você coloca o texto onde será realizado a busca e monta sua 
    expressão regular.
    Outra maneira de pegarmos strings em textos é utilizando as funções de 
    manipulação de string do PHP. como por exemplo explode, strpos e 
    str_replace.
    Conheça também as funções para trabalhar com expressões regulares 
    no PHP: https://www.php.net/manual/en/ref.pcre.php.
    No último vídeo, vimos como extrair o número de celulares do texto abaixo:
*/

/*
    https://www.php.net/manual/en/function.http-build-query.php
    Para navegar entre diversas páginas, é possível que precisemos trabalhar 
    com o que chamamos de query string, que é quando enviamos variáveis para o 
    servidor pela URL da aplicação, por exemplo, meusite.com/?pagina=1. 
    Nesses casos, é bem provável que a função http_build_query seja algo 
    que você irá precisar.
*/


