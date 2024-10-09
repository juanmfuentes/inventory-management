<!-- Main Sidebar Container -->
<aside class="main-sidebar main-sidebar-custom sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="home" class="brand-link">
        <img src="../public/img/logo.png" alt="Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">Refaccionaria</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent nav-legacy nav-collapse-hide-child" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="home" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="search" class="nav-link">
                        <i class="nav-icon fas fa-search"></i>
                        <p>
                            Búsqueda
                        </p>
                    </a>
                </li>

                <li class="nav-header">GESTIÓN</li>

                <li class="nav-item">
                    <a href="products" class="nav-link">
                        <i class="nav-icon fas fa-archive"></i>
                        <p>
                            Productos
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link">
                        <i class="nav-icon fas fa-shopping-bag"></i>
                        <p>
                            Ventas
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="sales/new-sale" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Nueva venta</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="sales/manage-sales" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Administrar ventas</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="sales/sales-report" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Reporte de ventas</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="customers" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Clientes
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="suppliers" class="nav-link">
                        <i class="nav-icon fas fa-truck"></i>
                        <p>
                            Proveedores
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="brands" class="nav-link">
                        <i class="nav-icon fas fa-tags"></i>
                        <p>
                            Marcas
                        </p>
                    </a>
                </li>

                <li class="nav-header">ADMINISTRACIÓN</li>

                <li class="nav-item">
                    <a href="users" class="nav-link">
                        <i class="nav-icon fas fa-user-friends"></i>
                        <p>Usuarios</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="roles" class="nav-link">
                        <i class="nav-icon fas fa-shield-alt"></i>
                        <p>Roles</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->

    <div class="sidebar-custom">
        <ul class="nav nav-sidebar flex-column">
            <li class="nav-item">
                <a href="#" class="btn btn-danger btn-block">
                    <i class="nav-icon fas fa-sign-out-alt"></i>
                </a>
            </li>
        </ul>
    </div>
    <!-- /.sidebar-custom -->
</aside>