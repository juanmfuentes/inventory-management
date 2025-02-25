<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Panel de Control</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="home/home">Inicio</a></li>
                        <li class="breadcrumb-item active">Panel de Control</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">

                <?php
                if ($_SESSION["rol"] == "1") {
                    include "../app/views/modules/home/small-boxes.php";
                } 
                
                ?>

            </div>

            <div class="row">

                <?php
                // include "../app/views/modules/home/charts.php"
                ?>

            </div>

            <div class="row">

                <?php
                include "../app/views/modules/home/recent-products.php"
                ?>

            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->