<?php

declare(strict_types=1);

namespace BitBag\SyliusSmashPromotionPlugin\Factory;

use BitBag\SyliusSmashPromotionPlugin\Entity\SmashInterface;
use Sylius\Component\Core\Model\CustomerInterface;
use Sylius\Component\Resource\Factory\FactoryInterface;

class SmashFactory implements SmashFactoryInterface
{
    /** @var FactoryInterface */
    private $decoratedFactory;

    public function __construct(FactoryInterface $factory)
    {
        $this->decoratedFactory = $factory;
    }

    public function createForCustomer(?CustomerInterface $customer): SmashInterface
    {
        $smash = $this->createNew();

        if (null !== $customer) {
            $smash->setCustomer($customer);
            $smash->setEmail($customer->getEmail());
        }

        return $smash;
    }

    public function createNew(): SmashInterface
    {
        /** @var SmashInterface $smash */
        $smash = $this->decoratedFactory->createNew();

        return $smash;
    }
}
