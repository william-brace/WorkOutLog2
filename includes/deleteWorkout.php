<?php

session_start();

include 'db.php';

//If user is logged in
if (isset($_SESSION['username'])) { 
   
    $requestPayload = file_get_contents("php://input");

    $workout = json_decode($requestPayload, true);
    var_dump($workout);

    $username = $_SESSION['username'];

    $workoutID = $workout['workoutID'];
    $title = $workout['title'];
    $date = $workout['date'];


    foreach($workout['exercises'] as $exercise) {
        $exerciseName = $exercise['exerciseName'];
        $exerciseID = $exercise['exerciseID'];
        $exerciseType = $exercise['exerciseType'];

        echo $exerciseName, $exerciseID, $exerciseType;

        $deleteQuery = "DELETE FROM weightliftingSet where exerciseID =  '$exerciseID'";

        $deleteQuery_result = mysqli_query($connect, $deleteQuery);

        if ($deleteQuery_result)
        {
            echo 'delete weightlifting was successful';
        }
        else if (!$deleteQuery_result)
        {
            echo 'delete weightlifting was not successful' . mysqli_error($connect);
        }

        $deleteQuery = "DELETE FROM bodyweightSet where exerciseID =  '$exerciseID'";

        $deleteQuery_result = mysqli_query($connect, $deleteQuery);

        if ($deleteQuery_result)
        {
            echo 'delete bodyweight was successful';
        }
        else if (!$deleteQuery_result)
        {
            echo 'delete bodyweight was not successful' . mysqli_error($connect);
        }

        $deleteQuery = "DELETE FROM cardioSet where exerciseID =  '$exerciseID'";

        $deleteQuery_result = mysqli_query($connect, $deleteQuery);

        if ($deleteQuery_result)
        {
            echo 'delete cardio was successful';
        }
        else if (!$deleteQuery_result)
        {
            echo 'delete cardio was not successful' . mysqli_error($connect);
        }

        $deleteExerciseQuery = "DELETE FROM exercise where workoutID =  '$workoutID'";

        $deleteExerciseQuery_result = mysqli_query($connect, $deleteExerciseQuery);

        if ($deleteExerciseQuery_result)
        {
            echo 'delete exercise was successful';
        }
        else if (!$deleteExerciseQuery_result)
        {
            echo 'delete exercise was not successful' . mysqli_error($connect);
        }
    }

    $deleteWorkoutQuery = "DELETE FROM workout where workoutID = '$workoutID'";
    $deleteWorkoutQuery_result = mysqli_query($connect, $deleteWorkoutQuery);

    if ($deleteWorkoutQuery_result)
    {
        echo 'delete workout was successful';
    }
    else if (!$deleteWorkoutQuery_result)
    {
        echo 'delete workout was not successful' . mysqli_error($connect);
    }
}


//     foreach($workout['exercises'] as $exercise) 
//        {
//             $exerciseName = $exercise['name'];
//             $exerciseID = $exercise['id'];
//             $exerciseType = $exercise['type'];

//            $deleteQuery = "DELETE FROM weightliftingSet where exerciseID =  '$exerciseID'";

//            $deleteQuery_result = mysqli_query($connect, $deleteQuery);

//            if ($deleteQuery_result)
//            {
//                echo 'delete weightlifting was successful';
//            }
//            else if (!$deleteQuery_result)
//            {
//                echo 'delete weightlifting was not successful' . mysqli_error($connect);
//            }

//            $deleteQuery = "DELETE FROM bodyweightSet where exerciseID =  '$exerciseID'";

//            $deleteQuery_result = mysqli_query($connect, $deleteQuery);

//            if ($deleteQuery_result)
//            {
//                echo 'delete bodyweight was successful';
//            }
//            else if (!$deleteQuery_result)
//            {
//                echo 'delete bodyweight was not successful' . mysqli_error($connect);
//            }

//            $deleteQuery = "DELETE FROM cardioSet where exerciseID =  '$exerciseID'";

//            $deleteQuery_result = mysqli_query($connect, $deleteQuery);

//            if ($deleteQuery_result)
//            {
//                echo 'delete cardio was successful';
//            }
//            else if (!$deleteQuery_result)
//            {
//                echo 'delete cardio was not successful' . mysqli_error($connect);
//            }

//            $deleteExerciseQuery = "DELETE FROM exercise where workoutID =  '$workoutID'";

//            $deleteExerciseQuery_result = mysqli_query($connect, $deleteExerciseQuery);

//            if ($deleteExerciseQuery_result)
//            {
//                echo 'delete exercise was successful';
//            }
//            else if (!$deleteExerciseQuery_result)
//            {
//                echo 'delete exercise was not successful' . mysqli_error($connect);
//            }
 