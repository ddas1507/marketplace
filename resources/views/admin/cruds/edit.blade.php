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

                                <form action="{{ route('cruds.update', $crud->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')

                                    <div class="mb-3">
                                        <label>Nome do CRUD</label>
                                        <input type="text" name="nome" class="form-control" value="{{ $crud->nome }}" required>
                                    </div>

                                    <div class="mb-3">
                                        <label>Caminho do Controller</label>
                                        <input type="text" name="controller_path" class="form-control" value="{{ $crud->controller_path }}" required>
                                    </div>

                                    <div class="mb-3">
                                        <label>Caminho da View</label>
                                        <input type="text" name="view_path" class="form-control" value="{{ $crud->view_path }}" required>
                                    </div>

                                    <div class="mb-3">
                                        <label>Parâmetro da Rota</label>
                                        <input type="text" name="route_param" class="form-control" value="{{ $crud->route_param }}" required>
                                    </div>

                                    <h4>Campos do Formulário</h4>
                                    <div id="fields-container"></div>
                                    <button type="button" id="add-field" class="btn btn-secondary">Adicionar Campo</button>


                                    <textarea name="fields" class="btn btn-secondary" required>{{ $crud->fields }}</textarea>

                                    <br><br>
                                    <button type="submit" class="btn btn-success">Atualizar</button>
                                </form>

                                <a href="{{ route('cruds.index') }}">Voltar</a>

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
                <div class="mb-3">
                    <label>Nome do Campo</label>
                    <input type="text" name="fields[${index}][name]" class="form-control" required>

                    <label>Tipo do Campo</label>
                    <select name="fields[${index}][type]" class="form-control">
                        <option value="string">Texto</option>
                        <option value="integer">Número</option>
                        <option value="date">Data</option>
                        <option value="boolean">Booleano</option>
                    </select>
                </div>
            `;
            container.insertAdjacentHTML('beforeend', fieldHTML);
        });
    </script>
@endsection
