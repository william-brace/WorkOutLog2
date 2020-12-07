<?php
session_start();

if (isset($_POST['signup-submit'])) {
    echo "recieveing informarton";

    include 'db.php';

    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['new-password'];

    $email = mysqli_real_escape_string($connect, $email);
    $username = mysqli_real_escape_string($connect, $username);
    $password = mysqli_real_escape_string($connect, $password);

    $password = password_hash($password, PASSWORD_DEFAULT);
    
    $checkQuery = "SELECT * FROM users where username = '{$username}'";

    $checkQuery = mysqli_query($connect, $checkQuery);

    if (!$checkQuery)
    {
        die("QUERY TO CHECK FOR AREADY EXISTING USERNAME FAILED! " . mysqli_error);
    }
    else 
    {
    
        $row = mysqli_fetch_array($checkQuery);

        if (!empty($row)) {
            $signupUsernameErrors = "Username already taken!";
            include("../index.html.php");
        }
        else {
            echo 'The email is ' . $email . ' and the username is ' . $username . ' and the password is ' .$password; 
            $signupQuery = "INSERT INTO users (email, username, `password`) VALUES ('$email', '$username', '$password')"; 

        

            $result = mysqli_query($connect, $signupQuery);

            if ($result)
            {
                echo "User Added";
                $_SESSION['username'] = $username;
                header("Location: ../profile.html.php");
            }
            else {
                echo "User failed to be added! Error!";
            }
        }       
    }
}
