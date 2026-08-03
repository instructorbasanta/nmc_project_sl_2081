<?php
require_once '../function.php';
$error = [];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (checkEmpty('email', 'Email') != '') {
        $error['email'] = checkEmpty('email', 'Email');
    } else {
      $email = $_POST['email'];
      if(filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
          $error['email'] = "Invalid email format";
      }
    }

    if (isset($_POST['password']) && !empty($_POST['password']) && trim($_POST['password']) != '') {
        $password = $_POST['password'];
        if (!preg_match('/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/', $password)){
            $error['password'] = "Password must be at least 8 characters long and contain at least one letter and one number";  
        }
    } else {
        $error['password'] = "Password is required";
    }

    if (count($error) == 0) {
        try {
            $connect = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
            if ($connect->connect_error) {
                throw new Exception("Connection failed: " . $connect->connect_error);
            }
            $email = $connect->real_escape_string($email);
            $password = $connect->real_escape_string($password);
            $sql = "SELECT * FROM admins WHERE email='$email'";
            $result = $connect->query($sql);
            if ($result && $result->num_rows > 0) {
                // User found, proceed with login
                // Verify password
                $user = $result->fetch_assoc();
                if (!password_verify($password, $user['password'])) {   
                    $error['login'] = "Invalid email or password";
                } else {
                session_start();
                $_SESSION['user'] = $result->fetch_assoc();
                header("location: dashboard.php");
                exit();
                }
            } else {
                $error['login'] = "Invalid email or password";
            }
        } catch (Exception $e) {
            $error['connection'] = "Error: " . $e->getMessage();
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Admin Login | Daily News Portal</title>

    <link rel="stylesheet"
          href="../css/style.css">

</head>

<body>

<!-- =========================================
        LOGIN PAGE
========================================== -->

<div class="auth-page">

    <div class="auth-box">

        <h2>

            News Portal Admin

        </h2>
        <?php 
        if (isset($error['login'])) {
            echo displayFlashMessage($error['login'],'error');
        }
        if (isset($error['connection'])) {
            echo displayFlashMessage($error['connection'],'error');
        }
        ?>

        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">

            <!-- Email -->

            <div class="form-group">

                <label>

                    Email Address

                </label>

                <input
                    type="text"
                    class="form-control"
                    placeholder="Enter your email address"
                    name="email"
                    value="<?php echo $_POST['email']??'' ?>"
                    >
                    <?php echo displayError($error,'email') ?>
            </div>

            <!-- Password -->

            <div class="form-group">

                <label>

                    Password

                </label>

                <input
                    type="password"
                    class="form-control"
                    placeholder="Enter your password"
                    name="password"
                    >
                    <?php echo displayError($error,'password') ?>

            </div>

            <!-- Remember Me -->

            <div class="form-group"
                 style="display:flex;
                        justify-content:space-between;
                        align-items:center;">

                <label>

                    <input type="checkbox" name="remember">

                    Remember Me

                </label>

                <a href="#">

                    Forgot Password?

                </a>

            </div>

            <!-- Login Button -->

            <button type="submit">

                Login

            </button>

        </form>

        <div class="auth-footer">

            Don't have an account?

            <a href="register.html">

                Register Here

            </a>

        </div>

        <hr style="margin:25px 0;">

        <div
            style="text-align:center;">

            <a href="../index.html">

                ← Back to News Portal

            </a>

        </div>

    </div>

</div>

</body>

</html>