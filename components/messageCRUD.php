<?php

if (!file_exists('components/connect.php')) {
    require_once('../components/connect.php');
  } else {
    require_once('components/connect.php');
  }

if (!isset($_SESSION)) {
    session_start();
}

class message extends database
{
    private $user_id;
    private $name;
    private $email;
    private $number;
    private $message;
    private $dbConn;

    public function __construct($user_id='', $name='', $number='', $email='', $message='') {

        $this->user_id = $user_id;
        $this->name = $name;
        $this->email = $email;
        $this->number = $number;
        $this->message = $message;

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
    
    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
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

    public function getMessage()
    {
        return $this->message;
    }

    public function setMessage($message)
    {
        $this->message = $message;
    }

    public function saveMessage()
    {
        $name = filter_var($this->getName(), FILTER_SANITIZE_STRING);
        $email = filter_var($this->getEmail(), FILTER_SANITIZE_STRING);
        $number = filter_var($this->getNumber(), FILTER_SANITIZE_STRING);
        $msg = filter_var($this->getMessage(), FILTER_SANITIZE_STRING);

        $select_message = $this->dbConn->prepare("SELECT * FROM `messages` WHERE name = ? AND email = ? AND number = ? AND message = ?");
        $select_message->execute([$name, $email, $number, $msg]);

        if ($select_message->rowCount() > 0) {
            $message[] = 'already sent message!';
        } else {
            $insert_message = $this->dbConn->prepare("INSERT INTO `messages`(user_id, name, email, number, message) VALUES(?,?,?,?,?)");
            $insert_message->execute([$this->getUserId(), $name, $email, $number, $msg]);

            $message[] = 'sent message successfully!';
        }
        
        return $message;
    }

    public function deleteMessage($id) {
        $delete_order = $this->dbConn->prepare("DELETE FROM `messages` WHERE id = ?");
        $delete_order->execute([$id]);
    }

}
