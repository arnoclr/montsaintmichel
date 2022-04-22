<?php

function parseXML($url, $results = 5) {
    $i = 0;
    $rss = simplexml_load_file($url);

    $articles = [];

    $context = stream_context_create(
        array(
            "http" => array(
                "header" => "User-Agent: " . $_SERVER['HTTP_USER_AGENT']
            )
        )
    );
    
    foreach($rss->channel->item as $item) {
        if ($i < $results) {
            $image = null;
            $html = @file_get_contents($item->link, false, $context);
            
            if ($html) {
                preg_match('/<meta property="og:image" content="(.*?)"/', $html, $matches);
                $image = count($matches) > 0 ? $matches[1] : null;
            }

            $articles[] = (object) [
                "title" => (string) $item->title,
                "link" => (string) $item->link,
                "image" => (string) $image,
                "description" => (string) $item->description,
                "pubDate" => (string) $item->pubDate,
                "guid" => (string) $item->guid
            ];
        }
    
        $i++;
    }

    return (object) $articles;
}