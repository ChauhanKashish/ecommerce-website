<?php
require("db/connection.php");
?>

<html>
<head>
<title>Login</title>
<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
<link rel="stylesheet" type="text/css" href="mycss.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
</head>
<body>
<span style="font-family: verdana, geneva, sans-serif;"><!DOCTYPE html>
<html lang="en">
  <head>
    <title>Login Admin</title>
    <link rel="stylesheet" href="css/style.css" />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap"
      rel="stylesheet"
    />
  </head>
  <body>
    <div class="login-box">
      <h1>Login</h1>
      <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">
        <label>Email</label>
        <input type="text" placeholder="" name="AdminName"/>
        <label>Password</label>
        <input type="password" placeholder="" name="AdminPass" />
        
        <input type="submit" class="submit" name="sn" value="Login"/>
      </form>
    </div>
    <!-- <p class="para-2">
      Not have an account? <a href="signup.html">Sign Up Here</a>
    </p> -->
  </body>
</html></span>


<?php
 
 function input_filter($data)
  {
   $data=trim($data);
   $data=stripslashes($data);
   $data=htmlspecialchars($data);
   return $data;
  }

if(isset($_POST['sn']))
 {
 $an=input_filter($_POST['AdminName']);
 $ap=input_filter($_POST['AdminPass']);
 
 $an=mysqli_real_escape_string($conn,$an);
 $ap=mysqli_real_escape_string($conn,$ap);
 
 $query="SELECT * FROM `mg_admin` WHERE `name`=? AND `password`=?";
 
 if($stmt=mysqli_prepare($conn,$query))
  {
  mysqli_stmt_bind_param($stmt,"ss",$an,$ap);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_store_result($stmt);
   if(mysqli_stmt_num_rows($stmt)==1)
       {
      session_start();
      $_SESSION['AdminLoginID']=$an;
      header("location: index.php");
       }
    else
       {
      echo "<script>alert('Invalid Admin Name or Password');</script>";  
       }
    mysqli_stmt_close($stmt);
  }
  else
  {
   echo "<script>alert('SQL query cannot be prepared');</script>"; 
   
  }
 }

?>

</body>
</html>