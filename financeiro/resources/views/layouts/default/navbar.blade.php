<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-gradient-primary" id="sidenav-main">
    <div class="container-fluid">
        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Abrir navegação">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Brand -->
        <a class="navbar-brand pt-0" href="{{ route('dashboard') }}">
            <img src="{{ asset('img/cf-logo.png') }}" class="navbar-brand-img" alt="...">
        </a>
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
            <!-- Form -->
            {{-- <form class="mt-4 mb-3 d-md-none">
                <div class="input-group input-group-rounded input-group-merge">
                    <input type="search" class="form-control form-control-rounded form-control-prepended" placeholder="Search" aria-label="Search">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <span class="fa fa-search"></span>
                        </div>
                    </div>
                </div>
            </form> --}}
            <!-- Navigation -->
            @php
                $uri_1 = request()->segment(2);
                $uri_2 = request()->segment(3);
            @endphp
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class=" nav-link {{ ($uri_1 == '') ? 'active' : '' }} text-white" href="{{ route('dashboard') }}">
                        <i class="fas fa-chart-bar"></i> Início
                    </a>
                    <a class=" nav-link {{ ($uri_1 == '') ? 'active' : '' }} text-white" href="{{ route('contas.index') }}">
                        <i class="fa fa-bars"></i> Contas Bancárias
                    </a>
                    <a class=" nav-link {{ ($uri_1 == '') ? 'active' : '' }} text-white" href="{{ route('receitas.index') }}">
                        <i class="fa fa-arrow-up"></i> Receitas
                    </a>
                    <a class=" nav-link {{ ($uri_1 == '') ? 'active' : '' }} text-white" href="{{ route('despesas.index') }}">
                        <i class="fa fa-arrow-down"></i> Despesas
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
