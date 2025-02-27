@extends('admin.layouts.master')
@section('content')

    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>CRUD Generator</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Painel de Controle</a></div>
                    <div class="breadcrumb-item">CRUD Generator</div>
                </div>
            </div>

            <div class="section-body">

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>CRUD Generator</h4>

                                <div class="card-header-action">
                                    <a href="{{ route('cruds.create') }}" class="btn btn-primary">Criar Novo CRUD</a>
                                </div>
                            </div>

                            <div class="card-body">
                                <table class="table table-striped table-striped" id="datatables">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nome</th>
                                        <th>Caminho Controller</th>
                                        <th>Caminho View</th>
                                        <th>Ações</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($cruds as $crud)
                                        <tr>
                                            <td>{{ $crud->id }}</td>
                                            <td>{{ $crud->nome }}</td>
                                            <td>{{ $crud->controller_path }}</td>
                                            <td>{{ $crud->view_path }}</td>
                                            <td>
                                                <a href="{{ route('cruds.edit', $crud->id) }}" class="btn btn-outline-warning btn-sm">Gerar</a>
                                                <form action="{{ route('cruds.destroy', $crud->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-outline-danger btn-sm">Excluir</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
    </div>

@endsection
