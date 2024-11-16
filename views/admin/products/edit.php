<?php include_once ROOT_DIR . "views/admin/header.php" ?>
<div>
    <form action="<?= ADMIN_URL . '?ctl=updatesp' ?>" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="">Tên sản phẩm</label>
            <input type="text" name="name" value="<?= $product['name'] ?>" class="form-control">
        </div>
        <div class="mb-3">
            <label for="">Danh mục</label>
            <select name="category_id" id="" class="form-control">
                <?php foreach ($categories as $cate): ?>
                    <option value="<?= $cate['id'] ?>"
                        <?= ($product['category_id'] == $cate['id']) ? 'selected' : '' ?>>
                        <?= $cate['cate_name'] ?>
                    </option>
                <?php endforeach ?>
            </select>

        </div>
        <div class="mb-3">
            <label for="">Hình ảnh</label> <br>
            <img src="<?= ROOT_URL . 'images/' . $product['image'] ?>" width="60" alt="">
            <input type="file" name="image" id="" class="form-control">

        </div>
        <div class="mb-3">
            <label for="">Giá</label>
            <input type="number" name="price" value="<?= $product['price'] ?>" class="form-control">

        </div>
        <div class="mb-3">
            <label for="">Số lượng</label>
            <input type="number" name="quantity" value="<?= $product['quantity'] ?>" class="form-control">

        </div>
        <div class="mb-3">
            <label for="">Trạng thái</label> <br>
            <input type="radio" name="status" value="1" <?= $product['status'] ? 'checked' : '' ?> id=""> Đang kinh doanh
            <input type="radio" name="status" value="0" <?= $product['status'] == 0 ? 'checked' : '' ?>> Ngừng kinh doanh
        </div>
        <div class="mb-3">
            <label for="">Mô tả sản phẩm</label>
            <textarea name="description" class="form-control" rows="6"><?= $product['description'] ?></textarea>
        </div>
        <!--Lưu id vào hidden-->
        <input type="hidden" name="id" value="<?= $product['id'] ?>">
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Cập nhật</button>
        </div>
    </form>
</div>
<?php include_once ROOT_DIR . "views/admin/footer.php" ?>