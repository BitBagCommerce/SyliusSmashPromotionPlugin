<?php

declare(strict_types=1);

namespace BitBag\SyliusSmashPromotionPlugin\Repository;

use Sylius\Component\Resource\Repository\RepositoryInterface;

interface SmashPromotionCampaignRepositoryInterface extends RepositoryInterface
{
    public function findActive(?\DateTimeInterface $date = null): array;

    public function findByDateRange(\DateTimeInterface $startsAt, \DateTimeInterface $endsAt): array;
}
