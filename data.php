<?php include 'header.php';

if (!isset($_SESSION['user'])) {
    header('location: login.php');
    exit();
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Data</title>
</head>
<body>
    <h1>Your Data</h1>
    <p>Here is the data available to you.</p>
</body>
</html>
<?php include 'footer.php'; ?>