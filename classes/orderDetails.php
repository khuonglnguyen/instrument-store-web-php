<?php
include_once('../lib/database.php');
include_once('../lib/session.php');
include_once('../classes/cart.php');
?>


 
<?php
/**
 * 
 */
class orderDetails
{
    private $db;
    public function __construct()
    {
        $this->db = new Database();
    }

    public function getOrderDetails($orderId)
    {
        $query = "SELECT * FROM order_details WHERE orderId = $orderId ";
        $mysqli_result = $this->db->select($query);
        if ($mysqli_result) {
            $result = mysqli_fetch_all($this->db->select($query), MYSQLI_ASSOC);
            return $result;
        }
        return false;
    }
}
?>