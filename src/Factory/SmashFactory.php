<?php

declare(strict_types=1);

namespace BitBag\SyliusSmashPromotionPlugin\Factory;

use BitBag\SyliusSmashPromotionPlugin\Entity\SmashInterface;
use BitBag\SyliusSmashPromotionPlugin\Entity\SmashPromotionCampaignInterface;
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

    public function createForCustomerAndCampaign(
        ?CustomerInterface $customer,
        ?SmashPromotionCampaignInterface $smashPromotionCampaign
    ): SmashInterface {
        $smash = $this->createNew();

        $smash->setCampaign($smashPromotionCampaign);

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
