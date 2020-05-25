<?php

namespace App\Payment\Action;

use Payum\Core\Action\ActionInterface;
use Payum\Core\Request\Capture;
use Psr\Log\LoggerInterface;
use Sylius\Component\Core\Model\PaymentInterface;

class CaptureAction implements ActionInterface
{
    /**
     * @var LoggerInterface
     */
    private $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function execute($request)
    {
        $payment = $request->getModel();

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
