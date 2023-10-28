<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Article;

class ArticleController extends Controller
{
    public function index(){
        return view('admin.article.index');
    }

    public function showArticleList(){
        $data = Article::with('articlePublications')->latest()->get(); 
        return response()->json($data);

    }
}
