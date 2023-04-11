<?php
use \App\Entity\Musique;
?>
<div class="row">
    <?php
    foreach ($album->tracks->items as $a) {
        $album = new Musique($a->name,$a->external_urls->spotify,$a->id, $a->duration_ms);
        echo $album->display();
    }
    ?>
</div>