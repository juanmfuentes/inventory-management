<?php

$item = null;
$value = null;

$products = ControllerProducts::ctrShowProducts($item, $value);
$totalProducts = count($products);

$suppliers = ControllerSuppliers::ctrShowSuppliers($item, $value);
$totalSuppliers = count($suppliers);


$brands = ControllerBrands::ctrShowBrands($item, $value);
$totalBrands = count($brands);


$categories = ControllerCategories::ctrShowCategories($item, $value);
$totalCategories = count($categories);




?>

<div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-info">
        <div class="inner">
            <h3><?php echo number_format($totalProducts) ?><sup style="font-size: 20px"></sup></h3>

            <p>Productos</p>
        </div>
        <div class="icon">
            <i class="fas fa-archive"></i>
        </div>
        <a href="products" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>
<!-- ./col -->
<div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-success">
        <div class="inner">
            <h3><?php echo number_format($totalSuppliers) ?><sup style="font-size: 20px"></sup></h3>

            <p>Proveedores</p>
        </div>
        <div class="icon">
            <i class="fas fa-truck"></i>
        </div>
        <a href="suppliers" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>
<!-- ./col -->
<div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-warning">
        <div class="inner text-white">
            <h3><?php echo number_format($totalBrands) ?><sup style="font-size: 20px"></sup></h3>

            <p>Marcas</p>
        </div>
        <div class="icon">
            <i class="fas fa-tags"></i>
        </div>
        <a href="brands" class="small-box-footer">
            <p class="text-light m-0 p-0">
                Más información <i class="fas fa-arrow-circle-right"></i>
            </p>
        </a>

    </div>
</div>
<!-- ./col -->
<div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-danger">
        <div class="inner">
            <h3><?php echo number_format($totalCategories) ?><sup style="font-size: 20px"></sup></h3>

            <p>Categorías</p>
        </div>
        <div class="icon">
            <i class="fas fa-th-large"></i>
        </div>
        <a href="categories" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>
<!-- ./col -->