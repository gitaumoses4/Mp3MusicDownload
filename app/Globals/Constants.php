<?php

namespace App\Globals;

/**
 * Description of Constants
 *
 * @author root
 */
class Constants {

    const SITE_TITLE = "Mp3 Downloader - Download mp3 music for free";
    const SITE_NAME = "Mp3 Downloader";
    const YOUTUBE_API_KEY = "AIzaSyDsZJc0URhEuwu7nGFoPbjLWcMqn6vzWHE";
    const MASHAPE_API_KEY = "cfJNh1d4JCmshbXa1ApsBLsdKUt7p171eeZjsnjwfgrBQF2hJs";
    const WEBSITE_URL = "www.mp3downloader.com";
    const LAST_FM_API_KEY = "8b9f6da917108c05e1ccf206ba2ec736";

    public function siteTitle() {
        echo Constants::SITE_TITLE;
    }

    public function siteName() {
        return Constants::SITE_NAME;
    }

    public function youTubeAPIKey() {
        return Constants::YOUTUBE_API_KEY;
    }

    public function mashapeAPIKey() {
        return Constants::MASHAPE_API_KEY;
    }

    public function lastFmAPIKey() {
        return Constants::LAST_FM_API_KEY;
    }

}
