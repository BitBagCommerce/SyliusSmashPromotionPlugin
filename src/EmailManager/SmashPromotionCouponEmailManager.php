<?php

declare(strict_types=1);

namespace BitBag\SyliusSmashPromotionPlugin\EmailManager;

use BitBag\SyliusSmashPromotionPlugin\Entity\SmashInterface;
use BitBag\SyliusSmashPromotionPlugin\Mailer\Emails;
use Sylius\Component\Mailer\Sender\SenderInterface;

final class SmashPromotionCouponEmailManager implements SmashPromotionCouponEmailManagerInterface
{
    /** @var SenderInterface */
    private $emailSender;

    public function __construct(SenderInterface $emailSender)
    {
        $this->emailSender = $emailSender;
    }

    public function sendSmashPromotionCoupon(SmashInterface $smash): void
    {
        $this->emailSender->send(Emails::SMASH_PROMOTION_COUPON, [$smash->getEmail()], ['smash' => $smash]);
    }
}
