@extends('layouts.admin')
@section('title', 'プロフィール作成')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 text-end">
                <body style="background-color:MediumTurquoise;">
                <a href="https://b0615c5757084f92b3bce3e655e574c7.vfs.cloud9.ap-northeast-1.amazonaws.com/">TOP</a>
            </div>
        </div>
           <div class="col-md-10 mx-auto"> 
                <h2>アカウント作成</h2>
                <form action="{{ route('admin.profile.create') }}" method="post" enctype="multipart/form-data">

                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2">氏名(name)</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                        </div>
                    </div>
                      <div class="form-group row">
                        <label class="col-md-2">性別(gender)</label>
                        <div class="col-md-10">
                            <input type="radio" name="gender" value="男性です">男性
                            <input type="radio" name="gender" value="女性です">女性
                        </div>
                    </div>
                            <div class="form-group row">
                        <label class="col-md-2">趣味(hobby)</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="hobby" value="{{ old('hobby') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">自己紹介欄(introduction)</label>
                        <div class="col-md-10">
                           
                             <textarea class="form-control" name="introduction" rows="20">{{ old('introduction') }}</textarea>
                         <div class="form-group row">
                         <label class="col-md-2">画像</label>
                             <div class="col-md-10">
                            <input type="file" class="form-control-file" name="image">
                        </div>
                        </div>
                    </div>
                    @csrf
                    <input type="submit" class="btn btn-primary" value="保存">
                </form>
            </div>
        </div>
    </div>
@endsection