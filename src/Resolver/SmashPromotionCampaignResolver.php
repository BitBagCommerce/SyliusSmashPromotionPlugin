<?php

declare(strict_types=1);

namespace BitBag\SyliusSmashPromotionPlugin\Resolver;

use BitBag\SyliusSmashPromotionPlugin\Entity\SmashPromotionCampaignInterface;
use BitBag\SyliusSmashPromotionPlugin\Repository\SmashPromotionCampaignRepositoryInterface;

final class SmashPromotionCampaignResolver implements SmashPromotionCampaignResolverInterface
{
    /** @var SmashPromotionCampaignRepositoryInterface */
    private $smashPromotionCampaignRepository;

    public function __construct(SmashPromotionCampaignRepositoryInterface $smashPromotionCampaignRepository)
    {
        $this->smashPromotionCampaignRepository = $smashPromotionCampaignRepository;
    }

    public function resolveCampaign(): ?SmashPromotionCampaignInterface
    {
        $campaigns = $this->smashPromotionCampaignRepository->findActive(new \DateTime());

        return count($campaigns) > 0 ? current($campaigns) : null;
    }
}
