<?php
namespace Crawler;

use \GuzzleHttp\Client;
use Psr\Http\Message\StreamInterface;

class HttpFactory
{

    public function response(string $metodo,string $url):StreamInterface
    {
        $httpClient = new Client();
        $response = $httpClient->request($metodo, $url);
        $html = $response->getBody();
        return $html;
    }

}