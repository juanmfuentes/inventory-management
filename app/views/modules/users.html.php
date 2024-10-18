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
                                    <tr>
                                        <td>1</td>
                                        <td>Mafusa</td>
                                        <td>Juan Fuentes</td>
                                        <td> Administrador</td>
                                        <td>12 de octubre de 2024 13:13:00</td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-success btn-block">
                                                Activo
                                            </button>
                                        </td>
                                        <td>
                                            <div class="btn-group d-flex">
                                                <button type="button" class="btn btn-sm btn-warning" style="color:white;">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <button type="button" class="btn btn-sm btn-danger">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>Internet</td>
                                        <td>Win 95+</td>
                                        <td> 4</td>
                                        <td>X</td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-danger btn-block">
                                                Inactivo
                                            </button>
                                        </td>
                                        <td>
                                            <div class="btn-group d-flex">
                                                <button type="button" class="btn btn-sm btn-warning" style="color:white;">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <button type="button" class="btn btn-sm btn-danger">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
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

<!-- Modal -->
<div class="modal fade" id="modalAddUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-user-plus pr-2"></i> Nuevo usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form role="form" method="post">

                <div class="modal-body p-4">
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label font-weight-normal">Nombre</label>
                        <div class="col-sm-5">
                            <input class="form-control" id="inputFirstName" placeholder="Nombre(s)">
                        </div>
                        <div class="col-sm-5">
                            <input class="form-control" name="inputLastName" placeholder="Apellidos">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label font-weight-normal">Usuario</label>
                        <div class="col-sm-10">
                            <input class="form-control" name="inputUser" placeholder="Nombre de usuario">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label font-weight-normal">Contraseña</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" name="inputPassword" placeholder="Contraseña">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label font-weight-normal">Confirmar</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" name="inputConfirmPassword" placeholder="Confirma la contraseña">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label font-weight-normal">Rol</label>
                        <div class="input-group col-sm-10">
                            <select class="form-control" name="selectRol" required>
                                <option value="" disabled selected hidden>Selecciona una opción</option>
                                <option value="Admin">Administrador</option>
                                <option value="Manager">Gerente de inventario</option>
                                <option value="Warehouse">Encargado de almacén</option>
                                <option value="Sales">Vendedor</option>
                                <option value="Accountant">Contador</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success">Crear usuario</button>
                </div>
            </form>
        </div>
    </div>
</div>