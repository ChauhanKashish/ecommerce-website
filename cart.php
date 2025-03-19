<?php  
  //start_session();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> 
    <script src="js/script.js" defer></script>
   <link rel="stylesheet" href="css/header.css">
   <!-- <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.5.1/uicons-regular-rounded/css/uicons-regular-rounded.css'>	 -->
    <link rel="stylesheet" href="css/style-card.css">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.5.1/uicons-regular-rounded/css/uicons-regular-rounded.css'>	

</head>
<body>
<?php include'components/header-user.php'?>
<?php include"function.php";?>

<div class="container">
<div class="row">
    <div class="col-lg-12 text-center border rounded bg-light my-5">
         <h1>My cart</h1>
    </div>
    <div class="col-lg-9">
    <table class="table ">
  <thead class="text-center">
  <tr>
      <th scope="col" >Sr No.</th>
      <th scope="col">Image</th>
      <th scope="col">Name</th>
      <th scope="col">Price</th>
      <th scope="col">Qty</th>
      <th scope="col">Total</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody class="text-center">
    <?php
    if(isset($_SESSION['cart']))
        {
        foreach($_SESSION['cart'] as $key => $value)
        {
        $sr=$key+1;
        echo"
        <tr scope='row'>
        <td>$sr</td>
        <td><img src='$value[item_img]' width='60px' hight='60px'></td>
        <td>$value[item_name]</td>
        <td>$value[price]<input type='hidden' class='iprice' value='$value[price]'></td>
        <td>
        <form action='add-cart.php' method='post'>
        <input type='number' class='text-center iqty' name='mod_qty' onchange='this.form.submit();' value='$value[qty]' min='1' max='10'>
        <input type='hidden'  name='pro_id' value='$value[item_id]'>
        </form>
        </td>
        <td class='itotal'></td>
        <td>
            <form action='add-cart.php' method='post'>
                <button type='submit' name='remove_pro' class=''>Remove</button>
                <input type='hidden'  name='pro_id' value='$value[item_id]'>
        </form>
        </td>
        </tr>
        ";
    }
}
else
{
    echo"No data indserted";
}
    ?>
   
    
</table>

    </div>
    <div class="col-lg-3">
        <div class="border bg-light rounded p-4">
        <h1>Grand Total:</h1>
        <br>
        <h4 class="text-right" id='gtotal'></h4>
        <?php
// Calculate grand total
$grandTotal = 0;
if (isset($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $value) {
        $grandTotal += $value['price'] * $value['qty'];
    }
    $_SESSION['grand_total'] = $grandTotal; // Store it in session
}
?>
        <br>
        <?php
        if(isset($_SESSION['cart']) && count($_SESSION['cart'])>0 && isset($_SESSION['user_id']))
        {

?>
      
    <form action="checkout2.php" method="post">
       
  <div class="form-group">
    <label for="exampleFormControlInput1">Name</label>
    <input type="text" class="form-control" name="name" id="exampleFormControlInput1" placeholder="xyz" value="<?php echo $_SESSION['username']?>" disabled>
  </div>
        <div class="form-group">
    <label for="exampleFormControlInput1">Email address</label>
    <input type="email" class="form-control" name="email" id="exampleFormControlInput1" placeholder="name@example.com" value="<?php echo $_SESSION['email']?>" disabled>
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Phone no.</label>
    <input type="tel" class="form-control"  name="phone" id="phone" placeholder="0000000000" maxlength="10" required>
  </div> 
  <div class="form-group">
    <label for="exampleFormControlInput1">Address</label>
    <input type="text" class="form-control" name="addr" id="exampleFormControlInput1" placeholder="Addr" required>
  </div> 
  <button type='submit' name='check_out' class='btn btn-block p-3 '>Check Out</button>
        </form>
        <?php  }

       
        elseif(!isset($_SESSION['user_id'])) {
         echo "<form action='checkout2.php' method='post'>
       <h3><center>after login then you process</center></h3>";

        echo"  <button type='submit' name='check_out' class='btn btn-block p-3 '>Check Out</button>
        
        </form>";

         }
         else{
            echo "<p style='font-size:200px;'><center>Add Product</center></p>
      ";

        
         }
        ?>
       
      
        </div>
    </div>
</div>
</div>
<!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->
<!-- <script>
    var gt=0;
    var iprice=document.getElementsByClassName('iprice');
    var iqty=document.getElementsByClassName('iqty');
    var itotal=document.getElementsByClassName('itotal');
    var gtotal=document.getElementById('gtotal');

   function sub_total() {
        gt = 0; // Reset grand total outside the loop
        for (var i = 0; i < iprice.length; i++) {
            itotal[i].innerText = (parseFloat(iprice[i].value) * parseFloat(iqty[i].value)); // Calculate individual total
            gt += parseFloat(itotal[i].innerText); // Update grand total
        }
        gtotal.innerText = gt; // Set grand total
    }
    //sub_total(); // Initial calculation on page load
    window.onload = sub_total;
    
</script> -->
<script>
    // Restrict input to numbers only
    document.getElementById('phone').addEventListener('input', function (e) {
        this.value = this.value.replace(/[^0-9]/g, ''); // Remove non-numeric characters
    });
</script>
  <script>
    var gt = <?php echo isset($_SESSION['grand_total']) ? $_SESSION['grand_total'] : 0; ?>;
    var iprice = document.getElementsByClassName('iprice');
    var iqty = document.getElementsByClassName('iqty');
    var itotal = document.getElementsByClassName('itotal');
    var gtotal = document.getElementById('gtotal');

    function sub_total() {
        gt = 0; // Reset grand total outside the loop
        for (var i = 0; i < iprice.length; i++) {
            itotal[i].innerText = (parseFloat(iprice[i].value) * parseFloat(iqty[i].value)); // Calculate individual total
            gt += parseFloat(itotal[i].innerText); // Update grand total
        }
        gtotal.innerText = gt; // Set grand total
    }
    window.onload = sub_total;
</script>

</body>
</html>
