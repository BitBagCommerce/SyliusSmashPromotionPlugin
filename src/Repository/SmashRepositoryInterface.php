<?php

declare(strict_types=1);

namespace BitBag\SyliusSmashPromotionPlugin\Repository;

use Doctrine\ORM\QueryBuilder;
use Sylius\Component\Core\Model\CustomerInterface;
use Sylius\Component\Resource\Repository\RepositoryInterface;

interface SmashRepositoryInterface extends RepositoryInterface
{
    public function createByCustomerIdQueryBuilder(int $customerId): QueryBuilder;

    public function findByCustomerOrEmail(?CustomerInterface $customer, ?string $email): array;
}
