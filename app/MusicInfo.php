<?php

namespace App;

use App\Globals\Constants;

class MusicInfo {

    private $apikey;

    public function __construct($apiKey = Constants::LAST_FM_API_KEY) {
        $this->apikey = $apiKey;
    }

    public function getTopArtists() {
        $curl = curl_init();
        $response = curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_USERAGENT => "Mozilla/5.0 (X11; Linux x86_64; rv:31.0) Gecko/20100101 Firefox/31.0 Iceweasel/31.8.0",
            CURLOPT_ACCEPT_ENCODING => "gzip, deflate",
            CURLOPT_URL => "http://ws.audioscrobbler.com/2.0/?method=chart.gettopartists&api_key=" . $this->apikey . "&format=json",
        ));
        $resp = curl_exec($curl);
        curl_close($curl);

        $resp = json_decode($resp, true);
        $artists = array();
        if ($resp) {
            if (array_key_exists('artists', $resp)) {
                $artistsJson = $resp['artists']['artist'];
                foreach ($artistsJson as $artistJson) {
                    $artist = new Track();
                    $artist->name = $artistJson['name'];
                    $artist->image = $artistJson['image'][0]['#text'];
                    $artists[] = $artist;
                }
            }
        }
        return $artists;
    }

    public function getTopTracks() {
        $curl = curl_init();
        $response = curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_USERAGENT => "Mozilla/5.0 (X11; Linux x86_64; rv:31.0) Gecko/20100101 Firefox/31.0 Iceweasel/31.8.0",
            CURLOPT_ACCEPT_ENCODING => "gzip, deflate",
            CURLOPT_URL => "http://ws.audioscrobbler.com/2.0/?method=chart.gettoptracks&api_key=" . $this->apikey . "&format=json",
        ));
        $resp = curl_exec($curl);
        curl_close($curl);

        $resp = json_decode($resp, true);
        $tracks = array();
        if ($resp) {
            if (array_key_exists('tracks', $resp)) {
                $tracksJson = $resp['tracks']['track'];
                foreach ($tracksJson as $trackJson) {
                    $track = new Track();
                    $track->name = $trackJson['name'];
                    $track->artistName = $trackJson['artist']['name'];
                    $track->image = $trackJson['image'][0]['#text'];
                    $tracks[] = $track;
                }
            }
        }
        return $tracks;
    }

}
