<?php 

// process_update.php
require __DIR__."/connect.php";

if (isset($_POST['submit'])) {
    $userId = $_POST['id'];
    $newName = $_POST['name'];
    $newEmail = $_POST['email'];

    $query = "UPDATE user SET name=?, email=? WHERE id=?";
    $stmt = mysqli_prepare($connect, $query);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, 'ssi', $newName, $newEmail, $userId);
        mysqli_stmt_execute($stmt);

        if (mysqli_affected_rows($connect) > 0) {
            echo "User updated successfully.";
        } else {
            echo "No changes made or user not found.";
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "Error preparing the update statement.";
    }

    mysqli_close($connect);
} else {
    echo "Invalid form submission.";
}


?>