<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Page;

use App\Models\History;

use Carbon\Carbon;

class PagesController extends Controller
{
    //
     public function add()
    {
        return view('admin.pages.create');
    }
    
  public function create(Request $request)
    {
        // admin/news/createにリダイレクトする
        $this->validate($request, Page::$rules);

        $pages = new Page;
        $form = $request->all();

        // フォームから画像が送信されてきたら、保存して、$news->image_path に画像のパスを保存する
        if (isset($form['image'])) {
            $path = $request->file('image')->store('public/image');
            $pages->image_path = basename($path);
        } else {
            $pages->image_path = null;
        }

        // フォームから送信されてきた_tokenを削除する
        unset($form['_token']);
        // フォームから送信されてきたimageを削除する
        unset($form['image']);

        // データベースに保存する
        $pages->fill($form);
        $pages->save();

        return redirect('admin/pages');
    }
 
    public function index(Request $request)
    {
        $cond_title = $request->cond_title;
        if ($cond_title != '') {
            // 検索されたら検索結果を取得する
            $posts = Page::where('title', $cond_title)->get();
        } else {
            // それ以外はすべてのニュースを取得する
            $posts = Page::all();
        }
        return view('admin.pages.index', ['posts' => $posts, 'cond_title' => $cond_title]);
    }

    public function edit(Request $request)
    {
        // News Modelからデータを取得する
        $pages = Page::find($request->id);
        if (empty($pages)) {
            abort(404);
        }
        return view('admin.pages.edit', ['pages_form' => $pages]);
    }

    public function update(Request $request)
    {
        // Validationをかける
        $this->validate($request, Page::$rules);
        // News Modelからデータを取得する
        $pages = Page::find($request->id);
        // 送信されてきたフォームデータを格納する
        $pages_form = $request->all();
        
         if ($request->remove == 'true') {
            $pages_form['image_path'] = null;
        } elseif ($request->file('image')) {
            $path = $request->file('image')->store('public/image');
            $pages_form['image_path'] = basename($path);
        } else {
            $pages_form['image_path'] = $pages->image_path;
        }
        
        unset($pages_form['_token']);

        // 該当するデータを上書きして保存する
        $pages->fill($pages_form)->save();
        
        $history = new History();
        $history->page_id = $pages->id;
        $history->edited_at = Carbon::now();
        $history->save();


        return redirect('admin/pages');
    }
    
     public function delete(Request $request)
    {
        // 該当するNews Modelを取得
        $pages = Page::find($request->id);

        // 削除する
        $pages->delete();

        return redirect('admin/pages/');
    }
}
