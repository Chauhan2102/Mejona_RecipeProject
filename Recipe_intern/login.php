<?php
// Initializing $authenticated variable to false.
$authenticated = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get user inputs
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Perform validation and authentication (you need to implement this)
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }

    if (strlen($password) < 8) {
        $errors[] = "Password must be at least 8 characters long.";
    }

    // If there are no errors, proceed with registration
    if (empty($errors)) {
        // After successful registration, you can redirect the user to login page
        header("Location: add_recipe.php");
        exit();
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="design.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Recipe_Sharing_Website</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" 
    rel="stylesheet" 
    integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" 
    crossorigin="anonymous">
</head>
<body>
    <!-- Nav bar starts-->
    <nav class="navbar navbar-expand-lg navbar-light" 
    style="background-color: #B3DDF9;  border-bottom: 10px solid #DD3466; justify-content: space-around;">
        <div class="navbar-content">
            <h1 class="navbar-title fw-bold" style="font-family: 'Scriptina_Pro';">FlavorVerse</h1>
        </div>
        <div class="link">
            <ul class="nav nav-underline justify-content-end">
                <li class="nav-item">
                  <a class="nav-link" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Vault</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="login.php">Login</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="register.php">Register</a>
                </li>
              </ul>
        </div>
    </nav>
     <!-- Nav bar done-->
    <main class="my-2">
        <div class="container">
            <div class="row">
                 <!--login start-->
                <div class="col-lg-7">
                    <img 
                    src="Images/first_login.jpg" 
                    alt="foods images" 
                    class="img-fluid"
                    />
                </div>
                 <!-- login and form -->
                <div class="col-md-5">
                    <div class="mb-3">
                        <h2 style="font-size: 4rem; text-align: center; text-decoration: underline">Log in.</h2>
                    </div>
                    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="login-form">
                        <?php if (isset($error_message)): ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo $error_message; ?>
                            </div>
                        <?php endif; ?>
                        <div class="my-5">
                            <label for="formGroupExampleInput" class="form-label" style="font-size: 25px;">Email Address</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="abc@gmail.com" required>
                        </div>
                        <div class="my-5">
                            <label for="formGroupExampleInput2" class="form-label" style="font-size: 25px;">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary" 
                            style="background-color: #8B9B69; border-color: #8B9B69; color: white; 
                            display: block; margin: 0 auto; width: 250px;">Login</button>
                        </div>
                        <div class="mt-5 text-center">
                            <label for="register">Don't have an account👀</label> <a href="register.php" style="width: 250px;">Register now!</a>
                        </div>
                    </form>
                </div>    
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" 
    crossorigin="anonymous"></script>
</body>
</html>
