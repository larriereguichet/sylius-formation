<?php

namespace App\Controller\Product;

use App\Provider\APIProvider;
use Sylius\Bundle\ResourceBundle\Controller\ResourceController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends ResourceController
{
    public function showAction(Request $request): Response
    {
        // TODO get products from an external API
        $this->get(APIProvider::class)->getProducts();

        return parent::showAction($request);
    }
}
