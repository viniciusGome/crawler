<?php

/**
 * seletor xpath no jquery é $x('//h2');
 * '//' = significa seletor absoluto ou seja vai pegar todas as tags.
 * 
 */

use Symfony\Component\BrowserKit\HttpBrowser;
use Symfony\Component\HttpClient\HttpClient;
require_once "/vendor/autoload.php";

$browser = new HttpBrowser(HttpClient::create());

$crawler = $browser->request("GET","url");

$content = $crawler->filter('.tile')->text();
