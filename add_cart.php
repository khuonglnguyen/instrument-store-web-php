<?php
include 'lib/session.php';
include 'classes/product.php';
Session::checkSession();
include 'classes/cart.php';

if (isset($_GET['id'])) {
    $cart = new cart();
    $result = $cart->add($_GET['id']);
}
