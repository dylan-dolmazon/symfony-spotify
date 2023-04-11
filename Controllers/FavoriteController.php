<?php

namespace App\Controllers;
use App\Entity\Artist;
use App\Entity\Musique;

class FavoriteController extends Controller
{
    public function index(){
        $temp = new Artist('','',0,'','','');
        $datas = $temp->findAll();

        $this->render('favorite/index',compact('datas'));
    }

    public function delFavorite($id){
        $temp = new Artist('','',0,'','','');
        $temp->delete($id);

        header('location: /favorite/index');
    }

    public function musique(){
        $temp = new Musique('','','','');
        $datas = $temp->findAll();

        $this->render('favorite/musique', compact('datas'));
    }

    public function delMusique($id){
        $temp = new Musique('','',0,'');
        $temp->delete($id);

        header('location: /favorite/musique');
    }
}