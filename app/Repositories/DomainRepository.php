<?php

namespace App\Repositories;

class DomainRepository
{
    public function parsUrl($url, $is_https = true)
    {
        $arrParsedUrl = parse_url($url);
        return isset($parsed_url['scheme']) ? $url : ($is_https ? 'https://' . $url : 'http://' . $is_https);
    }

}
