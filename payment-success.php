<?php 
require('razorpay-php/Razorpay.php');
//error_reporting(0);
include('connection.php');
include('function.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <style>
      body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin-top: 100px;
    padding: 20px;
    justify-content: center;
}

.container {
    max-width: 600px;
    margin: 0 auto;
    background: white;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

h1 {
    text-align: center;
    color: #333;
}

.invoice-details {
    margin-bottom: 20px;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

th, td {
    padding: 10px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

th {
    background-color: #f2f2f2;
}

tfoot td {
    font-weight: bold;
    background-color: #f9f9f9;
}

.buttons {
    margin-top: 20px;
    text-align: center;
}

button {
    padding: 10px 20px;
    margin: 5px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    background-color: #007BFF;
    color: white;
    font-size: 16px;
}

button:hover {
    background-color: #0056b3;
}

    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>verify</title>
   
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
  </head>
  <div style="display:none;"><?php 
  
include'components/header-user.php';

   ?> </div>
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
 <body>
 
            <?php 
 use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;

$success = true;
include("gateway-config.php");
$error = "Payment Failed";

if (empty($_POST['razorpay_payment_id']) === false)
{
    $api = new Api($keyId, $keySecret);

    try
    {
        // Please note that the razorpay order ID must
        // come from a trusted source (session here, but
        // could be database or something else)
        $attributes = array(
            'razorpay_order_id' => $_SESSION['razorpay_order_id'],
            'razorpay_payment_id' => $_POST['razorpay_payment_id'],
            'razorpay_signature' => $_POST['razorpay_signature']
        );

        $api->utility->verifyPaymentSignature($attributes);
    }
    catch(SignatureVerificationError $e)
    {
        $success = false;
        $error = 'Razorpay Error : ' . $e->getMessage();
    }
}

if ($success === true)
{

  
   $post_hash=$_SESSION['razorpay_order_id'];
   if(isset($_POST['razorpay_payment_id']))
   {
    $txnid=$_POST['razorpay_payment_id'];
    $amount=$_SESSION['grand_total'];
    $status='success';
    $eid=$_POST['shopping_order_id'];
    $subject='Your paymenr successful';
    $key_value='okpmt';
    $currency='INR';
    // $date=new DateTime(null, new DateTimeZone("Asia/Kolkata"));
    //$payment_date=$order->formate('Y-m-d H:i:s');
    
        if (isset($eid)) {
            $order = $post_hash; // Random order ID
            $status='panding';
            // Prepare the SQL query
            $query = "INSERT INTO `order_manage` (`pay_id`, `user_id`, `name`, `email`, `phone`, `address`, `payment`, `status`) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
            
            // Prepare the statement
            $stmt1 = mysqli_prepare($conn, $query);
    
            // Bind parameters
            mysqli_stmt_bind_param($stmt1, 'sissssss', $_POST['razorpay_payment_id'], $_SESSION['user_id'], $_SESSION['username'], $_SESSION['email'], $_SESSION['phone'], $_SESSION['addr'],$_SESSION['grand_total'],$status);
            
            // Execute the statement
            if (mysqli_stmt_execute($stmt1)) {
                //$order_id = mysqli_insert_id($conn);
                $order_id = mysqli_insert_id($conn);
                // Prepare second SQL query for user_order
                $query2 = "INSERT INTO `user_order` (`pay_id`,`user_id`, `order_id`, `pro_name`, `price`, `qty`) VALUES (?,?, ?, ?, ?, ?)";
                $stmt2 = mysqli_prepare($conn, $query2);
    
                if ($stmt2) 
                {
                    // Bind parameters for the second query
                    mysqli_stmt_bind_param($stmt2, 'siisss',$_POST['razorpay_payment_id'],$_SESSION['user_id'], $order_id, $pro_name, $price, $qty);
                    
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

   }

else
{
    $html = "
										<p>Your payment failed</p>
										<p>{$error}</p>";
                   $error_found=1;
}
if(isset($html)){
echo $html;
}
 
 ?>
  <!-- <center> -->
           
                        
      
    <div class="container">
    <h4 class="panel-title">Mediguru Payment Process(<span style="color:green;">Successful</span>) </h4>

        <h1>Invoice</h1>
        <div class="invoice-details">
            <p><strong>Invoice Number:</strong>   <?php echo $_POST['razorpay_payment_id']?></p>
           <?php $dateTime = new DateTime(); // Current date and time
echo" 
              <p><strong>Date:</strong>  {$dateTime->format('Y-m-d H:i:s')} </p>
           " ;?>
            <p><strong>Customer Name:  </strong> <?php echo $_SESSION['username']?></p>
        </div>
        <table>
            <thead>
               <tr>
                    <th>Item</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                </tr>
                
            </thead>
            <tbody>
           <?php  
            $sql="SELECT * FROM `user_order` WHERE  pay_id='$_POST[razorpay_payment_id]'";
            $check=mysqli_query($conn,$sql);
            while($result=mysqli_fetch_assoc($check)){
              $total=($result['price'])*($result['qty']);
            echo "
           <tr>
            <td>$result[pro_name]</td>
            <td>$result[price]</td>
            <td>$result[qty]</td>
            <td>$total</td>
        </tr>
            ";
            
           }
           ?>
           </tbody>
            <tfoot>
                <tr>
                    <td colspan="3">Total</td>
                    <td>₹<?php echo $_SESSION['grand_total']?></td>
                </tr>
            </tfoot>
        </table>
        <div class="buttons">
            <button onclick="window.print()">Print Invoice</button>
            <button onclick="window.location.href='user-order.php'">Back</button>
        </div>
    </div>


  </body>
</html>