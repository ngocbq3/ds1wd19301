<?php

class Category extends BaseModel
{
    //Lấy tất cả danh mục
    public function list()
    {
        $sql = "SELECT * FROM categories WHERE soft_delete=0";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $categories;
    }

    //Thêm 1 bản ghi
    public function create($data)
    {
        $sql = "INSERT INTO categories(cate_name, type) VALUES(:cate_name, :type)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($data);
    }
    //Cập nhật
    public function update($id, $data)
    {
        $sql = "UPDATE categories SET cate_name=:cate_name, type=:type WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        //thêm id vào mảng data
        $data['id'] = $id;
        $stmt->execute($data);
    }
    //Xóa bản ghi (xóa mềm không xóa khỏi database)
    public function delete($id)
    {
        //Chuyển trang thái của soft_delete từ 0->1
        $sql = "UPDATE categories SET soft_delete=1 WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
    }
    //Chi tiết 1 bản ghi
    public function show($id)
    {
        $sql = "SELECT * FROM categories";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
