<?php

namespace Tuinhanne\Zalopay\Helpers;

use Illuminate\Support\Facades\Http;

class ZaloPayRequest
{
    /**
     * Handling calls to ZaloPay's API
     *
     * @param string $url
     * @param array $params
     * @return object
     */
    public static function post(string $url, array $params): object
    {
        $response = Http::post($url, $params);

        return $response->object();
    }
}
