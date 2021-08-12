<?php

namespace App\Http\Controllers;

use App\Repository\TheMovieRepository;
use App\Repository\TheMovieRepositoryInterface;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $path_view = 'frontend.movies.';

    public function __construct(){
        $config = config('themovie');
        return view()->share('_config' , $config);
    }

    public function index(Request $request, TheMovieRepositoryInterface $movieRepository){

        $params = $request->all();
        $params['sort'] = isset($params['sort']) ? $params['sort'] : 'pop_des';
        $params['show'] = isset($params['show']) ? $params['show'] : 10;

        $data['movies'] = $movieRepository->getListWithPagination($params);
        $data['params'] = $params;
        return view($this->path_view . 'index')->with($data);

    }

    public function show(TheMovieRepositoryInterface $movieRepository, $id){

        $data['movie'] =$movieRepository->getById($id);

        return view($this->path_view . 'show')->with($data);
    }

}
