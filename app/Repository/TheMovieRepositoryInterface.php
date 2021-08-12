<?php

namespace App\Repository;

interface TheMovieRepositoryInterface
{
    public function getListWithPagination(array $params);

    public function getById($id);
}
