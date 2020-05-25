<?php

namespace App\Payment\Factory;

use App\Payment\Action\StatusAction;
use Payum\Core\Bridge\Spl\ArrayObject;
use Payum\Core\GatewayFactory;

class AppGatewayFactory extends GatewayFactory
{
    protected function populateConfig(ArrayObject $config)
    {
        $config->defaults([
            'payum.factory_name' => 'black_card_payment',
            'payum.factory_title' => 'Paiement par BlackCard',
            'payum.action.status' => new StatusAction(),
        ]);
    }
}
