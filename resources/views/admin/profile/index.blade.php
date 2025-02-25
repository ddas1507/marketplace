@extends('admin.layouts.master')
@section('content')

    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Perfil</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Painel de Controle</a></div>
                    <div class="breadcrumb-item">Perfil</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Olá, {{ Auth::user()->name }}</h2>
                <div class="row mt-sm-4">

                    <div class="col-12 col-md-12 col-lg-7">
                        <div class="card">
                            <form action="{{ route('admin.profile.update') }}" method="post" enctype="multipart/form-data">
                                @csrf

                                <div class="card-header">
                                    <h4>Atualizar Perfil</h4>
                                </div>
                                <div class="card-body">

                                    <div class="row">

                                        <div class="col-md-12 col-12">
                                            @if(Auth::user()->image != null)
                                                <img src="{{ asset(Auth::user()->image) }}" class="img-thumbnail rounded-circle mr-1" title="{{ Auth::user()->name }}" alt="{{ Auth::user()->name }}" style="width: 80px; height: auto; object-fit: cover;">
                                            @else
                                                <img src="{{ asset('backend/assets/img/avatar/avatar-1.png') }}" class="img-thumbnail rounded-circle mr-1" title="{{ Auth::user()->name }}" alt="{{ Auth::user()->name }}" style="width: 80px; height: auto; object-fit: cover;">
                                            @endif
                                        </div>
                                        <div class="form-group col-md-12 col-12">

                                            <label>Foto de Perfil</label>
                                            <input type="file" class="form-control" name="image">
                                        </div>

                                        <div class="form-group col-md-6 col-12">
                                            <label>Nome</label>
                                            <input type="text" class="form-control" name="name" value="{{ Auth::user()->name}}" required placeholder="Digite o seu nome">
                                            <div class="invalid-feedback">
                                                Please fill in the first name
                                            </div>
                                        </div>

                                        <div class="form-group col-md-6 col-12">
                                            <label>Email</label>
                                            <input type="email" class="form-control" name="email" value="{{ Auth::user()->email }}" required placeholder="Digite o seu email">
                                            <div class="invalid-feedback">
                                                Please fill in the email
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-footer text-right">
                                    <button type="submit" class="btn btn-primary">Salvar</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="col-12 col-md-12 col-lg-7">

                        <div class="card">
                            <form action="{{ route('admin.profile.password') }}" method="post" enctype="multipart/form-data">
                                @csrf

                                <div class="card-header">
                                    <h4>Atualizar Senha</h4>
                                </div>
                                <div class="card-body">

                                    <div class="row">
                                        <div class="form-group col-md-6 col-12">
                                            <label>Senha Atual</label>
                                            <input type="password" class="form-control" name="current_password" placeholder="Digite sua senha atual">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-6 col-12">
                                            <label>Nova Senha</label>
                                            <input type="password" class="form-control" name="password" placeholder="Digite uma nova senha com minimo 8 digitos">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-6 col-12">
                                            <label>Confirme sua senha</label>
                                            <input type="password" class="form-control" name="password_confirmation" placeholder="Confirme sua senha">
                                        </div>
                                    </div>

                                </div>

                                <div class="card-footer text-right">
                                    <button type="submit" class="btn btn-primary">Salvar</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>

        </section>
    </div>
@endsection
