<?php

namespace App\Http\Controllers;

use App\Http\Repository\Article\ArticleRepositoryInterface;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }  

    private ArticleRepositoryInterface $articleRepository;
    public function __construct(ArticleRepositoryInterface $articleRepository)
    {
        $this->articleRepository = $articleRepository;
    }
    public function index()
    {
        // $article = Article::all();
        $article = $this->articleRepository->all();
        return view('articles.index', compact('article'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Article::create([
        //     'name' => $request->name,
        //     'address' => $request->address,
        // ]);
        $this->articleRepository->create($request->all());
        return redirect()->route('article.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // $data = Article::where('id', $id)->first();
        $data = $this->articleRepository->find($id);
        return view('articles.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // $data = Article::findOrFail($id);
        $data = $this->articleRepository->find($id);
       $this->articleRepository->update($data, $request->all());
        return redirect()->route('article.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
       $this->articleRepository->delete($article);
        return redirect()->route('article.index');
    }
}
