<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ArticlesController extends Controller
{
    public function liste()
    {
        if(Auth::user()->role == 'admin' || Auth::user()->role == 'moder') {
            $articles = Article::all();

            return view("liste", ["articles" => $articles]);
        }

        elseif (Auth::user()->role == 'aut') {
            $articles = Article::where('user_id', Auth::user()->id)->get();
            return view("liste", ["articles" => $articles]);
        }


    }


    public function add(Request $request)
    {

        if ($request->isMethod("post")) {

            $request->validate([
                "title" => "required|min:2|max:30",
                "contenu" => "required|min:2|max:20",
            ]);
            $title = $request->input('title');
            $contenu = $request->input('contenu');
            $article = new Article();
            $article->title = $title;
            $article->contenu = $contenu;
            $article->user_id = Auth::user()->id;
            $article->save();
            return redirect('/articles');
            #return redirect()->action([ArticlesController::class, "liste"]);
        }

        return view("articles");
    }

    public function show($id)
    {
        $article = Article::find($id);
        return view('fiche', compact("article", "id"));
    }

    public function edit(Request $request, $id)
    {
        $article =Article::find($id);
        if ($request->isMethod("POST")) {
            $request->validate([
                "title" => "required|min:1|max:50",
                "contenu" => "required|min:2|max:20",
            ]);
            $title = $request->input('title');
            $contenu = $request->input('contenu');

            $article->title = $title;
            $article->contenu = $contenu;
            $article->save();
            return redirect('/articles');

        }
        return view("articles");
    }

    public function delete(Request $request,$id){
        $article=Article::find($id);
        if($request->isMethod("get")){
            $article->delete();
            return redirect('/articles');
        }
        return view("delete",compact("article","id"));
    }

    public function enable(Request $request,$id){
        $article=Article::find($id);
        $article->status = 'enabled';
        $article->save();
        return redirect('/articles');
    }

    public function disable(Request $request,$id){
        $article=Article::find($id);
        $article->status = 'disabled';
        $article->save();
        return redirect('/articles');
    }

}
