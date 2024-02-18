<?php

include 'components/userCRUD.php';

if (!isset($_SESSION)) {
   session_start();
}

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

if(isset($_POST['submit'])){

   $name = $_POST['name'];
   $email = $_POST['email'];
   $pass = $_POST['pass'];

   $user = new user($name, $email, $pass);
   $message = $user->addUser();
} 

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>register</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'components/user_header.php'; ?>

<section class="form-container">

   <form action="" method="post" onsubmit="return validateForm()">
      <h3>register now</h3>
      <input type="text" name="name" id="name" required placeholder="enter your username" maxlength="20"  class="box">
      <input type="email" name="email" id="email" required placeholder="enter your email" maxlength="50"  class="box">
      <input type="password" name="pass" id="pass" required placeholder="enter your password" maxlength="20"  class="box">
      <input type="password" name="cpass" id="cpass" required placeholder="confirm your password" maxlength="20"  class="box">
      <input type="submit" value="register now" class="btn" name="submit">
      <p>already have an account?</p>
      <a href="user_login.php" class="option-btn">login now</a>
   </form>

</section>





<?php include 'components/footer.php'; ?>

<script src="js/validation.js"></script>
<script src="js/script.js"></script>

</body>
</html>