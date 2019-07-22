<?php

declare(strict_types=1);

namespace BitBag\SyliusSmashPromotionPlugin\Entity;

use Sylius\Component\Core\Model\PromotionInterface;
use Sylius\Component\Resource\Model\CodeAwareInterface;
use Sylius\Component\Resource\Model\ResourceInterface;
use Sylius\Component\Resource\Model\TimestampableInterface;

interface SmashPromotionCampaignInterface extends ResourceInterface, TimestampableInterface, CodeAwareInterface
{
    public function getStartsAt(): ?\DateTimeInterface;

    public function setStartsAt(?\DateTimeInterface $startsAt): void;

    public function getEndsAt(): ?\DateTimeInterface;

    public function setEndsAt(?\DateTimeInterface $endsAt): void;

    public function getPromotion(): ?PromotionInterface;

    public function setPromotion(?PromotionInterface $promotion): void;

    public function getUsageLimit(): ?int;

    public function setUsageLimit(?int $usageLimit): void;

    public function getName(): ?string;

    public function setName(?string $name): void;

    public function getDescription(): ?string;

    public function setDescription(?string $description): void;

    public function getCode(): ?string;

    public function setCode(?string $code): void;
}
