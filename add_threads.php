<?php
require_once "classes/DBC.php";
require_once "classes/User.php";
session_start();

if (!isset($_SESSION['user'])) {
    header('location: login.php');
    exit();
}

$user = $_SESSION['user'];
$user_id = $user->getId();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once "classes/DBC.php"; // Připojení k databázi
    $user_id = $_SESSION['user']->getId(); // ID přihlášeného uživatele
    $content = $_POST['content']; // Obsah příspěvku

    // Přidání příspěvku do databáze
    $connection = DBC::getConnection();
    $query = "INSERT INTO threads (user_id, content) VALUES ('$user_id', '$content')";
    $result = mysqli_query($connection, $query);

    if ($result) {
        // Příspěvek byl úspěšně přidán
        header('location: threads.php');
        exit();
    } else {
        // Chyba při přidávání příspěvku
        echo "An error occurred while adding the thread.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Thread</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        header {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 10px;
        }

        form {
            width: 50%;
            margin: 20px auto;
        }

        input[type="submit"] {
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #444;
        }

        textarea {
            width: 100%;
            height: 150px;
            padding: 10px;
            box-sizing: border-box;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <header>
        <h1>Add Thread</h1>
    </header>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="content">Content:</label><br>
        <textarea id="content" name="content" required></textarea><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
