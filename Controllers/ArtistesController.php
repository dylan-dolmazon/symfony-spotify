<?php

namespace App\Controllers;
use App\Entity\Artist;

class ArtistesController extends Controller
{
    public function index(){

        $name = "orelsan";

        if(!empty($_GET['name'])){
            $name = $_GET['name'];
            $name = str_replace(" ","_",$name);
        }

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://api.spotify.com/v1/search?q=$name&type=artist");
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Bearer ' . $_SESSION['token'] ));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        $artists = json_decode($result);
        curl_close($ch);

        $this->render('artistes/index',compact('artists'));
    }

    public function details($id) {

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://api.spotify.com/v1/artists/$id");
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Bearer ' . $_SESSION['token'] ));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        $artist = json_decode($result);
        curl_close($ch);

        $albums = new AlbumController();
        $albums = $albums->index($id);

        $this->render('artistes/details',compact('artist','albums'));
    }

    public function addFavorite($id){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://api.spotify.com/v1/artists/$id");
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Bearer ' . $_SESSION['token'] ));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        $result = json_decode($result);

        $defaultImage = "https://www.oiseaux.net/photos/vincent.palomares/images/pigeon.biset.vipa.1g.jpg";
        if(!empty($result->images[0])){
            $defaultImage = $result->images[0]->url;

        }

        $artist = new Artist($result->id,$result->name,$result->followers->total,$result->external_urls->spotify,$defaultImage,$result->genres);
        $tmp = $artist->findBy(['idSpotify'=>$artist->idSpotify]);
        if($tmp == null){
            $artist->create();
        }
        header('location: /favorite/index');
    }

}