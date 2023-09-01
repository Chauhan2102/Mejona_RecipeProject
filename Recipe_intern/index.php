<!DOCTYPE html>
<html>
<head>
  <title>Recipe App</title>
  <link rel="stylesheet" href="styles.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" 
    rel="stylesheet" 
    integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" 
    crossorigin="anonymous">
  </head>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #B3DDF9;  border-bottom: 10px solid #DD3466;">
    <h1 class="navbar-title fw-bold" style="font-family: 'Scriptina_Pro'; color: black; padding: 20px 0px 0px 20px">FlavorVerse</h1>
  </nav>
  <div class="container">
    <!-- Search bar/view recipes list -->
    <div class="right-column">
      <div id="search-section">
        <h3>Recipes List</h3>
        <label for="search-box">Search:</label>
        <input type="text" id="search-box">
      </div>
      <div id="recipe-list"></div>
      <div id="no-recipes">You have no recipes.</div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" 
    crossorigin="anonymous"></script>
  <script>
    // Retrieve recipes from local storage
    const recipes = JSON.parse(localStorage.getItem('recipes')) || [];

    // Get the recipe list container
    const recipeListContainer = document.getElementById('recipe-list');

    // Function to display recipes in recipe list
    function displayRecipes() {
      recipeListContainer.innerHTML = '';
      recipes.forEach((recipe, index) => {
        const recipeDiv = document.createElement('div');
        recipeDiv.innerHTML = `
          <h3>${recipe.name}</h3>
          <p><strong>Ingredients:</strong></p>
          <ul>
            ${recipe.ingredients.map(ingr => `<li>${ingr}</li>`).join('')}
          </ul>
          <p><strong>Instructions:</strong></p>
          <p>${recipe.method}</p>
          <button class="delete-button" data-index="${index}">Delete</button>`;
        recipeDiv.classList.add('recipe');
        recipeListContainer.appendChild(recipeDiv);
      });

      // Display warning when there are no recipes in the list
      const noRecipes = document.getElementById('no-recipes');
      if (recipes.length > 0) {
        noRecipes.style.display = 'none';
      } else {
        noRecipes.style.display = 'flex';
      }
    }

    // Call displayRecipes to show the recipes on page load
    displayRecipes();

    // Add event listener for recipe deletion (if needed)
    recipeListContainer.addEventListener('click', function (event) {
      if (event.target.classList.contains('delete-button')) {
        const index = event.target.dataset.index;
        recipes.splice(index, 1);
        localStorage.setItem('recipes', JSON.stringify(recipes));
        displayRecipes();
      }
    });
  </script>
</body>
</html>
