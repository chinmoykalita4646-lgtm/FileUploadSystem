<?php
include "db.php";

if (isset($_POST['submit'])) {

    $file = $_FILES['file'];

    $fileName = $file['name'];
    $tmpName = $file['tmp_name'];
    $fileSize = $file['size'];
    $error = $file['error'];

    $ext = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
    $allowed = ['jpg', 'jpeg', 'png', 'pdf'];

    if (in_array($ext, $allowed)) {

        if ($error === 0) {

            if ($fileSize < 5000000) {

                $newName = uniqid('', true) . "." . $ext;
                $destination = "../uploads/" . $newName;

                if (move_uploaded_file($tmpName, $destination)) {

                    // Insert into DB
                    $stmt = $con->prepare("INSERT INTO files (filename) VALUES (?)");
                    $stmt->bind_param("s", $newName);
                    $stmt->execute();

                    header("Location: index.php");
                    exit();
                }

            } else {
                echo "File too large!";
            }

        } else {
            echo "Upload error!";
        }

    } else {
        echo "Invalid file type!";
    }
}
?>