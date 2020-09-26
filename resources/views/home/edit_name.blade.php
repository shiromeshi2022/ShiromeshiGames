@extends('layouts.app_nofooter')

<head>
    <title>ユーザーネーム変更【しろめしゲームズ -Shiromeshi Games】</title>
</head>

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    {{ __('ユーザーネーム変更') }}
                    <a href="/home/edit"><button class="btn btn-danger">✖︎</button></a>
                </div>

                <div class="card-body">

                    <form method="POST" action="/home/update/{{$user->id}}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('ユーザー名') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
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
