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
            $query = "INSERT INTO products VALUES (NULL,'$name','$originalPrice','$promotionPrice','$unique_image'," . Session::get('userId') . ",'" . date('d/m/y') . "','$cateId','$qty','$des',1) ";
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

    public function getAllAdmin()
    {
        $query =
            "SELECT products.*, categories.name as cateName, users.fullName
			 FROM products INNER JOIN categories ON products.cateId = categories.id INNER JOIN users ON products.createdBy = users.id
			 order by products.id desc ";
        $result = $this->db->select($query);
        return $result;
    }

    public function getAll()
    {
        $query =
            "SELECT products.*, categories.name as cateName, users.fullName
			 FROM products INNER JOIN categories ON products.cateId = categories.id INNER JOIN users ON products.createdBy = users.id
			 WHERE products.status = 1
             order by products.id desc ";
        $result = $this->db->select($query);
        return $result;
    }

    public function update($data, $files)
    {
        $name = mysqli_real_escape_string($this->db->link, $data['name']);
        $originalPrice = mysqli_real_escape_string($this->db->link, $data['originalPrice']);
        $promotionPrice = mysqli_real_escape_string($this->db->link, $data['promotionPrice']);
        $cateId = mysqli_real_escape_string($this->db->link, $data['cateId']);
        $des = mysqli_real_escape_string($this->db->link, $data['des']);
        $qty = mysqli_real_escape_string($this->db->link, intval($data['qty']));

        $permited  = array('jpg', 'jpeg', 'png', 'gif');

        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_temp = $_FILES['image']['tmp_name'];

        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        // $file_current = strtolower(current($div));
        $unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
        $uploaded_image = "uploads/" . $unique_image;


        if ($name == '' || $originalPrice == "" || $promotionPrice == "" || $cateId == "" || $des == "" || $qty == "") {
            $alert = "<span class='error'>Vui lòng nhập đầy đủ thông tin sản phẩm</span>";
            return $alert;
        } else {

            //If user has chooose new image
            if (!empty($file_name)) {
                if (in_array($file_ext, $permited) === false) {
                    $alert = "<span class='success'>Vui lòng chọn hình ảnh đúng định dạng:-" . implode(', ', $permited) . "</span>";
                    return $alert;
                }
                move_uploaded_file($file_temp, $uploaded_image);
                $query = "UPDATE products SET 
					name ='$name',
					cateId = '$cateId',
					originalPrice = '$originalPrice',
					promotionPrice = '$promotionPrice',
					des = '$des',
					qty = '$qty',
					image = '$unique_image'
					 WHERE id = " . $data['id'] . " ";
            } else {
                $query = "UPDATE products SET 
					name ='$name',
					cateId = '$cateId',
					originalPrice = '$originalPrice',
					promotionPrice = '$promotionPrice',
					des = '$des',
					qty = '$qty'
					 WHERE id = " . $data['id'] . " ";
            }
            $result = $this->db->update($query);
            if ($result) {
                $alert = "<span class='success'>Cập nhật sản phẩm thành công</span>";
                return $alert;
            } else {
                $alert = "<span class='error'>Cập nhật sản phẩm thất bại</span>";
                return $alert;
            }
        }
    }

    public function getProductbyIdAdmin($id)
    {
        $query = "SELECT * FROM products where id = '$id'";
        $result = $this->db->select($query);
        return $result;
    }

    public function getProductbyId($id)
    {
        try {
            $query = "SELECT * FROM products where id = '$id' AND status = 1";
            $result = $this->db->select($query);
            return $result;
        } catch (\Throwable $th) {
            return [];
        }
    }

    public function block($id)
    {
        $query = "UPDATE products SET status = 0 where id = '$id' ";
        $result = $this->db->delete($query);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function active($id)
    {
        $query = "UPDATE products SET status = 1 where id = '$id' ";
        $result = $this->db->delete($query);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
}
?>