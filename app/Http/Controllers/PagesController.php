<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Page;

class PagesController extends Controller

{
    public function index(Request $request)
    {
        $posts = Page::all()->sortByDesc('updated_at');

        if (count($posts) > 0) {
            $headline = $posts->shift();
        } else {
            $headline = null;
        }

        // news/index.blade.php ファイルを渡している
        // また View テンプレートに headline、 posts、という変数を渡している
        return view('pages.index', ['headline' => $headline, 'posts' => $posts]);
    }//
    
    public function show_music(Request $request)
    {
        // dd('show_music');   
        $posts = Page::where('genre', 'music')->get();
        if (count($posts) > 0) {
            $headline = $posts->shift();
        } else {
            $headline = null;
        }

        return view('pages.index', ['headline' => $headline, 'posts' => $posts]);
    }
    
     public function show_artist(Request $request)
    {
        // dd('show_music');   
        $posts = Page::where('genre', 'artist')->get();
        if (count($posts) > 0) {
            $headline = $posts->shift();
        } else {
            $headline = null;
        }

        return view('pages.index', ['headline' => $headline, 'posts' => $posts]);
    }
    
      public function show_instrument(Request $request)
    {
        // dd('show_music');   
        $posts = Page::where('genre', 'instrument')->get();
        if (count($posts) > 0) {
            $headline = $posts->shift();
        } else {
            $headline = null;
        }

        return view('pages.index', ['headline' => $headline, 'posts' => $posts]);
    }
    
        public function show_live(Request $request)
    {
        // dd('show_music');   
        $posts = Page::where('genre', 'live')->get();
        if (count($posts) > 0) {
            $headline = $posts->shift();
        } else {
            $headline = null;
        }

        return view('pages.index', ['headline' => $headline, 'posts' => $posts]);
    }
    
         public function show_lesson(Request $request)
    {
        // dd('show_music');   
        $posts = Page::where('genre', 'lesson')->get();
        if (count($posts) > 0) {
            $headline = $posts->shift();
        } else {
            $headline = null;
        }

        return view('pages.index', ['headline' => $headline, 'posts' => $posts]);
    }
    
         public function show_bar(Request $request)
    {
        // dd('show_music');   
        $posts = Page::where('genre', 'bar')->get();
        if (count($posts) > 0) {
            $headline = $posts->shift();
        } else {
            $headline = null;
        }

        return view('pages.index', ['headline' => $headline, 'posts' => $posts]);
    }
}
