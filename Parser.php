<?php
namespace Crawler;

use Symfony\Component\DomCrawler\Crawler;
use Psr\Http\Message\StreamInterface;

class Parser
{
 
    public function getContent(StreamInterface $html,string $tag)
    {
        $crawler = new Crawler();
        $crawler->addHtmlContent($html);
        $content = $crawler->filter($tag);
        return $content;
    }

}