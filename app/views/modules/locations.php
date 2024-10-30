<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Ubicaciones</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="home">Inicio</a></li>
                        <li class="breadcrumb-item active">Ubicaciones</li>
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
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalAddLocation">
                                <i class="fas fa-plus-circle pr-2"></i> Nueva ubicación
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

                                    $locations = ControllerLocations::ctrShowLocations($item, $value);
                                    foreach ($locations as $key => $value) {
                                        echo '
                                        <tr>
                                            <td>' . ($key + 1) . '</td>
                                            <td>' . $value["name"] . '</td>
                                            <td>' . $value["description"] . '</td>
                                            <td>
                                                <div class="btn-group d-flex">
                                                    <button type="button" class="btn btn-sm btn-warning btnEditLocation" idLocation="' . $value["id"] . '" 
                                                data-toggle="modal" data-target="#modalEditLocation" style="color:white;">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <button type="button" class="btn btn-sm btn-danger btnDeleteLocation" idLocation="' . $value["id"] . '">
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
<div class="modal fade" id="modalAddLocation" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-location-arrow pr-2"></i>Nueva ubicación</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form role="form" method="post">

                <div class="modal-body p-4">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label font-weight-normal">Nombre</label>
                        <div class="col-sm-10">
                            <input class="form-control" id="locationName" name="locationName" placeholder="Nombre de la ubicación" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label font-weight-normal">Descripción</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" rows="3" id="locationDescription" name="locationDescription" placeholder="Descripción de la ubicación"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success">Agregar ubicación</button>
                </div>

                <?php
                $newLocation = new ControllerLocations();
                $newLocation->ctrNewLocation();
                ?>

            </form>
        </div>
    </div>
</div>


<!-- Modal Edit Location-->
<div class="modal fade" id="modalEditLocation" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-location-arrow pr-2"></i>Editar ubicación</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form role="form" method="post">

                <div class="modal-body p-4">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label font-weight-normal">Nombre</label>
                        <div class="col-sm-10">
                            <input type="hidden" id="editLocationId" name="editLocationId">
                            <input class="form-control" id="editLocationName" name="editLocationName" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label font-weight-normal">Descripción</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" rows="3" id="editLocationDescription" name="editLocationDescription"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success">Guardar cambios</button>
                </div>

                <?php
                $editLocation = new ControllerLocations();
                $editLocation->ctrEditLocation();
                ?>

            </form>
        </div>
    </div>
</div>

<?php
$deleteLocation = new ControllerLocations();
$deleteLocation->ctrDeleteLocation();
?>