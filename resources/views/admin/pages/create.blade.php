@extends('layouts.admin')
@section('title', 'MYページの新規作成')

@section('content')
<body style="background-color:Black;">
    <div class="container">
        <div class="row">
            <div class="col-md-10 text-end">
                <a href="https://mypages.mydns.jp/"　role="button" class="btn btn-primary">トップ</a>
                <a href="https://mypages.mydns.jp/admin/pages"　role="button" class="btn btn-primary">編集</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 mx-auto">
               
                   
                <h2>ページ新規作成</h2>
               
                <form action="{{ route('admin.pages.create') }}" method="post" enctype="multipart/form-data">

                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2">タイトル</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">本文</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="body" rows="20">{{ old('body') }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">ジャンル選択</label>
                        <div class="col-md-10">
                            <select name='genre'>
                                <option value='music'>音楽</option>
                                <option value='artist'>アーティスト</option>
                                <option value='live'>ライブ/コンサート</option>
                                <option value='lesson'>レッスン</option>
                                <option value='instrument'>楽器</option>
                                <option value='bar'>ミュージックバー/レストラン</option>
                                <option value='operation'>運営</option>
                            </select>
                        </div>
                    <div class="form-group row">
                        <label class="col-md-2">画像</label>
                        <div class="col-md-10">
                            <input type="file" class="form-control-file" name="image">
                        </div>
                    </div>
                    @csrf
                    <input type="submit" class="btn btn-primary" value="投稿">
                </form>
            </div>
        </div>
    </div>
</body>
@endsection