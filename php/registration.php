<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/registration.css">
</head>
<body>
    <div id="successMessage">

    </div>
    <form action="" method="POST">
        <input type="text" name="username" placeholder="Username">
        <input type="email" name="email" placeholder="Email">
        <input type="password" name="password" placeholder="Password">
        <button type="submit" name="register">
            Register
        </button>
    </form>
</body>
</html>

<?php
include "db(filelogin).php";

if(isset($_POST['register'])){

    $username = $_POST['username'];
    $email = $_POST['email'];

    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $stmt = $conn->prepare(
        "INSERT INTO user(username,email,password)
         VALUES(?,?,?)"
    );

    $stmt->bind_param("sss",$username,$email,$password);

    $stmt->execute();

    $_SESSION['success'] = 1;
}
?>

<?php
    if(isset($_SESSION['success'])){
?>
    <script>
        document.getElementById("successMessage").innerText = "Registration Successfully!";
    </script>
<?php
    }
    unset($_SESSION['success']);
?>