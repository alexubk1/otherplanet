<?php

namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PictureRepository")
 */
class Picture
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\OneToMany(targetEntity="App\Entity\Article", mappedBy="picture")
     * @ORM\Column(name="pictures", type="string", length=255, nullable=true)
     */
    private $pictures;

    /**
     * @return string
     */
    public function getPictures(): ?string
    {
        return $this->pictures;
    }

    /**
     * @param string $pictures
     */
    public function setPictures(string $pictures): void
    {
        $this->pictures = $pictures;
    }

    public function __toString() {
        if(is_null($this->pictures)) {
            return 'NULL';
        }
        return $this->pictures;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }


}