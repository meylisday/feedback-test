@extends('layouts.master')
@section('content')
<div class="row">
    <div class="col col-login mx-auto">
        <div class="text-center mb-6">
            <img src="./demo/brand/tabler.svg" class="h-6" alt="">
        </div>
{{--        @include ('layouts.errors')--}}
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="card-body p-6">
                <div class="card-title">Login to your account</div>
                <div class="form-group">
                    <label class="form-label">Username</label>
                    <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autofocus>
                    @error('username')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label">
                        Password
                    </label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-footer">
                    <button type="submit" class="btn btn-primary btn-block">Sign in</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
