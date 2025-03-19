<?php
include'connection.php';
  session_start();
  session_regenerate_id(true);
  if(!isset($_SESSION['AdminLoginID']))
  {
   header("location:login.php");
  }
?>

<!DOCTYPE html>
<html lang="zxx">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Dashboard</title>
    <link rel="icon" href="img/mainlogo.png" type="image/png">
    <link rel="stylesheet" href="css/bootstrap1.min.css" /> 
    <?php include'components/link.php'?>
  </head>
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
                      <input type="text" placeholder="Search here...">
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
      <div class="main_content_iner overly_inner">
        <div class="container-fluid p-0 ">
          <div class="row">
            <div class="col-12">
              <div class="page_title_box d-flex align-items-center justify-content-between">
                <div class="page_title_left">
                  <h3 class="f_s_30 f_w_700 text_white">Dashboard</h3>
                  <ol class="breadcrumb page_bradcam mb-0">
                    <li class="breadcrumb-item">
                      <a href="javascript:void(0);">MediGuru </a>
                    </li>
                    <li class="breadcrumb-item">
                      <a href="javascript:void(0);">Dashboard</a>
                    </li>
                    
                  </ol>
                </div>
                
              </div>
            </div>
          </div>
          
          <?php

$query="SELECT * FROM `registered_user`";
$data=mysqli_query($conn, $query);
// FOR TOTAL USER 

$total=mysqli_num_rows($data);
// echo $total;
$query1="SELECT * FROM `mg_products`";
$data1=mysqli_query($conn, $query1);
// FOR TOTAL USER 
$total1=mysqli_num_rows($data1);
// echo $total;
$query2="SELECT * FROM `order_manage`";
$data2=mysqli_query($conn, $query2);
// FOR TOTAL USER 
$total2=mysqli_num_rows($data2);
// echo $total;

     
    ?>      
          <div class="main_content_iner overly_inner">
        <div class="container-fluid p-0 ">
          <div class="row">    
            <div class="col-lg-4">
              <div class="white_card card_height_100 mb_20">
                <div class="white_card_header">
                  <div class="box_header m-0">
                    <div class="main-title">
                      <h3 class="m-0">Users</h3>
                    </div>
                   </div>
                </div>
                <div class="white_card_body">
                  <h1>User is: <?php echo $total?></h1>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="white_card card_height_100 mb_20">
                <div class="white_card_header">
                  <div class="box_header m-0">
                    <div class="main-title">
                      <h3 class="m-0">No. of Products</h3>
                    </div>
                    
                  </div>
                </div>
                <div class="white_card_body mt_30">
                 <h1>No of Product: <?php echo $total1?></h1>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="white_card card_height_100 mb_20">
                <div class="white_card_header">
                  <div class="box_header m-0">
                    <div class="main-title">
                      <h3 class="m-0">Total order</h3>
                    </div>
                    <div class="float-lg-right float-none sales_renew_btns justify-content-end">
                    <div class="white_card_body">
                    <h1>Total Order: <?php echo $total2?></h1>
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
      <?php 
      include'components/footer.php'?>