<?php

namespace App\Helpers;

class Helper
{
    static function generateRandomString($length = 5)
    {
        $bytes = random_bytes($length);
        return substr(strtr(base64_encode($bytes), '+/', '-_'), 0, $length);
    }
}
