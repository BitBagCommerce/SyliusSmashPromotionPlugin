<?php

declare(strict_types=1);

namespace BitBag\SyliusSmashPromotionPlugin\Repository;

use Sylius\Bundle\ResourceBundle\Doctrine\ORM\EntityRepository;

class SmashPromotionCampaignRepository extends EntityRepository implements SmashPromotionCampaignRepositoryInterface
{
    public function findActive(?\DateTimeInterface $date = null): array
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.startsAt < :date')
            ->andWhere('o.endsAt > :date')
            ->setParameter('date', $date ?: new \DateTime())
            ->getQuery()
            ->getResult()
        ;
    }

    public function findByDateRange(\DateTimeInterface $startsAt, \DateTimeInterface $endsAt): array
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.startsAt <= :startsAt AND o.endsAt >= :startsAt')
            ->orWhere('o.startsAt <= :endsAt AND o.endsAt >= :endsAt')
            ->setParameter('startsAt', $startsAt)
            ->setParameter('endsAt', $endsAt)
            ->getQuery()
            ->getResult()
        ;
    }
}
