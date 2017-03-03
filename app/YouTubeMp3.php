<?php

namespace App;

use Unirest;

class YouTubeMp3 extends Mp3 {

    public $videoId;

    public function __construct($videoId) {
        $this->videoId = $videoId;
        $result = file_get_contents("http://www.youtubeinmp3.com/fetch/?format=JSON&video=http://www.youtube.com/watch?v=" . $videoId);
        $result = json_decode($result, true);
        if ($result) {
            $this->duration = $result['length'];
            $result = Unirest\Request::post("https://savedeo.p.mashape.com/download", array(
                        "X-Mashape-Key" => \App\Globals\Constants::MASHAPE_API_KEY
                            ), array(
                        "url" => "https://www.youtube.com/watch?v=" . $videoId
                            )
            );
            $result = json_encode($result->body);
            $response = json_decode($result, true);
            if (array_key_exists('formats', $response)) {
                $formats = $response["formats"];
                foreach ($formats as $format) {
                    if ($format['format'] == "audio only") {
                        $this->downloadURL = $format['url'];
                        break;
                    }
                }
            }
        }
    }

}
