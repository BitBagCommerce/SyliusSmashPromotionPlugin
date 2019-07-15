<?php

declare(strict_types=1);

namespace BitBag\SyliusSmashPromotionPlugin\EventListener;

use BitBag\SyliusSmashPromotionPlugin\Entity\Smash;
use BitBag\SyliusSmashPromotionPlugin\Entity\SmashInterface;
use Sylius\Bundle\ResourceBundle\Event\ResourceControllerEvent;
use Sylius\Component\Core\Uploader\ImageUploaderInterface;
use Webmozart\Assert\Assert;

final class SmashUploadListener
{
    /** @var ImageUploaderInterface */
    private $uploader;

    public function __construct(ImageUploaderInterface $uploader)
    {
        $this->uploader = $uploader;
    }

    public function uploadImage(ResourceControllerEvent $event): void
    {
        /** @var SmashInterface $smash */
        $smash = $event->getSubject();

        Assert::isInstanceOf($smash, Smash::class);

        $image = $smash->getImage();

        if (null !== $image && true === $image->hasFile()) {
            $this->uploader->upload($image);
        }
    }
}
