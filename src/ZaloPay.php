<?php

namespace Tuinhanne\Zalopay;

use Tuinhanne\Zalopay\Services\Service;
use Tuinhanne\Zalopay\Services\ZaloPayCallbackService;
use Tuinhanne\Zalopay\Services\ZaloPayCreateOrderService;
use Tuinhanne\Zalopay\Services\ZaloPayGetOrderStatusService;
use Tuinhanne\Zalopay\Services\ZaloPayVerifyMerchantService;
use Tuinhanne\Zalopay\Services\ZaloPayRequestRefundOrderService;
use Tuinhanne\Zalopay\Services\ZaloPayGetStatusRefundOrderService;

class ZaloPay extends Service
{
    /**
     * Create New Order
     *
     * @param ZaloPayCreateOrderService $service
     * @param array $data
     * @return array
     */
    public function createOrder(ZaloPayCreateOrderService $service, array $data)
    {
        return $service->execute($data);
    }

    /**
     * Get Order Status
     *
     * @param ZaloPayGetOrderStatusService $service
     * @param string $orderTransId
     * @return array
     */
    public function getOrderStatus(ZaloPayGetOrderStatusService $service, string $orderTransId)
    {
        return $service->execute($orderTransId);
    }

    /**
     * Request Refund Order
     *
     * @param ZaloPayRequestRefundOrderService $service
     * @param array $data
     * @return array
     */
    public function requestRefundOrder(ZaloPayRequestRefundOrderService $service, array $data)
    {
        return $service->execute($data);
    }

    /**
     * Get Status Refund Order
     *
     * @param ZaloPayGetStatusRefundOrderService $service
     * @param string $orderTransId
     * @return array
     */
    public function getStatusRefundOrder(ZaloPayGetStatusRefundOrderService $service, string $orderTransId)
    {
        return $service->execute($orderTransId);
    }

    /**
     * Verify merchant user id
     *
     * @param ZaloPayVerifyMerchantService $service
     * @param array $data
     * @return array
     */
    public function verifyMerchant(ZaloPayVerifyMerchantService $service, array $data)
    {
        return $service->execute($data);
    }

    /**
     * Processing Payment Results From ZaloPay
     *
     * @param ZaloPayCallbackService $service
     * @param array $data
     * @return boolean
     */
    public function callback(ZaloPayCallbackService $service, array $data)
    {
        return $service->execute($data);
    }
}
