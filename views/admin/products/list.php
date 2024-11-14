<?php include_once ROOT_DIR . "views/admin/header.php" ?>
<div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#ID</th>
                <th scope="col">Name</th>
                <th scope="col">Image</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Status</th>
                <th scope="col">Category</th>
                <th>
                    <a href="<?= ADMIN_URL . '?ctl=addsp' ?>" class="btn btn-primary">Create</a>
                </th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $pro): ?>
                <tr>
                    <th scope="row"><?= $pro['id'] ?></th>
                    <td><?= $pro['name'] ?></td>
                    <td>
                        <img src="<?= ROOT_URL . 'images/' . $pro['image'] ?>" width="60" alt="">
                    </td>
                    <td><?= $pro['price'] ?></td>
                    <td><?= $pro['quantity'] ?></td>
                    <td><?= $pro['status'] ? "Đang kinh doanh" : "Ngừng kinh doanh" ?></td>
                    <td><?= $pro['cate_name'] ?></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>
<?php include_once ROOT_DIR . "views/admin/footer.php" ?>