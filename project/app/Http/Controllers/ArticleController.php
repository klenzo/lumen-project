<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{

    public function list()
    {
        $articles = DB::table('articles')->where('art_statut', 2)->orderBy('art_create', 'desc')->get();
        return view('home', ['articles' => $articles]);
    }

    public function article($slug)
    {
        $article = DB::table('articles')->where([
                        ['art_slug', $slug],
                        ['art_statut', 2]
                    ])->get();
        // dd($article);
        if( isset($article[0]) && !empty( $article[0] ) && $article[0] != null ){
            $article[0]->art_content = nl2br( $article[0]->art_content );
            return view('article', ['article' => $article[0]]);
        }else{
            return view('error404', ['slug' => $slug]);
        }
    }

}
