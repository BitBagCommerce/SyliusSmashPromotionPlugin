<?php

declare(strict_types=1);

namespace BitBag\SyliusSmashPromotionPlugin\Resolver;

use BitBag\SyliusSmashPromotionPlugin\EmailManager\SmashPromotionCouponEmailManagerInterface;
use BitBag\SyliusSmashPromotionPlugin\Entity\SmashInterface;
use Doctrine\ORM\EntityManagerInterface;
use Sylius\Component\Core\Model\PromotionCouponInterface;
use Sylius\Component\Promotion\Generator\PromotionCouponGeneratorInstruction;
use Sylius\Component\Promotion\Generator\PromotionCouponGeneratorInterface;

final class SmashPromotionCouponResolver implements SmashPromotionCouponResolverInterface
{
    /** @var PromotionCouponGeneratorInterface */
    private $promotionCouponGenerator;

    /** @var SmashPromotionCouponEmailManagerInterface */
    private $smashPromotionCouponEmailManager;

    /** @var EntityManagerInterface */
    private $smashEntityManager;

    public function __construct(
        PromotionCouponGeneratorInterface $promotionCouponGenerator,
        SmashPromotionCouponEmailManagerInterface $smashPromotionCouponEmailManager,
        EntityManagerInterface $smashEntityManager
    ) {
        $this->promotionCouponGenerator = $promotionCouponGenerator;
        $this->smashPromotionCouponEmailManager = $smashPromotionCouponEmailManager;
        $this->smashEntityManager = $smashEntityManager;
    }

    public function resolvePromotionCoupon(SmashInterface $smash): void
    {
        $campaign = $smash->getCampaign();

        if (null === $smash->getPromotionCoupon()) {
            $promotion = $campaign->getPromotion();

            $promotionCouponGeneratorInstruction = new PromotionCouponGeneratorInstruction();

            $promotionCouponGeneratorInstruction->setAmount(1);
            $promotionCouponGeneratorInstruction->setUsageLimit(1);
            $promotionCouponGeneratorInstruction->setExpiresAt($promotion->getEndsAt());

            /** @var PromotionCouponInterface $promotionCoupon */
            $promotionCoupon = current($this->promotionCouponGenerator->generate(
                $promotion,
                $promotionCouponGeneratorInstruction
            ));

            $smash->setPromotionCoupon($promotionCoupon);

            $this->smashEntityManager->flush();
        }

        $this->smashPromotionCouponEmailManager->sendSmashPromotionCoupon($smash);
    }
}
