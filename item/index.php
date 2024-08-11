<?php
session_start();
if (!isset($_SESSION['userloggedin'])) {
    header("Location: ../login.php");
    exit();
}

// Database connection
include '../config.php';
$email = $_SESSION['userloggedin'];

// Get the task ID from the URL
$taskList = $_GET['taskList'];

// Sanitize the input
$taskList = htmlspecialchars($_GET['taskList'], ENT_QUOTES, 'UTF-8');

// Fetch task details
$sql = "SELECT taskList, caption, dateCreated FROM task WHERE taskList = ? AND email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $taskList, $email); // Use "ss" for string parameters
$stmt->execute();
$result = $stmt->get_result();

// Check if the task exists and belongs to the logged-in user
if ($result->num_rows == 1) {
    $task = $result->fetch_assoc();
    $taskList = htmlspecialchars($task['taskList']);
    $caption = htmlspecialchars($task['caption']);
    $dateCreated = htmlspecialchars($task['dateCreated']);
} else {
    echo "Task not found or you do not have permission to view this task.";
    exit();
}
$stmt->close();

// Handle adding checklist items
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_item'])) {
    $description = htmlspecialchars(trim($_POST['description']));
    $status = 0; // Default status (0 for Pending)
    $insert_sql = "INSERT INTO item (taskList, description, status, email) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($insert_sql);
    $stmt->bind_param("ssis", $taskList, $description, $status, $email);
    $stmt->execute();
    $stmt->close();
    header("Location: index.php?taskList=" . urlencode($taskList));
    exit();
}






// Retrieve the current status from the database
$currentStatusQuery = "SELECT status FROM item WHERE itemId = ? AND taskList = ? AND email = ?";
$stmt = $conn->prepare($currentStatusQuery);
$stmt->bind_param("iss", $_POST['itemId'], $taskList, $email);
$stmt->execute();
$stmt->bind_result($dbStatus);
$stmt->fetch();
$stmt->close();

// Determine the new status based on the current status
$newStatus = isset($_POST['update_status']) ? 1 : 0;



// Update the status in the database
$stmt = $conn->prepare("UPDATE item SET status = ? WHERE itemId = ? AND taskList = ? AND email = ?");
$stmt->bind_param("iiss", $newStatus, $_POST['itemId'], $taskList, $email);
$stmt->execute();
$affectedRows = $stmt->affected_rows; // Store the affected rows count
$stmt->close();






// Handle deleting checklist items
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['itemId']) && isset($_POST['delete_item'])) {
    $itemId = intval($_POST['itemId']);

    // Ensure taskList is retrieved from the URL or form data
    $taskList = isset($_GET['taskList']) ? $_GET['taskList'] : (isset($_POST['taskList']) ? $_POST['taskList'] : '');

    if (empty($taskList)) {
        die("TaskList parameter is missing.");
    }

    $delete_sql = "DELETE FROM item WHERE itemId = ? AND taskList = ? AND email = ?";
    $stmt = $conn->prepare($delete_sql);
    $stmt->bind_param("iss", $itemId, $taskList, $email); // Use "is": integer, string
    $stmt->execute();
    $stmt->close();
    header("Location: index.php?taskList=" . urlencode($taskList));
    exit();
}


// Fetch checklist items
$items_sql = "SELECT itemId, description, status FROM item WHERE taskList = ? AND email = ?";
$stmt = $conn->prepare($items_sql);
$stmt->bind_param("ss", $taskList, $email); // Use "ss" for the string parameter
$stmt->execute();
$items_result = $stmt->get_result();
$checklist_items = $items_result->fetch_all(MYSQLI_ASSOC);
$stmt->close();

$conn->close();
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Details - OneStop Cloud</title>
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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            color: white;
        }

        body {
            background: #1a1a1a;
            color: white;
            font-family: "Roboto", sans-serif;

            font-style: normal;
            text-decoration: none;
            color: white;

        }

        .container-wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 60px;
            flex-direction: column;

        }

        .container {
            background: #212121;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            max-width: 600px;
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        h2 {
            color: #ff3700;
            font-family: Roboto;
            margin-bottom: 15px;


        }

        .checklist,
        .items {
            margin-bottom: 20px;
            width: 90%;


        }

        .checklist p {
            font-size: 18px;
        }

        .checklist form {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 100%;
            margin-top: 10px;
        }

        .checklist input,
        .checklist button {

            padding: 10px;
            border-radius: 5px;
            border: none;
        }

        .checklist input {
            background: #333;
            color: white;
            width: 100%;
            max-width: 250px;

        }

        .checklist button {
            background: #ff3700;
            color: white;
            cursor: pointer;
            transition: 0.3s;
            max-width: 100px;
        }

        .checklist button:hover {
            transform: scale(1.1);
        }

        .items ul {
            list-style: none;
            padding: 0;
            width: 100%;
        }

        .items li form {
            display: flex;
            align-items: center;
            width: 100%;
        }

        .items li input[type="checkbox"] {
            margin-right: 10px;
        }

        .items li span {
            color: white;
            flex-grow: 1;
        }

        .items li {
            background: #333;
            padding: 10px;
            margin: 5px 0;
            border-radius: 5px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 100%;
        }

        .items li span {
            color: white;
        }



        .iteminput {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: row;
            gap: 10px;
            margin-left: 60px;

        }

        .navbar {
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: center;
            padding-top: 30px;
            font-family: "Poppins", sans-serif;
            gap: 150px;
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

        .logo {
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

        #logout:hover {
            background: none;
            border: 1.7px solid #ff3700;
            color: #ff3700;
        }


        .items li button {
            background: none;
            color: white;
            cursor: pointer;
            transition: 0.3s;
            padding: 8px 12px;
            border: none;

        }


        .items li button i {
            transition: 0.3s;
            font-size: 18px;
        }

        .items li button i:hover {
            color: red;
            transform: scale(1.3);
        }

        #searchBar {
            width: 450px;
            padding: 10px;
            border-radius: 20px;
            border: 2px solid white;
            background-color: #212121;
            margin-bottom: 10px;
            color: white;
            font-size: medium;
            margin-left: 5px;

        }

        #searchBar:focus {
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

        #description {
            background: linear-gradient(#212121, #212121) padding-box,
                linear-gradient(145deg, #ff6136, #ff3700, transparent 100%) border-box;
            border: 2px solid transparent;
            border-radius: 8px;
            padding-left: 40px;
            padding-right: 40px;
            padding-top: 10px;
            padding-bottom: 10px;
            cursor: text;
            font-weight: 300;
            font-size: 15px;
            width: 250px;
            height: 27px;

        }

        .subcontainer {
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: center;
            font-family: "Poppins", sans-serif;
            color: white;

            padding-bottom: 20px;
            gap: 100px;

            font-size: 18px;

        }

        #all,
        #completed,
        #pending {

            cursor: pointer;
        }

        #pending:hover,
        #completed:hover,
        #all:hover {

            cursor: pointer;
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

        .iteminput {
            margin-left: 12%;

        }

        #description:focus {
            outline: none;
        }

        .no-items {
            display: none;
            font-size: 20px;
            text-align: center;
            color: red;

        }

        /* Define the styles for the elements */
        #completed,
        #pending,
        #all {
            transition: color 0.2s ease;
        }

        #completed.selected,
        #completed:hover {
            color: #ff3700;
        }

        #pending.selected,
        #pending:hover {
            color: #ff3700;
        }

        #all.selected,
        #all:hover {
            color: #ff3700;
        }
    </style>
</head>

<body>
    <div class="navbar" style="margin-top: 10px;">
        <div class="logo">
            <p style="color: #ff3700;">OneStop<span style="color: white;">Cloud</span></p>
        </div>
        <div class="navtext"
            style="display: flex; gap: 50px; font-size: 22px; cursor: pointer; flex-direction: row; justify-content: center; align-items: center;">
            <div><a href="../index.php">Home</a></div>
            <div><a href="#">Features</a></div>
            <div><a href="#">Updates</a></div>
            <div><a href="#">Support</a></div>
        </div>
        <div class="navbutton">
            <a href="../task/index.php">
                <button id="logout" class="button">
                    <span class="material-symbols-outlined">logout</span>
                </button>
            </a>
        </div>
    </div>


    <div class="task-details" style="text-align: center;">
        <p style="margin-top: 28px; font-size: 53px; color: white; margin-bottom: 10px; font-family: Roboto, sans-serif; font-weight: 350; font-style: italic;"><?php echo $taskList; ?></p>
        <p style="font-size: 18px; color:white;"><?php echo $dateCreated; ?></p>
    </div>

    <div class="checklist">
        <form method="POST">
            <div class="iteminput" style="text-align: center; margin-top: 20px; margin-bottom: 20px; ">
                <div><input type="text" id="description" name="description" placeholder="Description" required></div>
                <div><button type="submit" id="add" name="add_item">+</button></div>
            </div>
        </form>
    </div>
    <div class="container-wrapper">
        <div class="container">
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
                <input type="text" id="searchBar" placeholder="Search items..." onkeyup="searchitem(event)">
            </div>
            <div class="items" style="margin-right: 15px;">

                <?php if (!empty($checklist_items)) : ?>
                    <ul>
                        <?php foreach ($checklist_items as $item) : ?>
                            <li>
                                <form method="POST" action="index.php?taskList=<?php echo urlencode($taskList); ?>" style="display: flex; align-items: center; width: 100%;">
                                    <input type="hidden" name="itemId" value="<?php echo $item['itemId']; ?>">
                                    <input type="checkbox" name="update_status" onchange="this.form.submit();"
                                        <?php echo $item['status'] == 1 ? 'checked' : ''; ?>
                                        style="margin-right: 10px; accent-color: #ff3700;">
                                    <span><?php echo htmlspecialchars($item['description']); ?></span>
                                    <button type="submit" class="delete-icon" id="delete_item" name="delete_item" value="delete">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </div>

            <p id="no-all" class="no-items">No items yet.</p>
            <p id="no-pending" class="no-items">No pending items.</p>
            <p id="no-completed" class="no-items">No completed items.</p>
        </div>
    </div>
    <?php
    include_once('../footer.html');
    ?>
    <script>
        $(document).ready(function() {
            $('#checklistForm').on('submit', function(e) {
                e.preventDefault();
                var itemId = $('#itemId').val();
                var updateStatus = $('#updateCheckbox').is(':checked') ? 1 : 0;
                $.ajax({
                    url: 'index.php',
                    type: 'POST',
                    data: {
                        itemId: itemId,
                        updateStatus: updateStatus,
                        action: 'update_status'
                    },
                    success: function(response) {
                        // Handle the response from the server
                        console.log(response);
                        // Update the checkbox state based on the response
                        if (response === 'success') {
                            $('#updateCheckbox').prop('checked', updateStatus === 1);
                        } else {
                            console.error('Error updating status');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            });

            $('#updateCheckbox').on('change', function() {
                $('#checklistForm').submit();
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const items = document.querySelectorAll('.items li');
            const showAllBtn = document.getElementById('all');
            const showPendingBtn = document.getElementById('pending');
            const showCompletedBtn = document.getElementById('completed');
            const noAllMessage = document.getElementById('no-all');
            const noPendingMessage = document.getElementById('no-pending');
            const noCompletedMessage = document.getElementById('no-completed');

            function showAll() {
                let hasItems = false;
                items.forEach(item => {
                    item.style.display = 'block';
                    hasItems = true;
                });
                showAllBtn.style.color = "#ff3700";
                showPendingBtn.style.color = "white";
                showCompletedBtn.style.color = "white";
                noAllMessage.style.display = hasItems ? 'none' : 'block';
                noPendingMessage.style.display = 'none';
                noCompletedMessage.style.display = 'none';
            }

            function showPending() {
                let hasPending = false;
                items.forEach(item => {
                    const status = item.querySelector('input[name="update_status"]').checked;
                    if (!status) {
                        item.style.display = 'block';
                        hasPending = true;
                    } else {
                        item.style.display = 'none';
                    }
                });
                showAllBtn.style.color = "white";
                showPendingBtn.style.color = "#ff3700";
                showCompletedBtn.style.color = "white";
                noPendingMessage.style.display = hasPending ? 'none' : 'block';
                noAllMessage.style.display = 'none';
                noCompletedMessage.style.display = 'none';
            }

            function showCompleted() {
                let hasCompleted = false;
                items.forEach(item => {
                    const status = item.querySelector('input[name="update_status"]').checked;
                    if (status) {
                        item.style.display = 'block';
                        hasCompleted = true;
                    } else {
                        item.style.display = 'none';
                    }
                });
                showAllBtn.style.color = "white";
                showPendingBtn.style.color = "white";
                showCompletedBtn.style.color = "#ff3700";
                noCompletedMessage.style.display = hasCompleted ? 'none' : 'block';
                noAllMessage.style.display = 'none';
                noPendingMessage.style.display = 'none';
            }

            showAllBtn.addEventListener('click', showAll);
            showPendingBtn.addEventListener('click', showPending);
            showCompletedBtn.addEventListener('click', showCompleted);

            // Call showAll initially to determine if there are any items
            showAll();
        });
    </script>

    <script>
        function searchitem(event) {
            var searchTerm = event.target.value.toLowerCase();
            var items = document.querySelectorAll('.items li');
            items.forEach(function(item) {
                var itemText = item.querySelector('span').textContent.toLowerCase();
                if (itemText.includes(searchTerm)) {
                    item.style.display = 'block';
                } else {
                    item.style.display = 'none';
                }
            });
        }
    </script>
</body>

</html>