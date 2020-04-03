<?php

declare(strict_types=1);

namespace App\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Exception;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

/**
 * @ORM\Entity
 * @ORM\Table(name="posts")
 * @ORM\HasLifecycleCallbacks
 */
class Post
{
    /**
     * @ORM\Id
     * @ORM\Column(type="uuid", unique=true)
     */
    private UuidInterface $id;

    /** @ORM\Column(name="title", type="string") */
    private string $title;

    /** @ORM\Column(name="category", type="string") */
    private string $category;

    /** @ORM\Column(name="content", type="string") */
    private string $content;

    /** @ORM\Column(type="integer", nullable=true) */
     private $reaction;

    /** @ORM\Column(type="string", nullable=false) */
     private $img;

    /** @ORM\Column(name="created", type="datetime") */
    private DateTime $created;

    /** @ORM\Column(name="updated", type="datetime", nullable=true) */
    private ?DateTime $updated = null;

   /**
    * @ORM\PrePersist
    *
    * @throws Exception;
    */
    public function onPrePersist(): void
    {
        $this->id = Uuid::uuid4();
        $this->created = new DateTime('NOW');
    }

    /**
     * @ORM\PreUpdate
     */
    public function onPreUpdate(): void
    {
        $this->updated = new DateTime('NOW');
    }

    public function getId(): UuidInterface
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getCategory(): string
    {
        return $this->category;
    }

    public function setCategory(string $category): self
    {
        $this->category = $category;

        return $this;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getReaction(): ?int
    {
        return $this->reaction;
    }

    public function setReaction(?int $reaction): self
    {
        $this->reaction = $reaction;

        return $this;
    }

    public function getImg()
    {
        return $this->img;
    }

    public function setImg($img): self
    {
        $this->img = $img;

        return $this;
    }

    public function getCreated(): DateTime
    {
        return $this->created;
    }

    public function getUpdated(): ?DateTime
    {
        return $this->updated;
    }
}
