<?php

namespace App\Entity;

class Artist extends Model
{

    public ?int $id;

    public function __construct(

        public string $idSpotify,

        public string $name,

        public int    $followers,

        public string $link,

        public string $picture,

        public array|string $genders,

    )
    {
        $this->table = 'Artist';
    }

    /**
     * @param string $id
     */
    public function setId(string $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    public function getIdSpotify(): string
    {
        return $this->idSpotify;
    }

    public function setIdSpotify(string $idSpotify): self
    {
        $this->idSpotify = $idSpotify;
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

    public function setFollowers(?int $followers): self
    {
        $this->followers = $followers;
        return $this;
    }

    public function getFollowers(): int
    {
        return $this->followers;
    }

    public function getGenders(): array
    {
        return $this->genders;
    }

    public function setGenders(?array $genders): self
    {
        $this->genders = $genders;
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

    public function displayDetails(): string
    {
        $return = '<div class="col-md-8">
    <div class="card mb-6" style="max-width: 540px;">
        <div class="row g-0">
            <div class="col-md-8">
                <img src="' . $this->getPicture() . '" class="img-fluid rounded-start"
                     alt="' . $this->getName() . '">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">' . $this->getName() . '</h5>
                    <div>';
                        $genres = $this->getGenders();
                        foreach ($genres as $genre) {
                            $return .= '<p>' . $genre . '</p>';
                        }
                        $return .= '</div>
                    <p class="card-text"></p>
                    <p class="card-text"><small
                            class="text-muted">' . number_format($this->getFollowers()) . ' followers</small>
                    </p>
                    <a href="' . $this->getLink() . '" target="_blank" class="btn btn-success">-> Spotify</a>
                </div>
            </div>
            
        </div>
    </div>
</div>';
        return $return;
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
                    <p class="card-text"><small
                            class="text-muted">' . number_format($this->getFollowers()) . ' followers</small>
                    </p>
                    <a href="' . $this->getLink() . '" target="_blank" class="btn btn-success">-> Spotify</a>
                    <a href="/artistes/details/' . $this->getIdSpotify() . '" class="btn btn-primary">->Détails</a>
                    <a href="/artistes/addFavorite/' . $this->getIdSpotify() . '" class="btn btn-success">add to favorite</a>
                </div>
            </div>
            
        </div>
    </div>
</div>';
    }

    public function displayFavorite(): string
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
                    <p class="card-text"><small
                            class="text-muted">' . number_format($this->getFollowers()) . ' followers</small>
                    </p>
                    <a href="' . $this->getLink() . '" target="_blank" class="btn btn-success">-> Spotify</a>
                    <a href="/artistes/details/' . $this->getIdSpotify() . '" class="btn btn-primary">->Détails</a>
                    <a href="/favorite/delFavorite/' . $this->getIdSpotify() . '" class="btn btn-danger">X</a>
                </div>
            </div>
            
        </div>
    </div>
</div>';
    }

}