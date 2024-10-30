<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Usuarios</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="home">Inicio</a></li>
                        <li class="breadcrumb-item active">Usuarios</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary card-outline">
                        <div class="card-header d-flex justify-content-end">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalAddUser">
                                <i class="fas fa-plus-circle pr-2"></i> Crear usuario
                            </button>
                        </div>
                        <div class="card-body pad">
                            <table class="table table-bordered table-striped tables">
                                <thead>
                                    <tr>
                                        <th style="width:10px">ID</th>
                                        <th>Usuario</th>
                                        <th>Nombre Completo</th>
                                        <th>Rol</th>
                                        <th>Último inicio de sesión</th>
                                        <th>Estado</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php

                                    $item = null;
                                    $value = null;

                                    $users = ControllerUsers::ctrShowUsers($item, $value);
                                    foreach ($users as $key => $value) {

                                        $timestamp = strtotime($value["last_login"]);
                                        if ($timestamp === false) {
                                            $lastLogin = "Acceso no registrado";
                                        } else {
                                            $lastLogin = date('d \d\e F \d\e Y\, \a \l\a\s H:i:s', strtotime($value["last_login"]));
                                            $months = ['January' => 'Enero', 'February' => 'Febrero', 'March' => 'Marzo', 'April' => 'Abril', 'May' => 'Mayo', 'June' => 'Junio', 'July' => 'Julio', 'August' => 'Agosto', 'September' => 'Septiembre', 'October' => 'Octubre', 'November' => 'Noviembre', 'December' => 'Diciembre'];
                                            $lastLogin = str_replace(array_keys($months), array_values($months), $lastLogin);
                                        }

                                        echo '<tr>
                                        <td>' . ($key + 1) . '</td>
                                        <td>' . $value["user"] . '</td>
                                        <td>' . $value["first_name"] . ' ' . $value["last_name"] . '</td>';

                                        $item = "id";
                                        $valueRol = $value["rol"];

                                        $rol = ControllerRoles::ctrShowRoles($item, $valueRol);

                                        echo '
                                        <td> ' . $rol["name"] . '</td>
                                        <td>' . $lastLogin . '</td>';

                                        if ($value["status"] != 0) {
                                            echo '<td>
                                            <button type="button" class="btn btn-sm btnActivate btn-success btn-block" idUser="' . $value["id"] . '" statusUser="0">
                                                Activado
                                            </button>
                                        </td>';
                                        } else {
                                            echo '<td>
                                            <button type="button" class="btn btn-sm btnActivate btn-danger btn-block" idUser="' . $value["id"] . '"  statusUser="1">
                                                Desactivado
                                            </button>
                                        </td>';
                                        };

                                        echo '
                                        <td>
                                            <div class="btn-group d-flex">
                                                <button type="button" class="btn btn-sm btn-warning btnEditUser" idUser="' . $value["id"] . '" 
                                                data-toggle="modal" data-target="#modalEditUser" style="color:white;">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <button type="button" class="btn btn-sm btn-danger btnDeleteUser" idUser="' . $value["id"] . '">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>';
                                    }

                                    ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>Usuario</th>
                                        <th>Nombre Completo</th>
                                        <th>Rol</th>
                                        <th>Último inicio de sesión</th>
                                        <th>Estado</th>
                                        <th>Acciones</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Modal Add User -->
<div class="modal fade" id="modalAddUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form role="form" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-user-plus pr-2"></i> Nuevo usuario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body p-4">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label font-weight-normal">Nombre</label>
                        <div class="col-sm-5">
                            <input class="form-control" name="inputFirstName" placeholder="Nombre(s)" required>
                        </div>
                        <div class="col-sm-5">
                            <input class="form-control" name="inputLastName" placeholder="Apellidos" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label font-weight-normal">Usuario</label>
                        <div class="col-sm-10">
                            <input class="form-control" id="inputUser" name="inputUser" placeholder="Nombre de usuario" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label font-weight-normal">Contraseña</label>
                        <div class="input-group col-sm-10">
                            <input type="password" class="form-control" id="inputPassword" name="inputPassword" placeholder="Escribe una contraseña" required>
                            <div class="input-group-append">
                                <span class="input-group-text btn" id="togglePassword1">
                                    <i class="fas fa-eye"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label font-weight-normal">Confirmar</label>
                        <div class="input-group col-sm-10">
                            <input type="password" class="form-control" id="inputConfirmPassword" name="inputConfirmPassword" placeholder="Vuelve a escribir la contraseña" required>
                            <div class="input-group-append">
                                <span class="input-group-text btn" id="togglePassword2">
                                    <i class="fas fa-eye"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label font-weight-normal">Rol</label>
                        <div class="input-group col-sm-10">
                            <select class="form-control" name="selectRol" required>
                                <option value="" disabled selected hidden>Selecciona un rol</option>

                                <?php

                                $item = null;
                                $value = null;

                                $roles = ControllerRoles::ctrShowRoles($item, $value);

                                foreach ($roles as $key => $value) {
                                    echo '<option value="' . $value["id"] . '">' . $value["name"] . '</option>';
                                }

                                ?>

                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success">Crear usuario</button>
                </div>
                <?php
                $newUser = new ControllerUsers();
                $newUser->ctrNewUser();
                ?>

            </form>
        </div>
    </div>
</div>


<!-- Modal Edit User -->
<div class="modal fade" id="modalEditUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form role="form" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-user-plus pr-2"></i> Editar usuario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body p-4">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label font-weight-normal">Nombre</label>
                        <div class="col-sm-5">
                            <input type="hidden" id="editUserId" name="editUserId">
                            <input class="form-control" id="editFirstName" name="editFirstName" value="">
                        </div>
                        <div class="col-sm-5">
                            <input class="form-control" id="editLastName" name="editLastName" value="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label font-weight-normal">Usuario</label>
                        <div class="col-sm-10">
                            <input class="form-control" id="editUser" name="editUser">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label font-weight-normal">Contraseña</label>
                        <div class="input-group col-sm-10">
                            <input type="password" class="form-control" id='editPassword' name="editPassword" placeholder="Escribe una contraseña">
                            <div class="input-group-append">
                                <span class="input-group-text btn" id="togglePassword3">
                                    <i class="fas fa-eye"></i>
                                </span>
                            </div>
                            <input type="hidden" id='currentPassword' name='currentPassword'>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label font-weight-normal">Confirmar</label>
                        <div class="input-group col-sm-10">
                            <input type="password" class="form-control" id='editConfirmPassword' name="editConfirmPassword" placeholder="Vuelve a escribir la contraseña">
                            <div class="input-group-append">
                                <span class="input-group-text btn" id="togglePassword4">
                                    <i class="fas fa-eye"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label font-weight-normal">Rol</label>
                        <div class="input-group col-sm-10">
                            <select class="form-control" name="editRol" readonly required>

                                <option id="editRole"></option>
                                
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success">Guardar cambios</button>
                </div>

                <?php
                $editUser = new ControllerUsers();
                $editUser->ctrEditUser();
                ?>

            </form>
        </div>
    </div>
</div>

<?php
$deletetUser = new ControllerUsers();
$deletetUser->ctrDeleteUser();
?>