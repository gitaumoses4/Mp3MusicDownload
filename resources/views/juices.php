<?php

use App\MusicInfo;

$info = new MusicInfo();
$tracks = $info->getTopArtists();
foreach ($tracks as $track) {
    echo $track->name . "<br/>";
}