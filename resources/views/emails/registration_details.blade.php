<?php
/**
 * Filename: registration_details.blade.php
 * Description: This blade file is used send the user details via email
 * Author: Muthu Velan
 * Date: 25-09-2024
 * Version: 1.0
 */
?>
<!DOCTYPE html>
<html>
<head>
    <title>Registration Details</title>
</head>
<body>
    <h1>Welcome, {{ $name }}!</h1>
    <p>Your registration is complete. Here are your details:</p>
    <p>Email: {{ $email }}</p>
    <p>Password: {{ $password }}</p>
</body>
</html>
