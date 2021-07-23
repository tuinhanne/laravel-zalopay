<?php

namespace Tuinhanne\Zalopay\Services;

use Tuinhanne\Zalopay\Services\Service;
use Tuinhanne\Zalopay\Helpers\ZaloPayRequest;

class ZaloPayGetStatusRefundOrderService extends Service
{
    /**
     * Get status refund order
     *
     * @param string $orderTransId
     * @return void
     */
    public function execute(string $orderTransId)
    {
        $params = [
            'app_id' => $this->getAppId(),
            'timestamp' => $this->getTime(),
            'm_refund_id' => $orderTransId,
        ];
        $params['mac'] = $this->generateMacData($params);
        $response = ZaloPayRequest::post($this->getEndpoint('GET_STATUS_REFUND_ORDER_ENDPOINT'), $params);

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
            . $params['m_refund_id'] . '|'
            . $params['timestamp'];

        return hash_hmac('sha256', $mac, $this->getKeyFirst());
    }
}
