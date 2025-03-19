<?php 
include 'connection.php';

$id=$_GET['id'];
$query= "DELETE FROM `registered_user` WHERE id='$id'";

$data=mysqli_query($con,$query);
  if ($data) 
  {
   echo "<script>
              alert('Record Deleted Successfully ');
               window.location.href='display.php';
              </script>";
  }
  else
  {
   echo "<script>
              alert('Failed to Delete');
              window.location.href='display.php';
              </script>";
  }
  

?>