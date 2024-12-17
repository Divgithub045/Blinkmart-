<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "blinkmart";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$errorMessage = "";
$signUpMessage = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    

    $sql = "SELECT * FROM user WHERE user_name = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 0) {
        $signUpMessage = "User not found. Please <a href='signup.php'>sign up</a>.";
    } else {
        $row = $result->fetch_assoc();
        $role=$row['role'];
        
        if (password_verify($password, $row['password'])) {
            $_SESSION['username'] = $username;
            if($role=='Admin')
            header("Location: admin_area/index.php");
            else
            header("Location: index.php");
            exit();
        } else if ($password === $row['password']) {
            $_SESSION['username'] = $username;
            if($role=='Admin')
            header("Location: admin_area/index.php");
            else
            header("Location: index.php");
            exit();
        } else {
            $errorMessage = "Incorrect password.";
        }
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body  class="bg-light-orange text-white">
<div class="banner" style="width:100vw; height:20%">
    <img src="project_banner.png" alt="">
</div>
    <div class="container" >
        <h2 class="my-4 text-center">Login</h2>

        <?php if ($errorMessage): ?>
            <div class="alert alert-danger"><?php echo $errorMessage; ?></div>
        <?php endif; ?>

        <?php if ($signUpMessage): ?>
            <div class="alert alert-warning"><?php echo $signUpMessage; ?></div>
        <?php endif; ?>
        <div class="form-container">
        <form action="login.php" method="post">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
        <p class="mt-3">Don't have an account? <a href="signup.php">Sign Up</a></p>
    </div>
        </div>
</body>
</html>
