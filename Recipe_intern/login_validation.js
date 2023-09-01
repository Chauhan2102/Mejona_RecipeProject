function validateLoginForm() {
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;
  
    // Perform any validation checks on the form data
    if (email.trim() === '' || password.trim() === '') {
      alert("Please fill in all fields before submitting the form.");
      return false;
    }
  
    // Additional validation checks can be added here as per your requirements.
    // For example, you may want to validate the email format or password strength.
    window.location.href = "add_recipe.html";
    return false; // If all validations pass, the form will be submitted.
  }
  