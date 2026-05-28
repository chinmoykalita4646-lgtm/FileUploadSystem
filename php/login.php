<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/login.css">
</head>
<body>
    <div class="loginForm">
        <legend>
            Login
        </legend>
        <fieldset>
            <form action="" method="POST">
                <input type="email" name="email" placeholder="Email">
                <input type="password" name="password" placeholder="Password">
                <button type="submit" name="login">
                    Login
                </button>
                <p>Don't have an account? <a href="registration.php">Register</a></p>
            </form>
        </fieldset>
    </div>
</body>
</html>

<?php
session_start();
include "db(filelogin).php";

if(isset($_POST['login'])){

    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare(
        "SELECT * FROM user WHERE email=?"
    );

    $stmt->bind_param("s",$email);
    $stmt->execute();

    $result = $stmt->get_result();

    if($result->num_rows > 0){

        $user = $result->fetch_assoc();

        if(password_verify($password, $user['password'])){

            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];

            header("Location: dashboard.php");
            exit();

        }else{
            echo "Wrong Password!";
        }

    }else{
        echo "User not found!";
    }
}
?>