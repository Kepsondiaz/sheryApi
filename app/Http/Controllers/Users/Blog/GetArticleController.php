<?php

namespace App\Http\Controllers\Users\Blog;

use App\Http\Controllers\Controller;
use App\Models\Articles;
use Illuminate\Http\Request;

class GetArticleController extends Controller
{
    public function voirArticles()
    {
        $articles = Articles::get(); 
        if(count($articles)===0){
            return response()->json(['message' => 'aucune données disponibles'], 403);
        }
        return response()->json(['message' => $articles], 200);
        
    }

    public function voirUnArticle($id)
    {
        $articles = Articles::where('id', $id)->get();
        if(count($articles)===0){
            return response()->json(['message' => 'Cette Article existe pas'], 403);
        }
        
        return response()->json(['message' => $articles], 200);
    }
}


