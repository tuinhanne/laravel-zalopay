<?php

namespace Tuinhanne\Zalopay\Services;

use Tuinhanne\Zalopay\Services\Service;
use Tuinhanne\Zalopay\Helpers\ZaloPayRequest;

class ZaloPayCreateOrderService extends Service
{
    /**
     * Handle create new order.
     *
     * @param array $data
     * @return array
     */
    public function execute(array $data)
    {
        $params = [
            'app_id' => $this->getAppId(),
            'app_time' => $this->getTime(),
            'app_trans_id' => $this->getTransId(),
            'app_user' => $this->getAppUser(),
            'item' => $data['item'],
            'embed_data' => $data['item'],
            'amount' => $data['amount'],
            'description' => $data['description'],
            'bank_code' => $data['bank_code'] ?? 'zalopayapp',
        ];
        $params['mac'] = $this->generateMacData($params);
        $response = ZaloPayRequest::post($this->getEndpoint('CREATE_ORDER_ENDPOINT'), $params);

        return $response;
    }

    /**
     * Gen MAC data for verification data.
     *
     * @param array $params
     * @return string
     */
    protected function generateMacData(array $params)
    {
        $mac = $params['app_id'] . '|'
            . $params['app_trans_id'] . '|'
            . $params['app_user'] . '|'
            . $params['amount'] . '|'
            . $params['app_time'] . '|'
            . $params['embed_data'] . '|'
            . $params['item'];

        return hash_hmac('sha256', $mac, $this->getKeyFirst());
    }
}
