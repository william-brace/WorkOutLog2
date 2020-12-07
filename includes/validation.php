<?php
if (isset($_POST['signup-submit'])) {

        include('db.php');

        $email = $_POST['email'];
        $signupUsername = $_POST['username'];
        $signupPassword = $_POST['new-password'];

        

        $email = mysqli_real_escape_string($connect, $email);
        $signupUsername = mysqli_real_escape_string($connect, $signupUsername);
        $signupPassword = mysqli_real_escape_string($connect, $signupPassword);

        if (strlen($signupUsername) < 6 || strlen($signupUsername) > 15) {
            $signupUsernameErrors = "Username must be between 6 and 15 characters long";
        }

        if (preg_match("/^[a-z0-9]+$/i", $signupUsername) == 0)
        {
            $signupUsernameErrors = 'Username must only contain letters and numbers';
        }

        if (preg_match("/^[a-zA-Z]/", $signupUsername) == 0)
        {
            $signupUsernameErrors = 'Username must start with a letter';
        }

        //     //email validation
        // if (email.value.search(/[^@]+@[^@]+\.[^@]+/) == -1)
        // {
        //     emailErrors.push('Invalid email. Please enter a valid email');
        // }
        
        // //password validation
        // if (signupPassword.value.length < 8 || signupPassword.value.length > 30) 
        // {
        //     passwordErrors.push("Password must be between 8 and 30 characters long"); 
        // }
        // if (signupPassword.value.search(/[a-z]/i) == -1) 
        // {
        //     passwordErrors.push("Password must contain at least one letter");
        // }
        // if (signupPassword.value.search(/[0-9]/) == -1) 
        // {
        //     passwordErrors.push("Password must contain at least one digit"); 
        // }

        //email validation
        if (preg_match("/[^@]+@[^@]+\.[^@]+/",$email) == 0) {
            $signupEmailErrors = "Invalid email. Please enter a valid email";
        }

        //Password validation
        if (strlen($signupPassword) < 8 || strlen($signupPassword) > 30) {
            $signupPasswordErrors = "Password must be between 8 and 30 characters long";
        }

        if (preg_match("/[a-z]/i",$signupPassword) == 0) {
            $signupPasswordErrors = "Password must contain at least one letter";
        }

        if (preg_match("/[0-9]/",$signupPassword) == 0) {
            $signupPasswordErrors = "Password must contain at least one digit";
        }


        include('signup.php');

        //include("../index.html.php");

}

if (isset($_POST['signin-submit'])) {
        
    include('db.php');

    $signinUsername = $_POST['username'];
    $signinPassword = $_POST['current-password'];

    

   
    $signinUsername = mysqli_real_escape_string($connect, $signinUsername);
    $signinPassword = mysqli_real_escape_string($connect, $signinPassword);


    //Username validation
    if (strlen($signinUsername) < 6 || strlen($signinUsername) > 15) {
        $signinUsernameErrors = "Invalid Username";
    }

    if (preg_match("/^[a-z0-9]+$/i", $signinUsername) == 0)
    {
        $signinUsernameErrors = 'Invalid Username';
    }

    if (preg_match("/^[a-zA-Z]/", $signinUsername) == 0)
    {
        $signinUsernameErrors = 'Invalid Username';
    }


    //Password validation
    if (strlen($signinPassword) < 8 || strlen($signinPassword) > 30) {
        $signinPasswordErrors = "Invalid Password";
    }

    if (preg_match("/[a-z]/i",$signinPassword) == 0) {
        $signinPasswordErrors = "Invalid Password";
    }

    if (preg_match("/[0-9]/",$signinPassword) == 0) {
        $signinPasswordErrors = "Invalid Password";
    }

    include("signin.php");


    

}

