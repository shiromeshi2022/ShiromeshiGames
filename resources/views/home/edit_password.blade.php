@extends('layouts.app_nofooter')

<head>
    <title>パスワード変更【しろめしゲームズ -Shiromeshi Games】</title>
</head>

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    {{ __('パスワード変更') }}
                    <a href="/home/edit"><button class="btn btn-danger">✖︎</button></a>
                </div>

                <div class="card-body">

                    <form method="POST" action="/home/update/{{$user->id}}">
                        @csrf

                        <!-- パスワード変更 -->
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('パスワード') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password"  placeholder="新しいパスワードを入力してください">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">
                                {{ __('パスワード（確認用）') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="確認用に同じものを入力してください">
                            </div>
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('変更する') }}
                                </button>

                            </div>
                        </div>
                    </form>



                </div>
            </div>
        </div>
    </div>
</div>


@endsection
