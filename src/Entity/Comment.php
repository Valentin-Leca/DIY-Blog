<?php

namespace App\Entity;

use App\Repository\CommentRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CommentRepository::class)
 */
class Comment
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    private $comment_content;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $comment_author;

    /**
     * @ORM\Column(type="datetime")
     */
    private $comment_date;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $comment_report;

    /**
     * @ORM\ManyToOne(targetEntity=Article::class, inversedBy="comments")
     * @ORM\JoinColumn(nullable=false)
     */
    private $article;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCommentContent(): ?string
    {
        return $this->comment_content;
    }

    public function setCommentContent(string $comment_content): self
    {
        $this->comment_content = $comment_content;

        return $this;
    }

    public function getCommentAuthor(): ?string
    {
        return $this->comment_author;
    }

    public function setCommentAuthor(string $comment_author): self
    {
        $this->comment_author = $comment_author;

        return $this;
    }

    public function getCommentDate(): ?\DateTimeInterface
    {
        return $this->comment_date;
    }

    public function setCommentDate(\DateTimeInterface $comment_date): self
    {
        $this->comment_date = $comment_date;

        return $this;
    }

    public function getCommentReport(): ?int
    {
        return $this->comment_report;
    }

    public function setCommentReport(?int $comment_report): self
    {
        $this->comment_report = $comment_report;

        return $this;
    }

    public function getArticle(): ?Article
    {
        return $this->article;
    }

    public function setArticle(?Article $article): self
    {
        $this->article = $article;

        return $this;
    }
}
