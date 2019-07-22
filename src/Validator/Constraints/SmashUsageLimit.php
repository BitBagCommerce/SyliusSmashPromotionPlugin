<?php

declare(strict_types=1);

namespace BitBag\SyliusSmashPromotionPlugin\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

final class SmashUsageLimit extends Constraint
{
    /** @var string */
    public $message = 'bitbag_sylius_smash_promotion.smash.usage_limit';

    public function getTargets(): string
    {
        return self::CLASS_CONSTRAINT;
    }

    public function validatedBy(): string
    {
        return 'bitbag_sylius_smash_promotion_smash_usage_limit_validator';
    }
}
