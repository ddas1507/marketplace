@extends('admin.layouts.master')
@section('content')

    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Geral</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Painel de Controle</a></div>
                    <div class="breadcrumb-item">Configurações</div>
                </div>
            </div>

            <div class="section-body">
                <div class="row mt-sm-4">

                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <form action="{{ route('general.update',$general->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="card-body">

                                    <div class="row">

                                        <div class="form-group col-md-12 col-12">
                                            <label>Alterar Logo</label>
                                            <input type="file" class="form-control" name="store_logo">
                                        </div>

                                        <div class="form-group col-md-12 col-12">
                                            <label>Nome da Loja</label>
                                            <input type="text" class="form-control" name="store_nome_loja" value="{{$general->store_nome_loja}}" required placeholder="Digite o nome da loja">
                                        </div>

                                        <div class="form-group col-md-12 col-12">
                                            <label>Nome Fantasia</label>
                                            <input type="text" class="form-control" name="store_nome_fantasia" value="{{$general->store_nome_fantasia}}" required placeholder="Digite o nome fantasia da loja">
                                        </div>

                                        <div class="form-group col-md-12 col-12">
                                            <label>Informações do Rodapé</label>
                                            <input type="text" class="form-control" name="footer_info" value="{{$general->footer_info}}" required placeholder="Digite as informações do rodapé">
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
