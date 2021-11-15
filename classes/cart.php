<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/database.php');
include_once($filepath . '/../lib/session.php');
include_once($filepath . '/../helpers/format.php');
?>


 
<?php
/**
 * 
 */
class cart
{
    private $db;
    private $fm;
    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function add($productId)
    {
        $productId = mysqli_real_escape_string($this->db->link, $productId);
        $userId = Session::get('userId');

        $query = "SELECT * FROM products WHERE id = '$productId' ";
        $result = $this->db->select($query)->fetch_assoc();
        $productName = $result["name"];
        $productPrice = $result["promotionPrice"];
        $image = $result["image"];
        $checkcart = "SELECT * FROM cart WHERE productId = '$productId' AND userId = '$userId' ";
        $check_cart = $this->db->select($checkcart);
        if (is_a($check_cart, 'mysqli')) {
            $query_insert = "UPDATE cart SET qty = qty + 1 WHERE productId = $productId";
            $insert_cart = $this->db->update($query_insert);
            if ($insert_cart) {
                header('Location:checkout.php');
            } else {
                header('Location:404.php');
            }
        } else {
            $query_insert = "INSERT INTO cart VALUES(NULL,'$userId','$productId',1,'$productName','$productPrice','$image' )";
            $insert_cart = $this->db->insert($query_insert);
            if ($insert_cart) {
                header('Location:checkout.php');
            } else {
                header('Location:404.php');
            }
        }
    }
}
?>