<?php

declare(strict_types=1);

namespace BitBag\SyliusSmashPromotionPlugin\Menu;

use Knp\Menu\ItemInterface;
use Sylius\Bundle\UiBundle\Menu\Event\MenuBuilderEvent;

final class SmashPromotionCampaignsMenuBuilder
{
    public function addSmashPromotionCampaignsItem(MenuBuilderEvent $event): void
    {
        /** @var ItemInterface $catalogMenu */
        $catalogMenu = $event->getMenu()->getChild('marketing');

        $catalogMenu
            ->addChild('smash_promotion_campaigns', ['route' => 'bitbag_sylius_smash_promotion_admin_smash_promotion_campaign_index'])
            ->setLabel('bitbag_sylius_smash_promotion.ui.smash_promotion_campaigns')
            ->setLabelAttribute('icon', 'bullhorn')
        ;
    }
}
