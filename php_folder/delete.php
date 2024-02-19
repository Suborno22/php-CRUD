<!-- delete.php -->

<?php
require __DIR__."/connect.php";

if (isset($_GET['id'])) {
    $userId = $_GET['id'];

    $query = "DELETE FROM user WHERE id=?";
    $stmt = mysqli_prepare($connect, $query);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, 'i', $userId);
        mysqli_stmt_execute($stmt);

        if (mysqli_affected_rows($connect) > 0) {
            echo "User deleted successfully.";
        } else {
            echo "User not found.";
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "Error preparing the delete statement.";
    }
} else {
    echo "User ID not provided.";
}

mysqli_close($connect);
?>