<?php

namespace App\Entity;

use App\Repository\ArticleImageRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ArticleImageRepository::class)
 */
class ArticleImage
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $image_name;

    /**
     * @ORM\OneToOne(targetEntity=Article::class, inversedBy="articleImage", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $article;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getImageName(): ?string
    {
        return $this->image_name;
    }

    public function setImageName(string $image_name): self
    {
        $this->image_name = $image_name;

        return $this;
    }

    public function getArticle(): ?Article
    {
        return $this->article;
    }

    public function setArticle(Article $article): self
    {
        $this->article = $article;

        return $this;
    }
}
