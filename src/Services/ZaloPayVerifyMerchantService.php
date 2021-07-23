<?php

namespace Tuinhanne\Zalopay\Services;

use Tuinhanne\Zalopay\Services\Service;
use Tuinhanne\Zalopay\Helpers\ZaloPayRequest;

class ZaloPayVerifyMerchantService extends Service
{
    /**
     * Verify merchan user id
     *
     * @param array $data
     * @return array
     */
    public function execute(array $data)
    {
        $params = [
            'muid' => $data['merchant_user_id'],
            'maccesstoken' => $data['merchant_access_token'],
            'systemlogin' => 1,
        ];
        $response = ZaloPayRequest::post($this->getEndpoint('VERIFY_MERCHANT_ID_ENDPOINT'), $params);

        if ($response->returncode != 1) {
            return [
                'message' => 'Data invalid', 
            ];
        }

        return [
            'message' => 'Success', 
        ];
    }
}
