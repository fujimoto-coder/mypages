<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Page;

class PagesController extends Controller

{
    public function index(Request $request)
    {
        
        $cond_title = $request->cond_title;
        $headline = null;
        if ($cond_title != '') {
            // 検索されたら検索結果を取得する
            $posts = Page::whereLike('title', $cond_title)->get();
        } else {
            // それ以外はすべてのニュースを取得する
            $posts = Page::all()->sortByDesc('updated_at');
    
            if (count($posts) > 0) {
                $headline = $posts->shift();
            }
            
        }
        return view('pages.index', ['headline' => $headline,'cond_title' => $cond_title, 'posts' => $posts]);
    }//
    
    public function show_music(Request $request)
    {
        $cond_title = $request->cond_title;
        $headline = null;
        if ($cond_title != '') {
            // 検索されたら検索結果を取得する
            $posts = Page::whereLike('title', $cond_title)->get();// dd('show_music'); 
        } else {
            // それ以外はすべてのニュースを取得する
            $posts = Page::where('genre', 'music')->get()->sortByDesc('updated_at');   
            
        if (count($posts) > 0) {
            $headline = $posts->shift();
        } else {
            $headline = null;
        }
        }

        return view('pages.index', ['headline' => $headline,'cond_title' => $cond_title, 'posts' => $posts]);
    }
    
     public function show_artist(Request $request)
    {
        // dd('show_music');   
          $cond_title = $request->cond_title;
        $headline = null;
        if ($cond_title != '') {
            // 検索されたら検索結果を取得する
            $posts = Page::whereLike('title', $cond_title)->get();// dd('show_music'); 
        } else {
            // それ以外はすべてのニュースを取得する
            $posts = Page::where('genre', 'artist')->get()->sortByDesc('updated_at');   
            
        if (count($posts) > 0) {
            $headline = $posts->shift();
        } else {
            $headline = null;
        }
        }

        return view('pages.index', ['headline' => $headline,'cond_title' => $cond_title, 'posts' => $posts]);
    }
    
      public function show_instrument(Request $request)
    {
        // dd('show_music');   
       $cond_title = $request->cond_title;
        $headline = null;
        if ($cond_title != '') {
            // 検索されたら検索結果を取得する
            $posts = Page::whereLike('title', $cond_title)->get();// dd('show_music'); 
        } else {
            // それ以外はすべてのニュースを取得する
            $posts = Page::where('genre', 'instrument')->get()->sortByDesc('updated_at');   
            
        if (count($posts) > 0) {
            $headline = $posts->shift();
        } else {
            $headline = null;
        }
        }

        return view('pages.index', ['headline' => $headline,'cond_title' => $cond_title, 'posts' => $posts]);
    }
    
        public function show_live(Request $request)
    {
        // dd('show_music');   
        $cond_title = $request->cond_title;
        $headline = null;
        if ($cond_title != '') {
            // 検索されたら検索結果を取得する
            $posts = Page::whereLike('title', $cond_title)->get();// dd('show_music'); 
        } else {
            // それ以外はすべてのニュースを取得する
            $posts = Page::where('genre', 'live')->get()->sortByDesc('updated_at');   
            
        if (count($posts) > 0) {
            $headline = $posts->shift();
        } else {
            $headline = null;
        }
        }

        return view('pages.index', ['headline' => $headline,'cond_title' => $cond_title, 'posts' => $posts]);
    }
    
         public function show_lesson(Request $request)
    {
        // dd('show_music');   
         $cond_title = $request->cond_title;
        $headline = null;
        if ($cond_title != '') {
            // 検索されたら検索結果を取得する
            $posts = Page::whereLike('title', $cond_title)->get();// dd('show_music'); 
        } else {
            // それ以外はすべてのニュースを取得する
            $posts = Page::where('genre', 'lesson')->get()->sortByDesc('updated_at');   
            
        if (count($posts) > 0) {
            $headline = $posts->shift();
        } else {
            $headline = null;
        }
        }

        return view('pages.index', ['headline' => $headline,'cond_title' => $cond_title, 'posts' => $posts]);
    }
    
         public function show_bar(Request $request)
    {
        // dd('show_music');   
        $cond_title = $request->cond_title;
        $headline = null;
        if ($cond_title != '') {
            // 検索されたら検索結果を取得する
            $posts = Page::whereLike('title', $cond_title)->get();// dd('show_music'); 
        } else {
            // それ以外はすべてのニュースを取得する
            $posts = Page::where('genre', 'bar')->get()->sortByDesc('updated_at');   
            
        if (count($posts) > 0) {
            $headline = $posts->shift();
        } else {
            $headline = null;
        }
        }

        return view('pages.index', ['headline' => $headline,'cond_title' => $cond_title, 'posts' => $posts]);
    }
}
