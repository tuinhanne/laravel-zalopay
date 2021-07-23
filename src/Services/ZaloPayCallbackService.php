<?php

namespace Tuinhanne\Zalopay\Services;

use Tuinhanne\Zalopay\Services\Service;

class ZaloPayCallbackService extends Service
{
    /**
     * Handle data from ZaloPay server callback
     *
     * @param array $data
     * @return boolean
     */
    public function execute(array $data)
    {
        try {
            $dataOrder = $data['data'];
            $mac = hash_hmac('sha256', $dataOrder, $this->getKeySecond());

            if (strcmp($mac, $data['mac']) != 0) {
                return false;
            }

            return true;
        } catch (\Exception $e) {
            return [
                'code' => 0,
                'message' => $e->getMessage(),
            ];
        }
    }
}
