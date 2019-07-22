<?php

declare(strict_types=1);

namespace BitBag\SyliusSmashPromotionPlugin\Factory;

use BitBag\SyliusSmashPromotionPlugin\Entity\SmashInterface;
use BitBag\SyliusSmashPromotionPlugin\Entity\SmashPromotionCampaignInterface;
use Sylius\Component\Core\Model\CustomerInterface;
use Sylius\Component\Resource\Factory\FactoryInterface;

interface SmashFactoryInterface extends FactoryInterface
{
    public function createForCustomerAndCampaign(
        ?CustomerInterface $customer,
        SmashPromotionCampaignInterface $smashPromotionCampaign
    ): SmashInterface;
}
