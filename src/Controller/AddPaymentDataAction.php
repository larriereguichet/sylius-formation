<?php

namespace App\Controller;

use App\Form\Type\PaymentDataType;
use Sylius\Bundle\OrderBundle\Doctrine\ORM\OrderRepository;
use Sylius\Component\Order\Context\CartContextInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\RouterInterface;
use Twig\Environment;

class AddPaymentDataAction
{
    /**
     * @var Environment
     */
    private $environment;

    /**
     * @var FormFactoryInterface
     */
    private $formFactory;

    /**
     * @var CartContextInterface
     */
    private $context;

    /**
     * @var RouterInterface
     */
    private $router;

    /**
     * @var OrderRepository
     */
    private $repository;

    public function __construct(
        Environment $environment,
        FormFactoryInterface $formFactory,
        CartContextInterface $context,
        RouterInterface $router,
        OrderRepository $repository
    ) {
        $this->environment = $environment;
        $this->formFactory = $formFactory;
        $this->context = $context;
        $this->router = $router;
        $this->repository = $repository;
    }

    public function __invoke(Request $request)
    {
        $form = $this->formFactory->create(PaymentDataType::class);
        $form->handleRequest($request);

        $cart = $this->context->getCart();

        if ($form->isSubmitted() && $form->isValid()) {
            $cart->setNotes(serialize($form->getData()));
            $this->repository->add($cart);

            return new RedirectResponse($this->router->generate('sylius_shop_checkout_complete', [
                '_locale' => $request->get('_locale'),
            ]));
        }

        return new Response($this->environment->render('checkout/add-payment-data.html.twig', [
            'form' => $form->createView(),
            'order' => $cart,
        ]));
    }
}
