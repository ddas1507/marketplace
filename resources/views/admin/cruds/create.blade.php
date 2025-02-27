@extends('admin.layouts.master')
@section('content')

    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Cadastro de CRUD</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Painel de Controle</a></div>
                    <div class="breadcrumb-item active"><a href="{{ route('cruds.index') }}">CRUD</a></div>
                    <div class="breadcrumb-item">Novo CRUD</div>
                </div>
            </div>

            <div class="section-body">

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Criar CRUD</h4>

                                <div class="card-header-action">
                                    <a href="" class="btn btn-primary">Ajuda?</a>
                                </div>
                            </div>

                            <div class="card-body">
                                <form action="{{ route('cruds.store') }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12 col-sm-12 col-md-4">
                                            <ul class="nav nav-pills flex-column" id="myTab4" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active" id="crudconfig-tab" data-toggle="tab" href="#crudconfig" role="tab" aria-controls="crudconfig" aria-selected="true">Configurações do CRUD</a>
                                                </li>
                                                <li class="nav-item mb-3">
                                                    <a class="nav-link" id="fieldsconfig-tab" data-toggle="tab" href="#fieldsconfig" role="tab" aria-controls="fieldsconfig" aria-selected="false">Campos do Formulário</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-8">
                                            <div class="tab-content no-padding" id="myTab2Content">
                                                <div class="tab-pane fade show active" id="crudconfig" role="tabpanel" aria-labelledby="crudconfig-tab">
                                                    <div class="mb-3">
                                                        <label>Nome do CRUD</label>
                                                        <input type="text" name="nome" class="form-control" placeholder="Produtos" value="{{ old('nome') }}" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label>Ambiente</label>
                                                        <select name="environment" class="form-control">
                                                            <option value="Frontend">Front-end</option>
                                                            <option value="Backend">Back-End</option>
                                                        </select>
                                                    </div>

{{--                                                    <div class="mb-3">--}}
{{--                                                        <label>Caminho do Controller</label>--}}
{{--                                                        <input type="text" name="controller_path" class="form-control" placeholder="Produtos" value="{{ old('controller_path') }}" required>--}}
{{--                                                    </div>--}}

{{--                                                    <div class="mb-3">--}}
{{--                                                        <label>Caminho da View</label>--}}
{{--                                                        <input type="text" name="view_path" class="form-control" placeholder="admin.produtos" value="{{ old('view_path') }}" required>--}}
{{--                                                    </div>--}}

{{--                                                    <div class="mb-3">--}}
{{--                                                        <label>Parâmetro da Rota</label>--}}
{{--                                                        <input type="text" name="route_param" class="form-control" placeholder="produtos" value="{{ old('route_param') }}" required>--}}
{{--                                                    </div>--}}
                                                </div>
                                                <div class="tab-pane fade" id="fieldsconfig" role="tabpanel" aria-labelledby="fieldsconfig-tab">
                                                    <div id="fields-container"></div>
                                                    <button type="button" id="add-field" class="btn btn-secondary">Adicionar Campo</button>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="float-right btn btn-outline-success btn-sm">Salvar CRUD</button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
    </div>
    <script>
        document.getElementById('add-field').addEventListener('click', function() {
            let container = document.getElementById('fields-container');
            let index = container.children.length;
            let fieldHTML = `
                <div class="row">
                    <div class="col-12 col-sm-8 col-md-8 mb-3">
                        <label>Nome do Campo</label>
                        <input type="text" name="fields[${index}][name]" class="form-control" required>
                    </div>
                    <div class="col-12 col-sm-4 col-md-4">
                        <label>Tipo do Campo</label>
                        <select name="fields[${index}][type]" class="form-control">
                            <option value="string">Texto</option>
                            <option value="integer">Número</option>
                            <option value="date">Data</option>
                            <option value="boolean">Booleano</option>
                        </select>
                    </div>
                </div>
            `;
            container.insertAdjacentHTML('beforeend', fieldHTML);
        });
    </script>
@endsection
