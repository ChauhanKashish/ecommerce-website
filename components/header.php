
<!-- <?php
  session_start();
  session_regenerate_id(true);
  if(!isset($_SESSION['AdminLoginID']))
  {
   header("location:login.php");
  }
?> -->
<nav class="sidebar vertical-scroll dark_sidebar  ps-container ps-theme-default ps-active-y">
      <div class="logo d-flex justify-content-between">
        <a href="index.php">
          <img src="img/mainlogo.png" heigth="100px" width="100px">
        </a>
        <div class="sidebar_close_icon d-lg-none">
          <i class="ti-close"></i>
        </div>
      </div>
      <ul id="sidebar_menu">
      <li class>
          <a href="index.php" aria-expanded="false">
            <div class="icon_menu">
              <img src="img/menu-icon/7.svg" alt>
            </div>
            <span>Dashboard</span>
          </a>
        </li>
    </li>
    <li class>
          <a class="has-arrow" href="#" aria-expanded="false">
            <div class="icon_menu">
              <img src="img/menu-icon/8.svg" alt>
            </div>
            <span>Products</span>
          </a>
          <ul>
            <li>
              <a href="add-product.php">Add Products</a>
            </li>
            <li>
              <a href="view-product.php">View Products</a>
            </li>
            
          </ul>
        </li>
    <li class>
          <a class="has-arrow" href="#" aria-expanded="false">
            <div class="icon_menu">
              <img src="img/menu-icon/2.svg" alt>
            </div>
            <span>Customer</span>
          </a>
          <ul>
             <li>
              <a href="view-user.php">View Customer</a>
            </li>
            <!--<li>
              <a href="mail_box.html">Mail Box</a>
            </li>
            <li>
              <a href="chat.html">Chat</a>
            </li>
            <li>
              <a href="faq.html">FAQ</a>
            </li> -->
          </ul>
        </li>
        <li class>
          <a class="has-arrow" href="#" aria-expanded="false">
            <div class="icon_menu">
              <img src="img/menu-icon/2.svg" alt>
            </div>
            <span>Categories</span>
          </a>
          <ul>
            <li>
              <a href="add-catagories.php">Add Catagories</a>
            </li>
            <li>
            <a href="view-catagories.php">View Catagories</a>
            </li>
            <li>
            <a href="add-sub-catagories.php">Add Sub Catagories</a>
            </li>
            <li>
            <a href="view-sub-catagories.php">View Sub Catagories</a>
            </li>
          </ul>
        </li>
        <!-- <li class>
          <a class="has-arrow" href="#" aria-expanded="false">
            <div class="icon_menu">
              <img src="img/menu-icon/8.svg" alt>
            </div>
            <span>Invoice</span>
          </a>
          <ul>
            <li>
              <a href="Fontawesome_Icon.html">Fontawesome Icon</a>
            </li>
            <li>
              <a href="themefy_icon.html">themefy icon</a>
            </li>
          </ul>
        </li> -->
        
        <li class>
          <a class="has-arrow" href="#" aria-expanded="false">
            <div class="icon_menu">
              <img src="img/menu-icon/8.svg" alt>
            </div>
            <span>Order</span>
          </a>
          <ul>
             <li>
              <a href="admin-order.php">View Order</a>
            </li>
            
          </ul>
        </li>
        <li class>
          <a  href="#" aria-expanded="false">
            <div class="icon_menu">
              <img src="img/menu-icon/9.svg" alt>
            </div>
            <span>Priscription</span>
          </a>
          <ul>
             <li>
              <a href="viwe-prisc.php">View</a>
            </li>
            
          </ul>
        </li>
        <li class>
          <a href="logout.php" aria-expanded="false">
            <div class="icon_menu">
            <!-- <?php echo $_SESSION['AdminLoginID'] ?> -->
              
            </div>
            <span>Logout</span>
          </a>
        </li>
    </li>
      </ul>
    </nav>