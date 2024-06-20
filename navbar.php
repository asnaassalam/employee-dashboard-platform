<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
         *{
  margin: 0px;
  padding: 0px;
  
}
body{
  background: #1a1a1a;
  color: white;
  font-family: "Poppins", sans-serif;
font-weight: 400;
font-style: normal;
text-decoration: none;
color: white;
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
   #register{
        border: 1.7px solid rgb(26, 26, 26);
         border-radius: 20px;
         padding-left: 40px;
         padding-right: 40px;
         padding-top: 10px;
         padding-bottom: 10px;
         margin-right: 10px;
         background: none;
         color: white;
         cursor: pointer;
         font-weight: 500;
         font-size: 15px;
         background: #ff3700;
     
     }
     #login{
        border: 1.7px solid #ff3700;
         border-radius: 20px;
         padding-left: 40px;
         padding-right: 40px;
         padding-top: 10px;
         padding-bottom: 10px;
         margin-right: 10px;
         background: none;
         color:#ff3700;
         cursor: pointer;
         font-weight: 500;
         font-size: 15px;
     }
     .logo{
       
       font-family: "Nova Round", system-ui;
       font-weight: 400;
       font-style: normal;
       font-size: 40px;
       color: #ff3700;
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
        <div class="navbutton">
      <a href="login.php">
        <input type="button" id="login" value="LOGIN" class="button"></a>
      <a href="register.php">
        <input type="button" id="register" value="REGISTER" class="button"></a>
    </div>

    </div>
</body>
</html>