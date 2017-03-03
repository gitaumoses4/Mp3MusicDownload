<?php

namespace App\Http\Controllers;

use App\Source;
use Illuminate\Routing\Controller as BaseController;
use App\RecentSearch;
use App\MusicInfo;

class MainController extends BaseController {

    const searchSources = array(
        '4s' => 0,
        'ar' => 0,
        'dz' => 0,
        'pd' => 0,
        'sc' => 1,
        'vk' => 0,
        'yd' => 0,
        'yt' => 1);
    const LIMIT = 50;
    const POPULAR_MUSIC_MAX = 20;
    const POPULAR_ARTISTS_MAX = 20;

    public $tmusicInfo;

    public function __construct() {
        $this->musicInfo = new MusicInfo();
        $this->mp3sources = Source::all();
        $this->popularMusic = $this->musicInfo->getTopTracks();
        $this->popularArtists = $this->musicInfo->getTopArtists();
        $this->recentSearches = RecentSearch::limit(MainController::LIMIT)->offset(0)->get()->sortByDesc("created_at");
    }

    public function index() {
        $data = array(
            "page" => "index",
            "recent_searches" => $this->recentSearches,
            "selected_sources" => MainController::searchSources,
            "popular_music" => array_slice($this->popularMusic, 0, MainController::POPULAR_MUSIC_MAX),
            "sources" => $this->mp3sources,
            "popular_artists" => array_slice($this->popularArtists, 0, MainController::POPULAR_ARTISTS_MAX));
        $view = view("pages.index", $data);

        return response($view);
    }

    public function about() {
        $data = array(
            "page" => "about",
            "recent_searches" => $this->recentSearches,
            "selected_sources" => MainController::searchSources,
            "sources" => $this->mp3sources,);
        return view("pages.about", $data);
    }

    public function privacy() {
        $data = array(
            "page" => "privacy",
            "recent_searches" => $this->recentSearches,
            "selected_sources" => MainController::searchSources,
            "sources" => $this->mp3sources,);
        return view("pages.privacy", $data);
    }

    public function howto() {
        $data = array(
            "page" => "howto",
            "recent_searches" => $this->recentSearches,
            "selected_sources" => MainController::searchSources,
            "sources" => $this->mp3sources,);
        return view("pages.howto", $data);
    }

    public function topArtists() {
        $data = array(
            "page" => "topartists",
            "recent_searches" => $this->recentSearches,
            "selected_sources" => MainController::searchSources,
            "sources" => $this->mp3sources,
            "popular_artists" => $this->popularArtists);
        return view("pages.top_artists", $data);
    }

    public function popularMusic() {
        $data = array(
            "page" => "popularmusic",
            "recent_searches" => $this->recentSearches,
            "selected_sources" => MainController::searchSources,
            "popular_music" => $this->popularMusic,
            "sources" => $this->mp3sources,
            "popular_artists" => $this->popularArtists);
        return view("pages.popular_music", $data);
    }

    public function dmca() {
        $data = array(
            "page" => "dmca",
            "recent_searches" => $this->recentSearches,
            "selected_sources" => MainController::searchSources,
            "sources" => $this->mp3sources,);
        return view("pages.dmca", $data);
    }

    public function editSources() {
        $data = array(
            "page" => "editSources",
            "recent_searches" => $this->recentSearches,
            "selected_sources" => MainController::searchSources,
            "sources" => $this->mp3sources,);
        return view("pages.edit_sources", $data);
    }

}
