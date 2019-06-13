<?php
namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity(repositoryClass="App\Repository\ArticleRepository")
 */
class Article
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;
    /**
     * @ORM\Column(type="text", length=100)
     */
    private $title;
    /**
     * @ORM\Column(type="text")
     */
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="creationDate", type="datetime", nullable=true)
     */
    private $creationDate;
    /**
     * @var \Int
     *
     * @ORM\Column(name="isPublish", type="boolean")
     */
    private $isPublish = 0;
    /**
     * @var string
     *
     * @ORM\Column(name="picture", type="string", length=255, nullable=true)
     */
    private $picture;
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Category", inversedBy="articles")
     */
    private $category;

    /**
     * @return \DateTime
     */
    public function getCreationDate(): ?\DateTime
    {
        return $this->creationDate;
    }

    /**
     * @param \DateTime $creationDate
     */
    public function setCreationDate(\DateTime $creationDate): void
    {
        $this->creationDate = $creationDate;
    }

    /**
     * @return Int
     */
    public function getisPublish(): ?bool
    {
        return $this->isPublish;
    }

    /**
     * @param Boolean $isPublish
     */
    public function setIsPublish(?bool $isPublish): self
    {
        $this->isPublish = $isPublish;
    }

    /**
     * @return string
     */
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * @param string $picture
     */
    public function setPicture(?string $picture): void
    {
        $this->picture = $picture;
    }

    /**
     * @return mixed
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param mixed $category
     */
    public function setCategory($category): void
    {
        $this->category = $category;
    }

    private $body;
    // Getters & Setters
    public function getId() {
        return $this->id;
    }
    public function getTitle() {
        return $this->title;
    }
    public function setTitle($title) {
        $this->title = $title;
    }
    public function getBody() {
        return $this->body;
    }
    public function setBody($body) {
        $this->body = $body;
    }
}