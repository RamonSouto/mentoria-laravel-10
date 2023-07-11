<div class="sidebar border border-right col-md-3 col-lg-2  bg-body-tertiary">
    <div class="offcanvas-lg offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="sidebarMenuLabel">GESTAO</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dashboard.index')}}">
                        <span data-feather="home" class="align-text-bottom"></span>
                        Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('vendas.index') }}">
                        <span data-feather="file" class="align-text-bottom"></span>
                        Venda
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('produtos.index') }}">
                        <span data-feather="shopping-cart" class="align-text-bottom"></span>
                        Produto
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('clientes.index')}}">
                        <span data-feather="users" class="align-text-bottom"></span>
                        Clientes
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('usuario.index') }}">
                        <span data-feather="users" class="align-text-bottom"></span>
                        Usuario
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>