<?php

require_once("app/Model/Model.php");

class Order extends Model
{
    protected $table = 'oders';
    public function createOrder($data){
        $userId = $_SESSION['user']['id'];
        $fullname = $data['fullname'];
        $phoneNumber = $data['phoneNumber'];
        $city = $data['city'];
        $address = $data['address'];
        $email = $data['email'];
        $note = $data['note'];
        $pay = $data['pay'];
        $total = $data['total'];
        $status = "chờ xác nhận";
        
        $sql = "INSERT INTO oders (user_id ,fullname, phoneNumber, city, address, email, note, pay, oder_date, status, total_money) 
                VALUES ($userId, '$fullname', '$phoneNumber', '$city', '$address','$email' , '$note' , '$pay', NOW(), '$status', $total)";
        
        return $this->dbConnection->query($sql);
    }

    public function getOrderId()
    {
        $query = "SELECT id FROM oders ORDER BY id DESC LIMIT 1";
        $result = $this->dbConnection->query($query);

        return $result->fetch_assoc();
    }

    public function getAllOrders()
    {
        $sql = "SELECT * FROM oders WHERE status = 'chờ xác nhận'";

        $result = $this->dbConnection->query($sql);
        
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function updateStatusOrder($orderId)
    {
        $sql = "UPDATE oders SET status = 'đã xác nhận' WHERE id = $orderId";

        $result = $this->dbConnection->query($sql); 

        return $result;
    }

    public function listConfirmOrder()
    {
        // if($confirmOrder == 1) {
            $sql = "SELECT * FROM oders WHERE status IS NOT NULL order by  id DESC";

            $result = $this->dbConnection->query($sql);
            // print_r($result->fetch_all(MYSQLI_ASSOC));die();
            return $result->fetch_all(MYSQLI_ASSOC);
        // }
    }

    public function updateStatusOrderSuccess($orderId)
    {
        $sql = "UPDATE oders SET status = 'đã thành công' WHERE id = $orderId";

        $result = $this->dbConnection->query($sql); 

        return $result;
    }

    public function updateStatusOrderDis($orderId)
    {
        $sql = "UPDATE oders SET status = 'đã hủy đơn' WHERE id = $orderId";

        $result = $this->dbConnection->query($sql); 

        return $result;
    }
    
    public function countSuccessOrder()
    {
        $sql = "SELECT id FROM oders WHERE status ='đã thành công'";
        $result = $this->dbConnection->query($sql);
        // print_r($result->fetch_assoc());die();
        return mysqli_num_rows($result);
    }

    public function getTotalForMonth()
    {
        $sql = "SELECT MONTH(oder_date) AS date, SUM(total_money) AS total FROM oders
                WHERE MONTH(oder_date) = MONTH(NOW()) AND status = 'đã thành công'
                GROUP BY MONTH(oder_date)";

        $result = $this->dbConnection->query($sql);

        return $result->fetch_assoc();
    }

    public function listOrders()
    {
        $sql = "SELECT * FROM oders order by id DESC";

        $result = $this->dbConnection->query($sql);
        
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function get($id)
    {
        $sql = "SELECT * FROM oders WHERE id = $id";

        $result = $this->dbConnection->query($sql);
        
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function search($key)
    {
        $sql = "SELECT * FROM oders WHERE id = $key";

        $result = $this->dbConnection->query($sql);
        
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}