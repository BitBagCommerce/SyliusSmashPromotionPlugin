<?php

declare(strict_types=1);

namespace BitBag\SyliusSmashPromotionPlugin\EmailManager;

use BitBag\SyliusSmashPromotionPlugin\Entity\SmashInterface;

interface SmashPromotionCouponEmailManagerInterface
{
    public function sendSmashPromotionCoupon(SmashInterface $smash): void;
}
