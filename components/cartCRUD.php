<?php

if (!file_exists('components/connect.php')) {
    require_once('../components/connect.php');
  } else {
    require_once('components/connect.php');
  }

if (!isset($_SESSION)) {
    session_start();
}

class cart extends database{
    private $user_id;
    private $pid;
    private $name;
    private $price;
    private $qty;
    private $image;

    private $dbConn;

    public function __construct($user_id='', $pid='', $name='', $price = '', $qty='', $image = '') {

        $this->user_id = $user_id;
        $this->name = $name;
        $this->pid = $pid;
        $this->price = $price;
        $this->qty = $qty;
        $this->image = $image;

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

    public function getPid()
    {
        return $this->pid;
    }

    public function setPid($pid)
    {
        $this->pid = $pid;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function getQty()
    {
        return $this->qty;
    }

    public function setQty($qty)
    {
        $this->qty = $qty;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image)
    {
        $this->image = $image;
    }

    public function addToCart() {
        $user_id = $this->getUserId();
        $pid = $this->getPid();
        $name = $this->getName();
        $price = $this->getPrice();
        $image = $this->getImage();
        $qty = $this->getQty();

        $check_cart_numbers = $this->dbConn->prepare("SELECT * FROM `cart` WHERE name = ? AND user_id = ?");
        $check_cart_numbers->execute([$name, $user_id]);

        if($check_cart_numbers->rowCount() > 0){
            $message[] = 'already added to cart!';
        }else{

            $check_wishlist_numbers = $this->dbConn->prepare("SELECT * FROM `wishlist` WHERE name = ? AND user_id = ?");
            $check_wishlist_numbers->execute([$name, $user_id]);

            if($check_wishlist_numbers->rowCount() > 0){
                $delete_wishlist = $this->dbConn->prepare("DELETE FROM `wishlist` WHERE name = ? AND user_id = ?");
                $delete_wishlist->execute([$name, $user_id]);
            }

            $insert_cart = $this->dbConn->prepare("INSERT INTO `cart`(user_id, pid, name, price, quantity, image) VALUES(?,?,?,?,?,?)");
            $insert_cart->execute([$user_id, $pid, $name, $price, $qty, $image]);
            $message[] = 'added to cart!';
            
        }
        return $message;
    }

    public function deleteItem($cart_id) {
        $conn = $this->dbConn;
        $delete_cart_item = $conn->prepare("DELETE FROM `cart` WHERE id = ?");
        $delete_cart_item->execute([$cart_id]);
    }

    public function deleteAllItems($user_id) {
        $conn = $this->dbConn;
        $delete_cart_item = $conn->prepare("DELETE FROM `cart` WHERE user_id = ?");
        $delete_cart_item->execute([$user_id]);
    }

    public function updateQuantity($cart_id, $qty) {
        $qty = filter_var($qty, FILTER_SANITIZE_STRING);
        $update_qty = $this->dbConn->prepare("UPDATE `cart` SET quantity = ? WHERE id = ?");
        $update_qty->execute([$qty, $cart_id]);
        $message[] = 'Cart quantity updated';
        return $message;
    }
}

?>
