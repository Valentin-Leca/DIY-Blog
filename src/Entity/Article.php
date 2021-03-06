<?php

namespace App\Entity;

use App\Repository\ArticleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ArticleRepository::class)
 */
class Article
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
    private $article_name;

    /**
     * @ORM\Column(type="text")
     */
    private $article_content;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $article_author;

    /**
     * @ORM\Column(type="datetime")
     */
    private $article_date;

    /**
     * @ORM\Column(type="integer")
     */
    private $article_like;

    /**
     * @ORM\OneToMany(targetEntity=Comment::class, mappedBy="article", orphanRemoval=true)
     */
    private $comments;

    /**
     * @ORM\OneToOne(targetEntity=ArticleImage::class, mappedBy="article", cascade={"persist", "remove"})
     */
    private $articleImage;

    /**
     * @ORM\OneToOne(targetEntity=ArticleCategory::class, mappedBy="article", cascade={"persist", "remove"})
     */
    private $articleCategory;

    public function __construct()
    {
        $this->comments = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getArticleName(): ?string
    {
        return $this->article_name;
    }

    public function setArticleName(string $article_name): self
    {
        $this->article_name = $article_name;

        return $this;
    }

    public function getArticleContent(): ?string
    {
        return $this->article_content;
    }

    public function setArticleContent(string $article_content): self
    {
        $this->article_content = $article_content;

        return $this;
    }

    public function getArticleAuthor(): ?string
    {
        return $this->article_author;
    }

    public function setArticleAuthor(string $article_author): self
    {
        $this->article_author = $article_author;

        return $this;
    }

    public function getArticleDate(): ?\DateTimeInterface
    {
        return $this->article_date;
    }

    public function setArticleDate(\DateTimeInterface $article_date): self
    {
        $this->article_date = $article_date;

        return $this;
    }

    public function getArticleLike(): ?int
    {
        return $this->article_like;
    }

    public function setArticleLike(int $article_like): self
    {
        $this->article_like = $article_like;

        return $this;
    }

    /**
     * @return Collection|Comment[]
     */
    public function getComments(): Collection
    {
        return $this->comments;
    }

    public function addComment(Comment $comment): self
    {
        if (!$this->comments->contains($comment)) {
            $this->comments[] = $comment;
            $comment->setArticle($this);
        }

        return $this;
    }

    public function removeComment(Comment $comment): self
    {
        if ($this->comments->removeElement($comment)) {
            // set the owning side to null (unless already changed)
            if ($comment->getArticle() === $this) {
                $comment->setArticle(null);
            }
        }

        return $this;
    }

    public function getArticleImage(): ?ArticleImage
    {
        return $this->articleImage;
    }

    public function setArticleImage(ArticleImage $articleImage): self
    {
        // set the owning side of the relation if necessary
        if ($articleImage->getArticle() !== $this) {
            $articleImage->setArticle($this);
        }

        $this->articleImage = $articleImage;

        return $this;
    }

    public function getArticleCategory(): ?ArticleCategory
    {
        return $this->articleCategory;
    }

    public function setArticleCategory(ArticleCategory $articleCategory): self
    {
        // set the owning side of the relation if necessary
        if ($articleCategory->getArticle() !== $this) {
            $articleCategory->setArticle($this);
        }

        $this->articleCategory = $articleCategory;

        return $this;
    }
}
