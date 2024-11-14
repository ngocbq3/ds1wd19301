<?php
require_once __DIR__ . "/env.php";
require_once __DIR__ . "/common/function.php";
require_once __DIR__ . "/models/BaseModel.php";
require_once __DIR__ . "/models/Category.php";
require_once __DIR__ . "/models/Product.php";

require_once __DIR__ . "/controllers/HomeController.php";
require_once __DIR__ . "/controllers/ClientCategoryController.php";

$ctl = $_GET['ctl'] ?? '';

//Thêm categories type: sản phẩm là 0, pet là 1
// $data = [
//     'cate_name' => 'Con hổ',
//     'type' => 1
// ];
// $cate = new Category;
// $cate->delete(3);
// var_dump($cate->show(1));
//Thêm sản phẩm
$data = [
    'name' => 'Thức ăn Royal Canin cho chó',
    'image' => '',
    'price' => 50000,
    'quantity' => 10,
    'description' => 'Thức ăn Royal Canin cho chó',
    'category_id' => 1
];
$product = new Product;
// $product->create($data);

match ($ctl) {
    '', 'home' => (new HomeController)->index(),
    'category' => (new ClientCategoryController)->index(),
    default => view("404.404"),
};
