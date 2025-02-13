@extends('layouts.app')
@section('content')
<div id="app">
    <section class="section">
        <div class="container mt-5">
            <div class="row">
                <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                    <div class="login-brand">
                        <img src="{{ asset('backend/assets/img/sadd.png') }}" alt="logo" width="50%" class="m-auto">
                    </div>

                    <div class="card card-primary">
                        <div class="card-header"><h4>Login Administrativo</h4></div>

                        <div class="card-body">
                            <form action="{{ route('login') }}" class="needs-validation" method="post"  novalidate="">
                                @csrf
                                <div class="form-group">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus placeholder="seu email">
                                    @if($errors->has('email'))
                                        <code>{{$errors->first('email')}}</code>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <div class="d-block">
                                        <div class="float-right">
                                            @if (Route::has('admin.forgotpassword'))
                                                <a href="{{ route('admin.forgotpassword') }}" class="text-small">Esqueceu a senha?</a>
                                            @endif
                                        </div>
                                    </div>
                                    <input id="password" type="password" class="form-control" name="password" tabindex="2" value="{{ old('password') }}" required placeholder="sua senha">
                                    @if($errors->has('password'))
                                        <code>{{$errors->first('password')}}</code>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me">
                                        <label class="custom-control-label" for="remember-me">Lembrar da Senha</label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">Entrar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
@endsection
