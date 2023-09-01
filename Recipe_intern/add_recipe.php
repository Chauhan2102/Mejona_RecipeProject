<?php

//session is started
session_start();
// Initialize variables
$recipeStored = false;
$error_message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get recipe inputs
    $recipeName = $_POST["recipe-name"];
    $ingredients = $_POST["recipe-ingredients"];
    $instructions = $_POST["recipe-instruction"];

    // Initialize an array to store validation errors
    $validationErrors = array();

    // Perform validation
    if (empty($recipeName)) {
        $validationErrors[] = "Recipe name is required.";
    }

    if (empty($ingredients)) {
        $validationErrors[] = "Ingredients are required.";
    }

    if (empty($instructions)) {
        $validationErrors[] = "Instructions are required.";
    }

    // If there are no validation errors, proceed to store the recipe
    if (empty($validationErrors)) {
        // Include the database connection
        include_once "db_connect.php";

        // Prepare and execute the SQL query
        $sql = "INSERT INTO recipes (name, ingredients, method, user_id) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssi", $recipeName, $ingredients, $instructions, $user_id);

        if ($stmt->execute()) {
            // After successful submission, set the recipeStored flag
            $recipeStored = true;
        } else {
            // Handle any potential errors
            $error_message = "Failed to submit recipe.";
        }

        $stmt->close();
    } else {
        // Set error message for validation errors
        $error_message = "Please fix the following errors: " . implode(", ", $validationErrors);
    }
}
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Recipe App - Add Recipe</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" 
    rel="stylesheet" 
    integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" 
    crossorigin="anonymous">
  </head>
  <body style="background-color: #FEFCED;">

    <!-- NAV-BAR starts-->
    <nav class="navbar navbar-expand-lg navbar-light" 
    style="background-color: #B3DDF9;  border-bottom: 10px solid #DD3466; justify-content: space-around;">
        <div class="navbar-content">
            <h1 class="navbar-title fw-bold" style="font-family: 'Scriptina_Pro'; color: black;">FlavorVerse</h1>
        </div>
        <div class="link">
            <ul class="nav nav-underline justify-content-end">
                <li class="nav-item">
                  <a class="nav-link" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Vault</a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="add_recipe.html">Contribute</a></li>
                      <li><a class="dropdown-item" href="peruse.html">Peruse</a></li>
                      <li><a class="dropdown-item" href="#">Logout</a></li>
                      <li><hr class="dropdown-divider"></li>
                      <li><a class="dropdown-item" href="login.html">Login using other credentials</a></li>
                    </ul>
                  </li>
                <li class="nav-item">
                  <a class="nav-link" href="#login">Login</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="register.php">Register</a>
                </li>
              </ul>
        </div>
    </nav>
  <!-- NAV-BAR done-->

  <div class="page-container">
    <div class="container">
      <!-- Add recipes form -->
      <div class=".col-md-1"
      style="width : 50%; align-items: center;">
        <h3 class="text-center">Add Recipe</h3>
        <form method="POST" action="index.php" class="add-form">
          <?php if ($error_message): ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $error_message; ?>
            </div>
          <?php elseif ($recipeStored): ?>
            <div class="alert alert-success" role="alert">
                Recipe submitted successfully! <a href="index.php?recipe_id=<?php echo $newRecipeID; ?>">Recipe Overview</a>
            </div>
          <?php endif; ?>
          <label for="recipe-name">Recipe Name:</label>
          <input type="text" id="recipe-name" name="recipe-name" required>
          <br>
          <div class="group mb-2"
          style="display: flex;
          justify-content: space-between;">
            <!-- for ingridents-->
            <div>
              <label for="recipe-ingredients" style="margin-right: 20px;">Ingredient:</label>
              <textarea id="recipe-ingredients" name="recipe-ingredients" rows="5" required></textarea>
            </div>
            <!-- for instructions-->
            <div>
              <label for="recipe-method" style="margin-left: 20px">Instructions:</label>
              <textarea id="recipe-instruction" name="recipe-instruction" rows="5" required></textarea>
            </div>
          </div>
          
           <!-- button tag -->
          <button type="submit" class="btn btn-primary" 
          style="background-color: #8B9B69; border-color: #8B9B69; color: white; 
          display: block; margin: 0 auto; width: 320px;">FlavorVault</button>
        </form>
         <!-- form closed-->
      </div>
    </div>
  </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" 
    crossorigin="anonymous"></script>
    <script src="add_script.js"></script>
  </body>
</html>
