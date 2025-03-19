<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <!-- <link rel="stylesheet" href="style.css"> -->
	<link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.5.1/uicons-regular-rounded/css/uicons-regular-rounded.css'>	
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/style-card.css">
    <!-- <link rel="stylesheet" href="css/style2.css">  -->
</head>

<body>
<?php include'components/header-user.php'?>
    <?php include"components/banner.php";?>
    <?php include"components/div.php";?>
    <?php include"function.php";?>


    <div class="container">
 <h3 class="title">Latest  products </h3>
<div class="products-container">
<?php echo get_product_user(); ?> 
 </div>
</div>
<div class="products-preview">
<?php echo get_product_user2(); ?> 
</div>
</div>

    
    

    <!-- <?php include"aboutus.php";?> -->
    <?php include"components/user-footer.php";?>
</body>
</html>
<!-- <script src="js/main.js"></script>  -->
<script src="js/script.js" defer></script>