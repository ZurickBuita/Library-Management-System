<?php
  include "header.php";
  include "link.php";
  include "verify_user.php";
  require "dbcon.php";

  $confirmPass_err = "";
  if (isset($_POST['register'])) {
    if (!empty($_POST["s_password"]) && !empty($_POST["s_confirmPassword"])) {
        if ($_POST["s_password"] != $_POST["s_confirmPassword"]) {
            $confirmPass_err = "Password confirmation does not match";
        } else {

            $s_fname = mysqli_real_escape_string($conn, $_POST['s_fname']);
            $s_lname = mysqli_real_escape_string($conn, $_POST['s_lname']);
            $s_course = mysqli_real_escape_string($conn, $_POST['s_course']);
            $s_section = mysqli_real_escape_string($conn, $_POST['s_section']);
            $s_year = mysqli_real_escape_string($conn, $_POST['s_year']);
            $s_username = mysqli_real_escape_string($conn, $_POST['s_username']);
            $s_password = mysqli_real_escape_string($conn, $_POST['s_password']);

            $query = "INSERT INTO students (s_fname, s_lname, s_course, s_section, s_year, s_username, s_password) VALUES ('$s_fname', '$s_lname', '$s_course', '$s_section', '$s_year', '$s_username', '$s_password');";

            $query_run = mysqli_query($conn, $query);
            if ($query_run) {
                $_SESSION['message'] = "Student Created Successfully";
                header("Location: student_login.php");
            } else {
                $_SESSION['message'] = "Student Not Created";
            }
        }
    }


  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <style>
        small.error_mssg {
            color: red !important;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="container-row">
            <div class="container-col">
                <h2>Student<span class="divider"></span>Register</h2>

                <form class="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">

                    <div class="input-wrapper">
                        <input type="text" name="s_fname" placeholder="First Name" required>
                    </div>

                    <div class="input-wrapper">
                        <input type="text" name="s_lname" placeholder="Last Name" required>
                    </div>

                    <div class="input-wrapper">
                        <input type="text" name="s_course" placeholder="Course" required>
                    </div>

                    <div class="input-wrapper">
                        <input type="text" name="s_section" placeholder="Section" required>
                    </div>

                    <div class="input-wrapper">
                        <input type="number" name="s_year" placeholder="Year" required>
                    </div>

                    <div class="input-wrapper">
                        <input type="text" name="s_username" placeholder="Username" required>
                    </div>

                    <div class="input-wrapper">
                        <input type="password" name="s_password" placeholder="password" required>
                    </div>
                    <small class="error_mssg">
                        <?php echo $confirmPass_err;?>
                    </small>

                    <div class="input-wrapper">
                        <input type="password" name="s_confirmPassword" placeholder="Confirm Password" required>
                    </div>

                    <div class="input-wrapper input-wrapper-submit">
                        <input type="submit" id="submitForm" value="register" name="register">
                    </div>

                    <div class="goBack">
                        <a href="index.php">Go Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>