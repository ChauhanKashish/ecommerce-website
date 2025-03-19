<?php
include('connection.php');
include'function.php';
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="zxx">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Sales</title>
    <link rel="icon" href="img/logo.png" type="image/png">
    <link rel="stylesheet" href="css/bootstrap1.min.css" />
    <?php include'components/link.php'?>
  </head>
  <body class="crm_body_bg">
  <?php include'components/header.php'?>


<?php
 

$query="SELECT * FROM `order_manage`";
$data=mysqli_query($conn, $query);


$total=mysqli_num_rows($data);


// $_SESSION['status']=$data['status'];
// $status=$_SESSION['status'];
if($total != 0)
{
    ?>
<body class="crm_body_bg">
  <?php include'components/header.php'?>
  <section class="main_content dashboard_part large_header_bg">
      <div class="container-fluid g-0">
        <div class="row">
          <div class="col-lg-12 p-0 ">
            <div class="header_iner d-flex justify-content-between align-items-center">
              <div class="sidebar_icon d-lg-none">
                <i class="ti-menu"></i>
              </div>
              <div class="serach_field-area d-flex align-items-center">
                <div class="search_inner">
                  <form action="#">
                    <div class="search_field">
                      <input type="text" placeholder="Search here..." id='myinput' onkeyup="search()">
                    </div>
                    <button type="submit">
                      <img src="img/icon/icon_search.svg" alt>
                    </button>
                  </form>
                </div>
                <span class="f_s_14 f_w_400 ml_25 white_text text_white">Apps</span>
              </div>
              <div class="header_right d-flex justify-content-between align-items-center">
                <div class="header_notification_warp d-flex align-items-center">
                  
                 
                </div>
                <div class="profile_info">
                  <img src="img/client_img.png" alt="#">
                  <div class="profile_info_iner">
                    <div class="profile_author_name">
                      <p>Admin </p>
                      <h5> <?php echo $_SESSION['AdminLoginID'] ?></h5>
                    </div>
                    <div class="profile_info_details">
                      
                      <a href="logout.php">Log Out </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="main_content_iner ">
        <div class="container-fluid p-0 sm_padding_15px">
          <div class="row justify-content-center">
            <div class="col-lg-12 ">
              
            <div class="main_content_iner ">
            <div class="container-fluid p-0">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="white_card card_height_100 mb_30">
                            <div class="white_card_header">
                                
                            </div>
                            <div class="white_card_body">
                                <div class="QA_section">
                                    <div class="white_box_tittle list_header">
                                        <h4>Oredr Table</h4>
                                        <div class="box_right d-flex lms_block">
                                            <div class="serach_field_2">
                                                
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <div class="QA_table mb_40">
    <table class="table lms_table_active" id='mytable'>
        <thead>
            <tr>
                <th scope="col">SR NO</th>
                <th scope="col">User ID</th>
                <th scope="col">User Name</th>
                <th scope="col">Email</th>
                <th scope="col">Invoice</th>
            </tr>
        </thead>
        <tbody>
            <?php
            
            $sno = 1;
            while ($result = mysqli_fetch_assoc($data)) {
                echo "
                <tr>
                    <td>" . $sno++ . "</td>
                    <td>" . $result['user_id'] . "</td>
                    <td>" . $result['name'] . "</td>
                    <td>" . $result['email'] . "</td>
                    <td>
                        <table class='table' >
                            <thead>
                                <tr>
                                <th scope='col'>Payment ID</th>
                                    <th scope='col'>Order ID</th>
                                    <th scope='col'>Product Name</th>
                                    <th scope='col'>Price</th>
                                    <th scope='col'>Qty</th>
                                    <th scope='col'>Total</th>
                                </tr>
                            </thead>
                            <tbody>";

                $query2 = "SELECT * FROM `user_order` WHERE `order_id`='$result[id]'";
                $data2 = mysqli_query($conn, $query2);
                $gtotal=0;
                while ($result2 = mysqli_fetch_assoc($data2)) 
                { 
                    $total=$result2['price']*$result2['qty'];
                    $gtotal+=$total;
                    echo "
                    <tr>
                    <td>" . $result2['pay_id'] . "</td>
                        <td>" . $result2['order_id'] . "</td>
                        <td>" . $result2['pro_name'] . "</td>
                        <td>₹".$result2['price'] . "</td>
                        <td>" . $result2['qty'] . "</td>
                        <td>₹" .$total. "</td>
                    </tr>
                    ";
                }

                
?>
                
                            </tbody>
                            <tr>
                    <td colspan='5'><b>Total</b></td>
                    <td><b>₹<?php echo $gtotal?></b> </td>
                </tr>
                <tr>
                    <td colspan='4'>Action</td>
                      <td>
                      
                     </td>
                <td>
                
                <a href='delete.php?oid=<?php echo $result["pay_id"]; ?>' onclick="return confirm('Delete this order?');">                
                   <button type='button' style='background-color:red;color:black;border-radius:20px;'>Delete</button>
                </a></td>

                </tr>
                        </table>
                    </td>
                    
                </tr>
                
           <?php
            }}
            ?>
        </tbody>
    </table>
</div>

                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>

            </div>
          </div>
        </div>
      </div>
    <?php include'components/footer.php'?>

    <!-- <script>
  function search() {
    let filter = document.getElementById('myinput').value.toUpperCase(); // Corrected toUpperCase
    let mytable = document.getElementById('mytable');
    let tr = mytable.getElementsByTagName('tr');

    for (let i = 0; i < tr.length; i++) {
      let td = tr[i].getElementsByTagName('td')[1]; // Check only the User ID column
      if (td) {
        let textValue = td.textContent || td.innerHTML; // Get the text content
        if (textValue.toUpperCase().indexOf(filter) > -1) { // Corrected variable name
          tr[i].style.display = ""; // Show the row
        } else {
          tr[i].style.display = "none"; // Hide the row
        }
      }
    }
  }
</script> -->

<script>
  function search() {
    let filter = document.getElementById('myinput').value.toUpperCase(); // Convert input to uppercase
    let mytable = document.getElementById('mytable');
    let tr = mytable.getElementsByTagName('tr'); // Get all rows

    for (let i = 1; i < tr.length; i++) { // Start from 1 to skip the header row
      let tdArray = tr[i].getElementsByTagName('td'); // Get all cells in the row
      let rowVisible = false; // Flag to track if the row should be visible

      // Check each cell in the row
      for (let j = 0; j < tdArray.length; j++) {
        let cellValue = tdArray[j].textContent || tdArray[j].innerHTML;
        // If the cell contains the filter text, make the row visible
        if (cellValue.toUpperCase().indexOf(filter) > -1) {
          rowVisible = true; // Set flag to true
          break; // Exit the loop if a match is found
        }
      }

      // Show or hide the row based on the flag
      tr[i].style.display = rowVisible ? "" : "none"; // Show if flag is true, hide if false
    }
  }
</script>

    <!-- <?php
$query = "SELECT * FROM `order_manage`";
$data = mysqli_query($conn, $query);
$result = mysqli_fetch_assoc($data); // Added semicolon

// Assuming $fetch_orders is defined from your query results
?>

<form action="" method="post">
    <input type="hidden" name="order_id" value="<?php echo $result['status']; ?>"> 
    <select name="payment_status" class="select">
        <option selected disabled><?php echo $result['status']; ?></option>
        <option value="pending">Pending</option>
        <option value="dishpatch">Dishpatch</option>
        <option value="sheeping">Sheeping</option>
        <option value="on-way">On Way</option>
        <option value="completed">Completed</option>
    </select>
    <div class="flex-btn">
        <input type="submit" value="update" class="option-btn" name="update_payment">
    </div>
</form>

user 
<p> Payment status : <span style="color: <?= $fetch_orders['payment_status'] == 'pending' ? 'red' : 'green'; ?>"><?= $fetch_orders['payment_status']; ?></span></p> -->
