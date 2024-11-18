<?php
session_start();
require_once __DIR__ . "/../env.php";
require_once __DIR__ . "/../common/function.php";

//include model
require_once __DIR__ . "/../models/BaseModel.php";
require_once __DIR__ . "/../models/Category.php";
require_once __DIR__ . "/../models/Product.php";

//include controller
require_once __DIR__ . "/../controllers/admin/AdminProductController.php";
require_once __DIR__ . "/../controllers/admin/AdminCategoryController.php";

$ctl = $_GET['ctl'] ?? "";

match ($ctl) {
    "" => view("admin.dashboard"),
    "listsp" => (new AdminProductController)->index(),
    'addsp' => (new AdminProductController)->create(),
    'storesp' => (new AdminProductController)->store(),
    'editsp' => (new AdminProductController)->edit(),
    'updatesp' => (new AdminProductController)->update(),
    'deletesp' => (new AdminProductController)->delete(),
    'listdm' => (new AdminCategoryController)->index(),
    'adddm' => (new AdminCategoryController)->add(),
    'storedm' => (new AdminCategoryController)->store(),
    'editdm' => (new AdminCategoryController)->edit(),
    'updatedm' => (new AdminCategoryController)->update(),
    'deletedm' => (new AdminCategoryController)->delete(),
    default => view('404.404'),
};
