<?php
session_start();

    include("connection.php");
    include("function.php");

    $user_data=check_login($con);
?>

<!DOCTYPE html>
<html>
    <head>
        <title>JSKK SPORT EQUIPMENT BOOKING</title>
</head>
<body>
    <a href="logout.php">Logout</a>
    <h1>JSKK SEB</h1>

    <br>
    Hello,username.
</body>
</html>