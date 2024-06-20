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
      
<link rel="stylesheet" href="stylesheet/register.css">

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
  <form class="form" action="dbregister.php" method="POST">
    <p class="title">Register </p>
    <p class="message">Enter your personal details and start your journey!</p>
        <div class="flex">
        <label>
            <input class="input" type="text" placeholder="" required="" name="firstName"  onkeyup="hideAlertBox()">
            <span>First Name</span>
        </label>

        <label>
            <input class="input" type="text" placeholder="" required="" name="lastName" onkeyup="hideAlertBox()">
            <span>Last Name</span>
        </label>
    </div>  
            
    <label>
        <input class="input" type="email" placeholder="" required="" name="email" onkeyup="hideAlertBox()">
        <span>Email</span>
    </label> 
        
    <label>
      <input class="input" type="date" placeholder="" required="" name="dateOfBirth" onkeyup="hideAlertBox()">
      <span>Date Of Birth</span>
  </label> 

    <label>
        <input class="input" type="tel" placeholder="" required="" name="phone" max="10"  onkeyup="hideAlertBox()">
        <span>Phone Number</span>
    </label>
    <label>
      <input class="input" type="number" placeholder="" required="" min="1" name="salary"  onkeyup="hideAlertBox()">
      <span>Salary</span>
  </label>
  
  <div class="radio-container">
    <div class="radio-wrapper" >
      <label class="radio-button">  
        <input id="option1" name="gender" type="radio" value="male" required>
        <span class="radio-checkmark"></span>
        <span class="radio-label" >Male</span>
      </label>
    </div>
  
    <div class="radio-wrapper">
      <label class="radio-button" >
        <input id="option2" name="gender" type="radio" value="female" required>
        <span class="radio-checkmark" ></span>
        <span class="radio-label" >Female</span>
      </label>
    </div>
  </div>
  
    <button class="submit">Submit</button>
    <p class="signin">Already have an acount ? <a href="login.php" style="text-decoration: none;">Signin</a> </p>
   
    <?php

  if(isset($_GET['error'])) {
    echo('
    <div class="alert alert-danger" id="alertbox" role="alert">
    User already exists!
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
    
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  

</body>
</html>