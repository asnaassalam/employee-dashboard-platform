<?php

   session_start();
   if(!isset($_SESSION['userloggedin'])) {
    header("Location: ../login.php");
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
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="apple-touch-icon" sizes="180x180" href="../images/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../images/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../images/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
    * {
        margin: 0px;
        padding: 0px;


    }

    body {
        background: #1a1a1a;
        margin-bottom: 50px;
        font-family: "Poppins", sans-serif;
        font-weight: 400;
        font-style: normal;
        text-decoration: none;


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

    }


    #logout {
        transition: all 0.3s;
    }

    #logout:hover {
        background: none;
        border: 1.7px solid #ff3700;
        color: #ff3700;
    }

    .logo {

        font-family: "Nova Round", system-ui;
        font-weight: 400;
        font-style: normal;
        font-size: 40px;
        color: #ff3700;
    }

    .navbar {
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        margin-top: 10px;
        padding-top: 30px;
        font-family: "Poppins", sans-serif;
        gap: 220px;
    }

    .navtext a {
        transition: color 0.3s;
        text-decoration: none;
        color: white;
    }


    .navtext a:hover {
        color: #ff3700;

    }

    a {
        text-decoration: none;
        color: white;
    }

    .navtext a {
        transition: color 0.3s;
        text-decoration: none;
        color: white;
    }


    .navtext a:hover {
        color: #ff3700;
    }



    .container {
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        font-family: "Poppins", sans-serif;
    }

    #task,
    #caption {
        padding-left: 40px;
        padding-right: 40px;
        padding-top: 10px;
        padding-bottom: 10px;
        margin-right: 10px;
        color: white;
        cursor: text;
        font-weight: 300;
        font-size: 15px;
        width: 250px;
        height: 27px;
        background: linear-gradient(#212121, #212121) padding-box,
            linear-gradient(145deg, #ff6136, #ff3700, transparent 100%) border-box;
        border: 2px solid transparent;
        border-radius: 8px;
    }

    #add {
        border: 2px solid transparent;
        border-radius: 8px;
        padding-left: 40px;
        padding-right: 40px;
        padding-top: 5px;
        padding-bottom: 5px;
        background: #ff3700;
        color: white;
        font-size: 25px;
        cursor: pointer;
        height: 47px;

    }

    .subcontainer {
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        font-family: "Poppins", sans-serif;
        color: white;
        padding-top: 20px;
        padding-bottom: 20px;
        gap: 100px;

        font-size: 18px;

    }

    .output {
        display: flex;
        align-items: center;
        justify-content: center;
        font-family: "Poppins", sans-serif;


    }

    .main {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        margin-top: 40px;
        cursor: pointer;
        background: #212121;
        border: none;
        border-radius: 8px;
        padding-bottom: 30px;


    }

    .table {
        width: 100%;

    }

    table {
        margin: 10px;
        text-align: center;
        border-collapse: collapse;

    }

    td {
        padding: 8px;
        text-align: center;
        border-bottom: 1px solid #f2f2f2;
        padding-left: 20px;
        padding-right: 20px;
        color: white;
        font-size: 15px;
    }

    th {
        color: #212121;
        font-size: 20px;
        font-family: monospace;
        background: #f2f2f2;
        padding: 8px;
        text-align: center;
        padding-left: 20px;
        padding-right: 20px;

    }

    #all,
    #completed,
    #pending {
        transition: 0.3s ease;
    }

    #pending:hover,
    #completed:hover,
    #all:hover {
        color: #ff3700;
    }

    #update,
    #delete {
        padding: 7px;
        margin: 5px;
        border-radius: 5px;
        color: white;
        font-size: 14px;
        cursor: pointer;
        transition: all 0.3s;
    }

    #update {
        background: none;
        border: 2px solid green;
        color: green;
    }

    #delete {
        background: red;
        border: 2px solid red;
    }

    #update:hover,
    #delete:hover {
        transform: scale(1.1);
    }


    #searchBar {
        width: 600px;
        padding: 10px;
        border-radius: 20px;
        border: 2px solid white;
        background-color: #212121;
        margin-bottom: 10px;
        color: white;
        font-size: medium;

    }

    #searchBar:focus,
    #task:focus,
    #caption:focus {
        outline: none;
    }

    .search-bar {
        position: relative;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .icon {
        position: absolute;
        top: 50%;
        right: 10px;
        transform: translateY(-80%);
        color: gray;
    }
    .item:hover{
        color: #ff3700;
        
    }
    .no-tasks{
        text-align: center;
        font-size: 20px;
        margin-top: 20px;
        color: #ff3700;
    }
    </style>




</head>

<body>
    <?php
        include_once('../navbar-logged.php');
?>
    <p
        style="display: flex; justify-content: center; align-items: center; margin-top: 25px; font-size: 50px; color: white; margin-bottom: 30px;">
        Task App<br>
    </p>
    <form action="dbtask.php" method="POST">
        <div class="container">
            <div>
                <input type="text" id="task" placeholder="Enter Task" name="taskList" required>
            </div>
            <div>
                <input type="text" id="caption" placeholder="Enter Caption" name="caption" required>
            </div>
            <div>
                <button type="submit" id="add">+</button>
            </div>
        </div>
    </form>

    <div class="output">
        <div class="main">
            <div class="subcontainer">
                <div id="all" style="color: #ff3700;" onclick="showAll()">
                    ALL
                </div>
                <div id="pending" onclick="showPending()">
                    PENDING
                </div>
                <div id="completed" onclick="showCompleted()">
                    COMPLETED
                </div>
            </div>

            
            <div class="search-bar">
                <i class="icon fas fa-search"></i>
                <input type="text" id="searchBar" placeholder="Search tasks..." onkeyup="searchTask(event)">
            </div>
            <div class="table">
                <table id="taskListTable">
                    <thead>
                        <tr>
                            <th>Date Created</th>
                            <th>List Name</th>
                            <th>Caption</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
       
       // Establish a connection to the database
       $servername = "localhost";
       $username = "root";
       $password = "";
       $dbname = "ai-php";
       $email = $_SESSION['userloggedin'];
       
       $conn = new mysqli($servername, $username, $password, $dbname);
       
       // Check connection
       if ($conn->connect_error) {
           die("Connection failed: " . $conn->connect_error);
       }
       

       

       if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["checkbox"]) && is_array($_POST["checkbox"])) {
            // Retrieve checkbox status
            $checkboxes = $_POST["checkbox"];
    
            // Update the tasks in the database
            foreach ($checkboxes as $taskList => $status) {
                // Convert checkbox status to 'Successful'
                $statusValue = isset($status) ? '1' : '0';
    
                $sql = "UPDATE task SET status = '$statusValue' WHERE taskList = '$taskList' AND email = '$email'";
                $conn->query($sql);
            }
        }
        
       
       // Check if delete button was clicked
       if (isset($_POST['delete'])) {
           $idToDelete = $_POST['delete'];
           $deleteSql = "DELETE FROM task WHERE taskList = '$idToDelete' AND email = '$email'";
           $conn->query($deleteSql);
       }
   }
   
       
       
       // Retrieve data from the task table
       $sql = "SELECT  taskList, caption, dateCreated, email, status FROM task WHERE email = '$email' ORDER BY dateCreated DESC";
       $result = $conn->query($sql);
       
       // Check if any rows were returned
       if ($result->num_rows > 0) {
           echo "<form method='POST'>";
           while ($row = $result->fetch_assoc()) {
            $taskList = $row["taskList"];
            echo "<tr>
                    <td>" . $row["dateCreated"] . "</td>
                    <td ><a href='../item/index.php?taskList={$taskList}' style=' text-decoration: none; ' class='item'>" . $row["taskList"] . "</a></td>
                    <td>" . $row["caption"] . "</td>
                    <td><input type='checkbox' style='accent-color: #ff3700; width: 20px; height: 20px' name='checkbox[" . $taskList . "]' " . ($row["status"] ? "checked" : "") . "></td>
                    <td><button id='update' type='submit'>Update</button><button name='delete' type='submit' id='delete' value='" . $taskList . "'>Delete</button></td>
                  </tr>";
        }
        
          
           echo "</form>";
       } else {
          
       }
       
     
       
       $conn->close();
       ?>

                    </tbody>


                </table>
                <p id="no-tasks" class="no-tasks">No tasks yet.</p>
                <p id="no-pending-tasks" class="no-tasks">No pending tasks.</p>
                <p id="no-completed-tasks" class="no-tasks">No completed tasks.</p>
            </div>
        </div>
    </div>
     
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        showAll(); // Show all tasks by default and handle the no-tasks logic
    });

    function showAll() {
        const rows = document.querySelectorAll('#taskListTable tbody tr');
        let hasTasks = rows.length > 0;

        rows.forEach(row => {
            row.style.display = 'table-row';
        });

        document.getElementById('all').style.color = '#ff3700';
        document.getElementById('pending').style.color = 'white';
        document.getElementById('completed').style.color = 'white';

        // Show or hide "No tasks yet" message
        document.getElementById('no-tasks').style.display = hasTasks ? 'none' : 'block';
        document.getElementById('no-pending-tasks').style.display = 'none';
        document.getElementById('no-completed-tasks').style.display = 'none';
    }

    function showPending() {
        const rows = document.querySelectorAll('#taskListTable tbody tr');
        let hasPendingTasks = false;

        rows.forEach(row => {
            const checkbox = row.querySelector('input[type="checkbox"]');
            if (checkbox.checked) {
                row.style.display = 'none';
            } else {
                row.style.display = 'table-row';
                hasPendingTasks = true;
            }
        });

        document.getElementById('pending').style.color = '#ff3700';
        document.getElementById('all').style.color = 'white';
        document.getElementById('completed').style.color = 'white';

        // Show or hide "No pending tasks" message
        document.getElementById('no-pending-tasks').style.display = hasPendingTasks ? 'none' : 'block';
        document.getElementById('no-tasks').style.display = 'none';
        document.getElementById('no-completed-tasks').style.display = 'none';
    }

    function showCompleted() {
        const rows = document.querySelectorAll('#taskListTable tbody tr');
        let hasCompletedTasks = false;

        rows.forEach(row => {
            const checkbox = row.querySelector('input[type="checkbox"]');
            if (!checkbox.checked) {
                row.style.display = 'none';
            } else {
                row.style.display = 'table-row';
                hasCompletedTasks = true;
            }
        });

        document.getElementById('completed').style.color = '#ff3700';
        document.getElementById('pending').style.color = 'white';
        document.getElementById('all').style.color = 'white';

        // Show or hide "No completed tasks" message
        document.getElementById('no-completed-tasks').style.display = hasCompletedTasks ? 'none' : 'block';
        document.getElementById('no-tasks').style.display = 'none';
        document.getElementById('no-pending-tasks').style.display = 'none';
    }
</script>


    <script>
    function searchTask(event) {
        var searchTerm = event.target.value.toLowerCase();
        var tasks = document.querySelectorAll('.table tbody tr');
        tasks.forEach(function(task) {
            var taskName = task.querySelector('td:nth-child(2)')?.textContent.toLowerCase() || '';
            var taskCaption = task.querySelector('td:nth-child(3)')?.textContent.toLowerCase() || '';
            task.style.display = (taskName.includes(searchTerm) || taskCaption.includes(searchTerm)) ?
                'table-row' : 'none';
        });
        if (searchTerm === '') {
            tasks.forEach(function(task) {
                task.style.display = 'table-row';
            });
        }
    }
    </script>

</body>

</html>