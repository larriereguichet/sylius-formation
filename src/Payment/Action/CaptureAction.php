<?php

namespace App\Payment\Action;

use Payum\Core\Action\ActionInterface;
use Payum\Core\Request\Capture;
use Psr\Log\LoggerInterface;
use Sylius\Component\Core\Model\PaymentInterface;
use Sylius\Component\Order\Context\CartContextInterface;

class CaptureAction implements ActionInterface
{
    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * @var CartContextInterface
     */
    private $context;

    public function __construct(LoggerInterface $logger, CartContextInterface $context)
    {
        $this->logger = $logger;
        $this->context = $context;
    }

    public function execute($request)
    {
        $payment = $request->getModel();
        $cart = $this->context->getCart();
        // TODO call an API, or a custom binary
        $this->logger->debug('Calling the fake Payment API, yeah !!!');

        $payment->setDetails([
            'status' => 200,
        ]);
    }

    public function supports($request)
    {
        return
            $request instanceof Capture &&
            $request->getModel() instanceof PaymentInterface
        ;
    }
}
