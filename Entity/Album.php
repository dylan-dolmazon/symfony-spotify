<?php

namespace App\Entity;

class Album
{
    public function __construct(
        public string|null $id,

        public string|null $name,

        public string|null $link,

        public string|null $picture,

        public string $release_date,
    )
    {
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function getLink(): string|null
    {
        return $this->link;
    }

    public function setLink(?string $link): self
    {
        $this->link = $link;
        return $this;
    }


    public function getPicture(): string|null
    {
        return $this->picture;
    }

    public function setPicture(?string $picture): self
    {
        $this->picture = $picture;
        return $this;
    }

    /**
     * @param string $release_date
     */
    public function setReleaseDate(string $release_date): void
    {
        $this->release_date = $release_date;
    }

    /**
     * @return string
     */
    public function getReleaseDate(): string
    {
        return $this->release_date;
    }

    public function displayDetails(): string
    {
        return '<div class="col-md-4">
    <div class="card mb-3" style="max-width: 540px;">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="' . $this->getPicture() . '" class="img-fluid rounded-start"
                     alt="' . $this->getName() . '">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">' . $this->getName() . '</h5>
                    <p class="card-text"></p>
                    <p class="card-text">'. $this->getReleaseDate() .'</p>
                    <a href="' . $this->getLink() . '" target="_blank" class="btn btn-success">-> Spotify</a>
                </div>
            </div>
            
        </div>
    </div>
</div>';
    }
    public function display(): string
    {
        return '<div class="col-md-4">
    <div class="card mb-3" style="max-width: 540px;">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="' . $this->getPicture() . '" class="img-fluid rounded-start"
                     alt="' . $this->getName() . '">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">' . $this->getName() . '</h5>
                    <p class="card-text"></p>
                    <p class="card-text">'. $this->getReleaseDate() .'</p>
                    <a href="' . $this->getLink() . '" target="_blank" class="btn btn-success">-> Spotify</a>
                    <a href="/album/albumDetails/' . $this->getId() . '" class="btn btn-primary">->Détails</a>
                </div>
            </div>
            
        </div>
    </div>
</div>';
    }
}