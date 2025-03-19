<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Health care</title>
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <!-- <link rel="stylesheet" href="style.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

	<link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.5.1/uicons-regular-rounded/css/uicons-regular-rounded.css'>	
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/style-card.css">
</head>
<body>
<?php include'components/header-user.php'?>
<?php include"function.php";?>
<div class="container">
 <h3 class="title">Latest  products </h3>
<div class="products-container">
<?php echo get_product_health(); ?> 
 </div>
</div>
<div class="products-preview">
<?php echo get_product_health2(); ?> 
</div>
</div>
</body>
</html>
<script src="js/script.js" defer></script>