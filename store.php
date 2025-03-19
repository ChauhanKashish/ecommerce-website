<?php
include'function.php';
include'connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>store</title>
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style-card.css">

   <!-- custom js file link  -->
   
   <link rel="stylesheet" href="css/header.css">
   <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.5.1/uicons-regular-rounded/css/uicons-regular-rounded.css'>	



</head>
<body>
<?php include'components/header-user.php'?>

  <div class='container'>
   <h3 class='title'>  products </h3>
 <div class='products-container'>
<?php echo get_product_user(); ?> 

</div>
</div>
<div class='products-preview'>
<?php echo get_product_user2(); ?> 

   </div>
</div>
      
<script src='js/script.js' ></script>
</body>
</html>