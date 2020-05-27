<?php

namespace App\Payment\Logger;

use App\Entity\Order\Order;
use Psr\Log\LoggerInterface;

class PaymentLogger
{
    /**
     * @var LoggerInterface
     */
    private $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function logPayment(Order $order): void
    {
        $this->logger->warning('Payment OK : '.($order->getTotal()/100).' €');
    }
}
