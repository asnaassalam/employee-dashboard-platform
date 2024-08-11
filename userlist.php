<?php

   session_start();
   if(!isset($_SESSION['adminloggedin'])) {
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
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Nova+Round&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
<link rel="apple-touch-icon" sizes="180x180" href="images/apple-touch-icon.png">
       <link rel="icon" type="image/png" sizes="32x32" href="images/favicon-32x32.png">
       <link rel="icon" type="image/png" sizes="16x16" href="images/favicon-16x16.png">
       <link rel="manifest" href="/site.webmanifest">
      
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
margin: 0px;
padding: 0px;
margin-bottom: 50px;
}
.navbar{
  display: flex; 
  flex-direction: row; 
  align-items: center;
justify-content: space-between; 
margin-left: 85px; 
margin-right: 85px;
margin-top: 10px;
padding-top: 30px;
  font-family: "Poppins", sans-serif;
}

.navtext a {
  transition: color 0.3s;
  text-decoration: none;
  color: white;
}


.navtext a:hover{
  color: #ff3700;

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
a{
  color: white;
  text-decoration: none;
}
.navtext a {
  transition: color 0.3s;
  text-decoration: none;
  color: white;
}


.navtext a:hover{
  color: #ff3700;
}

.table-fill {
  background: white;
  border-radius:3px;
  border-collapse: collapse;
  cursor: pointer;
  margin: auto;
 
  padding:5px;
 
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
  animation: float 5s infinite;
}
 
th {
  color:#ff3700;
  background:#1b1e24;
  border-bottom:4px solid #9ea7af;
  border-right: 1px solid #343a45;
  font-size:23px;
  font-weight: 290;
  padding:24px;
  text-align:left;
  text-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
  vertical-align:middle;
  cursor: pointer;
}

th:first-child {
  border-top-left-radius:3px;
}
 
th:last-child {
  border-top-right-radius:3px;
  border-right:none;
}
  
tr {
  border-top: 1px solid #C1C3D1;
  border-bottom: 1px solid #C1C3D1;
  color:#666B85;
  font-size:16px;
  font-weight:normal;
  text-shadow: 0 1px 1px rgba(256, 256, 256, 0.1);
}
 
tr:hover td {
  background:#4E5066;
  color:#FFFFFF;
  border-top: 1px solid #22262e;
}
 
tr:first-child {
  border-top:none;
}

tr:last-child {
  border-bottom:none;
}
 
tr:nth-child(odd) td {
  background:#EBEBEB;
}
 
tr:nth-child(odd):hover td {
  background:#4E5066;
}

tr:last-child td:first-child {
  border-bottom-left-radius:3px;
}
 
tr:last-child td:last-child {
  border-bottom-right-radius:3px;
}
 
td {
  background:#FFFFFF;
  padding:20px;
  text-align:left;
  vertical-align:middle;
  font-weight:300;
  font-size:18px;
  text-shadow: -1px -1px 1px rgba(0, 0, 0, 0.1);
  border-right: 1px solid #C1C3D1;
}

td:last-child {
  border-right: 0px;
}

th.text-left {
  text-align: left;
}

th.text-center {
  text-align: center;
}

th.text-right {
  text-align: right;
}

td.text-left {
  text-align: left;
}

td.text-center {
  text-align: center;
}

td.text-right {
  text-align: right;
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
            <p>OneStop<span style="color: white;">Cloud</span></p>
        </div>
        <div class="navtext"
            style="text-decoration: none; display: flex; gap: 37px; font-size: 22px; margin-left: 70px; cursor: pointer; color:white;">
            <a href="index.html">Home</a>
            <a>Features</a>
            <a>Updates</a>
            <a>Support</a>
        </div>
        <div class="navbutton ">
            <a href="login.php">
                <input type="button" id="login" class="button" value="LOGIN"></a>
            <a href="register.php">
                <input type="button" id="register" class="button" value="REGISTER"></a>
        </div>
    </div>
    <div class="container" style="color: white;">
    <p style="display: flex; justify-content: center; align-items: center; margin-top: 45px; font-size: 50px; margin-bottom:25px;">
      -Employee Table-
  </p> 
        <table class="table table-striped table-fill " style="color: white; border-color: #ff3700" >
            <thead>
                <tr style="color: #ff3700; font-size: 19px;">
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Salary</th>
                    <th>Date of Birth</th>
                    <th>Password</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'config.php';

                // Retrieve data from the employee table
                $sql = "SELECT * FROM employee";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // Display the data in the table
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['firstName'] . "</td>";
                        echo "<td>" . $row['lastName'] . "</td>";
                        echo "<td>" . $row['email'] . "</td>";
                        echo "<td>" . $row['phone'] . "</td>";
                        echo "<td>" . $row['salary'] . "</td>";
                        echo "<td>" . $row['dateOfBirth'] . "</td>";
                        echo "<td>" . $row['password'] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='7'>No data found in the employee table</td></tr>";
                }

                // Close the database connection
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>