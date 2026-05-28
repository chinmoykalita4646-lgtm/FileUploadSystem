<?php
 session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Upload System</title>
    <link rel="stylesheet" href="../css/index.css">
</head>
<body>
    <!-- Header section -->
    <div class="header">
        <div class="navbar">
            <div class="logo">
                
            </div>
            <div class="navEle">
                <a href="index.php">
                    Home
                </a>
                <a href="dashboard.php">
                    Dashboard
                </a>
                <a href="">
                    About Us
                </a>
                <?php
                    if(isset($_SESSION['user_id'])){
                ?>
                    <a href="logout.php">
                        Logout
                    </a>
                <?php } else{ ?>
                    <a href="login.php">
                        Login
                    </a>
                <?php } ?>
            </div>
        </div>
    </div>

    <!-- Content section -->
     <div class="content">
        <div class="hero">
            <div class="row1">
                <div class="card1">
                    <p class="t1">Secure File Storage</p>
                    <br>
                    <p class="t2">Made Simple</p>
                    <br>
                    <p class="t3">Upload, store and access your files at anytime, anywhere.<br>Your data is safe with us.</p>
                    <button class="btn1">
                        Get Started
                    </button>
                    <button class="btn2">
                        Learn More
                    </button>
                </div>
                <div class="card2">
                    img
                </div>
            </div>
            <div class="row2">
                <div class="card1">

                </div>
                <div class="card2">

                </div>
                <div class="card3">

                </div>
            </div>
            <div class="row3">
                <div class="card1">

                </div>
            </div>
            <div class="row4">
                <div class="card1">

                </div>
            </div>
        </div>
     </div>

     <!-- Footer section -->
      <div class="footer">
        &copy;Chinmoy, Saptarshi
      </div>
</body>
</html>