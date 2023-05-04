<?php

namespace App\Http\Controllers\Admin\Blog;

use App\Http\Controllers\Controller;
use App\Models\Articles;
use Illuminate\Http\Request;

class CreateArticleController extends Controller
{
    public function creerArticles(Request $request)
    {

        
        $articles = Articles::create([
            'titre' => $request->titre,
            'textArticle' => $request->textArticle,
            'url_images' => $request->url_images
        ]);

        return response()->json(['message' => $articles], 200);
    }
}
