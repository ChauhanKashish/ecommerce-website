

<span style="font-family: verdana, geneva, sans-serif;"><!DOCTYPE html>
<html lang="en">
  <head>
    <title>Sign Up | By Code Info</title>
    <link rel="stylesheet" href="css/style-login.css" />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="css/header.css">
  </head>
  <body>
  <?php include'components/header-user.php'?>
    <div class="signup-box">
      <h1>Sign Up</h1>
      <!-- <h4>It's free and only takes a minute</h4> -->
      <form action="login_register.php" method="post">
       
        <label>Name</label>
        <input type="text" placeholder="Full Name" name="fullname">
        <label>User Name</label>
        <input type="text" placeholder="Username" name="username">
        <label>Email</label>
        <input type="email" placeholder="E-mail" name="email">
        <label>Password</label>
        <input type="password" placeholder="Password" name="password">
        <button type="submit" id='submit'  class="register-btn " name="register">REGISTER</button>
     </form>
     
      <p class="para-2">
      Already have an account? <a href="user-login.php">Login here</a>
    </p>
    </div>
    
  </body>
</html></span>