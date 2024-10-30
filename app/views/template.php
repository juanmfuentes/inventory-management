<?php

session_start();

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <base href="/inventory-management/public/">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="../public/img/logo.png" type="image/x-icon">
    <title>Don Lalo | Refaccionaria</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../lib/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../lib/dist/css/adminlte.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="../lib/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../lib/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="../lib/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

    <!-- SweetAlert2 -->
    <script src="../lib/plugins/sweetalert2/sweetalert2.all.min.js"></script>
</head>

<!-- Preloader -->
<!-- <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="../public/img/logo.png" alt="Logo" height="60" width="60">
</div> -->

<?php
if (isset($_SESSION["auth_user"]) && $_SESSION["auth_user"] == true) {

    echo '<body class="hold-transition sidebar-mini layout-fixed">';
    #<!-- Site wrapper -->
    echo '<div class="wrapper">';

    include "modules/components/header.php";

    include "modules/components/sidebar.php";

    if (isset($_GET["route"])) {
        if (
            $_GET["route"] == "home" ||
            $_GET["route"] == "search" ||
            $_GET["route"] == "products" ||
            $_GET["route"] == "sales/new-sale" ||
            $_GET["route"] == "sales/manage-sales" ||
            $_GET["route"] == "sales/sales-report" ||
            $_GET["route"] == "customers" ||
            $_GET["route"] == "suppliers" ||
            $_GET["route"] == "brands" ||
            $_GET["route"] == "categories" ||
            $_GET["route"] == "users" ||
            $_GET["route"] == "roles" ||
            $_GET["route"] == "locations" ||
            $_GET["route"] == "logout"
        ) {
            include "modules/" . $_GET["route"] . ".php";
        } else {
            include "modules/404.php";
        }
    } else {
        include "modules/home.php";
    }

    include "modules/components/footer.php";

    echo '</div>';
    #<!-- ./wrapper -->

} else {

    echo '<body class="hold-transition login-page">';
    include "modules/login.php";
}

?>



<!-- jQuery -->
<script src="../lib/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../lib/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../lib/dist/js/adminlte.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="../lib/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../lib/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../lib/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../lib/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../lib/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../lib/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>

<!-- js -->
<script src="../public/js/users.js"></script>

<script src="../public/js/categories.js"></script>
<script src="../public/js/brands.js"></script>
<script src="../public/js/roles.js"></script>
<script src="../public/js/suppliers.js"></script>
<script src="../public/js/locations.js"></script>
<script src="../public/js/products.js"></script>
<script src="../public/js/template.js"></script>
</body>

</html>