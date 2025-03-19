

<span style="font-family: verdana, geneva, sans-serif;"><!DOCTYPE html>
<html lang="en">
  <head>
    <title>Login | By Code Info</title>
    <link rel="stylesheet" href="css/style-login.css" />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet"/>
    <link rel="stylesheet" href="css/header.css">
  </head>
  <body>



  <?php include'components/header-user.php'?>
  
  
    <div class="login-box">
      <h1>Login</h1>
      <form action="login_register.php" method="post">
        <label>Email</label>
        <input type="text" placeholder="E-mail or Username" name="email_username">
        <label>Password</label>
        <input type="password" placeholder="Password" name="password">
        <button type="submit" id='submit'  class="login-btn " name="login">Login</button>
      </form>
    </div>
    <p class="para-2">
      Not have an account? <a href="signup.php">Sign Up Here</a>
    </p>
  </body> 
</html></span>