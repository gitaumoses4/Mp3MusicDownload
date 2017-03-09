<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Source;
use App\Globals\Constants;
use App\YouTubeMp3;
use App\RecentSearch;
use DB;
use App\Advertisement;

class SearchController extends Controller {

    public function search(Request $request) {
        $sources = Source::all();
        $recentSearches = RecentSearch::all();
        $query = "";
        $searchSources = array(
            '4s' => 0,
            'ar' => 0,
            'dz' => 0,
            'pd' => 0,
            'sc' => 0,
            'vk' => 0,
            'yd' => 0,
            'yt' => 1);

        if (!$request->has("query")) {
            $resp = "<div class=\"results\"><p>Search query cannot be empty!!. Please try again!</p></div>";
        } else {
            $query = $request->get("query");
            $bestSearches = RecentSearch::orderBy("created_at", 'desc')->get();
            //remove excess queries
            foreach ($recentSearches as $r) {
                $found = false;
                for ($index = 0; $index < MainController::LIMIT && $index < count($bestSearches); $index++) {
                    $b = $bestSearches[$index];
                    if ($b->query == $r->query) {
                        $found = true;
                    }
                }
                if (!$found) {
                    DB::table("recent_searches")->where("query", $r->query)->delete();
                }
            }
            $recentSearches = RecentSearch::all();

            $add = true;

            foreach ($recentSearches as $recent) {
                if ($recent->query == $query) {
                    $add = false;
                }
            }
            if ($add) {
                $recentSearch = new RecentSearch();
                $recentSearch->query = $query;
                $recentSearch->save();
            }
            $names = array(
                '4shared' => '4s',
                'archive' => 'ar',
                'deezer' => 'dz',
                'promodj' => 'pd',
                'soundcloud' => 'sc',
                'vk' => 'vk',
                'yandex' => 'yd',
                'youtube' => 'yt');
            foreach ($names as $name) {
                if ($request->has($name)) {
                    $searchSources[$name] = 1;
                }
            }
            $recentSearches = RecentSearch::all()->sortByDesc("created_at");

            $curlSetUp = curl_init();


            $ch = curl_init('http://www.mp3juices.cc/');
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_HEADER, 1);
            $result = curl_exec($ch);
            preg_match_all('/^Set-Cookie:\s*([^;]*)/mi', $result, $matches);
            $cookies = array();
            foreach ($matches[1] as $item) {
                parse_str($item, $cookie);
                $cookies = array_merge($cookies, $cookie);
            }

            if (array_key_exists('PHPSESSID', $cookies)) {
                $sessionID = $cookies['PHPSESSID'];
                foreach ($names as $searchSource) {
                    $curlSetUp = curl_init();

                    curl_setopt_array($curlSetUp, array(
                        CURLOPT_RETURNTRANSFER => 1,
                        CURLOPT_URL => "http://www.mp3juices.cc/sources.php",
                        CURLOPT_POST => 1,
                        CURLOPT_COOKIE => "PHPSESSID=" . $sessionID . "; _ga=GA1.2.760581986.1488289329; _gat=1",
                        CURLOPT_POSTFIELDS => array(
                            "s" => $searchSource,
                            "p" => $searchSources[$searchSource]
                        )
                    ));
                    $result = curl_exec($curlSetUp);

                    curl_close($curlSetUp);
                }

                $curl = curl_init();

                curl_setopt_array($curl, array(
                    CURLOPT_RETURNTRANSFER => 1,
                    CURLOPT_USERAGENT => "Mozilla/5.0 (X11; Linux x86_64; rv:31.0) Gecko/20100101 Firefox/31.0 Iceweasel/31.8.0",
                    CURLOPT_ACCEPT_ENCODING => "gzip, deflate",
                    CURLOPT_COOKIE => "PHPSESSID=" . $sessionID . "; _ga=GA1.2.760581986.1488289329; _gat=1",
                    CURLOPT_URL => "http://www.mp3juices.cc/search.php?q=" . htmlentities($query),
                    CURLOPT_REFERER => "http://www.mp3juices.cc/",
                ));

                $resp = curl_exec($curl);
                curl_close($curl);

                $resp = substr($resp, 2, strlen($resp) - 2);
                $resp = stripcslashes($resp);

                if (!strstr($resp, "No results.")) {
                    libxml_use_internal_errors(true);
                    $document = new \DOMDocument();
                    $document->loadHTML($resp);
                    $elements = $document->getElementsByTagName("iframe");

                    while ($elements->length > 0) {
                        $p = $elements->item(0);
                        $p->parentNode->removeChild($p);
                    }

                    $paragraphs = $document->getElementsByTagName("p");
                    for ($i = 0; $i < 5; $i++) {
                        $p = $paragraphs->item(0);
                        if ($p && $p->parentNode) {
                            $p->parentNode->removeChild($p);
                        }
                    }
                    $resp = $document->saveHTML();
                }
            } else {
                $resp = "<div class=\"results\"><p>Could not retrieve your search query. Please try again!</p></div>";
            }
            if (strstr($resp, "400 Bad Request")) {
                $resp = "<div class=\"results\"><p>Could not retrieve your search query. Please try again!</p></div>";
            }
        }

        $adverts = array("top", "left", "right", "bottom", "extremeRight");
        $advertisements = array();
        foreach ($adverts as $advert) {
            $advertisements[$advert] = Advertisement::findOrFail($advert);
            $advertisements[$advert]->adId = $advert;
        }
        $data = array("advertisements" => $advertisements, "results" => $resp, "query" => $query, "page" => 'search', "sources" => $sources, "recent_searches" => $recentSearches, "selected_sources" => $searchSources);
        return view("pages.search", $data);
    }

    public function searchYoutube($query) {
        $youtube = new \Madcoda\Youtube\Youtube(array('key' => Constants::YOUTUBE_API_KEY));
        $results = $youtube->search($query, 10);
        $results = json_encode($results);
        $results = json_decode($results, true);
        $mp3s = array();
        if ($results) {
            foreach ($results as $result) {
                if (array_key_exists('videoId', $result['id']) && array_key_exists('title', $result['snippet'])) {
                    $audio = new YouTubeMp3($result['id']['videoId']);
                    $audio->title = $result['snippet']['title'];
                    $mp3s[] = $audio;
                }
            }
        }
        return $mp3s;
    }

}
