<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/style.css">

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

    <nav class="nav">
        <a href="/WorkOutlog/index.html.php" id="bottomnav-home" class="nav__link">
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

        <a href="/WorkOutlog/progress.html.php" class="nav__link nav__link--active">
            <ion-icon class="nav__icon" name="bar-chart-sharp"></ion-icon>                
            <span class="nav__text">PROGRESS</span>
        </a>
        </nav>

</body>
</html>

