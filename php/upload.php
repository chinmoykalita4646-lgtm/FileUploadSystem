<?php
session_start();
include "db(fileuploadsystem).php";

$user_id = $_SESSION['user_id'];

if (isset($_POST['submit'])) {

    $file = $_FILES['file'];

    $display_name = $_POST['display_name'];
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
                    $stmt = $conn->prepare("INSERT INTO files (filename, display_name, user_id) VALUES (?,?,?)");
                    $stmt->bind_param("ssi", $newName, $display_name, $user_id);
                    $stmt->execute();

                    $_SESSION['success'] = "File Uploaded Successfully!";
                    header("Location: dashboard.php");
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