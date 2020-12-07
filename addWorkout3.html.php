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
</head>
<body>

    <?php
    $path = $_SERVER['DOCUMENT_ROOT'];
    $path .= "/WorkOutLog/topNav.html.php";
    include_once($path); ?>

    <form>
    
    <div class="title-and-input">
        <div class="flex-row">
            <h3 class="title-and-input__title" >Workout1  </h3>
            <ion-icon class="title-and-input__icon" name="create-sharp"></ion-icon>
        </div>
        
        <input type="date" class="title-and-input__input"></input>
    </div>

    <div class="flex-container">
    
            <div class=card>
                <div class="card__title">
                    <span>Bench Press</span>
                </div>
                <div class="card__slot">
                    <div class="flex-col-center">
                        <span>Set</span>
                        <input class="card__input input" type="number">
                    </div>
                    <span class="card__text">X</span>
                    <div class="flex-col-center">
                        <span>Reps</span>
                        <input class="card__input" type="number">
                    </div>
                    <span class="card__text">at</span>
                    <div class="flex-col-center">
                        <span>Weight</span>
                        <input class="card__input" type="number">
                    </div>
                    <a href="#" class="card__icon-link">
                        <ion-icon class="card__icon card__icon--checkmark" name="checkmark-circle-sharp"></ion-icon>
                    </a>
                    <a href="#" class="card__icon-link">
                        <ion-icon class="card__icon card__icon--close-circle" name="close-circle-sharp"></ion-icon>
                    </a>
                </div>
                <div class="card__slot">
                    <div class="flex-col-center">
                        <span>Set</span>
                        <input class="card__input" type="number">
                    </div>
                    <span class="card__text">X</span>
                    <div class="flex-col-center">
                        <span>Reps</span>
                        <input class="card__input" type="number">
                    </div>
                    <span class="card__text">at</span>
                    <div class="flex-col-center">
                        <span>Weight</span>
                        <input class="card__input" type="number">
                    </div>
                    <a href="#" class="card__icon-link">
                        <ion-icon class="card__icon card__icon--checkmark" name="checkmark-circle-sharp"></ion-icon>
                    </a>
                    <a href="#" class="card__icon-link">
                        <ion-icon class="card__icon card__icon--close-circle" name="close-circle-sharp"></ion-icon>
                    </a>
                </div>
                <div class="card__slot">
                    <div class="flex-col-center">
                        <span>Set</span>
                        <input class="card__input" type="number">
                    </div>
                    <span class="card__text">X</span>
                    <div class="flex-col-center">
                        <span>Reps</span>
                        <input class="card__input" type="number">
                    </div>
                    <span class="card__text">at</span>
                    <div class="flex-col-center">
                        <span>Weight</span>
                        <input class="card__input" type="number">
                    </div>
                    <a href="#" class="card__icon-link">
                        <ion-icon class="card__icon card__icon--checkmark" name="checkmark-circle-sharp"></ion-icon>
                    </a>
                   
                </div>
                <a href=# class="btn btn--green card__btn"> Add Set </a>
            </div>
        

        <div class=card>
            <div class="card__title">
                <span>Bench Press</span>
            </div>
            <div class="card__slot">
                <div class="flex-col-center">
                    <span>Set</span>
                    <input class="card__input" type="number">
                </div>
                <span class="card__text">X</span>
                <div class="flex-col-center">
                    <span>Reps</span>
                    <input class="card__input" type="number">
                </div>
                <span class="card__text">at</span>
                <div class="flex-col-center">
                    <span>Weight</span>
                    <input class="card__input" type="number">
                </div>
                <a href="#" class="card__icon-link">
                    <ion-icon class="card__icon card__icon--checkmark" name="checkmark-circle-sharp"></ion-icon>
                </a>
                <a href="#" class="card__icon-link">
                    <ion-icon class="card__icon card__icon--close-circle" name="close-circle-sharp"></ion-icon>
                </a>
            </div>
            <div class="card__slot">
                <div class="flex-col-center">
                    <span>Set</span>
                    <input class="card__input" type="number">
                </div>
                <span class="card__text">X</span>
                <div class="flex-col-center">
                    <span>Reps</span>
                    <input class="card__input" type="number">
                </div>
                <span class="card__text">at</span>
                <div class="flex-col-center">
                    <span>Weight</span>
                    <input class="card__input" type="number">
                </div>
                <a href="#" class="card__icon-link">
                    <ion-icon class="card__icon card__icon--checkmark" name="checkmark-circle-sharp"></ion-icon>
                </a>
                <a href="#" class="card__icon-link">
                    <ion-icon class="card__icon card__icon--close-circle" name="close-circle-sharp"></ion-icon>
                </a>
            </div>
            <div class="card__slot">
                <div class="flex-col-center">
                    <span>Set</span>
                    <input class="card__input" type="number">
                </div>
                <span class="card__text">X</span>
                <div class="flex-col-center">
                    <span>Reps</span>
                    <input class="card__input" type="number">
                </div>
                <span class="card__text">at</span>
                <div class="flex-col-center">
                    <span>Weight</span>
                    <input class="card__input" type="number">
                </div>
                <a href="#" class="card__icon-link">
                    <ion-icon class="card__icon card__icon--checkmark" name="checkmark-circle-sharp"></ion-icon>
                </a>
               
            </div>
            <a href=# class="btn btn--green card__btn"> Add Set </a>
        </div>
        <div class=card>
            <div class="card__title">
                <span>Bench Press</span>
            </div>
            <div class="card__slot">
                <div class="flex-col-center">
                    <span>Set</span>
                    <input class="card__input" type="number">
                </div>
                <span class="card__text">X</span>
                <div class="flex-col-center">
                    <span>Reps</span>
                    <input class="card__input" type="number">
                </div>
                <span class="card__text">at</span>
                <div class="flex-col-center">
                    <span>Weight</span>
                    <input class="card__input" type="number">
                </div>
                <a href="#" class="card__icon-link">
                    <ion-icon class="card__icon card__icon--checkmark" name="checkmark-circle-sharp"></ion-icon>
                </a>
                <a href="#" class="card__icon-link">
                    <ion-icon class="card__icon card__icon--close-circle" name="close-circle-sharp"></ion-icon>
                </a>
            </div>
            <div class="card__slot">
                <div class="flex-col-center">
                    <span>Set</span>
                    <input class="card__input" type="number">
                </div>
                <span class="card__text">X</span>
                <div class="flex-col-center">
                    <span>Reps</span>
                    <input class="card__input" type="number">
                </div>
                <span class="card__text">at</span>
                <div class="flex-col-center">
                    <span>Weight</span>
                    <input class="card__input" type="number">
                </div>
                <a href="#" class="card__icon-link">
                    <ion-icon class="card__icon card__icon--checkmark" name="checkmark-circle-sharp"></ion-icon>
                </a>
                <a href="#" class="card__icon-link">
                    <ion-icon class="card__icon card__icon--close-circle" name="close-circle-sharp"></ion-icon>
                </a>
            </div>
            <div class="card__slot">
                <div class="flex-col-center">
                    <span>Set</span>
                    <input class="card__input" type="number">
                </div>
                <span class="card__text">X</span>
                <div class="flex-col-center">
                    <span>Reps</span>
                    <input class="card__input" type="number">
                </div>
                <span class="card__text">at</span>
                <div class="flex-col-center">
                    <span>Weight</span>
                    <input class="card__input" type="number">
                </div>
                <a href="#" class="card__icon-link">
                    <ion-icon class="card__icon card__icon--checkmark" name="checkmark-circle-sharp"></ion-icon>
                </a>
               
            </div>
            <a href=# class="btn btn--green card__btn"> Add Set </a>
        </div>
        <div class=card>
            <div class="card__title">
                <span>Bench Press</span>
            </div>
            <div class="card__slot">
                <div class="flex-col-center">
                    <span>Set</span>
                    <input class="card__input" type="number">
                </div>
                <span class="card__text">X</span>
                <div class="flex-col-center">
                    <span>Reps</span>
                    <input class="card__input" type="number">
                </div>
                <span class="card__text">at</span>
                <div class="flex-col-center">
                    <span>Weight</span>
                    <input class="card__input" type="number">
                </div>
                <a href="#" class="card__icon-link">
                    <ion-icon class="card__icon card__icon--checkmark" name="checkmark-circle-sharp"></ion-icon>
                </a>
                <a href="#" class="card__icon-link">
                    <ion-icon class="card__icon card__icon--close-circle" name="close-circle-sharp"></ion-icon>
                </a>
            </div>
            <div class="card__slot">
                <div class="flex-col-center">
                    <span>Set</span>
                    <input class="card__input" type="number">
                </div>
                <span class="card__text">X</span>
                <div class="flex-col-center">
                    <span>Reps</span>
                    <input class="card__input" type="number">
                </div>
                <span class="card__text">at</span>
                <div class="flex-col-center">
                    <span>Weight</span>
                    <input class="card__input" type="number">
                </div>
                <a href="#" class="card__icon-link">
                    <ion-icon class="card__icon card__icon--checkmark" name="checkmark-circle-sharp"></ion-icon>
                </a>
                <a href="#" class="card__icon-link">
                    <ion-icon class="card__icon card__icon--close-circle" name="close-circle-sharp"></ion-icon>
                </a>
            </div>
            <div class="card__slot">
                <div class="flex-col-center">
                    <span>Set</span>
                    <input class="card__input in" type="number">
                </div>
                <span class="card__text">X</span>
                <div class="flex-col-center">
                    <span>Reps</span>
                    <input class="card__input" type="number">
                </div>
                <span class="card__text">at</span>
                <div class="flex-col-center">
                    <span>Weight</span>
                    <input class="card__input" type="number">
                </div>
                <a href="#" class="card__icon-link">
                    <ion-icon class="card__icon card__icon--checkmark" name="checkmark-circle-sharp"></ion-icon>
                </a>
               
            </div>
            <a href=# class="btn btn--green card__btn"> Add Set </a>
        </div>
    </div>

    <div class=flex-container>
        <a href=# class="btn btn--green"> Add Exercises </a>
        <a href=# class="btn btn--blue"> Finish Workout </a>
        <a href=# class="btn btn--red"> Cancel Workout </a>
    </div>

</form>

<?php
    $path = $_SERVER['DOCUMENT_ROOT'];
    $path .= "/WorkOutLog/bottomNav.html.php";
    include_once($path); ?>
    
</body>
</html>