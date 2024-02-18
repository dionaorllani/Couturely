<?php

include 'components/connect.php';

if (!isset($_SESSION)) {
   session_start();
}

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>about</title>

   <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
   
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'components/user_header.php'; ?>

<div id="page-header">

   <h2>#knowUs</h2>

   <p>Couturely</p>

</div>

<section class="about">

   <div class="row">

      <div class="image">

         <img src="icons/History.jpg "alt="">

      </div>

      <div class="content">

         <h3>Who are we? </h3>

         <p>With a global footprint, culture of innovation and team-first mentality, we take action to create a future of continual progress for custumers, fashion and our world.
            Our Purpose is to move the world forward. We take action by building community, protecting our planet and increasing access to fashion.
            Our priorities include promoting diversity, equity and inclusion for all; advancing a transparent and responsible supply chain; 
            innovating sustainable materials and methods of make that focus on our environmental impact; 
            building community by investing in organizations focused on economic empowerment, and education and equality; 
            and bringing today’s generation together through fashion and style so they can reach their full potential tomorrow.
         </p>

         <marquee bgcolor="#ccc" loop="-1" scrollamounts="5" width="100%">
            We design fashion-friendly clothes for fashion enthusiasts.
         </marquee>

         <a href="contact.php" class="btn">contact us</a>

      </div>

   </div>

</section>


<?php include 'components/footer.php'; ?>

<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

<script src="js/script.js"></script>

</body>
</html>