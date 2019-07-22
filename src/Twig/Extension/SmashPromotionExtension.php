<?php

declare(strict_types=1);

namespace BitBag\SyliusSmashPromotionPlugin\Twig\Extension;

use BitBag\SyliusSmashPromotionPlugin\Resolver\SmashPromotionCampaignResolverInterface;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class SmashPromotionExtension extends AbstractExtension
{
    /** @var SmashPromotionCampaignResolverInterface */
    private $smashPromotionCampaignResolver;

    public function __construct(SmashPromotionCampaignResolverInterface $smashPromotionCampaignResolver)
    {
        $this->smashPromotionCampaignResolver = $smashPromotionCampaignResolver;
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('bitbag_smash_promotion_is_active', [$this, 'isActive']),
        ];
    }

    public function isActive(): bool
    {
        return null !== $this->smashPromotionCampaignResolver->resolveCampaign();
    }
}
