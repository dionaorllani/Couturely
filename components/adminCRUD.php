<?php

if (!file_exists('components/connect.php')) {
    require_once('../components/connect.php');
  } else {
    require_once('components/connect.php');
  }

if (!isset($_SESSION)) {
    session_start();
}

class admin extends database {
    private $name;
    private $password;
    private $dbConn;

    public function __construct($name = '', $password = '')
    {
        $this->name = $name;
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

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function addAdmin()
    {
        $name = filter_var($this->name, FILTER_SANITIZE_STRING);
        $pass = sha1($this->password);
        $pass = filter_var($pass, FILTER_SANITIZE_STRING);
        $cpass = sha1($this->password);
        $cpass = filter_var($cpass, FILTER_SANITIZE_STRING);

        $select_admin = $this->dbConn->prepare("SELECT * FROM `admins` WHERE name = ?");
        $select_admin->execute([$name]);
        $row = $select_admin->fetch(PDO::FETCH_ASSOC);

        if ($select_admin->rowCount() > 0) {
            $message[] = 'username already exists!';
        } else {
            if ($pass != $cpass) {
                $message[] = 'confirm password not matched!';
            } else {
                $insert_admin = $this->dbConn->prepare("INSERT INTO `admins`(name, password) VALUES(?,?)");
                $insert_admin->execute([$name, $cpass]);
                $message[] = 'new admin registered successfully!';
                   }
        }
        return $message;
    }
    
    public function updateAdmin($admin_id, $name, $prev_pass, $old_password, $new_password) {
        $conn = $this->dbConn;
    
        $name = filter_var($name, FILTER_SANITIZE_STRING);
    
        $update_profile_name = $conn->prepare("UPDATE `admins` SET name = ? WHERE id = ?");
        $update_profile_name->execute([$name, $admin_id]);
    
        $empty_pass = 'da39a3ee5e6b4b0d3255bfef95601890afd80709';
        $old_pass = sha1($old_password);
        $old_pass = filter_var($old_pass, FILTER_SANITIZE_STRING);
        $new_pass = sha1($new_password);
        $new_pass = filter_var($new_pass, FILTER_SANITIZE_STRING);
        $confirm_pass = sha1($_POST['confirm_pass']);
        $confirm_pass = filter_var($confirm_pass, FILTER_SANITIZE_STRING);
    
        if($old_pass == $empty_pass){
            $message[] = 'please enter old password!';
        }elseif($old_pass != $prev_pass){
            $message[] = 'old password not matched!';
        }elseif($new_pass != $confirm_pass){
            $message[] = 'confirm password not matched!';
        }else{
            if($new_pass != $empty_pass){
                $update_admin_pass = $conn->prepare("UPDATE `admins` SET password = ? WHERE id = ?");
                $update_admin_pass->execute([$confirm_pass, $admin_id]);
                $this->setPassword($new_pass);
                $message[] = 'password updated successfully!';
            }else{
                $message[] = 'please enter a new password!';
            }
        }
    
        return $message;
    }

    public function deleteAdmin($id){
        $delete_user = $this->dbConn->prepare("DELETE FROM `admins` WHERE id = ?");
        $delete_user->execute([$id]);
    }

    public function authentificateAdmin($name, $pass){
        $conn = $this->dbConn;

        $name = filter_var($name, FILTER_SANITIZE_STRING);
        $pass = filter_var($pass, FILTER_SANITIZE_STRING);

        $select_admin = $conn->prepare("SELECT * FROM `admins` WHERE name = ? AND password = ?");
        $select_admin->execute([$name, $pass]);
        $row = $select_admin->fetch(PDO::FETCH_ASSOC);

        if($select_admin->rowCount() > 0){
            $_SESSION['admin_id'] = $row['id'];
            header('location:dashboard.php');
        }else{
            $message[] = 'incorrect username or password!';
        }
        return $message;
    }
}
?>