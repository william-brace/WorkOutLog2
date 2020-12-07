<?php
//include 'includes/signup.php'
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/WorkOutLog/css/style.css" type="text/css">
    <!--icons-->
    <script type="module" src="https://unpkg.com/ionicons@5.1.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule="" src="https://unpkg.com/ionicons@5.1.2/dist/ionicons/ionicons.js"></script>

    <!--fonts-->
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans&display=swap" rel="stylesheet">
    <title>Document</title>


    <!--Javascript-->
    <script src="/WorkOutLog/src/tabs.js" defer></script> <!--tabs-->
    <script src="/WorkOutLog/src/validation.js?version=<?= time() ?>" defer></script> <!--validation -->
    <script type='module' src="/WorkOutLog/src/controllers/workoutController.js" ></script>

</head>
<body>

    <?php
    $path = $_SERVER['DOCUMENT_ROOT'];
    $path .= "/WorkOutLog/topNav.html.php";
    include_once($path); ?>

    <header class="header">

        
        <div class=flex-container >
            <div class="header__group1">
                <h1 class=header__title>WorkOutLog</h1>
                <h1 class="header__text">Better tracking.<br> Better progress.<br> Better YOU.</h1>
                <a href="/WorkOutLog/addWorkout1.html.php" class="btn btn--green header__btn flex-row"> ADD WORKOUT </a>
            </div>
            <div class="header__group2">
                <div class="tabs">
                    <ul class=tabs__headings-container>
                        <li class=tabs__headings data-tab-target="#sign-up"><a href=# class=tabs__link id=tabs-sign-up> Sign Up</a></li>
                        <li class=tabs__headings data-tab-target="#sign-in"><a href=# class=tabs__link id=tabs-sign-in> Sign In</a></li>
                    </ul>
                </div>
                <form class="header__form" id="signup-form" action="/WorkOutLog/includes/validation.php"  method="post">
                        <div   id=sign-up data-tab-content>
                            <div class="flex-col-center header__form-input-container">
                                <input class=header__input type="text" name="username" id="signup-username"  placeholder="Username" required autofocus>
                                <div  class="header__error-box" id="signup-username-errors" ><?php if (isset($signupUsernameErrors)) { echo $signupUsernameErrors; } ?></div>
                                <input class=header__input type="email" name="email" id="signup-email" placeholder="Email" required>
                                <div class="header__error-box" id="signup-email-errors" ><?php if (isset($signupEmailErrors)) { echo $signupEmailErrors; } ?></div>
                                <input class=header__input type="password" name="new-password" id="signup-password" placeholder="Password" required>
                                <div id="signup-password-errors" class="header__error-box"><?php if (isset($signupPasswordErrors)) { echo $signupPasswordErrors; } ?></div>
                                <button class="btn btn--green header__btn--signup" type="submit" name="signup-submit" id=signup-btn>Sign Up</button>
                            </div>
                        </div>
                </form>
                <form class="header__form header__form--no-padding" action="/WorkOutLog/includes/validation.php" id="signin-form" method="post">
                        <div id=sign-in data-tab-content> 
                            <div class="flex-col-center header__form-input-container">
                                <input class=header__input type="text" name="username" id="signin-username"  placeholder="Username" required autocomplete="username">
                                <div class="header__error-box" id="signin-username-errors"><?php if (isset($signinUsernameErrors)) { echo $signinUsernameErrors; } ?></div>
                                <input class=header__input type="password" name="current-password" id="signin-password" placeholder="Password" required autocomplete="current-password">
                                <div class="header__error-box" id="signin-password-errors"><?php if (isset($signinPasswordErrors)) { echo $signinPasswordErrors; } ?></div>
                                <button class="btn btn--green header__btn--signup" type="submit" name="signin-submit">Sign In</button>
                            </div>
                        </div>

        


                    <!-- Sign up and Sign in Input and btn code-->
                    <!-- <input class=header__input type="text" name="username"  placeholder="Username" required>
                    <input class=header__input type="email" name="email" placeholder="Email" required>
                    <input class=header__input type="text" name="password" placeholder="Password" required>
                    <button class="btn btn--green header__btn--signup">Sign Up</button>
                            
                    <input class=header__input type="text" name="username"  placeholder="Username" required>
                    <input class=header__input type="text" name="password" placeholder="Password" required>
                    <button class="btn btn--green header__btn--signup">Sign In</button> -->
                
                    
                </form>
                <div class=header__notice>Sign up to save your workouts!</div>
            </div>
        </div>
        
        
    </header>

    

    <!-- <nav class="nav">
        <a href="#" class="nav__link nav__link--active">
            <ion-icon class="nav__icon" name="person-sharp"></ion-icon>
            <span class="nav__text">PROFILE</span>
        </a>
    
        <a href="#" class="nav__link">
            <ion-icon class="nav__icon" name="add-circle-sharp"></ion-icon>                
            <span class="nav__text">ADD WORKOUT</span>
        </a>
  
        <a href="#" class="nav__link">
            <ion-icon class="nav__icon" name="bar-chart-sharp"></ion-icon>                
            <span class="nav__text">STATISTICS</span>
        </a>
    </nav> -->


    <nav class="nav">
        <a href="/WorkOutlog/index.html.php" id="bottomnav-home" class="nav__link nav__link--active">
            <ion-icon class="nav__icon" name="home-sharp"></ion-icon>
            <span class="nav__text">HOME</span>
        </a>
        <a href="/WorkOutlog/profile.html.php" class="nav__link">
            <ion-icon class="nav__icon" name="person-sharp"></ion-icon>
            <span class="nav__text">PROFILE</span>
        </a>

        <a  id="bottomnav-addWorkout" class="nav__link">
            <ion-icon class="nav__icon" name="add-circle-sharp"></ion-icon>                
            <span class="nav__text">ADD WORKOUT</span>
        </a>

        <a href="/WorkOutlog/progress.html.php" class="nav__link ">
            <ion-icon class="nav__icon" name="bar-chart-sharp"></ion-icon>                
            <span class="nav__text">PROGRESS</span>
        </a>
    </nav>
            
    <!--<script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script> -->
</body>
</html>

