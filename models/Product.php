<?php

class Product extends BaseModel
{
    /**
     * trong bảng products có thuộc tính status:
     * giá trị là 0: ngừng kinh doanh
     * giá trị là 1: đang kinh doanh
     */
    //Lấy ra tất cả các bản ghi
    public function all()
    {
        //Câu lệnh sql
        $sql = "SELECT * FROM products";
        //Chuẩn bị thực thi
        $stmt = $this->conn->prepare($sql);
        //Thực thi
        $stmt->execute();
        //trả về dữ liệu lấy được
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    //Thêm mới sản phẩm
    public function create($data)
    {
        $sql = "INSERT INTO products(name, image, price, quantity, description, category_id) VALUES(:name, :image, :price, :quantity, :description, :category_id)";
        //Chuẩn bị thực thi
        $stmt = $this->conn->prepare($sql);
        //Thực thi
        $stmt->execute($data);
    }
}
