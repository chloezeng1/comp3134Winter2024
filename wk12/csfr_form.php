<?php
session_start();
// Generate a random token
$_SESSION['confirmation'] = bin2hex(random_bytes(32));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CSRF Mitigation Form</title>
</head>
<body>
    <form action="csfr_action.php" method="POST">
        <input type="text" name="username" placeholder="Username">
        <input type="password" name="password" placeholder="Password">
        <!-- Include the CSRF token in the form as a hidden field -->
        <input type="hidden" name="confirmation" value="<?php echo $_SESSION['confirmation']; ?>">
        <input type="submit" value="Login">
    </form>
</body>
</html>
