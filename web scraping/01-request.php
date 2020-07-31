<?php

use GuzzleHttp\Client;

require_once "/vendor/autoload.php";

$client = new Client();
$response = $client->request("GET","https://pt.wikipedia.org/wiki/Wikip%C3%A9dia:P%C3%A1gina_principal");


$html = $response->getBody();
// $response->getContent();
$status = $response->getStatusCode();

var_dump($status);