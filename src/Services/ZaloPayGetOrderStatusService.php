<?php

namespace Tuinhanne\Zalopay\Services;

use Tuinhanne\Zalopay\Services\Service;
use Tuinhanne\Zalopay\Helpers\ZaloPayRequest;

class ZaloPayGetOrderStatusService extends Service
{
    /**
     * Get order status data.
     *
     * @param array $orderTransId
     * @return array
     */
    public function execute(string $orderTransId)
    {
        $params = [
            'app_id' => $this->getAppId(),
            'app_trans_id' => $orderTransId,
        ];
        $params['mac'] = $this->generateMacData($params);
        $response = ZaloPayRequest::post($this->getEndpoint('GET_ORDER_STATUS_ENDPOINT'), $params);

        return $response;
    }

    /**
     * Generate mac to compare verify data
     *
     * @param array $params
     * @return string
     */
    protected function generateMacData(array $params)
    {
        $mac = $params['app_id'] . '|'
            . $params['app_trans_id'] . '|'
            . $this->getKeyFirst();

        return hash_hmac('sha256', $mac, $this->getKeyFirst());
    }
}
