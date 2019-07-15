<?php

declare(strict_types=1);

namespace BitBag\SyliusSmashPromotionPlugin\Menu;

use Knp\Menu\ItemInterface;
use Sylius\Bundle\UiBundle\Menu\Event\MenuBuilderEvent;

final class SmashesMenuBuilder
{
    public function addSmashesItem(MenuBuilderEvent $event): void
    {
        /** @var ItemInterface $catalogMenu */
        $catalogMenu = $event->getMenu()->getChild('marketing');

        $catalogMenu
            ->addChild('smashes', ['route' => 'bitbag_sylius_smash_promotion_admin_smash_index'])
            ->setLabel('bitbag_sylius_smash_promotion.ui.smashes')
            ->setLabelAttribute('icon', 'bullhorn')
        ;
    }
}
