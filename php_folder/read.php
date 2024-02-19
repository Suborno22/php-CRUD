<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>users</title>
</head>

<body>
    <?php
    require __DIR__ . "/connect.php";
    $query = "SELECT * FROM user";

    $result = mysqli_query($connect, $query);

    if (!$result) {
        die("Query failed: " . mysqli_error($connect));
    }
    ?>
    <table cellpadding="7px" cellspacing="5px">
        <tr>
            <th>id</th>
            <th>Name</th>
            <th>email</th>
        </tr>
        <?php
        // Step 3: Loop through the results of the query and display the data
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                // Inside the while loop in read.php
                // Inside the while loop in read.php
                echo "<td>";
                echo "<a href='update.php?id=" . $row['id'] . "' class='action-button'>Update</a>";
                echo " | ";
                echo "<a href='delete.php?id=" . $row['id'] . "' class='action-button' onclick='return confirm(\"Are you sure you want to delete this user?\");'>Delete</a>";
                echo "</td>";


                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4' id=warning>It's empty in here</td></tr>";
        }

        // Step 4: Close the database connection
        mysqli_close($connect);
        ?>
    </table>
</body>

</html>