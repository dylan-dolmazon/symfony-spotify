
<h2>Rechercher un artiste: </h2>
<form action="/artistes/index/" method="get" class="mb-4">
    <label for="name">Artist</label>
    <input type="text" name="name" id="name">
    <button type="submit">Submit</button>
</form>

<?php
use App\Entity\Artist;
?>
<div class="row">
<?php
if($artists != null){
    foreach ($artists->artists->items as $a){
        $a->followers = $a->followers->total;
    }
    $inventory = $artists->artists->items;
    $price = array_column($inventory, 'followers');
    array_multisort($price, SORT_DESC, $inventory);
    ?><h2>Les artistes trouvés: </h2><?php
    foreach ($inventory as $a) {
        $defaultImage = "https://www.oiseaux.net/photos/vincent.palomares/images/pigeon.biset.vipa.1g.jpg";
        if(!empty($a->images[0])){
            $defaultImage = $a->images[0]->url;

        }
        $idSpotify = $a->id;
        $artist = new Artist($idSpotify,$a->name,$a->followers,$a->external_urls->spotify,$defaultImage,$a->genres);
        echo $artist->display();
    }
}else{
    ?><h2>Aucun artiste trouvés: </h2><?php
}
?>
</div>
