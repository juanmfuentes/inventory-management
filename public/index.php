<?php

require_once "../app/controllers/template.controller.php";

require_once "../app/controllers/brands.controller.php";
require_once "../app/controllers/customers.controller.php";
require_once "../app/controllers/products.controller.php";
require_once "../app/controllers/roles.controller.php";
require_once "../app/controllers/sales.controller.php";
require_once "../app/controllers/suppliers.controller.php";
require_once "../app/controllers/users.controller.php";

require_once "../app/models/brands.model.php";
require_once "../app/models/customers.model.php";
require_once "../app/models/products.model.php";
require_once "../app/models/roles.model.php";
require_once "../app/models/sales.model.php";
require_once "../app/models/suppliers.model.php";
require_once "../app/models/users.model.php";

$template = new ControllerTemplate();
$template -> ctrTemplate();

