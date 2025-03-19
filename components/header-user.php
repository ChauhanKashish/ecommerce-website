<?php 
include('connection.php');
//include('add-cart.php');
session_start();
?>

<nav class="navbar1">
		<div class="navdiv1">
			<!-- <div class="logo"><a href="index.php"><img src="logo.jpg" height="40px" width="200"></a> </div> -->
			<div class="logo1"><a href="home.php">MediGuru</a> </div>
<!-- //sid=19441 -->
			<ul id="myul">
				<li><a href="medicine.php"><i class="fi fi-rr-doctor"></i> Medicine</a></li>
				<li><a href="health-care.php"><i class="fi fi-rr-stethoscope"></i> Health Care</a></li>
                <!-- <li><a href="#"><i class="fi fi-rr-blood-test-tube"></i> Lab Test</a></li> -->
                <li><a href="blog.php" ><i class="fi fi-rr-blog-pencil"></i> Health Blog</a></li>
                <li><a href="store.php"> <i class="fi fi-rr-store-alt"></i> Store</a></li>
                <li><a href="cart.php"><i class="fi fi-rr-shopping-cart-add"></i> Cart(<?php
                $count=0;
                    if(isset($_SESSION['cart']))
                    {
                        $count=count($_SESSION['cart']);
                        echo $count;
                    }
               ?>)</a></li>
                <!-- <a href="user-login.php"><button>SignIn</button></a>
                <a href="signup.php"><button>SignUp</button></a> -->
               
                <?php
 if(isset($_SESSION['logged_in'])&& $_SESSION['logged_in']=true)
 {
  
  echo"
  
                  <li><a href='user-order.php?uid=$_SESSION[user_id]'> <i class='fi fi-rr-store-alt'></i> Order</a></li>

  <button>
  <a href='user-logout.php'>LOGOUT</a>
  </button>";
  
 }
 else
 {
  echo"
  
  <a href='user-login.php'><button>SignIn</button></a>
                <a href='signup.php'><button>SignUp</button></a>
      
 ";

 }
?>
                
			</ul>
		</div>
		</ul>
		</div>
		</nav>
    