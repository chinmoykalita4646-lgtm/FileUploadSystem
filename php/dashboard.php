<?php include "db(fileuploadsystem).php";
  session_start();
  if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit();
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <link rel="stylesheet" href="../css/dashboard.css">
</head>

<body>
  <!-- Header secction -->
  <div class="header">
    <div class="navbar">
      <div class="logo">

      </div>
      <ul>
        <div class="itemRow"><li><a href="index.php">Home</a></li></div>
        <div class="itemRow"><li onclick="showSection('dashboard')"><a href="#">Dashboard</a></li></div>
        <div class="itemRow"><li onclick="showSection('upload')"><a href="#">Upload</a></li></div>
        <div class="itemRow"><li onclick="showSection('files')"><a href="#">My Files</a></li></div>
        <div class="itemRow"><li>
          <?php if(isset($_SESSION['user_id'])){ ?>
            <a href="logout.php">Logout</a>
          <?php } else{ ?>
            <a href="login.php">Login</a>
          <?php } ?>
        </li></div>
      </ul>
    </div>
    <?php
      if(isset($_SESSION['success'])){
    ?>
    <div class="sucessMessage">
      <script>
        alert("File Uploaded Succesfully!");
      </script>
    </div>
    <?php
      }
    ?>
  </div>

  <!-- Content section -->
  <div class="content">
    <div id="dashboard" class="section">
      <h2>Dashboard</h2>
    </div>
    <div id="upload" class="section">
      <h2>Upload Files</h2>
      <div class="uploadForm">
      <fieldset>
        <legend>File Upload</legend>
        <form action="upload.php" method="POST" enctype="multipart/form-data">
          <div class="formRow">
            <input type="text" name="display_name" placeholder="Enter file name">
            <br><br>
            <input type="file" name="file">
            <br><br>
            <button type="submit" name="submit">Upload</button>
          </div>
        </form>
      </fieldset>
    </div>
    </div>
    <div id="files" class="section">
      <h2>My Files</h2>
      <?php
        $user_id = $_SESSION['user_id'];

        $stmt = $conn->prepare(
          "SELECT * FROM files WHERE user_id = ?"
        );

        $stmt->bind_param("i", $user_id);

        $stmt->execute();

        $result = $stmt->get_result();

        while($row = $result->fetch_assoc()){

          echo "<div>
                  <a href='../uploads/".$row['filename']."' target='_blank'>
                    ".$row['display_name']."
                  </a>
                </div>";
        }
      ?>
    </div>
  </div>
  <script>
    function showSection(id) {
        let sections = document.querySelectorAll(".section");

        sections.forEach(function(section) {
            section.style.display = "none";
        });

        document.getElementById(id).style.display = "block";
    }
    showSection('dashboard');
  </script>

  <!-- Footer section -->
  <div class="footer">

  </div>
</body>
</html>