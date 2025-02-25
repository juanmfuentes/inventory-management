<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Roles</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="home/home">Inicio</a></li>
                        <li class="breadcrumb-item active">Roles</li>
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
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalAddRole">
                                <i class="fas fa-plus-circle pr-2"></i> Nuevo rol
                            </button>
                        </div>
                        <div class="card-body pad">
                            <table class="table table-bordered table-striped tables">
                                <thead>
                                    <tr>
                                        <th style="width:10px">ID</th>
                                        <th style="max-width:300px">Nombre</th>
                                        <th>Descripción</th>
                                        <th style="max-width:300px">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php

                                    $item = null;
                                    $value = null;

                                    $roles = ControllerRoles::ctrShowRoles($item, $value);
                                    foreach ($roles as $key => $value) {
                                        echo '
                                        <tr>
                                            <td>' . ($key + 1) . '</td>
                                            <td>' . $value["name"] . '</td>
                                            <td>' . $value["description"] . '</td>
                                            <td>
                                                <div class="btn-group d-flex">
                                                    <button type="button" class="btn btn-sm btn-warning btnEditRole" idRole="' . $value["id"] . '" 
                                                data-toggle="modal" data-target="#modalEditRole" style="color:white;">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <button type="button" class="btn btn-sm btn-danger btnDeleteRole" idRole="' . $value["id"] . '">
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
                                        <th>Nombre</th>
                                        <th>Descripción</th>
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
<div class="modal fade" id="modalAddRole" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-shield-alt pr-2"></i>Nuevo rol</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form role="form" method="post">

                <div class="modal-body p-4">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label font-weight-normal">Nombre</label>
                        <div class="col-sm-10">
                            <input class="form-control" id="roleName" name="roleName" placeholder="Nombre del rol" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label font-weight-normal">Descripción</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" rows="3" id="roleDescription" name="roleDescription" placeholder="Descripción del rol"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success">Agregar rol</button>
                </div>

                <?php
                $newRole = new ControllerRoles();
                $newRole->ctrNewRole();
                ?>

            </form>
        </div>
    </div>
</div>


<!-- Modal Edit Role-->
<div class="modal fade" id="modalEditRole" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-shield-alt pr-2"></i>Editar rol</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form role="form" method="post">

                <div class="modal-body p-4">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label font-weight-normal">Nombre</label>
                        <div class="col-sm-10">
                            <input type="hidden" id="editRoleId" name="editRoleId">
                            <input class="form-control" id="editRoleName" name="editRoleName" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label font-weight-normal">Descripción</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" rows="3" id="editRoleDescription" name="editRoleDescription"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success">Guardar cambios</button>
                </div>

                <?php
                $editRole = new ControllerRoles();
                $editRole->ctrEditRole();
                ?>

            </form>
        </div>
    </div>
</div>

<?php
$deleteRole = new ControllerRoles();
$deleteRole->ctrDeleteRole();
?>