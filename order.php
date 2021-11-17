<?php
include_once 'lib/session.php';
Session::checkSession();
include 'classes/order.php';
include_once 'classes/cart.php';

$cart = new cart();
$totalQty = $cart->getTotalQtyByUserId();

$order = new order();
$result = $order->getOrder();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://use.fontawesome.com/2145adbb48.js"></script>
    <script src="https://kit.fontawesome.com/a42aeb5b72.js" crossorigin="anonymous"></script>
    <title>Order</title>
</head>

<body>
    <nav>
        <input type="checkbox" id="check">
        <label for="check" class="checkbtn">
            <i class="fas fa-bars"></i>
        </label>
        <label class="logo">STORENOW</label>
        <ul>
            <li><a href="index.php">Trang chủ</a></li>
            <li><a href="register.php" id="signup">Đăng ký</a></li>
            <li><a href="login.php" id="signin">Đăng nhập</a></li>
            <li><a href="order.php" id="order" class="active">Đơn hàng</a></li>
            <li>
                <a href="checkout.php">
                    <i class="fa fa-shopping-bag"></i>
                    <span class="sumItem">
                    <?= $totalQty['total'] ?>
                    </span>
                </a>
            </li>
        </ul>
    </nav>
    <section class="banner"></section>
    <div class="featuredProducts">
        <h1>Đơn hàng</h1>
    </div>
    <div class="container-single">
        <?php if ($result) { ?>
            <table class="order">
                <tr>
                    <th>STT</th>
                    <th>Mã đơn hàng</th>
                    <th>Ngày đặt</th>
                    <th>Ngày giao</th>
                    <th>Tình trạng</th>
                    <th>Thao tác</th>
                </tr>
                <?php $count = 1;
                foreach ($result as $key => $value) { ?>
                    <tr>
                        <td><?= $count++ ?></td>
                        <td><?= $value['id'] ?></td>
                        <td><?= $value['createdDate'] ?></td>
                        <td><?= $value['createdDate'] ?></td>
                        <td><?= $value['status'] ?></td>
                        <td>
                            <a href="orderdetail.php?orderId=<?= $value['id'] ?>">Chi tiết</a>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        <?php } else { ?>
            <h3>Đơn hàng hiện đang rỗng</h3>
        <?php } ?>


    </div>
    </div>
    <footer>
        <div class="social">
            <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
            <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
            <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
        </div>
        <ul class="list">
            <li>
                <a href="#">Home</a>
            </li>
            <li>
                <a href="#">Product</a>
            </li>
            <li>
                <a href="#">Contact</a>
            </li>
            <li>
                <a href="#">About</a>
            </li>
        </ul>
        <p class="copyright">Khuong Nguyen @ 2021</p>
    </footer>
</body>

</html>