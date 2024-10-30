<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Productos</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="home">Inicio</a></li>
                        <li class="breadcrumb-item active">Productos</li>
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
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalAddProduct">
                                <i class="fas fa-plus-circle pr-2"></i> Agregar producto
                            </button>
                        </div>
                        <div class="card-body pad">
                            <table class="table table-bordered table-striped tableProducts">
                                <thead>
                                    <tr>
                                        <th width="10px">ID</th>
                                        <th width="20px">Imagen</th>
                                        <th width="100px">Código</th>
                                        <th width="100px">Barcode</th>
                                        <th>Descripción</th>
                                        <th>Categoría</th>
                                        <th width="50px">Venta</th>
                                        <th style="width:30px">Stock</th>
                                        <th>Ubicación</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>

                                <tfoot>
                                    <tr>
                                        <th style="width:10px">ID</th>
                                        <th style="width:20px">Imagen</th>
                                        <th width="100">Código</th>
                                        <th width="100">Barcode</th>
                                        <th>Descripción</th>
                                        <th>Categoría</th>
                                        <th>Venta</th>
                                        <th style="width:30px">Stock</th>
                                        <th>Ubicación</th>
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










<!-- Modal Add Product -->
<div class="modal fade" id="modalAddProduct" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-archive pr-2"></i> Nuevo producto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form role="form" method="post" enctype="multipart/form-data">

                <div class="modal-body p-4">
                    <!-- Pestañas -->
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active text-reset" id="general-tab" data-toggle="tab" href="#general" role="tab" aria-controls="general" aria-selected="true">Datos Generales</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-reset" id="advanced-tab" data-toggle="tab" href="#advanced" role="tab" aria-controls="advanced" aria-selected="false">Datos Avanzados</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="general" role="tabpanel" aria-labelledby="general-tab">
                            <div class="row mt-3">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="font-weight-normal">Imagen del Producto</label>
                                        <img src="../public/img/default-product.jpg" class="img-thumbnail preview" width="100%">
                                        <div class="custom-file">
                                            <label class="custom-file-label text-muted" for="inputGroupFile01">Máximo: 2MB</label>
                                            <input type="file" class="custom-file-input newImage" id="inputGroupFile01" name="newImage" aria-describedby="inputGroupFileAddon01" lang="es">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="font-weight-normal">Precio de compra</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">$</span>
                                            </div>
                                            <input type="number" step="any" class="form-control" id="productPurchasePrice" name="productPurchasePrice" placeholder="Precio de compra">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="font-weight-normal">Precio de venta</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">$</span>
                                            </div>
                                            <input type="number" step="any" class="form-control" id="productSellingPrice" name="productSellingPrice" placeholder="Precio de venta">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="font-weight-normal">Precio de mayoreo</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">$</span>
                                            </div>
                                            <input type="number" step="any" class="form-control" id="productWholesalePrice" name="productWholesalePrice" placeholder="Precio de mayoreo">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <label class="font-weight-normal">Descripción</label>
                                        <input class="form-control" id="productDescription" name="productDescription" placeholder="Descripción del producto" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="font-weight-normal">Proveedor</label>
                                        <select class="form-control" id="productSupplier" name="productSupplier" required>
                                            <option value="" disabled selected hidden>Proveedor del producto</option>

                                            <?php

                                            $item = null;
                                            $value = null;

                                            $suppliers = ControllerSuppliers::ctrShowSuppliers($item, $value);

                                            foreach ($suppliers as $key => $value) {
                                                echo '<option value="' . $value["id"] . '">' . $value["name"] . '</option>';
                                            }

                                            ?>

                                        </select>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <label class="font-weight-normal">Categoría</label>
                                            <select class="form-control" id="productCategory" name="productCategory" required>
                                                <option value="" disabled selected hidden>Categoría del producto</option>

                                                <?php

                                                $item = null;
                                                $value = null;

                                                $categories = ControllerCategories::ctrShowCategories($item, $value);

                                                foreach ($categories as $key => $value) {
                                                    echo '<option value="' . $value["id"] . '">' . $value["name"] . '</option>';
                                                }


                                                ?>

                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="font-weight-normal">Ubicación</label>
                                            <select class="form-control" id="productLocation" name="productLocation" required>
                                                <option value="" disabled selected hidden>Ubicación en tienda</option>

                                                <?php

                                                $item = null;
                                                $value = null;

                                                $locations = ControllerLocations::ctrShowLocations($item, $value);

                                                foreach ($locations as $key => $value) {
                                                    echo '<option value="' . $value["id"] . '">' . $value["name"] . '</option>';
                                                }

                                                ?>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <label class="font-weight-normal">Marca</label>
                                            <select class="form-control" id="productBrand" name="productBrand" required>
                                                <option value="" disabled selected hidden>Marca del producto</option>

                                                <?php

                                                $item = null;
                                                $value = null;

                                                $brands = ControllerBrands::ctrShowBrands($item, $value);

                                                foreach ($brands as $key => $value) {
                                                    echo '<option value="' . $value["id"] . '">' . $value["name"] . '</option>';
                                                }

                                                ?>

                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="font-weight-normal">Stock</label>
                                            <input type="text" class="form-control" id="productStock" name="productStock" placeholder="Productos disponibles">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="advanced" role="tabpanel" aria-labelledby="advanced-tab">
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="font-weight-normal">Código interno</label>
                                        <input type="text" class="form-control" id="productInternalCode" name="productInternalCode" placeholder="Código en tienda">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="font-weight-normal">Código de barras</label>
                                        <input type="text" class="form-control" id="productBarcode" name="productBarcode" placeholder="Código de barras">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="font-weight-normal">Extra 1</label>
                                        <input type="text" class="form-control" id="productExtra1" name="productExtra1" placeholder="Más información 1">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="font-weight-normal">Extra 2</label>
                                        <input type="text" class="form-control" id="productExtra2" name="productExtra2" placeholder="Más información 2">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="font-weight-normal">Extra 3</label>
                                        <input type="text" class="form-control" id="productExtra3" name="productExtra3" placeholder="Más información 3">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="font-weight-normal">Extra 4</label>
                                        <input type="text" class="form-control" id="productExtra4" name="productExtra4" placeholder="Más información 4">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success">Crear producto</button>
                </div>

                <?php
                $newProduct = new ControllerProducts();
                $newProduct->ctrNewProduct();
                ?>


            </form>
        </div>
    </div>
</div>










<!-- Modal Edit Product -->
<div class="modal fade" id="modalEditProduct" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-archive pr-2"></i> Editar producto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form role="form" method="post" enctype="multipart/form-data">

                <div class="modal-body p-4">
                    <!-- Pestañas -->
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active text-reset" id="general-tab" data-toggle="tab" href="#editGeneral" role="tab" aria-controls="general" aria-selected="true">Datos Generales</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-reset" id="advanced-tab" data-toggle="tab" href="#editAdvanced" role="tab" aria-controls="advanced" aria-selected="false">Datos Avanzados</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="editGeneral" role="tabpanel" aria-labelledby="general-tab">
                            <div class="row mt-3">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <input type="hidden" id="editIdProduct" name="editIdProduct">
                                        <label class="font-weight-normal">Imagen del Producto</label>
                                        <img src="../public/img/default-product.jpg" class="img-thumbnail preview" width="100%">
                                        <div class="custom-file">
                                            <label class="custom-file-label text-muted" for="inputGroupFile02">Máximo: 2MB</label>
                                            <input type="file" class="custom-file-input newImage" id="inputGroupFile02" name="editImage" aria-describedby="inputGroupFileAddon02" lang="es">
                                            <input type="hidden" name="currentImage" id="currentImage">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="font-weight-normal">Precio de compra</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">$</span>
                                            </div>
                                            <input type="number" step="any" class="form-control" id="editProductPurchasePrice" name="editProductPurchasePrice" placeholder="Precio de compra">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="font-weight-normal">Precio de venta</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">$</span>
                                            </div>
                                            <input type="number" step="any" class="form-control" id="editProductSellingPrice" name="editProductSellingPrice" placeholder="Precio de venta">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="font-weight-normal">Precio de mayoreo</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">$</span>
                                            </div>
                                            <input type="number" step="any" class="form-control" id="editProductWholesalePrice" name="editProductWholesalePrice" placeholder="Precio de mayoreo">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <label class="font-weight-normal">Descripción</label>
                                        <input class="form-control" id="editProductDescription" name="editProductDescription" placeholder="Descripción del producto" readonly required>
                                    </div>
                                    <div class="form-group">
                                        <label class="font-weight-normal">Proveedor</label>
                                        <select class="form-control" name="editProductSupplier" readonly required>

                                            <option id="editProductSupplier"></option>

                                        </select>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <label class="font-weight-normal">Categoría</label>
                                            <select class="form-control" name="editProductCategory" readonly required>

                                                <option id="editProductCategory"></option>

                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="font-weight-normal">Ubicación</label>
                                            <select class="form-control" name="editProductLocation" readonly required>

                                                <option id="editProductLocation"></option>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <label class="font-weight-normal">Marca</label>
                                            <select class="form-control" name="editProductBrand" readonly required>

                                                <option id="editProductBrand"></option>

                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="font-weight-normal">Stock</label>
                                            <input type="text" class="form-control" id="editProductStock" name="editProductStock" placeholder="Productos disponibles">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="editAdvanced" role="tabpanel" aria-labelledby="advanced-tab">
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="font-weight-normal">Código interno</label>
                                        <input type="text" class="form-control" id="editProductInternalCode" name="editProductInternalCode" placeholder="Código en tienda">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="font-weight-normal">Código de barras</label>
                                        <input type="text" class="form-control" id="editProductBarcode" name="editProductBarcode" placeholder="Código de barras">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="font-weight-normal">Extra 1</label>
                                        <input type="text" class="form-control" id="editProductExtra1" name="editProductExtra1" placeholder="Más información 1">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="font-weight-normal">Extra 2</label>
                                        <input type="text" class="form-control" id="editProductExtra2" name="editProductExtra2" placeholder="Más información 2">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="font-weight-normal">Extra 3</label>
                                        <input type="text" class="form-control" id="editProductExtra3" name="editProductExtra3" placeholder="Más información 3">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="font-weight-normal">Extra 4</label>
                                        <input type="text" class="form-control" id="editProductExtra4" name="editProductExtra4" placeholder="Más información 4">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success">Guardar cambios</button>
                </div>

                <?php

                $editProduct = new ControllerProducts();
                $editProduct->ctrEditProduct();

                ?>

            </form>
        </div>
    </div>
</div>

<?php
$deleteProduct = new ControllerProducts();
$deleteProduct->ctrDeleteProduct();
?>