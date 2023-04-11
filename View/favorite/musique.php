<?php

use App\Entity\Musique;


?>
<h2>Mes musiques favorites: </h2>
    <div class="row">
<?php
foreach ($datas as $a) {
    $album = new Musique($a->name,$a->link,$a->idSpotify, $a->duration_ms);
    echo $album->displayFavorite();
}
?>
