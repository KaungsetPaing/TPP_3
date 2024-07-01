<?php

namespace App\Http\Repository\Article;

use App\Models\Article;


interface ArticleRepositoryInterface
{
    public function all();

    public function create($data);

    public function find($id);

    public function update(Article $article, array $data);
    public function delete(Article $article);
}