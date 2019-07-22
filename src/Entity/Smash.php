<?php

declare(strict_types=1);

namespace BitBag\SyliusSmashPromotionPlugin\Entity;

use Sylius\Component\Core\Model\CustomerInterface;
use Sylius\Component\Core\Model\PromotionCouponInterface;
use Sylius\Component\Resource\Model\TimestampableTrait;

class Smash implements SmashInterface
{
    use TimestampableTrait;

    /** @var int */
    private $id;

    /** @var string */
    private $state = self::STATUS_NEW;

    /** @var SmashImageInterface */
    private $image;

    /** @var string */
    private $email;

    /** @var CustomerInterface|null */
    private $customer;

    /** @var SmashPromotionCampaignInterface */
    private $campaign;

    /** @var PromotionCouponInterface|null */
    private $promotionCoupon;

    public function __construct()
    {
        $this->createdAt = new \DateTime();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getState(): ?string
    {
        return $this->state;
    }

    public function setState(?string $state): void
    {
        $this->state = $state;
    }

    public function getImage(): ?SmashImageInterface
    {
        return $this->image;
    }

    public function setImage(?SmashImageInterface $image): void
    {
        if ($image !== null) {
            $image->setOwner($this);
        }

        $this->image = $image;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): void
    {
        $this->email = $email;
    }

    public function getCustomer(): ?CustomerInterface
    {
        return $this->customer;
    }

    public function setCustomer(?CustomerInterface $customer): void
    {
        $this->customer = $customer;
    }

    public function getCampaign(): ?SmashPromotionCampaignInterface
    {
        return $this->campaign;
    }

    public function setCampaign(?SmashPromotionCampaignInterface $campaign): void
    {
        $this->campaign = $campaign;
    }

    public function getPromotionCoupon(): ?PromotionCouponInterface
    {
        return $this->promotionCoupon;
    }

    public function setPromotionCoupon(?PromotionCouponInterface $promotionCoupon): void
    {
        $this->promotionCoupon = $promotionCoupon;
    }
}
