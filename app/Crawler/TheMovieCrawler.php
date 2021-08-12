<?php


namespace App\Crawler;
use App\Models\Movie;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;

class TheMovieCrawler
{

    public function getPopular(){
        $config = config('themovie');


        for($i = 1; $i <= $config['limit_page']; $i++){
            // get per page
            $page_current = $i;
            $items = Http::get($config['url']['popuplar'],[
                'api_key' => $config['token'],
                'page' => $page_current
            ])->json();
            if($items && count($items) > 0) {
                foreach($items['results'] as $k => $item){
                    $movieObj = new Movie();
                    $exited = $movieObj->where('themoviedb_id', $item['id'])->first();
                    if(!$exited){
                        $movieObj->adult = $item['adult'];
                        $movieObj->backdrop_path = $item['backdrop_path'];
                        $movieObj->genre_ids = serialize($item['genre_ids']);
                        $movieObj->themoviedb_id = $item['id'];
                        $movieObj->original_language = $item['original_language'];
                        $movieObj->original_title = $item['original_title'];
                        $movieObj->overview = $item['overview'];
                        $movieObj->popularity = $item['popularity'];
                        $movieObj->poster_path = $item['poster_path'];
                        $movieObj->release_date = $item['release_date'];
                        $movieObj->title = $item['title'];
                        $movieObj->video = $item['video'];
                        $movieObj->vote_average = $item['vote_average'];
                        $movieObj->vote_count = $item['vote_count'];
                        $movieObj->save();
                    }
                }
            }

        }
    }

}
