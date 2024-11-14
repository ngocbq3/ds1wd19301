<?php
//Controller điều khiền sản phẩm
class AdminProductController
{
    //hiển thị danh sách sản phẩm
    public function index()
    {
        $products = (new Product)->all();
        return view('admin.products.list', ['products' => $products]);
    }

    //Hiển thị form thêm
    public function create()
    {
        $categories = (new Category)->list();
        return view('admin.products.add', compact('categories'));
    }

    //Thêm dữ liệu sản phẩm vào database
    public function store()
    {
        $data = $_POST;

        $image = ''; //Trường hợp người dùng không nhập ảnh
        $file = $_FILES['image'];
        if ($file['size'] > 0) {
            $image = $file['name'];
            //Upload file
            move_uploaded_file($file['tmp_name'], "../images/" . $image);
        }
        //thêm ảnh vào $data
        $data['image'] = $image;
        $product = new Product;
        $product->create($data);
        header("location: " . ADMIN_URL . "?ctl=listsp");
    }
}
