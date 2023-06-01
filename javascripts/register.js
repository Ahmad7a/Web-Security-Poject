const passwordInput = document.querySelector('input[name="password"]');

passwordInput.addEventListener('input', () => {
    const password = passwordInput.value.trim();
    const letterRegex = /[a-zA-Z]/; // at least one letter
    const numberRegex = /\d/; // at least one number
    const capitalRegex = /[A-Z]/; // at least one capital letter
    
    if (password.length >= 8 && letterRegex.test(password) && numberRegex.test(password) && capitalRegex.test(password)) {
        passwordInput.setCustomValidity('');
    } else {
        passwordInput.setCustomValidity('Password must be at least 8 characters long and contain at least one letter, one number, and one capital letter');
    }
    
    passwordInput.reportValidity();
});