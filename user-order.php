<html>
    <?php session_start(); ?>
<head>
    <style>
        body{
           background-color: #e3e3e3; 
        }
        table{
            background-color: white;
        }
        /* .update,.delete{
    background-color: orange;
    color: white;
    border: 0;
    outline: none;
    border-radius: 5px;
    height: 23px;
    width: 80px;
    font-weight: bold;
    cursor: pointer;
  }
  .delete{
    background-color: orange;
  } */

   .btn
   {
           background-color: rgb(23, 161, 105); 
			margin-left: 10px; 
			border-radius: 10px; 
			padding: 10px; 
			width: 90px;
			border: none;
  }
   button a {
			color: white; 
			font-weight: bold; 
			font-size: 15px;
			
		}
        button:hover {
           background-color: rgb(247, 246, 246);
            color:black;
		}
        a:hover {
           /* background-color: rgb(247, 246, 246); */
            color:black;
		}
    </style>

</head>  

<?php include('connection.php');
// error_reporting(0);

$query="SELECT * FROM `order_manage`  WHERE `user_id`='$_SESSION[user_id]' order by id desc";
$data=mysqli_query($conn, $query);
// FOR TOTAL USER 
// $total=mysqli_num_rows($data);
// echo $total;

$total=mysqli_num_rows($data);
// echo $total;



if($total != 0)
{
    ?>
    <button type="button" class="btn"><a href="http://localhost/m/cart.php">Back</a></button>
<h2 align="center" >Display orders</h2>

<center><table border="" cellspacing="7" width="100%">
    <tr>
    <th width="7%">Order id</th>
    <th width="10%">User id</th>
    <th width="15%">Name</th>
     <th width="20%">Email</th>
     <th width="48%">Orders</th>
    </tr>
<?php
    // echo"Table has records";
    $sno = 1;
  while($result=mysqli_fetch_assoc($data)  )
   {
    echo" <tr>
        <td>".$sno++."</td>
        <td>".$result['user_id']."</td>
        <td>".$result['name']."</td>
        <td>".$result['email']."</td>
        <td>
        <table border=0 cellspacing='7' width='100%' style='color:solidBlack;'>
        <tr>
        <th>Payment Id</th>
        <th>Order Id</th>
        <th>Product Name</th>
        <th>Price</th>
        <th>Qty</th>
        <th>Total</th>
        </tr>
        ";
        // $query2="SELECT * FROM `user_order` where `user_id`='$user_featch[order_id]'";
        $query2="SELECT * FROM `user_order` WHERE `order_id`='$result[id]'";
        $data2=mysqli_query($conn, $query2);
         $total2=mysqli_num_rows($data2);
        
        $gtotal=0;
        while($result2=mysqli_fetch_assoc($data2))
        {
            $total=$result2['price']*$result2['qty'];
                    $gtotal+=$total;
          echo" <tr> 
          <td>$result2[pay_id]</td>
          <td>$result2[order_id]</td>
          <td>$result2[pro_name]</td>
          <td>₹$result2[price]</td>
          <td>$result2[qty]</td>
          <td>₹$total</td>

      </tr> "; }
      ?>
    
          <tr>
        <td >Total</td>
        <td></td>
         <td></td>
         <td></td>
         <td></td>
         <td colspan='5'>₹<?php echo $gtotal ?></td>
         </tr> 
         <tr>
        <td >Action</td>
        <td></td>
         <td></td>
         <td></td>
         
         <td rowspan='2'><a href='delete.php?uoid=<?php echo $result["pay_id"]; ?>' onclick="return confirm('Delete this order?');">                
                   <button type='button' style='background-color:red;color:black;border-radius:20px;'>Delete</button>
                </a></td>
         </tr> 
     </table>
    </td>
       
       </tr>";
        
 <?php  }


}
// <td><a href='update.php?id=$result[id]'><input type='submit' value='Update' class='update'></a>
// <a href='delete.php?id=$result[id]'><input type='submit' value='Delete' class='delete'></a></td>

else
    {
        echo"No records found";
    }
?>
</center></table></html>