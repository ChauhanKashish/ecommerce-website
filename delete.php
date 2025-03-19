<?php 
error_reporting(0);
function delete_user(){
include 'connection.php';
if(isset($_GET['uid'])){
$id=$_GET['uid'];
$query= "DELETE FROM `registered_user` WHERE user_id='$id'";

$data=mysqli_query($conn,$query);
  if ($data) 
  {
   echo "<script>
              alert('Record Deleted Successfully ');
               window.location.href='view-user.php';
              </script>";
  }
  else
  {
   echo "<script>
              alert('Failed to Delete');
              window.location.href='view-user.php';
              </script>";
  }
}
}
delete_user();


function delete_product(){
    include 'connection.php';
    if(isset($_GET['pid'])){
    $pid=$_GET['pid'];
    $query= "DELETE FROM `mg_products` WHERE pro_id='$pid'";
    
    $data=mysqli_query($conn,$query);
      if ($data) 
      {
       echo "<script>
                  alert('Record Deleted Successfully ');
                   window.location.href='view-product.php';
                  </script>";
      }
      else
      {
       echo "<script>
                  alert('Failed to Delete');
                  window.location.href='view-product.php';
                  </script>";
      }
    }
}
    delete_product();
    

    function delete_catagories(){
        include 'connection.php';
        if(isset($_GET['cid'])){
        $cid=$_GET['cid'];
        $query= "DELETE FROM `mg_catagories` WHERE cat_id='$cid'";
        
        $data=mysqli_query($conn,$query);
          if ($data) 
          {
           echo "<script>
                      alert('Record Deleted Successfully ');
                       window.location.href='view-catagories.php';
                      </script>";
          }
          else
          {
           echo "<script>
                      alert('Failed to Delete');
                      window.location.href='view-catagories.php';
                      </script>";
          }
        }
    }
        delete_catagories();
        function delete_sub_catagories(){
            include 'connection.php';
            if(isset($_GET['csid'])){
            $csid=$_GET['csid'];
            $query= "DELETE FROM `mg_sub_catagories` WHERE cat_id='$csid'";
            
            $data=mysqli_query($conn,$query);
              if ($data) 
              {
               echo "<script>
                          alert('Record Deleted Successfully ');
                           window.location.href='view-sub-catagories.php';
                          </script>";
              }
              else
              {
               echo "<script>
                          alert('Failed to Delete');
                          window.location.href='view-sub-catagories.php';
                          </script>";
              }
            }
        }
            delete_sub_catagories();

            // delete_catagories();            $query="DELETE order_manage, user_order FROM order_manage JOIN user_order ON order_manage.pay_id = user_order.pay_id WHERE pay_id=$oid";

            function delete_order() 
            {
              include 'connection.php';
              if (isset($_GET['oid'])) 
              {
                  $oid = $_GET['oid'];
          
                  // Ensure to use quotes around $oid if it's a string
                  $query = "DELETE order_manage, user_order 
                            FROM order_manage 
                            JOIN user_order ON order_manage.pay_id = user_order.pay_id 
                            WHERE order_manage.pay_id = '$oid'";
          
                  $data = mysqli_query($conn, $query);       
                  if ($data) 
                  {
                      echo "<script>
                              alert('Record Deleted Successfully');
                              window.location.href='admin-order.php';
                            </script>";
                  } else 
                  {
                      echo "<script>
                              alert('Failed to Delete');
                              window.location.href='admin-order.php';
                            </script>";
                  }
              }
          }
          delete_order();


          function delete_uorder() 
          {
            include 'connection.php';
            if (isset($_GET['uoid'])) 
            {
                $uoid = $_GET['uoid'];
        
                // Ensure to use quotes around $oid if it's a string
                $query = "DELETE order_manage, user_order 
                          FROM order_manage 
                          JOIN user_order ON order_manage.pay_id = user_order.pay_id 
                          WHERE order_manage.pay_id = '$uoid'";
        
                $data = mysqli_query($conn, $query);       
                if ($data) 
                {
                    echo "<script>
                            alert('Record Deleted Successfully');
                            window.location.href='user-order.php';
                          </script>";
                } else 
                {
                    echo "<script>
                            alert('Failed to Delete');
                            window.location.href='user-order.php';
                          </script>";
                }
            }
        }
        delete_uorder();
        
        function delete_prisc() 
        {
          include 'connection.php';
          if (isset($_GET['peid'])) 
          {
              
              $peid=$_GET['peid'];
              $query= "DELETE FROM `prescription` WHERE pid='$peid'";
              
              $data=mysqli_query($conn,$query);
                if ($data) 
              {
                  echo "<script>
                          alert('Record Deleted Successfully');
                          window.location.href='viwe-prisc.php';
                        </script>";
              } else 
              {
                  echo "<script>
                          alert('Failed to Delete');
                          window.location.href='viwe-prisc.php';
                        </script>";
              }
          }
      }
      delete_prisc();
        
          
?>