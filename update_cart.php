<?php
include_once 'lib/session.php';
Session::checkSession();
include_once 'classes/cart.php';

$cart = new cart();
$result = $cart->update($_POST['productId'], $_POST['qty']);
if ($result) {
    http_response_code(200);
} else {
    http_response_code(403);
}
exit;
