<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
</head>

<body>
    <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post">
        <input type="text" name="name" id="name" placeholder="name">
        <input type="email" name="email" id="email" placeholder="email">
        <input type="password" name="password" id="password" placeholder="password">
        <input type="submit" name="submit" id="submit">
    </form>

    <button onclick="GoToPage()">See</button>
    <script>
    function GoToPage() {
        var a = 'read.php';
        window.location.href = a;
    }
    </script>
</body>
<?php
require __DIR__ . "/connect.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $pwd = $_POST['password'];

        $checkQuery = "SELECT * FROM user WHERE email = ?";
        
        $checkSTMT = mysqli_prepare($connect, $checkQuery);

        if ($checkSTMT) {
            mysqli_stmt_bind_param($checkSTMT, 's', $email);
            mysqli_stmt_execute($checkSTMT);

            $result = mysqli_stmt_get_result($checkSTMT);

            if (mysqli_num_rows($result) > 0) {
                echo '<script>';
                echo 'alert("Email already exists. Please choose a different Email.");';
                echo '</script>';
            } else {
                $query = "INSERT INTO user(name, email, password) VALUES (?, ?, ?)";
                $stmt = mysqli_prepare($connect, $query);

                if ($stmt) {
                    mysqli_stmt_bind_param($stmt, 'sss', $name, $email, $pwd);
                    mysqli_stmt_execute($stmt);
                    mysqli_stmt_close($stmt);
                } else {
                    echo "Error preparing the statement for insertion.";
                }
            }

            mysqli_stmt_close($checkSTMT);
        } else {
            echo "Error preparing the statement for checking email existence.";
        }
    }
}

mysqli_close($connect);
?>



</html>