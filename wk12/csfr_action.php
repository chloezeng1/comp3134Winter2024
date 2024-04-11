<?php
session_start();
$message = "";

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    $confirmation = $_POST['confirmation'] ?? '';

    // Check if the session confirmation matches the form's confirmation value
    if ($username === 'host' && $password === 'pass' && $confirmation === $_SESSION['confirmation']) {
        $message = "Login successful!";
    } else {
        $message = "Login failed!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CSRF Demo</title>
</head>
<body>
    <form method="POST" action="csfr.php">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username">
        <label for="password">Password:</label>
        <input type="password" name="password" id="password">
        <input type="submit" value="Login">
    </form>
    <div id="splash-message">
        <?php echo $message; ?>
    </div>
</body>
</html>