 <?php
 include 'components/wishlistCRUD.php';
 include 'components/cartCRUD.php';

if(isset($_POST['add_to_wishlist'])){
   if($user_id == ''){
      header('location:user_login.php');
   }else{

   $pid = $_POST['pid'];
   $pid = filter_var($pid, FILTER_SANITIZE_STRING);
   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $price = $_POST['price'];
   $price = filter_var($price, FILTER_SANITIZE_STRING);
   $image = $_POST['image'];
   $image = filter_var($image, FILTER_SANITIZE_STRING);

   $wishlist = new wishlist($user_id, $pid, $name, $price, $image);
   $message = $wishlist->addToWishlist();
   }
}

if(isset($_POST['add_to_cart'])){
   if($user_id == ''){
      header('location:user_login.php');
   }else{

   $pid = $_POST['pid'];
   $pid = filter_var($pid, FILTER_SANITIZE_STRING);
   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $price = $_POST['price'];
   $price = filter_var($price, FILTER_SANITIZE_STRING);
   $image = $_POST['image'];
   $image = filter_var($image, FILTER_SANITIZE_STRING);
   $qty = $_POST['qty'];
   $qty = filter_var($qty, FILTER_SANITIZE_STRING);

   $cart = new cart($user_id, $pid, $name, $price, $qty, $image);
   $message = $cart->addToCart();
   }

} 

?>