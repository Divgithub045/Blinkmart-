<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "blinkmart";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $address= $_POST['address'];

    // Check if the username already exists
    $check_sql = "SELECT * FROM user WHERE user_name = ?";
    $check_stmt = $conn->prepare($check_sql);
    $check_stmt->bind_param("s", $username);
    $check_stmt->execute();
    $result = $check_stmt->get_result();

    if ($result->num_rows > 0) {
        echo "<script>alert('Username already exists. Please choose a different username.'); window.location.href = 'signup.php';</script>";
    } else {
        // Insert the new user
        $sql = "INSERT INTO user (user_name, password,address) VALUES (?, ?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $username, $password,$address);

        if ($stmt->execute()) {
            echo "<script>alert('Sign up successful. Please login.'); window.location.href = 'login.php';</script>";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    }

    $check_stmt->close();
}

$conn->close();
?>
