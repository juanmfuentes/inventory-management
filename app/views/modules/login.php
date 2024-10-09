<div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <img src="../public/img/logo.png" alt="logo" class="img-responsive">
        </div>
        <div class="card-body">
            <p class="login-box-msg h3">¡Bienvenido!</p>

            <form action="#" method="post">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Nombre de usuario" name="postUser" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" placeholder="Contraseña" name="postPassword" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="pt-3">
                    <button type="submit" class="btn btn-primary btn-block">Iniciar Sesión</button>
                </div>

                <?php
                    $login = new ControllerUsers();
                    $login -> ctrAuthUser();
                ?>

            </form>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
<!-- /.login-box -->