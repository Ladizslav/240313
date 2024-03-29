<?php 
require_once "classes/DBC.php";
require_once "classes/User.php";
session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Website Title</title>
</head>
<body>
    <?php include 'header.php'; ?>
    
    <div class="content">
        <h1>Welcome to Our Website</h1>
        <?php if (isset($_SESSION['user'])): ?>
            <p>Hello, <?php echo htmlspecialchars($_SESSION['user']->getName(), ENT_QUOTES, 'UTF-8'); ?>!</p>
        <?php else: ?>
        <?php endif; ?>
        <p>This is a simple page to describe our project and team.</p>
    </div>

    <?php include 'footer.php'; ?>
</body>
</html>
