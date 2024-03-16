<?php
session_start();
include("connect.php");
include("function.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $uname = $_POST['uname'];
    $email = $_POST['email']; 
    $psw = $_POST['psw'];

    if (!empty($uname) && !empty($email) && !empty($psw)) {
        $query = "INSERT INTO users (username, email, password) VALUES ('$uname', '$email', '$psw')";
        if (mysqli_query($con, $query)) {
            echo "New record created successfully";
            header("Location: login.php");
            exit;
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($con);
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
    <title>Signup</title>
</head>
<body>
    <div class="container">
        <form action="signup.php" method="post">
            <label for="uname"><b>Username</b></label>
            <input type="text" placeholder="Enter Username" name="uname" required>

            <label for="email"><b>Email</b></label><br>
            <input type="email" placeholder="Enter Email" name="email" required><br>

            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="psw" required>

            <input type="submit" value="Sign Up" id="btn">
        </form>
        <a href="login.php"><button>Click To Login</button></a>
    </div>
</body>
</html>
