<?php
 include "verify_user.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="./css/styles.css">
</head>

<body>
    <nav class="header">
        <div class="navbar-col1">
            <img src="./images/library_icon.png" alt="library-Icon" style="width: 40px; height: 40px">
            <a href="" class="navbar-brand">LIBRARY MANAGEMENT SYSTEM</a>
        </div>
    </nav>
    <div class="banner">
        <div class="content-wrapper">
            <h1>WELCOME TO OUR LIBRARY</h1>
            <span>We stand behind your success</span>
            <div class="form-selection">
                <a href="admin_login.php" id="login-form">Admin</a>
                <a href="student_login.php" id="registration-form">Student</a>
            </div>
        </div>
    </div>
</body>

</html>