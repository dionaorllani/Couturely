<?php

if (!file_exists('components/connect.php')) {
    require_once('../components/connect.php');
  } else {
    require_once('components/connect.php');
  }

if (!isset($_SESSION)) {
    session_start();
}

class order extends database {
    private $user_id;
    private $name;
    private $number;
    private $email;
    private $method;
    private $address;
    private $total_products;
    private $total_price;
    private $dbConn;

    public function __construct($user_id='', $name='', $number='', $email='', $method='', $address='', $total_products='', $total_price='') {

        $this->user_id = $user_id;
        $this->name = $name;
        $this->number = $number;
        $this->email = $email;
        $this->method = $method;
        $this->address = $address;
        $this->total_products = $total_products;
        $this->total_price = $total_price;

        $this->dbConn = $this->getConnection();
    }

    public function getUserId(){
        return $this->user_id;
    }

    public function setUserId($user_id){
        $this->user_id = $user_id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }
    public function getNumber()
    {
        return $this->number;
    }

    public function setNumber($number)
    {
        $this->email = $number;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getMethod()
    {
        return $this->method;
    }

    public function setMethod($method)
    {
        $this->method = $method;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function setAddress($address)
    {
        $this->address = $address;
    }

    public function getTotalProducts()
    {
        return $this->total_products;
    }

    public function setTotalProducts($totalProducts)
    {
        $this->total_products = $totalProducts;
    }

    public function getTotalPrice()
    {
        return $this->total_price;
    }

    public function setTotalPrice($totalPrice)
    {
        $this->total_price = $totalPrice;
    }

    public function addOrder() {
        $checkCart = $this->conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
        $checkCart->execute([$this->user_id]);

        if ($checkCart->rowCount() > 0) {
            $insertOrder = $this->conn->prepare("INSERT INTO `orders`(user_id, name, number, email, method, address, total_products, total_price) VALUES(?,?,?,?,?,?,?,?)");
            $insertOrder->execute([$this->user_id, $this->name, $this->number, $this->email, $this->method, $this->address, $this->total_products, $this->total_price]);

            $deleteCart = $this->conn->prepare("DELETE FROM `cart` WHERE user_id = ?");
            $deleteCart->execute([$this->user_id]);

            $message[] = 'order placed successfully!';
        } else {
            $message[] = 'your cart is empty';
        }
        return $message;
    }

    public function updatePaymentStatus($order_id, $payment_status) {
        $payment_status = filter_var($payment_status, FILTER_SANITIZE_STRING);
        $update_payment = $this->dbConn->prepare("UPDATE `orders` SET payment_status = ? WHERE id = ?");
        $update_payment->execute([$payment_status, $order_id]);
        $message[] = 'payment status updated!';
        return $message;
     }

    public function deleteOrder($id) {
        $delete_order = $this->dbConn->prepare("DELETE FROM `orders` WHERE id = ?");
        $delete_order->execute([$id]);
    }
}

?>