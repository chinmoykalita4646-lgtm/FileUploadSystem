<?php include ("db.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>File Upload System</title>
  <link rel="stylesheet" href="../css/style.css">
</head>
<body>
  <!-- Header secction -->
  <div class="header">
    <div class="navbar">
      <h3>Logo</h3>
      <li>Dashboard</li>
      <li>New Folder</li>
      <li>My Folders</li>
    </div>
  </div>

  <!-- Content section -->
   <div class="content">
    <div id="section" class="dashboard">
      <h2>Dashboard</h2>
    </div>
    <div id="section" class="upload">
      
    </div>
    <div class="uploadForm">
      <fieldset>
        <legend>File Upload</legend>
        <form action="upload.php" method="POST" enctype="multipart/form-data">
          <div class="formRow">
            <input type="file" name="file">
            <br><br>
            <button type="submit" name="submit">Upload</button>
          </div>
        </form>
        <?php
          $result = $con->query("SELECT * FROM files");

          while($row = $result->fetch_assoc()) {
            echo "<div><a href='../uploads/".$row['filename']."' target='_blank'>".$row['filename']."</a></div>";
          }
        ?>
      </fieldset>
    </div>
   </div>

   <!-- Footer section -->
    <div class="footer">

    </div>
</body>
</html>