<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('admin.dashboard') }}">SADD</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('admin.dashboard') }}">SADD</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Painel de Controle</li>
            <li class="dropdown active">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Configurações do site</span></a>
                <ul class="dropdown-menu">
                    <li class=active><a class="nav-link" href="{{ route('cruds.index') }}">Cruds</a></li>
                    @foreach($cruds as $crud)
                        @if(!empty($crud->route_param) && Route::has($crud->route_param.".index"))
                            <li><a class="nav-link" href="{{ route($crud->route_param.".index") }}">{{$crud->nome}}</a></li>
                        @endif
                    @endforeach
                </ul>
            </li>
        </ul>

    </aside>
</div>
