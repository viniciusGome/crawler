<?php
/**
 * nessa aula foi ensinado como fazer uma requisição, verificar o status e a pegar o html.
 */

use Symfony\Component\BrowserKit\HttpBrowser;
use Symfony\Component\HttpClient\HttpClient;

require_once "/vendor/autoload.php";

$browser = new HttpBrowser(HttpClient::create());

$crawler = $browser->request("GET","");

$html = $crawler->html();

$login = $browser->clickLink('login');
$html = $login->html();
 