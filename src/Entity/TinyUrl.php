<?php

namespace App\Entity;

use App\Repository\TinyUrlRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Attribute\Groups;

#[ORM\Entity(repositoryClass: TinyUrlRepository::class)]
#[ORM\Index(name: 'idx_slug', fields: ['slug'])]
class TinyUrl
{
    #[ORM\Id, ORM\Column(type: 'integer', options: ['unsigned' => true]), ORM\GeneratedValue]
    private ?int $id = null;

    #[ORM\Column(length: 6)]
    private ?string $slug = null;

    #[ORM\Column(length: 255)]
    #[Groups(["create"])]
    private ?string $redirectUrl = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): static
    {
        $this->slug = $slug;

        return $this;
    }

    public function getRedirectUrl(): ?string
    {
        return $this->redirectUrl;
    }

    public function setRedirectUrl(?string $redirectUrl): static
    {
        $this->redirectUrl = $redirectUrl;

        return $this;
    }
}
