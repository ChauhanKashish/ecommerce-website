<?php 
require('razorpay-php/Razorpay.php');
include('connection.php');?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check Out</title>
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
 </body>
 </html>
    
<html>
<head>
<title>checkout</title>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" media="screen">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
</head>
<body style="background-repeat: no-repeat;">
    <?php 
    include("gateway-config.php");
    use Razorpay\Api\Api;

$api = new Api($keyId, $keySecret);
    ?>
<div class="container">
<div class="row">
<div class="col-xs-12 col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">Mediguru Payment Process </h4>
                    </div>
                    <div class="panel-body">
                    <div class="form-group">
                    <label>Product Name</label>
                    <?php 
                    
                     $_SESSION['phone']=$_POST['phone'];
                     $_SESSION['addr']=$_POST['addr'];
                     $webtitle='MediGuru';
                     $displayCurrency='INR';
                     $imgurl='C:\xampp\htdocs\m\image\logo.jpg';
                     
                     $orderData = [
                        'receipt'         => '3456',
                        'amount'          => $_SESSION['grand_total'] * 100, // 2000 rupees in paise
                        'currency'        => 'INR',
                        'payment_capture' => 1 // auto capture
                    ];
                    $razorpayOrder = $api->order->create($orderData);

                    $razorpayOrderId = $razorpayOrder['id'];

                    $_SESSION['razorpay_order_id'] = $razorpayOrderId;

                    $displayAmount = $amount = $orderData['amount'];
                     if ($displayCurrency !== 'INR')
                    {
                        $url = "https://api.fixer.io/latest?symbols=$displayCurrency&base=INR";
                        $exchange = json_decode(file_get_contents($url), true);

                        $displayAmount = $exchange['rates'][$displayCurrency] * $amount / 100;
                    }

                    $data = [
                        "key"               => $keyId,
                        "amount"            => $amount,
                        "name"              => $webtitle,
                        "description"       => "Mediguru",
                        "image"             => $imgurl,
                        "prefill"           => [
                        "name"              => $_SESSION['username'],
                        "email"             => $_SESSION['email'],
                        "contact"           => $_SESSION['phone'],
                        ],
                        "notes"             => [
                        "address"           => $_SESSION['addr'],
                        "merchant_order_id" => "12312321",
                        ],
                        "theme"             => [
                        "color"             => "#F37254"
                        ],
                        "order_id"          => $razorpayOrderId,
                    ];
                    if ($displayCurrency !== 'INR')
                        {
                            $data['display_currency']  = $displayCurrency;
                            $data['display_amount']    = $displayAmount;
                        }

                        $json = json_encode($data);
                    
                    if(isset($_SESSION['cart']))
                        {
                        foreach($_SESSION['cart'] as $key => $value)
                        {
                           $val=$value['item_name'];
                           $_SESSION['val']=$val;
                           echo" 
                          <input type='text' class='form-control' name='billing_product' id='billing_product' placeholder='' required='' autofocus='' value=' $_SESSION[val]' disabled>

                           "; }}?>

                        </div>
                        <form action="payment-success.php" method="post">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" name="name" id="billing_name" placeholder="Enter name" required="" autofocus="" value="<?php echo $_SESSION['username']?>" disabled>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" id="billing_email" placeholder="Enter email" required="" value="<?php echo $_SESSION['email']?>" disabled>
                        </div>
                        
                  <div class="form-group">
                            <label>Mobile Number</label>
                            <input type="number" class="form-control" name="phone" id="billing_mobile" min-length="10" max-length="10" value="<?php echo $_SESSION['phone']?>" placeholder="Enter Mobile Number" required="" autofocus="" disabled>
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <input type="text" class="form-control" name="addr" id="billing_address" min-length="10" max-length="10" value="<?php echo $_SESSION['addr']?>" placeholder="address" required="" autofocus="" disabled>
                        </div>
                         <div class="form-group">
                            <label>Payment Amount</label>
                           
                      <input type='text' class='form-control' name='payAmount' id='payAmount' value='<?php echo $_SESSION['grand_total']?>' placeholder='Enter Amount' required='' autofocus='' disabled>
                           
                         </div>
                        </form>
						
	<center>
    <form action="payment-success.php" method="POST">
  <script
    src="https://checkout.razorpay.com/v1/checkout.js"
    data-key="<?php echo $data['key']?>"
    data-amount="<?php echo $data['amount']?>"
    data-currency="INR"
    data-name="<?php echo $data['name']?>"
    data-image="<?php echo $data['image']?>"
    data-description="<?php echo $data['description']?>"
    data-prefill.name="<?php echo $data['prefill']['name']?>"
    data-prefill.email="<?php echo $data['prefill']['email']?>"
    data-prefill.contact="<?php echo $data['prefill']['contact']?>"
    data-notes.shopping_order_id="<?php echo $_SESSION['username']?>"
    data-order_id="<?php echo $data['order_id']?>"
    <?php if ($displayCurrency !== 'INR') { ?> data-display_amount="<?php echo $data['display_amount']?>" <?php } ?>
    <?php if ($displayCurrency !== 'INR') { ?> data-display_currency="<?php echo $data['display_currency']?>" <?php } ?>
  >
  </script>
  <!-- Any extra fields to be submitted with the form but not sent to Razorpay -->
  <input type="hidden" name="shopping_order_id" value="<?php echo $_SESSION['user_id']?>">
</form>

    </center>
                       
                    </div>
                </div>
            </div>
</div>
</div>

<!--script-->
<script>
   
</script>
</body>
</html>
