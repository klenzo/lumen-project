<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{

    public function list()
    {
        $articles = DB::table('articles')
                    ->join('categories', 'articles.art_category', '=', 'categories.cat_id')
                    ->leftJoin('images', 'articles.art_image', '=', 'images.img_id')
                    ->where('art_statut', 2)
                    ->orderBy('art_create', 'desc')
                    ->get();
        return view('home', ['articles' => $articles]);
    }

    public function article($slug)
    {
        $article = DB::table('articles')->where([
                        ['art_slug', $slug],
                        ['art_statut', 2]
                    ])->first();
        if( isset($article) && !empty( $article ) && $article != null ){
            $id = $article->art_id;
            $cat = $article->art_category;
            $img = $article->art_image;

            $category = DB::table('categories')->where('cat_id', $cat)->first();
            $image = DB::table('images')->where('img_id', $img)->first();

            $article->art_content = nl2br( $article->art_content );

            $next = $this->nextArticle($id);
            $previous = $this->previousArticle($id);

            return view('article', ['article' => $article, 'category' => $category, 'image' => $image, 'next' => $next, 'previous' => $previous]);
        }else{
            return view('error404', ['slug' => $slug]);
        }
    }

    public function category($slug)
    {
        $articles = DB::table('articles')
                    ->join('categories', 'articles.art_category', '=', 'categories.cat_id')
                    ->leftJoin('images', 'articles.art_image', '=', 'images.img_id')
                    ->where([
                        ['art_statut', 2],
                        ['cat_slug', $slug],
                    ])
                    ->orderBy('art_create', 'desc')
                    ->get();

        return view('home', ['title' => $articles[0]->cat_name,'articles' => $articles]);
    }

    private function nextArticle($id){
        return DB::table('articles')->where('art_id', '>', $id)->orderBy('art_create','asc')->first();
    }
    private  function previousArticle($id){
        return DB::table('articles')->where('art_id', '<', $id)->orderBy('art_create','desc')->first();
    }


}
