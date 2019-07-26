<?php

declare(strict_types=1);

namespace BitBag\SyliusSmashPromotionPlugin\Repository;

use Doctrine\ORM\QueryBuilder;
use Sylius\Bundle\ResourceBundle\Doctrine\ORM\EntityRepository;
use Sylius\Component\Core\Model\CustomerInterface;

class SmashRepository extends EntityRepository implements SmashRepositoryInterface
{
    public function createByCustomerIdQueryBuilder(int $customerId): QueryBuilder
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.customer = :customerId')
            ->setParameter('customerId', $customerId)
        ;
    }

    public function findByCustomerOrEmail(?CustomerInterface $customer, ?string $email): array
    {
        $queryBuilder = $this->createQueryBuilder('o');

        if (null !== $customer) {
            $queryBuilder
                ->andWhere('o.customer = :customer')
                ->setParameter('customer', $customer)
            ;
        }

        if (null !== $email) {
            $queryBuilder
                ->orWhere('o.email = :email')
                ->setParameter('email', $email)
            ;
        }

        return $queryBuilder
            ->getQuery()
            ->getResult()
        ;
    }
}
