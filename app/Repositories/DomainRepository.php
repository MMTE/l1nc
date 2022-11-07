<?php

namespace App\Repositories;

use App\Helpers\Helper;
use App\Models\Link;
use Illuminate\Support\Facades\Cache;

class DomainRepository
{
    public function parsUrl($url, $is_https = true)
    {
        $arrParsedUrl = parse_url($url);
        return isset($parsed_url['scheme']) ? $url : ($is_https ? 'https://' . $url : 'http://' . $is_https);
    }

    public function verifyCustomDomain($domain)
    {
        if ($domain->is_verified) {
            return 'this domain is already verified';
        }

        $randomVerificationCode = Helper::generateRandomString();

        Cache::put($randomVerificationCode, 'domain_' . $domain->id, 150);

        // fix this disaster! http and https into another function
        return redirect()->away('http://' . $domain->domain . '/custom-domain/verify/?secret=' . $randomVerificationCode);
    }

    public function createLink($domain, $user, $team, $destination, $customUrl)
    {
        $link = new Link();
        $link->domain_id = $domain?->id;
        $link->url = $customUrl ?: Helper::generateRandomString();
        $link->team_id = $team->id;
        $link->user_id = $user->id;
        $link->destination = (new DomainRepository())->parsUrl($destination);
        $link->save();
        return $link;
    }

}
