<?php

   session_start();
   if(!isset($_SESSION['userloggedin'])) {
    header("Location: login.php");
    exit();
   }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OneStop Cloud</title>
   
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Nova+Round&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
        <link rel="apple-touch-icon" sizes="180x180" href="images/apple-touch-icon.png">
       <link rel="icon" type="image/png" sizes="32x32" href="images/favicon-32x32.png">
       <link rel="icon" type="image/png" sizes="16x16" href="images/favicon-16x16.png">
       <link rel="manifest" href="/site.webmanifest">
       <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" /> 
        <style>
          *{
  margin: 0px;
  padding: 0px;
  color: white;
}
body{
  background: #1a1a1a;
  color: white;
  font-family: "Poppins", sans-serif;
font-weight: 400;
font-style: normal;
text-decoration: none;

}
 
.navbar {
           display: flex;
           flex-direction: row;
           align-items: center;
           justify-content: center;
           padding-top: 30px;
           font-family: "Poppins", sans-serif;
           gap:150px;
          
       }
   
   .navtext a {
       transition: color 0.3s;
       text-decoration: none;
       color: white;
     }
     
    
   .navtext a:hover{
       color: #ff3700;
   
   }
   a{
     text-decoration: none;
     color: white;
   }
   
     .logo{
       
       font-family: "Nova Round", system-ui;
       font-weight: 400;
       font-style: normal;
       font-size: 40px;
       color: #ff3700;
} 
#logout {
        border: 1.7px solid rgb(26, 26, 26);
        border-radius: 25px;
        padding-left: 60px;
        padding-right: 60px;
       padding-top: 4px;
        padding-bottom: 4px;
        color: white;
        cursor: pointer;
        font-weight: 500;
        font-size: 15px;
        background: #ff3700;
        transition: all 0.3s;
    }
   

#logout:hover{
    background: none;
    border: 1.7px solid #ff3700;
    color: #ff3700;
}   

.app{
 width: 200px;
 height: 200px;
 color: white;
 display: flex;
 justify-content: center;
 align-items: center;
 border-radius: 20px;
 margin-top: 55px;
 background: linear-gradient(#212121, #212121) padding-box,
              linear-gradient(145deg,  #ff6136, #ff3700, transparent 103%) border-box;
border: 2px solid transparent;
border-radius: 8px;
transition: all 0.3s;
}
.app:hover{
    box-shadow: 0 0 10px rgba(64, 79, 219, 0.5);
          transform: scale(1.03);
}
.dash{
    
    display: flex;
    flex-direction: row;
    gap: 40px;
    justify-content: center;
    align-items: center;
}
</style>
</head>

<body>
<div class="navbar" style="margin-top: 10px;">
        <div class="logo">
            <p style="color: #ff3700;">OneStop<span style="color: white;">Cloud</span></p>
        </div>
        <div class="navtext"
            style="text-decoration: none; display: flex; gap: 50px; font-size: 22px; cursor: pointer; flex-direction:row; justify-content:center; align-items:center;">
            <div><a href="index.php">Home</a></div>
            <div><a>Features</a></div>
            <div><a>Updates</a></div>
            <div><a>Support</a></div>
        </div>
        <div class="navbutton ">
        <a href="login.php">
                <button id="logout" class="button" >
                <span class="material-symbols-outlined">
                    logout
                    </span>
                </button>
            </a>
        </div>

    </div>
    <div class="dash">
    <div class="app">   
     <a href="notes/index.php" style="text-decoration: none; color: white; font-size: 23px; "><img src="images/notes (1).png" alt="Icon of a notes app."><br>&nbsp;Notes App</a>
    </div>
    <div class="app">
     <a href="task/index.php" style="text-decoration: none; color: white; font-size: 23px; "><img src="images/list (4).png" alt="Icon of a task app."><br>&nbsp;&nbsp;Task App</a>
    </div>
    </div>

</body>

</html>