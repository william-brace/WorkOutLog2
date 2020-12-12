<?php
if (!isset($_SESSION)) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/style.css?id=1234">

    <!--icons-->
    <script type="module" src="https://unpkg.com/ionicons@5.1.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule="" src="https://unpkg.com/ionicons@5.1.2/dist/ionicons/ionicons.js"></script>

    <!--fonts-->
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans&display=swap" rel="stylesheet">

    <!-- javascript -->
    <script type='module' src="/WorkOutLog/src/controllers/workoutController.js" ></script>
    <script type='module' src="/WorkoutLog/src/search-list.js" ></script>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="./lib/datedropper.pro.min.js" defer></script>
    <link rel="stylesheet" href="./lib/datepicker-theme.css">
    




    <title>WorkOutLog | Design Workout</title>
</head>
<body>

    <?php
    $path = $_SERVER['DOCUMENT_ROOT'];
    $path .= "/WorkOutLog/topNav.html.php";
    include_once($path); ?>

    <div id="addWorkout2-page"></div>
    
    <form action="/WorkOutLog/includes/finishWorkout.php"  method="post">
    <div class="title-and-input flex-col-center">
        <div class="flex-row">
            <input type=text class="title-and-input__input--big" name=title placeholder="Name your workout" id="workout-title-input" id="workout-title-input" maxlength="10"></input>
            <ion-icon class="title-and-input__icon" name="create-sharp"></ion-icon>
        </div>

        
        
        <input type=text class="title-and-input__input" name=date id=date-input data-datedropper data-dd-theme="datepicker-theme" data-dd-large="true" data-dd-format="d/m/Y"></input>
        <script>
            
        </script>
    <div class="slider__container">
        <label class="switch"><input type="checkbox" id="togBtn"><div class="slider round"></div></label>
    </div>
    <div class="flex-container" id="exercise-container">
    </div>
    
    <div class="flex-row">
        <div class="search-list search-list--exercise" id="search-list">
            <!-- <div class="white-box max-width">
                <a href="#" class="add-icon-link">
                    <ion-icon class="add-icon-link__icon" name="add-circle-sharp"></ion-icon>                
                    <span class="add-icon-link__text">ADD EXERCISES</span>
                </a>
            </div> -->

            <input class="search-list__input" type="text" id="myInput" placeholder="Search for exercise..">

            <ul class=search-list__list id="myUL">
                <li class="search-list__item weightlifting"  >Bench Press</li>
                <li class="search-list__item bodyweight">Pull up</li>
                <li class="search-list__item cardio">Running</li>
                <li class="search-list__item weightlifting">Deadlift</li>

               

                <!-- CHEST -->
                <li class="search-list__item weightlifting"  >Flat Barbell Bench Press </li>
                <li class="search-list__item weightlifting"  >Flat Dumbbell Bench Press</li>
                <li class="search-list__item weightlifting"  >Incline Barbell Bench Press</li>
                <li class="search-list__item weightlifting"  >Incline Dumbbell Bench Press</li>
                <li class="search-list__item weightlifting"  >Decline Barbell Bench Press</li>
                <li class="search-list__item weightlifting"  >Decline Dumbbell Bench Press</li>
                <li class="search-list__item weightlifting"  >Flat Chest Press Machine</li>
                <li class="search-list__item weightlifting"  >Decline Chest Press Machine</li>
                <li class="search-list__item weightlifting"  >Incline Dumbbell Flyes</li>
                <li class="search-list__item weightlifting"  >Decline Dumbbell Flyes</li>
                <li class="search-list__item weightlifting"  >Pec Deck Machine</li>
                <li class="search-list__item weightlifting"  >Cable Flyes</li>
                <li class="search-list__item bodyweight">Dips</li>
                <li class="search-list__item bodyweight">Push-Ups</li>

                 

                <!-- BACK -->
                <li class="search-list__item bodyweight">Pull-Ups</li>
                <li class="search-list__item bodyweight">Chin-Ups</li>
                <li class="search-list__item weightlifting"  >Lat Pull-Downs</li>
                <li class="search-list__item weightlifting"  >Bent Over Barbell Rows</li>
                <li class="search-list__item weightlifting"  >Bent Over Dumbbell Rows</li>
                <li class="search-list__item weightlifting"  >T-Bar Rows</li>
                <li class="search-list__item weightlifting"  >Seated Cable Rows</li>
                <li class="search-list__item weightlifting"  >Chest Supported Barbell Rows</li>
                <li class="search-list__item weightlifting"  >Chest Supported Dumbbell Rows</li>
                <li class="search-list__item weightlifting"  >Chest Supported Machine Rows</li>
                <li class="search-list__item weightlifting"  >Inverted Rows</li>
                <li class="search-list__item weightlifting"  >Barbell Shrugs</li>
                <li class="search-list__item weightlifting"  >Dumbbell Shrugs</li>
                <li class="search-list__item weightlifting"  >Machine Shrugs</li>

                

                <!-- SHOULDER -->
                <li class="search-list__item weightlifting">Seated Overhead Barbell Press</li>
                <li class="search-list__item weightlifting">Seated Overhead Dumbbell Press</li>
                <li class="search-list__item weightlifting">Standing Overhead Barbell Press</li>
                <li class="search-list__item weightlifting">Standing Overhead Dumbbell Press</li>
                <li class="search-list__item weightlifting">Overhead Machine Press</li>
                <li class="search-list__item weightlifting">Arnold Press</li>
                <li class="search-list__item weightlifting">Barbell Upright Rows</li>
                <li class="search-list__item weightlifting">Dumbbell Upright Rows</li>
                <li class="search-list__item weightlifting">Machine Upright Rows</li>
                <li class="search-list__item weightlifting">Dumbbell Lateral Raises</li>
                <li class="search-list__item weightlifting">Cable Lateral Raises</li>
                <li class="search-list__item weightlifting">Machine Lateral Raises</li>
                <li class="search-list__item weightlifting">Dumbbell Front Raises</li>
                <li class="search-list__item weightlifting">Cable Front Raises</li>
                <li class="search-list__item weightlifting">Machine Front Raises</li>
                <li class="search-list__item weightlifting">Dumbbell Rear Delt Flyes</li>
                <li class="search-list__item weightlifting">Machine Rear Delt Flyes</li>

                

                <!-- QUAD -->
                <li class="search-list__item weightlifting">Barbell Back Squats</li>
                <li class="search-list__item weightlifting">Dumbbell Squats</li>
                <li class="search-list__item weightlifting">Barbell Front Squats</li>
                <li class="search-list__item weightlifting">Barbell Split Squats</li>
                <li class="search-list__item weightlifting">Dumbbell Split Squats</li>
                <li class="search-list__item weightlifting">Barbell Lunges</li>
                <li class="search-list__item weightlifting">Dumbbell Lunges</li>
                <li class="search-list__item weightlifting">Barbell Step-Ups</li>
                <li class="search-list__item weightlifting">Dumbbell Step-Ups</li>
                <li class="search-list__item weightlifting">Leg Press</li>
                <li class="search-list__item weightlifting">Single Leg Press</li>
                <li class="search-list__item weightlifting">Machine Squat/Hack Squat</li>
                <li class="search-list__item weightlifting">Leg Extensions</li>

                

                <!-- HAMSTRING EXERCISES  -->
                <li class="search-list__item weightlifting">Barbell Romanian Deadlift</li>
                <li class="search-list__item weightlifting">Dumbbell Romanian Deadlift</li>
                <li class="search-list__item weightlifting">Barbell Straight Leg Deadlift</li>
                <li class="search-list__item weightlifting">Dumbbell Straight Leg Deadlift</li>
                <li class="search-list__item weightlifting">Barbell Sumo Deadlift</li>
                <li class="search-list__item weightlifting">Dumbbell Sumo Deadlift</li>
                <li class="search-list__item weightlifting">Glute-Ham Raises</li>
                <li class="search-list__item weightlifting">Hyperextensions</li>
                <li class="search-list__item weightlifting">Cable Pull-Throughs</li>
                <li class="search-list__item weightlifting">Good-Mornings</li>
                <li class="search-list__item weightlifting">Leg Curls</li>

                

                <!-- Bicep Exercises-->
                <li class="search-list__item weightlifting">Standing Barbell Curls</li>
                <li class="search-list__item weightlifting">Standing Dumbbell Curls</li>
                <li class="search-list__item weightlifting">Seated Barbell Curls</li>
                <li class="search-list__item weightlifting">Seated Dumbbell Curls</li>
                <li class="search-list__item weightlifting">Barbell Preacher Curls</li>
                <li class="search-list__item weightlifting">Dumbbell Preacher Curls</li>
                <li class="search-list__item weightlifting">Incline Dumbbell Curls</li>
                <li class="search-list__item weightlifting">Hammer Curls</li>
                <li class="search-list__item weightlifting">Concentration Curls</li>
                <li class="search-list__item weightlifting">Cable Curls</li>
                <li class="search-list__item weightlifting">Biceps Curl Machine</li>

                <!-- TRICEP EXERCISES  -->
                <li class="search-list__item bodyweight">Bench Dips</li>
                <li class="search-list__item weightlifting">Flat Close Grip Bench Press</li>
                <li class="search-list__item weightlifting">Decline Close Grip Bench Press</li>
                <li class="search-list__item weightlifting">Cable Press-Downs</li>
                <li class="search-list__item weightlifting">Skull Crushers</li>
                <li class="search-list__item weightlifting">Laying Dumbell Tricep Extension</li>
                <li class="search-list__item weightlifting">Overhead Barbell Tricep Extensions</li>
                <li class="search-list__item weightlifting">Overhead Dumbbell Tricep Extensions</li>

                <!-- Have not added to database yet-->

                <!-- <li class="search-list__item">Bob</li>
                <li class="search-list__item">Calvin</li>
                <li class="search-list__item">Christina</li>
                <li class="search-list__item">Cindy</li> -->
            </ul>
            <button type="button" class="search-list__btn btn--green" id='btn-add-exercises' >Add Exercises</button>
        </div>
    </div>

    <div class="flex-container flex-container--finishCancelWorkout">
        <a  class="btn btn--blue btn--finishWorkout" id="finish-workout-btn" name="finish-workout-submit">Finish Workout</a>
        <a href="/WorkOutlog/profile.html.php" class="btn btn--red btn--cancelWorkout" id=cancel-workout-btn> Cancel Workout </a>
    </div>
<!-- 
     -->

    </form>

    <div class="spacer"></div>

    <?php

    $path = $_SERVER['DOCUMENT_ROOT'];
    $path .= "/WorkOutLog/bottomNav.html.php";
    include_once($path); 
    
    ?>
    
    
</body>
</html>