<?php
namespace App\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\JoinTable;
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
     * @var \DateTime
     *
     * @ORM\Column(name="creationDate", type="datetime", nullable=true)
     */
    private $creationDate;
    /**
     * @var \boolean
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
     * @ORM\ManyToMany(targetEntity="App\Entity\Category", inversedBy="articles")
     */
    private $categoryName;


    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Album", inversedBy="albums")
     */
    private $album;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Album", mappedBy="article")
     */
    private $articles;

    /**
     * @return string
     */
    public function getPicture(): string
    {
        return $this->picture;
    }

    /**
     * @param string $picture
     */
    public function setPicture(string $picture): void
    {
        $this->picture = $picture;
    }

    /**
     * @return mixed
     */
    public function getAlbum()
    {
        return $this->album;
    }

    /**
     * @param mixed $album
     */
    public function setAlbum($album): void
    {
        $this->album = $album;
    }

    /**
     * @return bool
     */
    public function isPublish(): bool
    {
        return $this->isPublish;
    }

    /**
     * @param bool $isPublish
     */
    public function setIsPublish(bool $isPublish): void
    {
        $this->isPublish = $isPublish;
    }



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

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->categoryName = new ArrayCollection();
    }

    /**
     * Add categoryName.
     *
     * @return article
     */
    public function addCategoryName(\App\Entity\Category $categoryName) : self
    {
        if (!$this->categoryName->contains($categoryName)) {
            $this->categoryName[] = $categoryName;
        }
        return $this;
    }
    /**
     * Remove categoryName.
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeCategoryName(\App\Entity\Category $categoryName)
    {
        if (!$this->categoryName->contains($categoryName)) {
            $this->categoryName->removeElement($categoryName);
        }
        return $this;
    }
    /**
     * Get categoryName.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCategoryName(): Collection
    {
        return $this->categoryName;
    }
}