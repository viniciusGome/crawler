<?php
use Crawler\HttpFactory;
use Crawler\Parser;

require __DIR__ . "/vendor/autoload.php";
require "HttpFactory.php";
require "Parser.php";


$hClient = new HttpFactory();
$html = $hClient->response('GET','https://pt.wikipedia.org/wiki/Wikip%C3%A9dia:P%C3%A1gina_principal');

$parse = new Parser();
$parse->getContent($html,'p');

foreach ($parse as $item) {
    echo $item->textContent.PHP_EOL;
}

 