//Sign Up Form DOM elemtns
const signupForm = document.getElementById('signup-form');
const signupUsername = document.getElementById('signup-username');
const signupUsernameErrors = document.getElementById('signup-username-errors');
const email = document.getElementById('signup-email');
const signupEmailErrors = document.getElementById('signup-email-errors');
const signupPassword = document.getElementById('signup-password');
const signupPasswordErrors = document.getElementById('signup-password-errors');

// Sign In Form DOM elements
const signinForm = document.getElementById('signin-form');
const signinUsername = document.getElementById('signin-username');
const signinUsernameErrors = document.getElementById('signin-username-errors');
const signinPassword = document.getElementById('signin-password');
const signinPasswordErrors = document.getElementById('signin-password-errors');

signupForm.addEventListener('submit', e => {

    signupUsernameErrors.innerText = "";
    signupPasswordErrors.innerText = "";
    signupEmailErrors.innerText = "";
    
    console.log('signup clicked! Now');
    
    let usernameErrors = [];
    let emailErrors = [];
    let passwordErrors = [];

    //Username validation
    //check for between 6 and 15 characters - inclusive
    if (signupUsername.value.length < 6 || signupUsername.value.length > 15)
    {
        usernameErrors.push('js Username must be between 6 and 15 characters long');
    }

    //check for alphanumeric characters
    if (signupUsername.value.search(/^[a-z0-9]+$/i) == -1)
    {
        usernameErrors.push('Username must only countain letters and numbers');
    }

    if (signupUsername.value.search(/^[a-zA-Z]/) == -1)
    {
        usernameErrors.push('Username must start with a letter');
    }

    //email validation
    if (email.value.search(/[^@]+@[^@]+\.[^@]+/) == -1)
    {
        emailErrors.push('Invalid email. Please enter a valid email');
    }
    
    //password validation
    if (signupPassword.value.length < 8 || signupPassword.value.length > 30) 
    {
        passwordErrors.push("Password must be between 8 and 30 characters long"); 
    }
    if (signupPassword.value.search(/[a-z]/i) == -1) 
    {
        passwordErrors.push("Password must contain at least one letter");
    }
    if (signupPassword.value.search(/[0-9]/) == -1) 
    {
        passwordErrors.push("Password must contain at least one digit"); 
    }

    if (usernameErrors.length > 0)
    {
        e.preventDefault();
        signupUsernameErrors.innerText = usernameErrors.join(' and ');
    }

    if (emailErrors.length > 0)
    {
        e.preventDefault();
        signupEmailErrors.innerText = emailErrors.join(', ');
    }

    if (passwordErrors.length > 0)
    {
        e.preventDefault();
        signupPasswordErrors.innerText = passwordErrors.join(' and ');
    }
});

signinForm.addEventListener('submit', e => {
    signinUsernameErrors.innerText = "";
    signinPasswordErrors.innerText = "";

    let usernameErrors = [];
    let passwordErrors = [];


    //USername validation
    //check for between 6 and 15 characters - inclusive
    if (signinUsername.value.length < 6 || signinUsername.value.length > 15)
    {
        usernameErrors.push('Invalid Username');
    }
    else if (signinUsername.value.search(/^[a-z0-9]+$/i) == -1)//check for alphanumeric characters
    {
        usernameErrors.push('Invalid Username');
    }
    else if (signinUsername.value.search(/^[a-zA-Z]/) == -1)
    {
        usernameErrors.push('Invalid Username');
    }

    if (usernameErrors.length > 0)
    {
        e.preventDefault();
        signinUsernameErrors.innerText = usernameErrors.join(', ');
    }

    console.log('signin clicked!');

    //password validation
    if (signinPassword.value.length < 8 || signinPassword.value.length > 30) 
    {
        passwordErrors.push("Invalid password"); 
    }
    else if (signinPassword.value.search(/[a-z]/i) == -1) 
    {
        passwordErrors.push("Invalid password");
    }
    else if (signinPassword.value.search(/[0-9]/) == -1) 
    {
        passwordErrors.push("Invalid password"); 
    }

    if (passwordErrors.length > 0)
    {
        e.preventDefault();
        signinPasswordErrors.innerText = passwordErrors.join(',');
    }

});

