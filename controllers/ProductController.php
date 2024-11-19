<?php

class ProductController
{
    //hiển thị danh sách sản phẩm theo danh mục
    public function list()
    {
        //lấy id danh mục
        $id = $_GET['id'];
        //Lấy sản phẩm theo danh mục
        $products = (new Product)->listProductInCategory($id);

        //lấy ra tên của category
        $title = (new Category)->show($id);
        $title = $title['cate_name'];

        //Lây ra danh mục
        $categories = (new Category)->list();

        return view(
            'clients.products.list',
            compact('products', 'title', 'categories')
        );
    }

    //Show chi tiết sản phẩm
    public function show()
    {
        //lấy id sản phẩm
        $id = $_GET['id'];
        //lấy chi tiết sản phẩm
        $product = (new Product)->find($id);

        //lấy tiêu đề sản phẩm
        $title = $product['name'] ?? '';
        $categories = (new Category)->list();

        return view(
            'clients.products.detail',
            compact('product', 'categories', 'title')
        );
    }
}
