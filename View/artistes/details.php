<?php
use App\Entity\Artist;
use App\Entity\Album;

$defaultImage = "https://www.oiseaux.net/photos/vincent.palomares/images/pigeon.biset.vipa.1g.jpg";
    if(!empty($artist->images[0])){
        $defaultImage = $artist->images[0]->url;

    }
    $artist = new Artist($artist->id,$artist->name,$artist->followers->total,$artist->external_urls->spotify,$defaultImage,$artist->genres);
    echo $artist->displayDetails();

?>
<h2>Les détails de l'artiste: </h2>
    <div class="row">
<?php
foreach ($albums->items as $a) {
    $defaultImage = "https://www.oiseaux.net/photos/vincent.palomares/images/pigeon.biset.vipa.1g.jpg";
    if(!empty($a->images[0])){
        $defaultImage = $a->images[0]->url;
    }
    $album = new Album($a->id,$a->name,$a->external_urls->spotify,$defaultImage, $a->release_date);
    echo $album->display();
}
?>
</div>
