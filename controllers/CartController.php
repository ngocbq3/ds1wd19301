<?php

class CartController
{
    //Thêm sản phẩm vào giỏ hàng
    public function addToCart()
    {
        //Lấy giỏ hàng nếu có, còn không thì tạo giỏ hàng mới
        $carts = $_SESSION['cart'] ?? [];

        //Lấy id sản phẩm muốn thêm vào giỏ hàng
        $id = $_GET['id'];
        //Tìm sản phẩm theo id
        $product = (new Product)->find($id);

        //Nhặt hàng vào giỏ
        //Nếu hàng đã tồn tại trong giỏ
        if (isset($carts[$id])) {
            //tăng số lượng lên 1
            $carts[$id]['quantity'] += 1;
        } else {
            //Đưa sản phẩm vào giỏ
            $carts[$id] = [
                'name'      => $product['name'],
                'image'     => $product['image'],
                'price'     => $product['price'],
                'quantity'  => 1
            ];
        }

        //Lấy tổng số lượng giỏ hàng lưu vào session
        $_SESSION['totalQuantity'] = $this->totalSumQuantity($carts);

        //Gán lại giỏ hàng cho session
        $_SESSION['cart'] = $carts;

        $uri = $_SESSION['URI']; //Thông tin của đường dẫn trước đó

        //Di chuyển website về trang cũ
        return header("Location: " . $uri);
    }

    //Tính tổng số lường sản phẩm trong giỏ hàng
    public function totalSumQuantity($carts)
    {
        $total = 0;
        foreach ($carts as $cart) {
            $total += $cart['quantity'];
        }
        return $total;
    }

    //Tính tổng tiền của đơn hàng
    public function totalPriceOrder()
    {
        $carts = $_SESSION['cart'] ?? [];
        $total = 0;
        foreach ($carts as $cart) {
            $total += $cart['price'] * $cart['quantity'];
        }
        return $total;
    }

    //View của giỏ hàng
    public function viewCart()
    {
        $carts = $_SESSION['cart'] ?? [];

        $totalPriceOrder = $this->totalPriceOrder();

        return view('clients.carts.cart', compact('carts', 'totalPriceOrder'));
    }

    //Xóa sản phẩm trong giỏ hàng
    public function deleteProductInCart()
    {
        //lấy id 
        $id = $_GET['id'];
        //Xóa sản phẩm trong giỏ hàng
        unset($_SESSION['cart'][$id]);

        //quay lại giỏ hàng
        return header("Location: " . ROOT_URL . '?ctl=view-cart');
    }
}
