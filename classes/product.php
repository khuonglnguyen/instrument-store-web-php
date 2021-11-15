<?php

$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/database.php');
include_once($filepath . '/../helpers/format.php');
include_once($filepath . '/../lib/session.php');
?>

<?php
/**
 * 
 */
class product
{
    private $db;
    private $fm;
    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }

    public function insert($data, $files)
    {
        $name = mysqli_real_escape_string($this->db->link, $data['name']);
        $originalPrice = mysqli_real_escape_string($this->db->link, $data['originalPrice']);
        $promotionPrice = mysqli_real_escape_string($this->db->link, $data['promotionPrice']);
        $cateId = mysqli_real_escape_string($this->db->link, $data['cateId']);
        $des = mysqli_real_escape_string($this->db->link, $data['des']);
        $qty = mysqli_real_escape_string($this->db->link, intval($data['qty']));
        //mysqli gọi 2 biến. (catName and link) biến link -> gọi conect db từ file db

        // Check image and move to upload folder
        $permited = array('jpg', 'jpeg', 'png', 'gif');
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_temp = $_FILES['image']['tmp_name'];

        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
        $uploaded_image = "uploads/" . $unique_image;

        if ($name == '' || $originalPrice == "" || $promotionPrice == "" || $cateId == "" || $des == "" || $qty == "") {
        } else {
            move_uploaded_file($file_temp, $uploaded_image);
            $query = "INSERT INTO products VALUES (NULL,'$name','$originalPrice','$promotionPrice','$unique_image'," . Session::get('userId') . ",'".date('d/m/y')."','$cateId','$qty','$des') ";
            $result = $this->db->insert($query);
            if ($result) {
                $alert = "<span class='success'>Sản phẩm đã được thêm thành công</span>";
                return $alert;
            } else {
                $alert = "<span class='error'>Thêm sản phẩm thất bại</span>";
                return $alert;
            }
        }
    }
}
?>