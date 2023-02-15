@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                     <a href="https://b0615c5757084f92b3bce3e655e574c7.vfs.cloud9.ap-northeast-1.amazonaws.com/">トップへ</a></li>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
