<?php

if (!file_exists('components/connect.php')) {
    require_once('../components/connect.php');
  } else {
    require_once('components/connect.php');
  }
if (!isset($_SESSION)) {
    session_start();
}

class wishlist extends database{
    private $user_id;
    private $pid;
    private $name;
    private $price;
    private $image;

    private $dbConn;

    public function __construct($user_id='', $pid='', $name='', $price = '', $image = '') {

        $this->user_id = $user_id;
        $this->name = $name;
        $this->pid = $pid;
        $this->price = $price;
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

    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image)
    {
        $this->image = $image;
    }

    public function addToWishlist() {
        $user_id = $this->getUserId();
        $pid = $this->getPid();
        $name = $this->getName();
        $price = $this->getPrice();
        $image = $this->getImage();

    
        $check_wishlist_numbers = $this->dbConn->prepare("SELECT * FROM `wishlist` WHERE name = ? AND user_id = ?");
        $check_wishlist_numbers->execute([$name, $user_id]);
    
        $check_cart_numbers = $this->dbConn->prepare("SELECT * FROM `cart` WHERE name = ? AND user_id = ?");
        $check_cart_numbers->execute([$name, $user_id]);
    
        if($check_wishlist_numbers->rowCount() > 0){
            $message[] = 'already added to wishlist!';
        }elseif($check_cart_numbers->rowCount() > 0){
            $message[] = 'already added to cart!';
        }else{
            $insert_wishlist = $this->dbConn->prepare("INSERT INTO `wishlist`(user_id, pid, name, price, image) VALUES(?,?,?,?,?)");
            $insert_wishlist->execute([$user_id, $pid, $name, $price, $image]);
            $message[] = 'added to wishlist!';
        }
        return $message;
    }

    public function deleteItem($wishlist_id) {
        $conn = $this->dbConn;
        $delete_wishlist_item = $conn->prepare("DELETE FROM `wishlist` WHERE id = ?");
        $delete_wishlist_item->execute([$wishlist_id]);
    }

    public function deleteAllItems($wishlist_id) {
        $conn = $this->dbConn;
        $delete_wishlist_item = $conn->prepare("DELETE FROM `wishlist` WHERE user_id = ?");
        $delete_wishlist_item->execute([$wishlist_id]);
    }
}


?>
