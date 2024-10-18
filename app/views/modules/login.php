<div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <img src="../public/img/logo.png" alt="logo" class="img-responsive">
        </div>
        <div class="card-body">
            <p class="login-box-msg h3">¡Bienvenido!</p>
            <p class="login-box-msg h2 font-weight-light"><span class="text-bold">Refaccionaria</span><br>Don Lalo</p>

            <form action="#" method="post">
                <div class="input-group mb-3">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                    <input type="text" class="form-control" placeholder="Nombre de usuario" name="postUser" required>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                    <input type="password" class="form-control" placeholder="Contraseña" id="inputPassword" name="postPassword" required>
                    <div class="input-group-append">
                        <span class="input-group-text btn" id="togglePassword1">
                            <i class="fas fa-eye"></i>
                        </span>
                    </div>
                </div>
                <div class="pt-3">
                    <button type="submit" class="btn btn-primary btn-block">Iniciar Sesión</button>
                </div>

                <?php
                $login = new ControllerUsers();
                $login->ctrAuthUser();
                ?>

            </form>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
<!-- /.login-box -->