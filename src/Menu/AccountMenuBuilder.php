<?php

declare(strict_types=1);

namespace BitBag\SyliusSmashPromotionPlugin\Menu;

use Knp\Menu\ItemInterface;
use Sylius\Bundle\UiBundle\Menu\Event\MenuBuilderEvent;

final class AccountMenuBuilder
{
    public function addSmashesItem(MenuBuilderEvent $event): void
    {
        /** @var ItemInterface $menu */
        $menu = $event->getMenu();

        $menu
            ->addChild('smashes', ['route' => 'bitbag_sylius_smash_promotion_shop_smash_index'])
            ->setLabel('bitbag_sylius_smash_promotion.ui.smashes')
            ->setLabelAttribute('icon', 'bullhorn')
        ;
    }
}
