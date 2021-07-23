<?php

namespace Tuinhanne\Zalopay\Services;

use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

class Service
{
    public const SANDBOX_ENV = 'sandbox';

    public const REAL_ENV = 'real';

    public const SANDBOX_CREATE_ORDER_ENDPOINT = 'https://sb-openapi.zalopay.vn/v2/create';

    public const REAL_CREATE_ORDER_ENDPOINT = 'https://openapi.zalopay.vn/v2/create';

    public const SANDBOX_GET_ORDER_STATUS_ENDPOINT = 'https://sb-openapi.zalopay.vn/v2/query';

    public const REAL_GET_ORDER_STATUS_ENDPOINT = 'https://openapi.zalopay.vn/v2/query';

    public const SANDBOX_REFUND_ORDER_ENDPOINT = 'https://sb-openapi.zalopay.vn/v2/refund';

    public const REAL_REFUND_ORDER_ENDPOINT = 'https://openapi.zalopay.vn/v2/refund';

    public const SANDBOX_GET_STATUS_REFUND_ORDER_ENDPOINT = 'https://sb-openapi.zalopay.vn/v2/query_refund';

    public const REAL_GET_STATUS_REFUND_ORDER_ENDPOINT = 'https://openapi.zalopay.vn/v2/query_refund';

    public const SANDBOX_VERIFY_MERCHANT_ID_ENDPOINT = 'https://sandbox.zalopay.com.vn/ummerchant/verifymerchantaccesstoken';

    public const REAL_VERIFY_MERCHANT_ID_ENDPOINT = 'https://zalopay.com.vn/ummerchant/verifymerchantaccesstoken';

    /**
     * Get endpoint url createOrder
     *
     * @param string $endpoint
     * @return string
     */
    protected function getEndpoint(string $endpoint)
    {
        return config('zalopay.env') == self::SANDBOX_ENV 
            ? 'SANDBOX_' . $endpoint
            : 'REAL_' . $endpoint;
    }

    /**
     * Get `app_id` config
     *
     * @return string
     */
    protected function getAppId()
    {
        return config('zalopay.app_id');
    }

    /**
     * Get `sub_app_id` config
     *
     * @return string
     */
    protected function getSubAppId()
    {
        return config('zalopay.sub_app_id');
    }

    /**
     * Get `app_user` config
     *
     * @return string
     */
    protected function getAppUser()
    {
        return config('zalopay.app_user');
    }

    /**
     * Get `key_first` config
     *
     * @return string
     */
    protected function getKeyFirst()
    {
        return config('zalopay.key_first');
    }

    /**
     * Get `key_second` config
     *
     * @return string
     */
    protected function getKeySecond()
    {
        return config('zalopay.key_second');
    }

    /**
     * Get `callback_url` config
     *
     * @return string
     */
    protected function getCallbackUrl()
    {
        return config('zalopay.callback_url');
    }

    /**
     * Generate trans id
     *
     * @return string
     */
    protected function getTransId()
    {
        return Carbon::now('Asia/Ho_Chi_Minh')->format('ymd') . '-' 
            . config('zalopay.prefix') . '-' . Str::uuid();
    }

    /**
     * Get time now
     *
     * @return string
     */
    protected function getTime()
    {
        return round(microtime(true) * 1000);
    }
}