<!DOCTYPE html>
<html>
<head>
  <title>OneStop Cloud</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Reddit+Mono:wght@200..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Nova+Round&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">  
<link rel="apple-touch-icon" sizes="180x180" href="images/apple-touch-icon.png">
       <link rel="icon" type="image/png" sizes="32x32" href="images/favicon-32x32.png">
       <link rel="icon" type="image/png" sizes="16x16" href="images/favicon-16x16.png">
       <link rel="manifest" href="/site.webmanifest">
      
<link rel="stylesheet" href="stylesheet/login.css">
<style>
 
  #alertbox{
        display: flex;
        justify-content: center;
        align-items: center;
        border:2px solid red;
        background: red;
        padding: 5px;
        margin: 5px;
        margin-left: 30px;
        margin-right: 30px;
        border-radius: 5px;
        color: white;
      }
      .button{
      transition: all 0.3s;
  }
  
  .button:hover{
      transform: scale(1.1);
  }

</style>

</head>
<body>

<?php
        include_once('navbar.php');
?>


 <div class="container">
  <form class="form" action="dblogin.php" method="POST">
    <p class="title">Welcome Back </p>
    <p class="message" style="margin-bottom: 10px;">Enter your credentials to access your account.</p>      
    <label>
        <input class="input" name="email" type="email" placeholder="" required=""  onkeyup="hideAlertBox()">
        <span>Email</span>
    </label> 
    <label>
      <input class="input" type="password" placeholder="" name="password" required="">
      <span>Password</span>
  </label> 
  <div class="login-form" style="display: flex; flex-direction: row; justify-content: space-between; margin-bottom: 25px; margin-top: 5px; ">
    <label><input type="checkbox" id="remember-me" id="Remember Me">Remember Me</label>
    <a href="#" class="forgot-password" style="text-decoration: none; color: white;">Forgot Password?</a>
  </div>
    <button class="Btn">Sign In</button>
    <p class="signin" style="margin-top: 10px;">Don't have an acount ? <a href="register.php" style="text-decoration: none;">Register Now</a> </p>
   
    <?php

  if(isset($_GET['error'])) {
    echo('
    <div class="alert alert-danger" id="alertbox" role="alert">
    Email or Password is incorrect.
  </div>');
  }

 ?>
   
   
    
</form>
 </div>

 <script>
    function hideAlertBox() {
        const alertBox = document.getElementById('alertbox');
        alertBox.style.display = 'none';
    }
  </script> 
 <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    
    


</body>
</html>