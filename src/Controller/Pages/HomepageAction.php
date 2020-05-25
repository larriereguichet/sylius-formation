<?php

namespace App\Controller\Pages;

use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

class HomepageAction
{
    /**
     * @var Environment
     */
    private $environment;

    public function __construct(Environment $environment)
    {
        $this->environment = $environment;
    }

    public function __invoke(): Response
    {
        return new Response($this->environment->render('@SyliusShop/Homepage/index.html.twig'));
    }
}
