<?php


namespace App\Repository;


use App\Models\Movie;
use League\Flysystem\Config;

class TheMovieRepository implements TheMovieRepositoryInterface
{
    private $model;

    public function __construct()
    {
        $this->model = new Movie();
    }

    public function getListWithPagination($params){
        $arrShow = config('themovie.show');
        $items = $this->model->select("*");

        switch ($params['sort']){
            case 'pop_des':
                $items->orderBy('popularity', 'desc');
                break;
            case 'pop_asc':
                $items->orderBy('popularity', 'asc');
                break;
            case 'rate_des':
                $items->orderBy('vote_count', 'desc');
                break;
            case 'rate_asc':
                $items->orderBy('vote_count', 'asc');
                break;
            case 'release_des':
                $items->orderBy('release_date', 'desc');
                break;
            case 'release_asc':
                $items->orderBy('release_date', 'asc');
                break;
            case 'a_z':
                $items->orderBy('title', 'asc');
                break;
            case 'z_a':
                $items->orderBy('title', 'desc');
                break;
            default :
                $items->orderBy('popularity', 'desc');
        }
        if(in_array($params['show'], $arrShow)){
            $items = $items->paginate($params['show']);
        }else{
            $items = $items->paginate(10);
        }

        return $items;
    }

    public function getById($id)
    {
       $item = $this->model->findOrFail($id);
       return $item;
    }
}
