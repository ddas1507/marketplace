@extends('layouts.app')
@section('content')
<div id="app">
    <section class="section">
        <div class="container mt-5">
            <div class="row">
                <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                    <div class="login-brand">
                        <center><img src="{{ asset('backend/assets/img/sadd.png') }}" alt="logo" width="50%" class=""></center>
                    </div>

                    <div class="card card-primary">
                        <div class="card-header"><h4>Recuperar Senha</h4></div>
                        @if(session('status'))
                            <p class="alert-warning">
                                Você recebá um email com um link para recuperar a sua senha!
                            </p>
                        @endif

                        <div class="card-body">
                            <form action="{{ route('password.email') }}" class="needs-validation" method="post"  novalidate="">
                                @csrf
                                <div class="form-group">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus placeholder="seu email">
                                    @if($errors->get('email'))
                                        <code>{{$errors->first('email')}}</code>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">Recuperar</button>
                                </div>
                                <p><a href="{{ route('admin.login') }}">Voltar para o Login</a></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
@endsection
