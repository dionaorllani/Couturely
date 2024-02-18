<?php

if (!file_exists('components/connect.php')) {
    require_once('../components/connect.php');
  } else {
    require_once('components/connect.php');
  }

if (!isset($_SESSION)) {
    session_start();
}

class user extends database {
    private $name;
    private $email;
    private $password;
    private $dbConn;

    public function __construct($name = '', $email = '', $password = '')
    {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;

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

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function addUser()
    {
        $name = filter_var($this->name, FILTER_SANITIZE_STRING);
        $email = filter_var($this->email, FILTER_SANITIZE_STRING);
        $pass = sha1($this->password);
        $pass = filter_var($pass, FILTER_SANITIZE_STRING);
        $cpass = sha1($this->password);
        $cpass = filter_var($cpass, FILTER_SANITIZE_STRING);

        $select_user = $this->dbConn->prepare("SELECT * FROM `users` WHERE email = ?");
        $select_user->execute([$email]);
        $row = $select_user->fetch(PDO::FETCH_ASSOC);

        if ($select_user->rowCount() > 0) {
            $message[] = 'email already exists!';
        } else {
            if ($pass != $cpass) {
                $message[] = 'confirm password not matched!';
            } else {
                $insert_user = $this->dbConn->prepare("INSERT INTO `users`(name, email, password) VALUES(?,?,?)");
                $insert_user->execute([$name, $email, $cpass]);
                $message[] = 'registered successfully, login now please!';
            }
        }
        return $message;
    }

    public function deleteUser($id)
    {
        $delete_user = $this->dbConn->prepare("DELETE FROM `users` WHERE id = ?");
        $delete_user->execute([$id]);

        $delete_orders = $this->dbConn->prepare("DELETE FROM `orders` WHERE user_id = ?");
        $delete_orders->execute([$id]);

        $delete_messages = $this->dbConn->prepare("DELETE FROM `messages` WHERE user_id = ?");
        $delete_messages->execute([$id]);

        $delete_cart = $this->dbConn->prepare("DELETE FROM `cart` WHERE user_id = ?");
        $delete_cart->execute([$id]);

        $delete_wishlist = $this->dbConn->prepare("DELETE FROM `wishlist` WHERE user_id = ?");
        $delete_wishlist->execute([$id]);
    }

    public function updateUser($user_id, $email, $name, $prev_pass, $old_password, $new_password) {
        $conn = $this->dbConn;
    
        $name = filter_var($name, FILTER_SANITIZE_STRING);
        $email = filter_var($email, FILTER_SANITIZE_STRING);
    
        $update_profile = $conn->prepare("UPDATE `users` SET name = ?, email = ? WHERE id = ?");
        $update_profile->execute([$name, $email, $user_id]);
    
        $empty_pass = 'da39a3ee5e6b4b0d3255bfef95601890afd80709';
        $old_pass = sha1($old_password);
        $old_pass = filter_var($old_pass, FILTER_SANITIZE_STRING);
        $new_pass = sha1($new_password);
        $new_pass = filter_var($new_pass, FILTER_SANITIZE_STRING);
        $confirm_pass = sha1($_POST['cpass']);
        $confirm_pass = filter_var($confirm_pass, FILTER_SANITIZE_STRING);
    
        if($old_pass == $empty_pass){
            $message[] = 'please enter old password!';
        }elseif($old_pass != $prev_pass){
            $message[] = 'old password not matched!';
        }elseif($new_pass != $confirm_pass){
            $message[] = 'confirm password not matched!';
        }else{
            if($new_pass != $empty_pass){
                $update_admin_pass = $conn->prepare("UPDATE `users` SET password = ? WHERE id = ?");
                $update_admin_pass->execute([$confirm_pass, $user_id]);
                $this->setPassword($new_pass);
                $message[] = 'password updated successfully!';
            }else{
                $message[] = 'please enter a new password!';
            }
        }
    
        return $message;
    }

    public function authentificateUser($email, $pass){
        $conn = $this->dbConn;
        
        $email = filter_var($email, FILTER_SANITIZE_STRING);
        $pass = filter_var($pass, FILTER_SANITIZE_STRING);
     
        $select_user = $conn->prepare("SELECT * FROM `users` WHERE email = ? AND password = ?");
        $select_user->execute([$email, $pass]);
        $row = $select_user->fetch(PDO::FETCH_ASSOC);
     
        if($select_user->rowCount() > 0){
           $_SESSION['user_id'] = $row['id'];
           header('location:home.php');
        }else{
           $message[] = 'incorrect username or password!';
        }
        return $message;
    }

}
?>