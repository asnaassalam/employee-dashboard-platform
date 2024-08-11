<?php

session_start();
if (!isset($_SESSION['userloggedin'])) {
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
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
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


        .content {
            padding-left: 23px;
            font-family: "Poppins", sans-serif;
            font-size: 22px;
            width: 350px;
            height: 400px;
            padding-top: 10px;
            background: #212121;
            border: 2px solid transparent;
            border-radius: 10px;
            color: white;
            padding-right: 23px;
            margin-left: 90px;
            margin-bottom: 30px;
            display: flex;
            padding-right: 950px;
            padding-left: 40px;

        }




        .date {
            color: white;
            font-size: 14px;
            font-family: "Poppins", sans-serif;
            margin-left: 5px;
            margin-bottom: 30px;
            font-weight: 300;
        }

        .card {
            width: 250px;
            height: 330px;
            background: linear-gradient(#212121, #212121) padding-box,
                linear-gradient(145deg, #ff6136, #ff3700, transparent 80%) border-box;
            border: 2px solid transparent;
            border-radius: 8px;
            display: flex;
            flex-direction: column;
            cursor: text;
            transform-origin: right bottom;
            transition: all 0.6s cubic-bezier(0.23, 1, 0.320, 1);
            margin-left: 16px;
            margin-bottom: 30px;
            margin-right: 12px;
            padding-left: 20px;
            transition: transform 0.5s;
        }


        .card .main-content {
            flex: 1;
        }

        .card .header span:first-child {
            font-weight: 300;
            color: gray;
            margin-right: 4px;
            font-size: 14px;

        }

        .card .title {
            font-size: 20px;
            margin: 24px 0 16px;
            font-weight: 400;
            color: white;

        }

        .card .description {
            display: flex;
            gap: 8px;
            font-size: 15px;
            color: gray;
        }

        .notification-container {
            display: flex;
            flex-wrap: wrap;
        }

        .card:hover {
            transform: scale(1.03);
        }

        .icon {
            color: white;
            font-size: 35px;
            transition: all 0.4s ease;

        }

        .btn {
            border: none;
            cursor: pointer;
            margin-left: 180px;
            margin-top: 130px;
            background: none;
            width: 60px;
            height: 35px;
            transition: all 0.4s ease;

        }



        .icon:hover {
            color: red;
        }

        #register {
            transition: all 0.3s;
        }

        #register:hover {
            background: none;
            border: 1.7px solid #ff3700;
            color: #ff3700;
        }

        .button:hover {
            transform: scale(1.1);
        }

        .button {
            transition: all 0.3s;
        }

        .search {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 30px;

        }

        .input-box {
            position: relative;
            height: 40px;
            max-width: 900px;
            width: 100%;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
        }

        .input-box i,
        .input-box .button {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
        }

        .input-box i {
            left: 20px;
            font-size: 30px;
            color: #707070;
        }

        .input-box input {
            height: 100%;
            width: 100%;
            outline: none;
            font-size: 18px;
            font-weight: 400;
            border: none;
            padding: 0 155px 0 65px;
            background-color: transparent;
        }

        .input-box .button {
            right: 0px;
            font-size: 16px;
            font-weight: 400;
            color: #fff;
            border: none;
            padding: 11.1px;
            border-bottom-right-radius: 6px;
            border-top-right-radius: 6px;
            background-color: #ff3700;
            cursor: pointer;
            transition: all 0.3s ease;
        }
    </style>
</head>

<body>

    <?php
    include_once('../navbar-logged.php');
    ?>
    <p
        style="display: flex; justify-content: center; align-items: center; margin-top: 25px; font-size: 50px; color: white; margin-bottom: 30px;">
        Note App<br>
    </p>



    <div class="content center">
        <form action="" method="POST">
            <div id="notes"
                style="color: #ff3700; text-align:left;  padding-bottom: 10px; border-bottom:1px solid  #ff3700;">
                Add a new Note
            </div>
            <div style="margin-bottom: 15px; margin-top: 15px;">
                <label style="color: white; font-size: 18px; ">Title</label><br>
                <input type="text" name="title" id="title"
                    style="border: solid gray 1px; width: 1250px;  height: 40px; border: solid #8c8787 1px; margin-top: 7px ; border-radius: 5px; font-size: 18px; cursor:text; padding-left: 4px; background:none; color: gray; "
                    required>
            </div>
            <div style="margin-bottom:25px ;">
                <label style="color: white; font-size: 18px;  ">Description</label><br>
                <textarea name="description" id="description"
                    style="height: 80px; width: 1250px; border: solid 1px #8c8787; margin-top: 7px; border-radius: 5px; font-size: 18px; cursor:text; padding-left: 4px; padding-top: 4px; background:none; color: gray; "
                    required></textarea>
            </div>

            <div>
                <button type="submit" id="submit" class="button"
                    style="background: green; cursor: pointer; color: white; padding: 5px; border-radius: 3px; border: none; padding-top: 7px; padding-bottom: 7px; width: 500px; height: 40px; border:2px solid #ff3700; background: #ff3700; font-size: 18px; margin-left:390px; color: white;">
                    Add Note</button>
            </div>
        </form>
    </div>
    <div class="search">
        <div class="input-box">
            <i class="uil uil-search"></i>
            <input type="text" id="searchBar" placeholder="Search notes..." onkeyup="searchNotes(event)">

        </div>
    </div>
    <div id="notesContainer"></div>

    <?php
    // Set the default time zone to Sri Lanka
    date_default_timezone_set('Asia/Colombo');

    // Connect to the database
    include '../config.php';
    $email = $_SESSION['userloggedin'];

    // Handle delete request
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_id'])) {
        $delete_id = $_POST['delete_id'];
        $sql = "DELETE FROM note WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $delete_id);
        $stmt->execute();
        $stmt->close();
    }

    // Handle form submission for adding a note
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["title"])) {
        $title = $_POST["title"];
        $description = $_POST["description"];
        $createdDate = date("Y-m-d H:i:s");
        $email = $_SESSION['userloggedin'];

        // Prepare and execute the SQL query
        $sql = "INSERT INTO note (title, description, createdDate, email) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssss", $title, $description, $createdDate, $email);
        $stmt->execute();
        $stmt->close();
    }

    // Retrieve the notes from the database
    $sql = "SELECT id, title, description, createdDate FROM note WHERE email = '$email' ORDER BY createdDate DESC";
    $result = $conn->query($sql);

    // Display the notes
    if ($result->num_rows > 0) {
        $notes = array();
        while ($row = $result->fetch_assoc()) {
            $notes[] = $row;
        }
        echo '<div class="notification-container row">';
        foreach ($notes as $note) {
            echo '<div class="row">';
            echo '<div class="card col">';
            echo '<div class="main-content">';
            echo '<div class="header" style="padding-top:20px; padding-bottom:0px;">';
            echo '<span style="color: #ff3700;">Note on</span>';
            echo '<span class="date">' . $note["createdDate"] . '</span>';
            echo '</div>';
            echo '<p class="title" name="title" style="margin:0px; margin-top:20px; margin-bottom:8px;">' . $note["title"] . '</p>';
            echo '<div class="description" name="description">' . $note["description"] . '</div>';
            echo '<form method="post" style="margin-top:10px;">';
            echo '<input class="delbtn" type="hidden" name="delete_id" value="' . $note["id"] . '">';
            echo '<button type="submit" class="btn" value="delete" style=" cursor:pointer;  ">';
            echo '<span class="material-symbols-outlined icon" style="font-size:30px;" >delete</span>';
            echo '</button>';
            echo '</form>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
        echo '</div>';
    }

    $conn->close();
    ?>

    <?php
    include_once('../footer.html');
    ?>
    <script>
        function searchNotes(event) {
            var searchTerm = event.target.value.toLowerCase();
            var notes = document.querySelectorAll('.notification-container .row .card');
            notes.forEach(function(note) {
                var noteTitle = note.querySelector('.title')?.textContent.toLowerCase() || '';
                var noteDescription = note.querySelector('.description')?.textContent.toLowerCase() || '';
                note.style.display = (noteTitle.includes(searchTerm) || noteDescription.includes(searchTerm)) ?
                    'block' : 'none';
            });
            if (searchTerm === '') {
                notes.forEach(function(note) {
                    note.style.display = 'block';
                });
            }
        }
    </script>



</body>

</html>