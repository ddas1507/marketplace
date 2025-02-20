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
                                @foreach($sliders as $slider)
                                    <li>{{ $slider->slide_image }}</li>
                                    <li>{{ $slider->slide_text }}</li>
                                    <li>{{ $slider->slide_subtext }}</li>
                                    <li>{{ $slider->slide_price }}</li>
                                    <li>{{ $slider->slide_link }}</li>
                                    <li>{{ $slider->slide_ordem }}</li>
                                    <li>{{ $slider->status }}</li>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
    </div>

@endsection
