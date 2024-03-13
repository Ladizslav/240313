<?php
session_start();
require_once "classes/DBC.php";

$connection = DBC::getConnection();
$query = "SELECT * FROM threads ORDER BY created_at DESC";
$result = mysqli_query($connection, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Threads</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        header {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 10px;
        }

        nav ul {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        nav li {
            display: inline;
            margin-right: 15px;
        }

        nav a {
            text-decoration: none;
            color: #fff;
        }

        .thread-container {
            margin: 20px auto;
            width: 80%;
        }

        .thread {
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 10px;
        }

        .thread p {
            margin: 5px 0;
        }

        .add-thread-btn {
            display: block;
            margin-top: 20px;
            text-align: center;
        }
    </style>
</head>
<body>
<?php include 'header.php'; ?> 

    <div class="thread-container">
        <h2>Threads</h2>

        <?php if (isset($_SESSION['user'])): ?>
            <a href="add_threads.php" class="add-thread-btn">Add New Thread</a>
        <?php endif; ?>

        <?php while ($row = mysqli_fetch_assoc($result)): ?>
            <div class="thread">
                <p><?php echo $row['content']; ?></p>
                <p>Posted by: <?php echo $row['user_id']; ?> | Date: <?php echo $row['created_at']; ?></p>
            </div>
        <?php endwhile; ?>
    </div>
</body>
</html>
<?php include 'footer.php'; ?>