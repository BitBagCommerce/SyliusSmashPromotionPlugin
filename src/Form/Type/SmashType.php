<?php

declare(strict_types=1);

namespace BitBag\SyliusSmashPromotionPlugin\Form\Type;

use BitBag\SyliusSmashPromotionPlugin\Entity\SmashInterface;
use Sylius\Bundle\ResourceBundle\Form\Type\AbstractResourceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\FormBuilderInterface;

final class SmashType extends AbstractResourceType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        /** @var SmashInterface $smash */
        $smash = $builder->getData();

        if (empty($smash->getEmail())) {
            $builder->add('email', EmailType::class);
        }

        $builder
            ->add('image', SmashImageType::class, [
                'label' => false,
                'required' => false,
            ])
        ;
    }
}
