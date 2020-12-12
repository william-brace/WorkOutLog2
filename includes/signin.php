<?php

session_start();

if (isset($_POST['signin-submit'])) {
    

    include 'db.php';

    $username = $_POST['username'];
    $password = $_POST['current-password'];

    

    $username = mysqli_real_escape_string($connect, $username);
    $password = mysqli_real_escape_string($connect, $password);



    $query = "SELECT * FROM users where username = '{$username}'"; 

    $select_user_query = mysqli_query($connect, $query);
    
    if (!$select_user_query)
    {
        die("QUERY LOGIN FAILED! " . mysqli_error);
    }
    else {
        
        $row = mysqli_fetch_array($select_user_query);

        if (empty($row)) {
            $signinUsernameErrors = "Invalid Username";
            $signinPasswordErrors = "Invalid Password";
            include("../index.html.php");
        }
        else {
            $db_username = $row['username'];
            $db_password = $row['password'];

            


            if (password_verify($password, $db_password))
            {
                $_SESSION['username'] = $username;
                


                header("Location: ../profile.html.php");
            }
            else
            {
                $signinUsernameErrors = "Invalid Username";
                $signinPasswordErrors = "Invalid Password";
                include("../index.html.php");
                
            }
        }
    }  
}
