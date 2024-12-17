<?php
  include "header.php";
  include "link.php";
  include "verify_user.php";
  require "dbcon.php";
  
  $usename = $studPass = "";
  $error_mssg = $username_err = $studPass_err = "";
  $values = true;

  if (isset($_POST["login_student"])) {

    if (empty($_POST["s_username"])) {
      $values = false;
      $username_err = "Username is required";
    }

    if (empty($_POST["studentPassword"])) {
      $values = false;
      $studPass_err = "Student password is required";
    }

    if ($values == true) {
       $username_inputted = test_input($_POST['s_username']);
       $password_inputted = test_input($_POST['studentPassword']);

       $sql = "SELECT * FROM students WHERE s_username='$username_inputted' AND s_password ='$password_inputted'";

	  	 $result = mysqli_query($conn, $sql);

      if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        if ($username_inputted ===  $row['s_username'] && $password_inputted === $row['s_password']) {
          $_SESSION['s_ID'] = $row['s_ID'];
          $_SESSION['type_of_user'] = "student";
          header("Location: students/student_dashboard.php");
        }
        mysqli_close($conn);
      } else {
          //IF THE PASSWORD/USERNAME IS INCORRECT OR THE INPUT IS NOT EXISTING IN THE TABLE
          if (!empty($_POST["s_username"]) && !empty($_POST["studentPassword"])) {
            $error_mssg = "login info incorrect";
        }
        mysqli_close($conn);
      }
    }
  }

  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
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
                <h2>Student<span class="divider"></span>Log In</h2>

                <form class="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
                    <div class="input-wrapper">
                        <input type="text" name="s_username" placeholder="Username">
                        <span class="material-symbols-rounded">person</span>
                    </div>
                    <small class="error_mssg">
                        <?php echo $username_err;?>
                    </small>
                    <div class="input-wrapper">
                        <input type="password" name="studentPassword" placeholder="Password">
                        <span class="material-symbols-rounded">lock</span>
                    </div>
                    <small class="error_mssg">
                        <?php echo $studPass_err;?>
                    </small>
                    <small class="error_mssg">
                        <?php echo $error_mssg;?>
                    </small>
                    <div class="input-wrapper input-wrapper-submit">
                        <input type="submit" id="submitForm" value="Login" name="login_student">
                    </div>
                    <div>
                        <small>Don't have an Account?</small><a href="student_register.php" class="registerNow">Register
                            Now!</a>
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