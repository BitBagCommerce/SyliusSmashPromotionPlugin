<?php

declare(strict_types=1);

namespace BitBag\SyliusSmashPromotionPlugin\Validator;

use BitBag\SyliusSmashPromotionPlugin\Entity\SmashInterface;
use BitBag\SyliusSmashPromotionPlugin\Validator\Constraints\SmashUsageLimit;
use Sylius\Component\Resource\Repository\RepositoryInterface;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Webmozart\Assert\Assert;

final class SmashUsageLimitValidator extends ConstraintValidator
{
    /** @var RepositoryInterface */
    private $smashRepository;

    public function __construct(RepositoryInterface $smashRepository)
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

        if (null === $value->getCustomer()) {
            $smashes = $this->smashRepository->findBy([
                'email' => $value->getEmail(),
                'campaign' => $campaign,
            ]);
        } else {
            $smashes = $this->smashRepository->findBy([
                'customer' => $value->getCustomer(),
                'campaign' => $campaign,
            ]);
        }

        if (count($smashes) >= $campaign->getUsageLimit()) {
            $this->context
                ->buildViolation($constraint->message)
                ->addViolation()
            ;
        }
    }
}
