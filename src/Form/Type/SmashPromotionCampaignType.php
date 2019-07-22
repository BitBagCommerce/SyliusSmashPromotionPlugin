<?php

declare(strict_types=1);

namespace BitBag\SyliusSmashPromotionPlugin\Form\Type;

use Sylius\Bundle\ResourceBundle\Form\EventSubscriber\AddCodeFormSubscriber;
use Sylius\Bundle\ResourceBundle\Form\Type\AbstractResourceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

final class SmashPromotionCampaignType extends AbstractResourceType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'bitbag_sylius_smash_promotion.form.smash_promotion_campaign.name',
            ])
            ->add('description', TextareaType::class, [
                'label' => 'bitbag_sylius_smash_promotion.form.smash_promotion_campaign.description',
                'required' => false,
            ])
            ->add('usageLimit', IntegerType::class, [
                'label' => 'bitbag_sylius_smash_promotion.form.smash_promotion_campaign.usage_limit',
            ])
            ->add('startsAt', DateTimeType::class, [
                'label' => 'bitbag_sylius_smash_promotion.form.smash_promotion_campaign.starts_at',
                'date_widget' => 'single_text',
                'time_widget' => 'single_text',
            ])
            ->add('endsAt', DateTimeType::class, [
                'label' => 'bitbag_sylius_smash_promotion.form.smash_promotion_campaign.ends_at',
                'date_widget' => 'single_text',
                'time_widget' => 'single_text',
            ])
            ->add('promotion', PromotionChoiceType::class, [
                'label' => 'bitbag_sylius_smash_promotion.form.smash_promotion_campaign.promotion',
            ])
            ->addEventSubscriber(new AddCodeFormSubscriber())
        ;
    }
}
