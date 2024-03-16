<?php
session_start();
include("connect.php");
include("function.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $uname = $_POST['uname'];
    $psw = $_POST['psw'];

    if (!empty($uname) && !empty($psw)) {
        $user_data = check_login($con, $uname, $psw);
        if ($user_data) {
            $_SESSION['username'] = $uname;
            header("Location: welcome.php");
            exit;
        } else {
            echo "Invalid username or password";
        }
    } else {
        echo "Please fill all fields";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="login.css">
    <title>Login</title>
</head>
<body>
    <div class="container">
        <form action="login.php" method="post">
            <label for="uname"><b>Username</b></label>
            <input type="text" placeholder="Enter Username" name="uname" required>

            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="psw" required>

            <input type="submit" value="Login" id="btn">
        </form>
        <a href="signup.php"><button>Click To Sign Up</button></a>
    </div>
</body>
</html>
