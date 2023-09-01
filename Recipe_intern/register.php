<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get user inputs
    $username = $_POST["username"];
    $email = $_POST["email"];
    $contact = $_POST["contact"];
    $password = $_POST["password"];

    // Initialize an error message array
    $errors = array();

    // Validation checks
    if (empty($username) || empty($email) || empty($contact) || empty($password)) {
        $errors[] = "All fields are required.";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }

    if (strlen($password) < 8) {
        $errors[] = "Password must be at least 8 characters long.";
    }

    // If there are no errors, proceed with registration
    if (empty($errors)) {
        // Include the database connection
        include_once "db_connect.php";

        // Hash the password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Prepare and execute the SQL query
        $sql = "INSERT INTO users (username, email, password, contact) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssss", $username, $email, $hashedPassword, $contact);

        if ($stmt->execute()) {
            // After successful registration, you can redirect the user to login page
            header("Location: login.php");
            exit();
        } else {
            // Handle any potential errors
            $error_message = "Registration failed. Please try again later.";
        }

        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="design.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Recipe_Sharing_Website</title>
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
                <li class="nav-item" >
                  <a class="nav-link" aria-current="page" href="#">Home</a>
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
      <!-- Nav bar closed-->
      <main class="my-2">
        <div class="container">
            <div class="row">
            <div class="col-lg-7">
                    <img 
                    src="Images/first_login.jpg" 
                    alt="foods images" 
                    class="img-fluid"
                    />
                </div>
                <!-- Registration form -->
                <div class="col-md-5">
                    <div class="mb-3">
                        <h2 style="font-size: 4rem; text-align: center; text-decoration: underline">Register.</h2>
                    </div>
                    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="row g-3">
                        <div class="col-md-6 my-5">
                            <label for="inputEmail4" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>
                        <div class="col-md-6 my-5">
                            <label for="inputPassword4" class="form-label">Email Address</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="col-md-6">
                            <label for="inputEmail4" class="form-label">Contact No.</label>
                            <input type="number" class="form-control" id="contact" name="contact" required>
                        </div>
                        <div class="col-md-6">
                            <label for="inputPassword4" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="mb-3 my-5">
                            <button type="submit" class="btn btn-primary" 
                            style="background-color: #8B9B69; border-color: #8B9B69; color: white; 
                            display: block; margin: 0 auto; width: 250px;">Register</button>
                        </div>
                        <div class="mt-5 text-center">
                            <label for="login">Already have an account👀</label> <a href="login.php" style="width: 250px;">Login now!</a>
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

