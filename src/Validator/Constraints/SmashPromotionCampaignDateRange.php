<?php

declare(strict_types=1);

namespace BitBag\SyliusSmashPromotionPlugin\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

final class SmashPromotionCampaignDateRange extends Constraint
{
    /** @var string */
    public $message = 'bitbag_sylius_smash_promotion.smash_promotion_campaign.exists_date_range';

    public function getTargets(): string
    {
        return self::CLASS_CONSTRAINT;
    }

    public function validatedBy(): string
    {
        return 'bitbag_sylius_smash_promotion_smash_promotion_campaign_date_range_validator';
    }
}
