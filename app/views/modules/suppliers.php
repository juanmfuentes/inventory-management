<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Proveedores</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="home/home">Inicio</a></li>
                        <li class="breadcrumb-item active">Proveedores</li>
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
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalAddSupplier">
                                <i class="fas fa-plus-circle pr-2"></i> Nuevo proveedor
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

                                    $suppliers = ControllerSuppliers::ctrShowSuppliers($item, $value);
                                    foreach ($suppliers as $key => $value) {
                                        echo '
                                        <tr>
                                            <td>' . ($key + 1) . '</td>
                                            <td>' . $value["name"] . '</td>
                                            <td>' . $value["description"] . '</td>
                                            <td>
                                                <div class="btn-group d-flex">
                                                    <button type="button" class="btn btn-sm btn-warning btnEditSupplier" idSupplier="' . $value["id"] . '" 
                                                data-toggle="modal" data-target="#modalEditSupplier" style="color:white;">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <button type="button" class="btn btn-sm btn-danger btnDeleteSupplier" idSupplier="' . $value["id"] . '">
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
<div class="modal fade" id="modalAddSupplier" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-truck pr-2"></i></i>Nuevo proveedor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form role="form" method="post">

                <div class="modal-body p-4">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label font-weight-normal">Nombre</label>
                        <div class="col-sm-10">
                            <input class="form-control" id="supplierName" name="supplierName" placeholder="Nombre del proveedor" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label font-weight-normal">Descripción</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" rows="3" id="supplierDescription" name="supplierDescription" placeholder="Descripción del proveedor"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success">Agregar proveedor</button>
                </div>

                <?php
                $newSupplier = new ControllerSuppliers();
                $newSupplier->ctrNewSupplier();
                ?>

            </form>
        </div>
    </div>
</div>


<!-- Modal Edit Supplier-->
<div class="modal fade" id="modalEditSupplier" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-truck pr-2"></i>Editar proveedor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form role="form" method="post">

                <div class="modal-body p-4">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label font-weight-normal">Nombre</label>
                        <div class="col-sm-10">
                            <input type="hidden" id="editSupplierId" name="editSupplierId">
                            <input class="form-control" id="editSupplierName" name="editSupplierName" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label font-weight-normal">Descripción</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" rows="3" id="editSupplierDescription" name="editSupplierDescription"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success">Guardar cambios</button>
                </div>

                <?php
                $editSupplier = new ControllerSuppliers();
                $editSupplier->ctrEditSupplier();
                ?>

            </form>
        </div>
    </div>
</div>

<?php
$deleteSupplier = new ControllerSuppliers();
$deleteSupplier->ctrDeleteSupplier();
?>