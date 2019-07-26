<?php

declare(strict_types=1);

namespace BitBag\SyliusSmashPromotionPlugin\Entity;

use Sylius\Component\Core\Model\PromotionInterface;
use Sylius\Component\Resource\Model\TimestampableTrait;

class SmashPromotionCampaign implements SmashPromotionCampaignInterface
{
    use TimestampableTrait;

    /** @var int */
    protected $id;

    /** @var string */
    protected $name;

    /** @var string */
    protected $code;

    /** @var string|null */
    protected $description;

    /** @var \DateTimeInterface */
    protected $startsAt;

    /** @var \DateTimeInterface */
    protected $endsAt;

    /** @var PromotionInterface */
    protected $promotion;

    /** @var int */
    protected $usageLimit;

    public function __construct()
    {
        $this->createdAt = new \DateTime();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStartsAt(): ?\DateTimeInterface
    {
        return $this->startsAt;
    }

    public function setStartsAt(?\DateTimeInterface $startsAt): void
    {
        $this->startsAt = $startsAt;
    }

    public function getEndsAt(): ?\DateTimeInterface
    {
        return $this->endsAt;
    }

    public function setEndsAt(?\DateTimeInterface $endsAt): void
    {
        $this->endsAt = $endsAt;
    }

    public function getPromotion(): ?PromotionInterface
    {
        return $this->promotion;
    }

    public function setPromotion(?PromotionInterface $promotion): void
    {
        $this->promotion = $promotion;
    }

    public function getUsageLimit(): ?int
    {
        return $this->usageLimit;
    }

    public function setUsageLimit(?int $usageLimit): void
    {
        $this->usageLimit = $usageLimit;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(?string $code): void
    {
        $this->code = $code;
    }
}
