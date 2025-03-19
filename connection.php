<?php
$conn=mysqli_connect("localhost","root","","mediguru");
if(mysqli_connect_error()){
    echo"<script> alert('Data Base problem');</script>";
    exit();
}
?>
