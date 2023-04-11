<?php

namespace App\Entity;

class Musique extends Model
{
    public ?int $id;

    public function __construct(

        public string|null $name,

        public string|null $link,

        public string|null $idSpotify,

        public string $duration_ms,

    )
    {
        $this->table = 'Musique';
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

    public function setIdSpotify(string $id): self
    {
        $this->idSpotify = $id;
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

    /**
     * @param string $duration_ms
     */
    public function setDurationMs(string $duration_ms): void
    {
        $this->duration_ms = $duration_ms;
    }

    /**
     * @return string
     */
    public function getDurationMs(): string
    {
        return '0'.floor($this->duration_ms/60000).':'.floor(($this->duration_ms%60000)/1000).':'.str_pad(floor($this->duration_ms%1000),1, STR_PAD_LEFT);
    }

    public function display(): string
    {
        return '<div class="col-md-4">
    <div class="card mb-3" style="max-width: 540px;">
        <div class="row g-0">
        <div class="col-md-4">
                <img src="https://www.supercadeaux.fr/wp-content/uploads/2019/02/Disque-Dor-personnalisee-1.jpg" class="img-fluid rounded-start"
                     alt="' . $this->getName() . '">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">' . $this->getName() . '</h5>
                    <p class="card-text">'. $this->getDurationMs() .'</p>
                    <p class="card-text"></p>
                    <a href="' . $this->getLink() . '" target="_blank" class="btn btn-success">-> Spotify</a>
                    <a href="/album/addFavorite/' . $this->getIdSpotify() . '" class="btn btn-success">add to favorite</a>
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
                <img src="https://www.supercadeaux.fr/wp-content/uploads/2019/02/Disque-Dor-personnalisee-1.jpg" class="img-fluid rounded-start"
                     alt="' . $this->getName() . '">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">' . $this->getName() . '</h5>
                    <p class="card-text">'. $this->getDurationMs() .'</p>
                    <p class="card-text"></p>
                    <a href="' . $this->getLink() . '" target="_blank" class="btn btn-success">-> Spotify</a>
                    <a href="/favorite/delMusique/' . $this->getIdSpotify() . '" class="btn btn-danger">X</a>
                </div>
            </div>
            
        </div>
    </div>
</div>';
    }

}