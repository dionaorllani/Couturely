<?php

if (!file_exists('components/connect.php')) {
    require_once('../components/connect.php');
  } else {
    require_once('components/connect.php');
  }

if (!isset($_SESSION)) {
    session_start();
}

class product extends database{
    private $name;
    private $details;
    private $price;
    private $image_01;
    private $image_02;
    private $image_03;

    private $dbConn;

    public function __construct($name = '', $details = '', $price = '', $image_01 = '', $image_02 = '', $image_03 = '')
    {
        $this->name = $name;
        $this->details = $details;
        $this->price = $price;
        $this->image_01 = $image_01;
        $this->image_02 = $image_02;
        $this->image_03 = $image_03;

        $this->dbConn = $this->getConnection();
    }


    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getDetails()
    {
        return $this->details;
    }

    public function setDetails($details)
    {
        $this->details = $details;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function getImage_01()
    {
        return $this->image_01;
    }

    public function setImage_01($image_01)
    {
        $this->image_01 = $image_01;
    }

    public function getImage_02()
    {
        return $this->image_02;
    }

    public function setImage_02($image_02)
    {
        $this->image_02 = $image_02;
    }

    public function getImage_03()
    {
        return $this->image_03;
    }

    public function setImage_03($image_03)
    {
        $this->image_03 = $image_03;
    }

    public function addProduct()
    {
        $name = $this->name;
        $price = $this->price;
        $details = $this->details;
        $image_01 = $this->image_01;
        $image_02 = $this->image_02;
        $image_03 = $this->image_03;

        $select_products = $this->dbConn->prepare("SELECT * FROM `products` WHERE name = ?");
        $select_products->execute([$name]);

        if ($select_products->rowCount() > 0) {
            $message[] = 'Product name already exists!';
        } else {
            $insert_products = $this->dbConn->prepare("INSERT INTO `products`(name, details, price, image_01, image_02, image_03) VALUES(?,?,?,?,?,?)");
            $insert_products->execute([$name, $details, $price, $image_01, $image_02, $image_03]);

            if ($insert_products) {
                $image_size_01 = $_FILES['image_01']['size'];
                $image_tmp_name_01 = $_FILES['image_01']['tmp_name'];
                $image_folder_01 = '../uploaded_img/'.$image_01;

                $image_size_02 = $_FILES['image_02']['size'];
                $image_tmp_name_02 = $_FILES['image_02']['tmp_name'];
                $image_folder_02 = '../uploaded_img/'.$image_02;

                $image_size_03 = $_FILES['image_03']['size'];
                $image_tmp_name_03 = $_FILES['image_03']['tmp_name'];
                $image_folder_03 = '../uploaded_img/'.$image_03;

                if ($image_size_01 > 2000000 || $image_size_02 > 2000000 || $image_size_03 > 2000000) {
                    $message[] = 'Image size is too large!';
                } else {
                    move_uploaded_file($image_tmp_name_01, $image_folder_01);
                    move_uploaded_file($image_tmp_name_02, $image_folder_02);
                    move_uploaded_file($image_tmp_name_03, $image_folder_03);
                    $message[] = 'New product added!';
                }
            }
        }
        return $message;
    }

    public function deleteProduct($id)
    {
        $delete_product_image = $this->dbConn->prepare("SELECT * FROM `products` WHERE id = ?");
        $delete_product_image->execute([$id]);
        $fetch_delete_image = $delete_product_image->fetch(PDO::FETCH_ASSOC);
        unlink('../uploaded_img/'.$fetch_delete_image['image_01']);
        unlink('../uploaded_img/'.$fetch_delete_image['image_02']);
        unlink('../uploaded_img/'.$fetch_delete_image['image_03']);

        $delete_product = $this->dbConn->prepare("DELETE FROM `products` WHERE id = ?");
        $delete_product->execute([$id]);

        $delete_cart = $this->dbConn->prepare("DELETE FROM `cart` WHERE pid = ?");
        $delete_cart->execute([$id]);

        $delete_wishlist = $this->dbConn->prepare("DELETE FROM `wishlist` WHERE pid = ?");
        $delete_wishlist->execute([$id]);

        return true;
    }

    public function update($pid, $name, $details, $price, $image_01, $image_02, $image_03, $old_image_01, $old_image_02, $old_image_03)
    {
        $update_product = $this->dbConn->prepare("UPDATE `products` SET name = ?, price = ?, details = ? WHERE id = ?");
        $update_product->execute([$name, $price, $details, $pid]);

        $message[] = 'Product updated successfully!';

        if(!empty($image_01)){
            $this->updateImage($pid, $old_image_01, $image_01, 'image_01');
            $message[] = 'Image 01 updated successfully!';
        }

        if(!empty($image_02)){
            $this->updateImage($pid, $old_image_02, $image_02, 'image_02');
            $message[] = 'Image 02 updated successfully!';
        }

        if(!empty($image_03)){
            $this->updateImage($pid, $old_image_03, $image_03, 'image_03');
            $message[] = 'Image 03 updated successfully!';
        }

        return $message;
    }

    private function updateImage($pid, $old_image, $new_image, $column_name)
    {
        $image_size = $_FILES[$column_name]['size'];
        $image_tmp_name = $_FILES[$column_name]['tmp_name'];
        $image_folder = '../uploaded_img/'.$new_image;

        if($image_size > 2000000){
            throw new Exception('Image size is too large!');
        }

        $update_image = $this->dbConn->prepare("UPDATE `products` SET $column_name = ? WHERE id = ?");
        $update_image->execute([$new_image, $pid]);

        move_uploaded_file($image_tmp_name, $image_folder);

        if(!empty($old_image)){
            unlink('../uploaded_img/'.$old_image);
        }
    }
}
?>