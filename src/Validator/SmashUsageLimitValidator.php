<?php

declare(strict_types=1);

namespace BitBag\SyliusSmashPromotionPlugin\Validator;

use BitBag\SyliusSmashPromotionPlugin\Entity\SmashInterface;
use BitBag\SyliusSmashPromotionPlugin\Repository\SmashRepositoryInterface;
use BitBag\SyliusSmashPromotionPlugin\Validator\Constraints\SmashUsageLimit;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Webmozart\Assert\Assert;

final class SmashUsageLimitValidator extends ConstraintValidator
{
    /** @var SmashRepositoryInterface */
    private $smashRepository;

    public function __construct(SmashRepositoryInterface $smashRepository)
    {
        $this->smashRepository = $smashRepository;
    }

    public function validate($value, Constraint $constraint): void
    {
        if (null === $value) {
            return;
        }

        /** @var SmashInterface $value */
        Assert::isInstanceOf($value, SmashInterface::class);

        /** @var SmashUsageLimit $constraint */
        Assert::isInstanceOf($constraint, SmashUsageLimit::class);

        $campaign = $value->getCampaign();

        $smashes = $this->smashRepository->findByCustomerOrEmail($value->getCustomer(), $value->getEmail());

        if (count($smashes) >= $campaign->getUsageLimit()) {
            $this->context
                ->buildViolation($constraint->message)
                ->addViolation()
            ;
        }
    }
}
