<?php
class ClientCategoryController
{
    public function index()
    {
        $categories = (new Category)->list();
        return view("category.list", ['categories' => $categories]);
    }
}
