<?php

use App\Entity\Artist;


?>
<h2>Mes artistes favorits: </h2>
<div class="row">
<?php
foreach ($datas as $a) {
    $defaultImage = "https://www.oiseaux.net/photos/vincent.palomares/images/pigeon.biset.vipa.1g.jpg";
    if(!empty($a->picture)){
        $defaultImage = $a->picture;
    }

    $artist = new Artist($a->idSpotify,$a->name,$a->followers,$a->link,$defaultImage,json_decode($a->genders));
    echo $artist->displayFavorite();
}
?>