<?php

namespace App\Form\Type;

use Payum\Core\Bridge\Symfony\Form\Type\CreditCardType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;

class PaymentDataType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('card', CreditCardType::class, [
                'required' => true,
            ])
            ->add('submit', SubmitType::class)
        ;
    }
}
