<?php
include_once 'lib/session.php';
Session::checkSession();
include_once 'classes/cart.php';

if (isset($_GET['id'])) {
    $cart = new cart();
    $result = $cart->add($_GET['id']);
    if ($result) {
        echo '<script type="text/javascript">alert("Thêm sản phẩm vào giỏ hàng thành công!"); history.back();</script>';
    } else {
        echo '<script type="text/javascript">alert("Thêm sản phẩm vào giỏ hàng thất bại!"); history.back();</script>';
    }
}
