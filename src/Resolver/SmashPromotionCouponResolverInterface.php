<?php

declare(strict_types=1);

namespace BitBag\SyliusSmashPromotionPlugin\Resolver;

use BitBag\SyliusSmashPromotionPlugin\Entity\SmashInterface;

interface SmashPromotionCouponResolverInterface
{
    public function resolvePromotionCoupon(SmashInterface $smash): void;
}
