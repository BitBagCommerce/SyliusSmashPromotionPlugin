<?php

declare(strict_types=1);

namespace BitBag\SyliusSmashPromotionPlugin\Validator;

use BitBag\SyliusSmashPromotionPlugin\Entity\SmashPromotionCampaignInterface;
use BitBag\SyliusSmashPromotionPlugin\Repository\SmashPromotionCampaignRepositoryInterface;
use BitBag\SyliusSmashPromotionPlugin\Validator\Constraints\SmashPromotionCampaignDateRange;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Webmozart\Assert\Assert;

final class SmashPromotionCampaignDateRangeValidator extends ConstraintValidator
{
    /** @var SmashPromotionCampaignRepositoryInterface */
    private $smashPromotionCampaignRepository;

    public function __construct(SmashPromotionCampaignRepositoryInterface $smashPromotionCampaignRepository)
    {
        $this->smashPromotionCampaignRepository = $smashPromotionCampaignRepository;
    }

    public function validate($value, Constraint $constraint): void
    {
        if (null === $value) {
            return;
        }

        /** @var SmashPromotionCampaignInterface $value */
        Assert::isInstanceOf($value, SmashPromotionCampaignInterface::class);

        /** @var SmashPromotionCampaignDateRange $constraint */
        Assert::isInstanceOf($constraint, SmashPromotionCampaignDateRange::class);

        if (null === $value->getStartsAt() || null === $value->getEndsAt()) {
            return;
        }

        $smashPromotionCampaigns = $this->smashPromotionCampaignRepository->findByDateRange(
            $value->getStartsAt(),
            $value->getEndsAt()
        );

        $smashPromotionCampaigns = array_filter($smashPromotionCampaigns, function (SmashPromotionCampaignInterface $smashPromotionCampaign) use ($value) {
            return $value !== $smashPromotionCampaign;
        });

        if (count($smashPromotionCampaigns) > 0) {
            $this->context
                ->buildViolation($constraint->message)
                ->addViolation()
            ;
        }
    }
}
