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
        $sql = "SELECT p.*, c.cate_name FROM products p JOIN categories c ON p.category_id=c.id";
        //Chuẩn bị thực thi
        $stmt = $this->conn->prepare($sql);
        //Thực thi
        $stmt->execute();
        //trả về dữ liệu lấy được
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    //Lấy sản phẩm theo loại
    public function listProductInCategory($id)
    {
        $sql = "SELECT p.*, c.cate_name FROM products p JOIN categories c ON p.category_id=c.id WHERE p.id=:id ";
        //Chuẩn bị thực thi
        $stmt = $this->conn->prepare($sql);
        //Thực thi
        $stmt->execute(['id' => $id]);
        //trả về dữ liệu lấy được
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    //Lọc sản phẩm theo thú cưng hoặc sản phẩm
    public function listPets()
    {
        $sql = "SELECT p.*, c.cate_name, type FROM products p JOIN categories c ON p.category_id=c.id WHERE type=1 LIMIT 4";
        $stmt = $this->conn->prepare($sql);
        //Thực thi
        $stmt->execute();
        //trả về dữ liệu lấy được
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    //Lọc sản phẩm không phải thú cưng
    public function listOtherProduct()
    {
        $sql = "SELECT p.*, c.cate_name, type FROM products p JOIN categories c ON p.category_id=c.id WHERE type=0";
        $stmt = $this->conn->prepare($sql);
        //Thực thi
        $stmt->execute();
        //trả về dữ liệu lấy được
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    //Thêm mới sản phẩm
    public function create($data)
    {
        $sql = "INSERT INTO products(name, image, price, quantity, status, description, category_id) VALUES(:name, :image, :price, :quantity, :status, :description, :category_id)";
        echo $sql;
        //Chuẩn bị thực thi
        $stmt = $this->conn->prepare($sql);
        //Thực thi
        $stmt->execute($data);
    }
    /**
     * function update: cập nhật dữ liệu
     * @id: mã sản phẩm cần cập nhật
     * @data: mảng dữ liệu cần cập nhật
     */
    public function update($id, $data)
    {
        $sql = "UPDATE products SET name=:name, image=:image, price=:price, quantity=:quantity, description=:description, status=:status, category_id=:category_id WHERE id=:id";

        $stmt = $this->conn->prepare($sql);
        //Thêm id và mảngr data
        $data['id'] = $id;
        $stmt->execute($data);
    }
    /**
     * function delete: xóa bản ghi
     * @id: mã sản phẩm cần xóa
     */
    public function delete($id)
    {
        try {
            $sql = "DELETE FROM products WHERE id=:id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['id' => $id]);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
    /**
     * function find: lấy ra 1 bản ghi theo id
     * @id: mã sản phẩm cần tìm
     */
    public function find($id)
    {
        $sql = "SELECT * FROM products WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
