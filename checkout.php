<?php include('connection.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>check out</title>
    <link rel="stylesheet" href="css/header.css">
</head>
<body>
<?php include'components/header-user.php'?>
<?php
 if(isset($_SESSION['logged_in'])&& $_SESSION['logged_in']=true)
    {
      // echo"<h1 style='text-align:center;margin-top:200px;'>HEllo-$_SESSION[user_id]</h1>";
     
    }
    else
    {
    echo"
    <script>
            alert('Plz login');
            window.location.href = 'cart.php';
        </script>";
    }
 ?> 

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['check_out'])) {
        $order = mt_rand(10000, 99999); // Random order ID

        // Prepare the SQL query
        $query = "INSERT INTO `order_manage` (`order_id`, `user_id`, `name`, `email`, `phone`, `address`, `payment`) VALUES (?, ?, ?, ?, ?, ?, '$_SESSION[grand_total] ')";
        
        // Prepare the statement
        $stmt1 = mysqli_prepare($conn, $query);

        // Bind parameters
        mysqli_stmt_bind_param($stmt1, 'iissss', $order, $_SESSION['user_id'], $_POST['name'], $_POST['email'], $_POST['phone'], $_POST['addr']);
        
        // Execute the statement
        if (mysqli_stmt_execute($stmt1)) {
            //$order_id = mysqli_insert_id($conn);
            $order_id = mysqli_insert_id($conn);
            // Prepare second SQL query for user_order
            $query2 = "INSERT INTO `user_order` (`user_id`, `order_id`, `pro_name`, `price`, `qty`) VALUES (?, ?, ?, ?, ?)";
            $stmt2 = mysqli_prepare($conn, $query2);

            if ($stmt2) {
                // Bind parameters for the second query
                mysqli_stmt_bind_param($stmt2, 'iisss', $_SESSION['user_id'], $order_id, $pro_name, $price, $qty);
                
                // Insert each item in the cart
                foreach ($_SESSION['cart'] as $key => $value) {
                    $pro_name = $value['item_name'];
                    $price = $value['price'];
                    $qty = $value['qty'];
                    mysqli_stmt_execute($stmt2);
                }

                // Clear the cart after successful order
                unset($_SESSION['cart']);
                echo "<script>
                        alert('Order placed');
                        window.location.href = 'user-order.php';
                      </script>";
            } else {
                echo "<script>
                        alert('Database error');
                        window.location.href = 'cart.php';
                      </script>";
            }
        } else {
            echo "<script>
                    alert('Data not inserted');
                    window.location.href = 'cart.php';
                  </script>";
        }
    }
}

?>
</body>
</html>