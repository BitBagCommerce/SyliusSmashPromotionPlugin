<?php

declare(strict_types=1);

namespace BitBag\SyliusSmashPromotionPlugin\Form\Type;

use Sylius\Bundle\CoreBundle\Form\Type\ImageType as BaseImageType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;

final class SmashImageType extends BaseImageType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('file', FileType::class, [
                'label' => 'sylius.form.image.file',
            ])
        ;
    }

    public function getBlockPrefix(): string
    {
        return 'bitbag_sylius_smash_promotion_smash_image';
    }
}
