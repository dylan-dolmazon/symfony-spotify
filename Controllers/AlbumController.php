<?php

namespace App\Controllers;
use App\Entity\Musique;

class AlbumController extends Controller
{

    public function index($id)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://api.spotify.com/v1/artists/$id/albums");
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Bearer ' . $_SESSION['token']));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        $albums = json_decode($result);
        curl_close($ch);

        return $albums;
    }

    public function albumDetails($id)
    {

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://api.spotify.com/v1/albums/$id");
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Bearer ' . $_SESSION['token']));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        echo $result;
        $album = json_decode($result);

        $this->render('album/index', compact('album'));
    }

    public function addFavorite(string $id)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://api.spotify.com/v1/tracks/$id");
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Bearer ' . $_SESSION['token']));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        $result = json_decode($result);

        $musique = new Musique($result->name, $result->external_urls->spotify, $result->id, $result->duration_ms);
        $tmp = $musique->findBy(['idSpotify'=>$musique->idSpotify]);
        if($tmp == null) $musique->create();

        header('location: /favorite/musique');
    }

}