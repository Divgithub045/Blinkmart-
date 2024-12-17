<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body class="bg-light-orange" style='color:white;'>
<div class="banner" style="width:100vw; height:20%">
    <img src="project_banner.png" alt="">
</div>
    <div class="container">
        <h2 class="my-4 text-center">Sign Up</h2>
        <div class="form-container">
        <form action="signup_process.php" method="post">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" minlength='6' required>
            </div>
            <div class="mb-3">
                <label for="Adress" class="form-label">Address</label>
                <input type="text" class="form-control" id="address" name="address" required>
            </div>
            <small><i>Password Check Message:"Password must be at least 6 characters long."<br>"By logging in, you agree to our Terms & Conditions." <br></i></small>
            <button type="submit" style="color:white;" class="btn btn-primary">Sign Up</button>
        </form>
        
        <p class="mt-3">Already have an account? <a href="login.php" style="color:blue; background-color:white;">Login</a></p>
        </div>
    </div>
</body>
</html>
