@php
    $general = \App\Models\Backend\System\General::first();
@endphp
<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('admin.dashboard') }}">
                <img src="{{ $general->store_logo ? asset($general->store_logo) : asset('backend/assets/img/default.png') }}" class="m-auto img-thumbnail" title="" alt="" style="width: 128px; height: auto; object-fit: cover; border: 0px;">
            </a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('admin.dashboard') }}">MP</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Sistema</li>
            <li class="dropdown active">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Configurações</span></a>
                <ul class="dropdown-menu">
                    <li class=""><a class="nav-link" href="{{ route('general.index') }}">Geral</a></li>
{{--                    <li class="active"><a class="nav-link" href="{{ route('slider.index') }}">Header Slider</a></li>--}}
{{--                    <li><a class="nav-link" href="index.html">Ecommerce Dashboard</a></li>--}}
                </ul>
            </li>
        </ul>

    </aside>
</div>
