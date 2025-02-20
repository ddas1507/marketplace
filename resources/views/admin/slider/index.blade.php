@extends('admin.layouts.master')
@section('content')

    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Slide Destaque Site</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Painel de Controle</a></div>
                    <div class="breadcrumb-item">Slide</div>
                </div>
            </div>

            <div class="section-body">

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Slide Destaque</h4>

                                <div class="card-header-action">
                                    <a href="{{ route('slider.create') }}" class="btn btn-primary">Novo</a>
                                </div>
                            </div>

                            <div class="card-body">
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <td>id</td>
                                        <td>image</td>
                                        <td>text</td>
                                        <td>subtext</td>
                                        <td>price</td>
                                        <td>link</td>
                                        <td>ordem</td>
                                        <td>status</td>
                                    </thead>
                                    <tbody>
                                    @foreach($sliders as $slider)
                                        <tr>
                                            <td>{{ $slider->id }}</td>
                                            <td>{{ $slider->slide_image }}</td>
                                            <td>{{ $slider->slide_text }}</td>
                                            <td>{{ $slider->slide_subtext }}</td>
                                            <td>{{ $slider->slide_price }}</td>
                                            <td>{{ $slider->slide_link }}</td>
                                            <td>{{ $slider->slide_ordem }}</td>
                                            <td>{{ $slider->status }}</td>
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
