<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="home" class="nav-link">Inicio</a>
        </li>
    </ul>

    <!-- User panel -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" role="button">
                <div class="d-flex justify-content-center align-items-center">
                    <i class="fas fa-user mr-2"></i>
                    <p href="#" class="text-secondary m-0"> <?php echo $_SESSION["user"];?></p>
                </div>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <div class="user-panel py-3 d-flex justify-content-center">
                    <div class="image">
                        <img src="../public/img/logo.png" class="img-circle elevation-2" alt="User">
                    </div>
                    <div class="info">
                        <p href="#" class="d-block text-secondary"> <?php echo $_SESSION["user"]; ?></p>
                    </div>
                </div>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-edit mr-2"></i> Editar perfil
                </a>
                <div class="dropdown-divider"></div>
                <a href="logout" class="dropdown-item">
                    <i class="fas fa-sign-out-alt mr-2"></i> Cerrar Sesión
                </a>
            </div>
        </li>
    </ul>

</nav>
<!-- /.navbar -->