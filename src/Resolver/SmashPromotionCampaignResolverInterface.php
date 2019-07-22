<?php

declare(strict_types=1);

namespace BitBag\SyliusSmashPromotionPlugin\Resolver;

use BitBag\SyliusSmashPromotionPlugin\Entity\SmashPromotionCampaignInterface;

interface SmashPromotionCampaignResolverInterface
{
    public function resolveCampaign(): ?SmashPromotionCampaignInterface;
}
