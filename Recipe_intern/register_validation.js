function validateForm() {
    const usernameInput = document.getElementById('username');
    const emailInput = document.getElementById('email');
    const contactInput = document.getElementById('contact');
    const passwordInput = document.getElementById('password');
  
    let isValid = true;
  
    if (usernameInput.value.trim() === '') {
      displayError(usernameInput, 'Username is required.');
      isValid = false;
    } else {
      removeError(usernameInput);
    }
  
    if (!isValidEmail(emailInput.value.trim())) {
      displayError(emailInput, 'Enter a valid email address.');
      isValid = false;
    } else {
      removeError(emailInput);
    }
  
    if (!isValidContact(contactInput.value.trim())) {
      displayError(contactInput, 'Contact number must have 10 digits.');
      isValid = false;
    } else {
      removeError(contactInput);
    }
  
    if (passwordInput.value.trim() === '' || passwordInput.value.length < 6) {
      displayError(passwordInput, 'Password must be at least 6 characters.');
      isValid = false;
    } else {
      removeError(passwordInput);
    }

    if (isValid) {
        // If all validations pass, redirect to the recipe page
        window.location.href = "login.html"; // Replace "recipe.html" with the actual recipe page URL
    }

    return isValid;
  }
  
  function isValidContact(contact) {
    return /^\d{10}$/.test(contact);
  }
  
  function isValidEmail(email) {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
  }
  
  function displayError(input, message) {
    const errorDiv = document.createElement('div');
    errorDiv.classList.add('error-msg');
    errorDiv.innerText = message;
  
    const container = input.parentNode;
    container.appendChild(errorDiv);
    input.classList.add('error');
  }
  
  function removeError(input) {
    const container = input.parentNode;
    const errorDiv = container.querySelector('.error-msg');
    if (errorDiv) {
      container.removeChild(errorDiv);
    }
    input.classList.remove('error');
  }
  