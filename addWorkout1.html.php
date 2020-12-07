<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./css/style.css?id=1234">

    <!--icons-->
    <script type="module" src="https://unpkg.com/ionicons@5.1.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule="" src="https://unpkg.com/ionicons@5.1.2/dist/ionicons/ionicons.js"></script>

    <!--fonts-->
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans&display=swap" rel="stylesheet">
    <title>Document</title>

    <!-- javascript -->
    <script type='module' src="/WorkOutLog/src/controllers/workoutController.js" ></script>
    
</head>
<body>


    <?php
    $path = $_SERVER['DOCUMENT_ROOT'];
    $path .= "/WorkOutLog/topNav.html.php";
    include_once($path); ?>
    
    <div class="flex-container flex-container--space-around" style="margin-top:5rem;">
        <div class="white-box">
            <a href="/WorkOutLog/addWorkout2.html.php" class="add-icon-link" id="create-new-workout">
                <ion-icon class="add-icon-link__icon" name="add-circle-sharp"></ion-icon>                
                <span class="add-icon-link__text">ADD NEW WORKOUT</span>
            </a>
        </div>

        <div class="search-list" id="search-list">
            <input class="search-list__input" type="text" id="myInput" placeholder="Search for workout...">

            <ul class=search-list__list id="myUL">
                <!-- <li class="search-list__item weightlifting"  >Bench Press</li>
                <li class="search-list__item bodyweight">Pull up</li>
                <li class="search-list__item cardio">Running</li> -->
                
            </ul>
            <button type="button" class="search-list__btn btn--green" id='btn-add-workout' >Add Workout</button>
        </div>

       

        
    </div>

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
    <div class="spacer"></div>

    <nav class="nav">
        <a href="/WorkOutlog/index.html.php" id="bottomnav-home" class="nav__link">
            <ion-icon class="nav__icon" name="home-sharp"></ion-icon>
            <span class="nav__text">HOME</span>
        </a>    
        <a href="/WorkOutlog/profile.html.php" class="nav__link">
            <ion-icon class="nav__icon" name="person-sharp"></ion-icon>
            <span class="nav__text">PROFILE</span>
        </a>
    
        <a  id="bottomnav-addWorkout" class="nav__link nav__link--active">
            <ion-icon class="nav__icon" name="add-circle-sharp"></ion-icon>                
            <span class="nav__text">ADD WORKOUT</span>
        </a>

        <a href="/WorkOutlog/progress.html.php" class="nav__link progress">
            <ion-icon class="nav__icon" name="bar-chart-sharp"></ion-icon>                
            <span class="nav__text">PROGRESS</span>
        </a>
    </nav>
    
</body>
</html>