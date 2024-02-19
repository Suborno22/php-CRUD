<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update User</title>
</head>

<body>
    <?php
    require __DIR__."/connect.php";

    // Check if a user ID is provided in the query string
    if (isset($_GET['id'])) {
        $userId = $_GET['id'];

        // Retrieve the user details from the database based on the ID
        $query = "SELECT * FROM user WHERE id = ?";
        $stmt = mysqli_prepare($connect, $query);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, 'i', $userId);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if ($row = mysqli_fetch_assoc($result)) {
                // Display a form with pre-filled user details for updating
                echo "<form action='process_update.php' method='post'>";
                echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";
                echo "Name: <input type='text' name='name' value='" . $row['name'] . "'><br>";
                echo "Email: <input type='text' name='email' value='" . $row['email'] . "'><br>";
                echo "<input type='submit' name='submit' value='Update'>";
                echo "</form>";
            } else {
                echo "User not found.";
            }

            mysqli_stmt_close($stmt);
        } else {
            echo "Error preparing the statement.";
        }
    } else {
        echo "User ID not provided.";
    }

    // Close the database connection
    mysqli_close($connect);
    ?>
</body>

</html>