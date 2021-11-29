<?php
include '../lib/session.php';
Session::checkSessionAdmin();
$role_id = Session::get('role_id');
if ($role_id == 1) {
    # code...
} else {
    header("Location:../index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <a href="#">
                        <span class="nav-icon"><ion-icon name="musical-notes"></ion-icon></span>
                        <span class="nav-title">Instrument Store</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="nav-icon"><ion-icon name="people"></ion-icon></span>
                        <span class="nav-title">Quản lý Sản phẩm</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="nav-icon"><ion-icon name="mail"></ion-icon></span>
                        <span class="nav-title">Quản lý Đơn hàng</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="nav-icon"><ion-icon name="information-circle"></ion-icon></span>
                        <span class="nav-title">Hỏi đáp</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="nav-icon"><ion-icon name="settings"></ion-icon></span>
                        <span class="nav-title">Cài đặt</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="nav-icon"><ion-icon name="log-out"></ion-icon></span>
                        <span class="nav-title">Đăng xuất</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="main">
            <div class="topbar">
                <div class="topbar-togle">
                    <ion-icon name="grid"></ion-icon>
                </div>
                <!-- search -->
                <div class="topbar-search">
                    <label for="">
                        <input type="text" placeholder="search here...">
                        <ion-icon name="search"></ion-icon>
                    </label>
                </div>
                <!-- user -->
                <div class="topbar-user">
                    <img src="./img/user.jpg" alt="">
                </div>
            </div>
            <!-- cart -->
            <div class="cardBox">
                <div class="card">
                    <div>
                        <div class="card-number">1.23k</div>
                        <div class="cardName">Daily</div>
                    </div>
                    <div class="card-icon"><ion-icon name="eye-outline"></ion-icon></div>
                </div>
                <div class="card">
                    <div>
                        <div class="card-number">80</div>
                        <div class="cardName">Sale</div>
                    </div>
                    <div class="card-icon"><ion-icon name="cart-outline"></ion-icon></div>
                </div>
                <div class="card">
                    <div>
                        <div class="card-number">1.23k</div>
                        <div class="cardName">Daily</div>
                    </div>
                    <div class="card-icon"><ion-icon name="bar-chart-outline"></ion-icon></div>
                </div>
                <div class="card">
                    <div>
                        <div class="card-number">1.23k</div>
                        <div class="cardName">Daily</div>
                    </div>
                    <div class="card-icon"><ion-icon name="chatbox-outline"></ion-icon></div>
                </div>
            </div>
           
            <div class="details">
                 <!-- Order details list -->
                <div class="resentOrder">
                    <div class="cardHeader">
                        <h2>Recent Order</h2>
                        <a href="#" class="btn">View All</a>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <td>Tên</td>
                                <td>Giá</td>
                                <td>Đã mua</td>
                                <td>Trạng thái</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>HaiChau</td>
                                <td>100k</td>
                                <td>Paid</td>
                                <td><span class="status delievered">Delievered</span></td>
                            </tr>
                            <tr>
                                <td>HaiChau</td>
                                <td>100k</td>
                                <td>Paid</td>
                                <td><span class="status delievered">Delievered</span></td>
                            </tr>
                            <tr>
                                <td>HaiChau</td>
                                <td>100k</td>
                                <td>Paid</td>
                                <td><span class="status delievered">Delievered</span></td>
                            </tr>
                            <tr>
                                <td>HaiChau</td>
                                <td>100k</td>
                                <td>Paid</td>
                                <td><span class="status pending">Delievered</span></td>
                            </tr>
                            <tr>
                                <td>HaiChau</td>
                                <td>100k</td>
                                <td>Paid</td>
                                <td><span class="status delivered">Delievered</span></td>
                            </tr>
                            <tr>
                                <td>HaiChau</td>
                                <td>100k</td>
                                <td>Paid</td>
                                <td><span class="status delivered">Delievered</span></td>
                            </tr>
                            <tr>
                                <td>HaiChau</td>
                                <td>100k</td>
                                <td>Paid</td>
                                <td><span class="status delivered">Delievered</span></td>
                            </tr>
                            <tr>
                                <td>HaiChau</td>
                                <td>100k</td>
                                <td>Paid</td>
                                <td><span class="status delivered">Delievered</span></td>
                            </tr>
                            <tr>
                                <td>HaiChau</td>
                                <td>100k</td>
                                <td>Paid</td>
                                <td><span class="status delivered">Delievered</span></td>
                            </tr>
                            <tr>
                                <td>HaiChau</td>
                                <td>100k</td>
                                <td>Paid</td>
                                <td><span class="status delivered">Delievered</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- new customer -->
                <div class="resentCustomer">
                    <div class="cardHeader">
                        <h2>Recent Customers</h2>
                    </div>
                    <table>
                        <tr>
                            <td width="60px">
                                <div class="imgBox"><img src="./img/customers.jpg" witdh="100px" height="100px" alt=""></div>
                            </td>
                            <td>
                                <h4>HaiCute <br><span>Phú Quốc</span></h4>
                            </td>
                        </tr>
                        <tr>
                            <td width="60px">
                                <div class="imgBox"><img src="./img/customers.jpg" witdh="100px" height="100px" alt=""></div>
                            </td>
                            <td>
                                <h4>HaiCute <br><span>Phú Quốc</span></h4>
                            </td>
                        </tr>
                        <tr>
                            <td width="60px">
                                <div class="imgBox"><img src="./img/customers.jpg" witdh="100px" height="100px" alt=""></div>
                            </td>
                            <td>
                                <h4>HaiCute <br><span>Phú Quốc</span></h4>
                            </td>
                        </tr>
                        <tr>
                            <td width="60px">
                                <div class="imgBox"><img src="./img/customers.jpg" witdh="100px" height="100px" alt=""></div>
                            </td>
                            <td>
                                <h4>HaiCute <br><span>Phú Quốc</span></h4>
                            </td>
                        </tr>
                        <tr>
                            <td width="60px">
                                <div class="imgBox"><img src="./img/customers.jpg" witdh="100px" height="100px" alt=""></div>
                            </td>
                            <td>
                                <h4>HaiCute <br><span>Phú Quốc</span></h4>
                            </td>
                        </tr>
                        <tr>
                            <td width="60px">
                                <div class="imgBox"><img src="./img/customers.jpg" witdh="100px" height="100px" alt=""></div>
                            </td>
                            <td>
                                <h4>HaiCute <br><span>Phú Quốc</span></h4>
                            </td>
                        </tr>
                        <tr>
                            <td width="60px">
                                <div class="imgBox"><img src="./img/customers.jpg" witdh="100px" height="100px" alt=""></div>
                            </td>
                            <td>
                                <h4>HaiCute <br><span>Phú Quốc</span></h4>
                            </td>
                        </tr>
                        <tr>
                            <td width="60px">
                                <div class="imgBox"><img src="./img/customers.jpg" witdh="100px" height="100px" alt=""></div>
                            </td>
                            <td>
                                <h4>HaiCute <br><span>Phú Quốc</span></h4>
                            </td>
                        </tr>
                   
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script>
        //Menu togle
        let togle  = document.querySelector('.topbar-togle');
        let navigation = document.querySelector('.navigation');
        let main = document.querySelector('.main');

        togle.onclick=function(){
            navigation.classList.toggle('active');
            main.classList.toggle('active');
        }
        //add hovered class in selected list item
        let list = document.querySelectorAll('.navigation li');
        function activeLink(){
            list.forEach((item)=>item.classList.remove('hovered'));
            this.classList.add('hovered')
        }
        list.forEach((item)=>item.addEventListener('mouseover',activeLink));
    </script>
</body>
</html>