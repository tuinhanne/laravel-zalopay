<?php

namespace Tuinhanne\Zalopay\Services;

use Illuminate\Support\Carbon;
use Tuinhanne\Zalopay\Services\Service;
use Tuinhanne\Zalopay\Helpers\ZaloPayRequest;

class ZaloPayRequestRefundOrderService extends Service
{
    /**
     * Undocumented function
     *
     * @param array $data
     * @return array
     */
    public function execute(array $data)
    {
        $params = [
            'app_id' => $this->getAppId(),
            'm_refund_id' => $this->getRefundId(),
            'timestamp' => $this->getTime(),
            'zp_trans_id' => $data['order_trans_id'],
            'amount' => $data['amount'],
            'description' => $data['description'],
        ];
        $params['mac'] = $this->generateMacData($params);
        $response = ZaloPayRequest::post($this->getEndpoint('REFUND_ORDER_ENDPOINT'), $params);

        return $response;
    }

    /**
     * Get refund id
     *
     * @return string
     */
    protected function getRefundId()
    {
        return Carbon::now('Asia/Ho_Chi_Minh')->format('ymd') . '_'
            . $this->getAppId() . '_'
            . mt_rand(111111, 999999);
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
            . $params['zp_trans_id'] . '|'
            . $params['amount'] . '|'
            . $params['description'] . '|'
            . $params['timestamp'];

        return hash_hmac('sha256', $mac, $this->getKeyFirst());
    }
}
