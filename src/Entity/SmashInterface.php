<?php

declare(strict_types=1);

namespace BitBag\SyliusSmashPromotionPlugin\Entity;

use Sylius\Component\Core\Model\CustomerInterface;
use Sylius\Component\Core\Model\PromotionCouponInterface;
use Sylius\Component\Resource\Model\ResourceInterface;
use Sylius\Component\Resource\Model\TimestampableInterface;

interface SmashInterface extends ResourceInterface, TimestampableInterface
{
    public const STATUS_NEW = 'new';
    public const STATUS_ACCEPTED = 'accepted';
    public const STATUS_REJECTED = 'rejected';

    public function getState(): ?string;

    public function setState(?string $state): void;

    public function getImage(): ?SmashImageInterface;

    public function setImage(?SmashImageInterface $image): void;

    public function getEmail(): ?string;

    public function setEmail(?string $email): void;

    public function getCustomer(): ?CustomerInterface;

    public function setCustomer(?CustomerInterface $customer): void;

    public function getCampaign(): ?SmashPromotionCampaignInterface;

    public function setCampaign(?SmashPromotionCampaignInterface $campaign): void;

    public function getPromotionCoupon(): ?PromotionCouponInterface;

    public function setPromotionCoupon(?PromotionCouponInterface $promotionCoupon): void;
}
