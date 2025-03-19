</center><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clickable Div</title>
    <style>
        .body1 {
            display: flex;
            justify-content: left;
            align-items: center;
            /* height: 100vh; */
            margin: 50px;
            
        }

        .clickable-box {
            width: 400px;
            height: 100px;
            background-color:  rgb(23, 161, 105); /* Light green */
            color: black;
            border-radius: 10px;
            cursor: pointer;
            text-align: center;
            line-height: 100px; /* Center text vertically */
            transition: background-color 0.3s;
        }

        .clickable-box:hover {
            background-color: #76c7a9; /* Slightly darker green on hover */
        }
    </style>
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
    <div class="body1">
    <div class="clickable-box" id="redirectBox1">
       <h2 styl=""> Click hear to upload priscription!</h2>
    </div>
    </div>
    
    <!-- <h1>Search Bar Example</h1>
    <input type="text" id="searchInput" placeholder="Search..." oninput="filterList()">
    <ul id="itemList">
        <li>Apple</li>
        <li>Banana</li>
        <li>Cherry</li>
        <li>Date</li>
        <li>Elderberry</li>
        <li>Fig</li>
        <li>Grape</li>
    </ul> -->
    
<div class="container">
 <h3 class="title">Medicine </h3>
<div class="products-container">
<?php echo get_product_medicine(); ?> 
 </div>
</div>
<div class="products-preview">
<?php echo get_product_medicine2(); ?> 
</div>
</div>


</body>
</html>
<script>
        document.getElementById('redirectBox1').addEventListener('click', function() {
            window.location.href = 'up-prisc.php'; // Change to your target URL
        });
    </script>
<script src="js/script.js" defer></script>
<!-- <script>
        function filterList() {
            const input = document.getElementById('searchInput').value.toLowerCase();
            const items = document.getElementById('itemList').getElementsByTagName('li');

            for (let i = 0; i < items.length; i++) {
                const item = items[i].textContent.toLowerCase();
                items[i].style.display = item.includes(input) ? '' : 'none';
            }
        }
    </script> -->

