<?php
session_start();
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
    <title>Document</title>

     <!-- javascript -->
     <script type='module' src="/WorkOutLog/src/controllers/workoutController.js" ></script>
</head>
<body>

    <?php
    $path = $_SERVER['DOCUMENT_ROOT'];
    $path .= "/WorkOutLog/topNav.html.php";
    include_once($path); ?> 

    <?php  
    if (isset($_SESSION['username'])) { 
    ?>
    


        <div class="title-and-input">
        <div class="flex-container">
            <h3 class="title-and-input__title" >Welcome, <?php echo $_SESSION['username'] ?></h3>
            <a href="/WorkOutLog/includes/signout.php" class="btn btn--red  title-and-input__btn card__btn" id="sign-out-btn">Sign Out</a>
        </div>
        <div class="flex-row">
            <span>View by</span>
            <input type=text class="title-and-input__input title-and-input__input--workout"></input>
            


        </div>
    </div>

    <div class="flex-container" id="workout-container">
        <script>
            
            
        </script>
            <!-- <div class=card>
                <div class="card__title card__title--workout">
                    <span>27/06/20</span>
                    <span>Workout1</span>
                    <a href="#" class="card__icon-link " >
                        <ion-icon class="card__icon--workout card__icon--close-circle" name="close-circle-sharp"></ion-icon>
                    </a>
                </div>
                <div class="card__slot card__slot--workout">
                    <p class="card__exercise-title">Bench Press</p>
                    <p>3 sets x 10 reps at 140kg</p>
                </div>
                <div class="card__slot card__slot--workout">
                    <p>Pull up</p>
                    <p>2 sets x 10 reps +</p>
                    <p>1 set x 8 reps</p>
                </div>
                <div class="card__slot card__slot--workout">
                    <p>Running</p>
                    <p>1 set x 10km in 36:00</p>
                </div>
                <a href=# class="btn btn--green card__btn card__btn--workout"> Edit Workout </a>
            </div>

            <div class=card>
                <div class="card__title card__title--workout">
                    <span>27/06/20</span>
                    <span>Workout1</span>
                    <a href="#" class="card__icon-link " >
                        <ion-icon class="card__icon--workout card__icon--close-circle" name="close-circle-sharp"></ion-icon>
                    </a>
                </div>
                <div class="card__slot card__slot--workout">
                    <p>Bench Press</p>
                    <p>3 sets x 10 reps at 140kg</p>
                </div>
                <div class="card__slot card__slot--workout">
                    <p>Pull up</p>
                    <p>2 sets x 10 reps +</p>
                    <p>1 set x 8 reps</p>
                </div>
                <div class="card__slot card__slot--workout">
                    <p>Running</p>
                    <p>1 set x 10km in 36:00</p>
                </div>
                <a href=# class="btn btn--green card__btn card__btn--workout"> Edit Workout </a>
            </div>

            <div class=card>
                <div class="card__title card__title--workout">
                    <span>27/06/20</span>
                    <span>Workout1</span>
                    <a href="#" class="card__icon-link " >
                        <ion-icon class="card__icon--workout card__icon--close-circle" name="close-circle-sharp"></ion-icon>
                    </a>
                </div>
                <div class="card__slot card__slot--workout">
                    <p>Bench Press</p>
                    <p>3 sets x 10 reps at 140kg</p>
                </div>
                <div class="card__slot card__slot--workout">
                    <p>Pull up</p>
                    <p>2 sets x 10 reps +</p>
                    <p>1 set x 8 reps</p>
                </div>
                <div class="card__slot card__slot--workout">
                    <p>Running</p>
                    <p>1 set x 10km in 36:00</p>
                </div>
                <a href=# class="btn btn--green card__btn card__btn--workout"> Edit Workout </a>
            </div>

            <div class=card>
                <div class="card__title card__title--workout">
                    <span>27/06/20</span>
                    <span>Workout1</span>
                    <a href="#" class="card__icon-link " >
                        <ion-icon class="card__icon--workout card__icon--close-circle" name="close-circle-sharp"></ion-icon>
                    </a>
                </div>
                <div class="card__slot card__slot--workout">
                    <p>Bench Press</p>
                    <p>3 sets x 10 reps at 140kg</p>
                </div>
                <div class="card__slot card__slot--workout">
                    <p>Pull up</p>
                    <p>2 sets x 10 reps +</p>
                    <p>1 set x 8 reps</p>
                </div>
                <div class="card__slot card__slot--workout">
                    <p>Running</p>
                    <p>1 set x 10km in 36:00</p>
                </div>
                <a href=# class="btn btn--green card__btn card__btn--workout"> Edit Workout </a>
            </div>

            <div class=card>
                <div class="card__title card__title--workout">
                    <span>27/06/20</span>
                    <span>Workout1</span>
                    <a href="#" class="card__icon-link " >
                        <ion-icon class="card__icon--workout card__icon--close-circle" name="close-circle-sharp"></ion-icon>
                    </a>
                </div>
                <div class="card__slot card__slot--workout">
                    <p>Bench Press</p>
                    <p>3 sets x 10 reps at 140kg</p>
                </div>
                <div class="card__slot card__slot--workout">
                    <p>Pull up</p>
                    <p>2 sets x 10 reps +</p>
                    <p>1 set x 8 reps</p>
                </div>
                <div class="card__slot card__slot--workout">
                    <p>Running</p>
                    <p>1 set x 10km in 36:00</p>
                </div>
                <a href=# class="btn btn--green card__btn card__btn--workout"> Edit Workout </a>
            </div> -->
     </div>
        <!-- <div>
            <ul class="pager">

            <?php 
            session_start();

            include 'includes/db.php';
            
            $username = $_SESSION['username'];
            
            $get_count_query = "SELECT * FROM workout WHERE username = '$username'";
            $get_count_query_result = mysqli_query($connect, $get_count_query);
            $workout_count = mysqli_num_rows($get_count_query_result);
            $workout_count = ceil($workout_count/2);
            
            echo $workout_count;

            for ($i=1; $i <= $workout_count; $i++) {
                echo"<li><a href='profile.html.php?page={$i}'>{$i}</a></li>";
            }

            ?>

        </div> -->
            


    <div id=notice-container class=""></div>
    <?php
    } else {
    ?>
        <div class="notice">
            <div class="notice__body">
                <p class="notice__text">You have not signed in yet!</p>
                <a href="/WorkOutLog/includes/signout.php" class="notice__link"><button class="btn btn--green notice__btn flex-row">Sign In</button></a>
            </div>
        </div>
    <?php
    }
    ?>

    <div class="spacer"></div>
    
    <nav class="nav">
        <a href="/WorkOutlog/index.html.php" id="bottomnav-home" class="nav__link">
            <ion-icon class="nav__icon" name="home-sharp"></ion-icon>
            <span class="nav__text">HOME</span>
        </a>
        <a href="/WorkOutlog/profile.html.php" class="nav__link nav__link--active">
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
    
</body>
</html>