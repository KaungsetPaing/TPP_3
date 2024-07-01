<?php

namespace App\Http\Repository\Article;

use App\Models\Article;





class ArticleRepository implements ArticleRepositoryInterface
{
    public function all()
    {
        return Article::all();
    }

    public function create($data)
    {
        return Article::create($data);
    }

    public function find($id)
    {
        return Article::find($id);
    }
    public function update(Article $article, array $data)
    {
        return $article->update($data);
      
    }
    public function delete(Article $article)
    {
        return $article->delete();
        
    }

  

  
}
