<?php

declare(strict_types=1);

namespace BitBag\SyliusSmashPromotionPlugin\Form;

use Sylius\Bundle\ResourceBundle\Form\Type\AbstractResourceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\FormBuilderInterface;

final class SmashType extends AbstractResourceType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', EmailType::class)
            ->add('image', SmashImageType::class, [
                'label' => false,
                'required' => false,
            ])
        ;
    }
}
