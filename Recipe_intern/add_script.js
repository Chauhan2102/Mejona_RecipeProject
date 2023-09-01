document.getElementById('add-form').addEventListener('submit', function (event) {
    // Prevent the default form submission behavior
    event.preventDefault();
  
    // Save the recipe data to local storage (or any other desired action)
    const name = document.getElementById('recipe-name').value;
    const ingredients = document.getElementById('recipe-ingredients').value;
    const instructions = document.getElementById('recipe-instruction').value;
  
    // Perform any validation checks on the form data
    if (name.trim() === '' || ingredients.trim() === '' || instructions.trim() === '') {
      alert("Please fill in all fields before submitting the form.");
      return;
    }
  
    // Save the recipe data to local storage or perform any other desired action
    // For example, you can add the recipe to the "recipes" array in local storage
    const newRecipe = { name, ingredients: ingredients.split(',').map(i => i.trim()), instructions };
    let recipes = JSON.parse(localStorage.getItem('recipes')) || [];
    recipes.push(newRecipe);
    localStorage.setItem('recipes', JSON.stringify(recipes));
  
    // Redirect to the "index.html" page after adding the recipe
    window.location.href = "index.php";
  });
  