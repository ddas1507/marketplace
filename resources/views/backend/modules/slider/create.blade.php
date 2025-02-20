@extends('admin.layouts.master')
@section('content')

    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Cadastro de Slide</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Painel de Controle</a></div>
                    <div class="breadcrumb-item active"><a href="{{ route('slider.index') }}">Slide</a></div>
                    <div class="breadcrumb-item">Novo Slide</div>
                </div>
            </div>

            <div class="section-body">

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Criar Slide</h4>

                                <div class="card-header-action">
                                    <a href="" class="btn btn-primary">Ajuda?</a>
                                </div>
                            </div>

                            <div class="card-body">

                                <form action="{{ route('slider.store') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-body">

                                        <div class="row">

                                            <div class="form-group col-md-12 col-12">
                                                <label>Imagem (1380x500)</label>
                                                <input type="file" class="form-control" name="slide_image">
                                            </div>

                                            <div class="form-group col-md-12 col-12">
                                                <label>Titulo do Slide</label>
                                                <input type="text" class="form-control" name="slide_text" placeholder="primeiro o titulo" value="{{old('slide_text')}}">
                                            </div>

                                            <div class="form-group col-md-12 col-12">
                                                <label>Sub-título do Slide</label>
                                                <input type="text" class="form-control" name="slide_subtext" placeholder="segundo o subtitulo" value="{{old('slide_subtext')}}">
                                            </div>

                                            <div class="form-group col-md-6 col-12">
                                                <label>Preço do Slide</label>
                                                <input type="text" class="form-control" name="slide_price" placeholder="adicione o Preço" value="{{old('slide_price')}}">
                                            </div>

                                            <div class="form-group col-md-6 col-12">
                                                <label>Link do Slide</label>
                                                <input type="url" class="form-control" name="slide_link" placeholder="adicionar link" value="{{old('slide_link')}}">
                                            </div>

                                            <div class="form-group col-md-6 col-12">
                                                <label>Ordem</label>
                                                <input type="number" class="form-control" name="slide_ordem" placeholder="ordem de exibição" value="{{old('slide_ordem')}}">
                                            </div>


                                            <div class="form-group col-md-6 col-12">
                                                <label>Status</label>
                                                <select name="slide_status" class="form-control">
                                                    <option value="0">Inativo</option>
                                                    <option value="1">Ativo</option>
                                                </select>

                                            </div>

                                        </div>

                                    </div>

                                    <div class="card-footer text-right">
                                        <button type="submit" class="btn btn-primary">Salvar Slide</button>
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
