<?php

// If user is not logged in 
//     display alert which says you need to log in or create an account and provide links
// else
//     take values from input and store them in database

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
    $unit = $workout['unit'];

    $workoutExists = "SELECT workoutID from workout WHERE workoutID = '$workoutID'";

    $workoutExists_query = mysqli_query($connect, $workoutExists);
    
    //If workout is not previously found in database, INSERT
    if (mysqli_num_rows($workoutExists_query) == 0) {

        echo 'This is the first workout with this ID';

        $query = "INSERT INTO workout (workoutID, title, `date`, username, unit) VALUES ('$workoutID', '$title', '$date', '$username', '$unit')";
        $result = mysqli_query($connect, $query);

        if ($result)
        {
            echo 'Workout was successfully added to workout Table';
        }
        else if (!$result)
        {
            echo 'Workout table add Query Failed!';
        }

        //loop through each exercise and store it in exercise table and the appropriate set table
        foreach($workout['exercises'] as $exercise) 
        {
            $exerciseName = $exercise['exerciseName'];
            $exerciseID = $exercise['exerciseID'];
            $exerciseType = $exercise['exerciseType'];

            $exerciseQuery = "INSERT INTO exercise (exerciseID, exerciseName, workoutID) VALUES ('$exerciseID', '$exerciseName', '$workoutID')";
            
            $exerciseQuery_result = mysqli_query($connect, $exerciseQuery);

            if ($exerciseQuery_result)
            {
                echo 'Exercise was successfully added to exercise Table';
            }
            else if (!$exerciseQuery_result)
            {
                echo 'Exercise table add Query Failed!';
            }

            //loop through each set and store it in the appropriate set table
            foreach($exercise['sets'] as $set)
            {
                if ($exerciseType == 'weightlifting') 
                {
                    echo 'This is a weightlifitng exercise!';
                    
                    $setNum = $set['setNum'];
                    $reps = $set['reps'];
                    $weight = $set['weight'];

                    if (!empty($reps) && !(empty($weight)))
                    {
                        $setQuery = "INSERT INTO weightliftingSet (setNum, reps, `weight`, exerciseID) VALUES ('$setNum', '$reps', '$weight', '$exerciseID')";

                        $setQuery_result = mysqli_query($connect, $setQuery);

                        if ($setQuery_result)
                        {
                            echo 'set was successfully added to set Table';
                        }
                        else if (!$setQuery_result)
                        {
                            echo 'set table add weightlifting Query Failed!' .mysqli_error($connect);
                        }
                    }
                    else 
                    {
                        echo 'One of the weightlifting set values is empty!';
                    }

                    

                }
                if ($exerciseType == 'bodyweight') 
                {
                    echo 'This is a bodyweight exercise!';

                    $setNum = $set['setNum'];
                    $reps = $set['reps'];

                    if (!empty($reps))
                    {
                        $setQuery = "INSERT INTO bodyweightSet (setNum, reps, exerciseID) VALUES ('$setNum', '$reps', '$exerciseID')";

                        $setQuery_result = mysqli_query($connect, $setQuery);

                        if ($setQuery_result)
                        {
                            echo 'set was successfully added to set Table';
                        }
                        else if (!$setQuery_result)
                        {
                            echo 'set table add Query Failed!';
                        }
                    }
                    else 
                    {
                        echo 'One of the bodyweight set values is empty!';
                    }
                    
                }
                if ($exerciseType == 'cardio') 
                {
                    echo 'This is a cardio exercise!';

                    $setNum = $set['setNum'];
                    $distance = $set['distance'];
                    $hours = $set['hours'];
                    $minutes = $set['minutes'];
                    $seconds = $set['seconds'];

                    if (!empty($distance) && !empty($hours) && !empty($minutes) && !empty($seconds))
                    {
                        $setQuery = "INSERT INTO cardioSet (setNum, distance, `hours`, `minutes`, seconds,  exerciseID) VALUES ('$setNum', '$distance', '$hours', '$minutes', '$seconds' , '$exerciseID')";

                        $setQuery_result = mysqli_query($connect, $setQuery);

                        if ($setQuery_result)
                        {
                            echo 'set was successfully added to set Table';
                        }
                        else if (!$setQuery_result)
                        {
                            echo 'set table add Query Failed!' .mysqli_error($connect);
                        }

                    }
                    else 
                    {
                        echo 'One of the cardio set values is empty!';
                    }
                }

            }
        }

    }
    else { //If workout is previusly found in database, delete all previous of workout with same ID and insert the new
        echo "\n". 'This workout was already found in the database, it will be updated' . "\n";

       //delete all sets one by one
       foreach($workout['exercises'] as $exercise)
       {

        $exerciseName = $exercise['exerciseName'];
        $exerciseID = $exercise['exerciseID'];
        $exerciseType = $exercise['exerciseType'];

        echo "\n". "This is the " .$exerciseName. " exercise " . "\n";
        echo "\n". "This exercise is a " .$exerciseType. " exercise " . "\n";

        if ($exerciseType == "weightlifting") {

            $deleteSetsQuery = "DELETE FROM weightliftingSet where exerciseID = '$exerciseID'";

            $deleteSetsQuery_result = mysqli_query($connect, $deleteSetsQuery);
        }

        if ($exerciseType == "bodyweight") {

            $deleteSetsQuery = "DELETE FROM bodyweightSet where exerciseID = '$exerciseID'";

            $deleteSetsQuery_result = mysqli_query($connect, $deleteSetsQuery);
        }

        if ($exerciseType == "cardio") {

            $deleteSetsQuery = "DELETE FROM cardioSet where exerciseID = '$exerciseID'";

            $deleteSetsQuery_result = mysqli_query($connect, $deleteSetsQuery);
        }
           
       }

       //delete all exercises
       $deleteAllExercisesQuery = "DELETE FROM exercise where workoutID = '$workoutID'";

       $deleteAllExercisesQuery_result = mysqli_query($connect, $deleteAllExercisesQuery);

       if (!$deleteAllExercisesQuery_result) {
           echo "\n". "Error deleting all exercises exercise " . mysqli_error($connect) . "\n";
       }

       //Delete Workout from workout table
       $deleteWorkoutQuery = "DELETE FROM workout where workoutID = '$workoutID'";

       $deleteWorkoutQuery_result = mysqli_query($connect, $deleteWorkoutQuery);

       if (!$deleteWorkoutQuery_result) 
       {
            echo "\n". "Error deleting workouts" . mysqli_error($connect) . "\n";
        }


        //insert Workout
        $query = "INSERT INTO workout (workoutID, title, `date`, username, unit) VALUES ('$workoutID', '$title', '$date', '$username', '$unit')";
        $result = mysqli_query($connect, $query);

        if ($result)
        {
            echo 'Workout was successfully added to workout Table';
        }
        else if (!$result)
        {
            echo 'Workout table add Query Failed!' .mysqli_error($connect) . "\n";
        }


       //insert all exercises and sets one by one from localstorage
       foreach($workout['exercises'] as $exercise) {

            $exerciseName = $exercise['exerciseName'];
            $exerciseID = $exercise['exerciseID'];
            $exerciseType = $exercise['exerciseType'];

            echo "\n". "This is the " .$exerciseName. " exercise " . "\n";
            echo "\n". "This exercise is a " .$exerciseType. " exercise " . "\n";
            
            $exerciseQuery = "INSERT INTO exercise (exerciseID, exerciseName, workoutID) VALUES ('$exerciseID', '$exerciseName', '$workoutID')";
            
            $exerciseQuery_result = mysqli_query($connect, $exerciseQuery);

            if ($exerciseQuery_result)
            {
                echo 'Exercise was successfully added to exercise Table';
            }
            else if (!$exerciseQuery_result)
            {
                echo 'Exercise table add Query Failed!';
            }

            //loop through each set and store it in the appropriate set table
            foreach($exercise['sets'] as $set)
            {
                if ($exerciseType == 'weightlifting') 
                {
                    echo 'This is a weightlifitng exercise!';
                    
                    $setNum = $set['setNum'];
                    $reps = $set['reps'];
                    $weight = $set['weight'];

                    if (!empty($reps) && !(empty($weight)))
                    {
                        $setQuery = "INSERT INTO weightliftingSet (setNum, reps, `weight`, exerciseID) VALUES ('$setNum', '$reps', '$weight', '$exerciseID')";

                        $setQuery_result = mysqli_query($connect, $setQuery);

                        if ($setQuery_result)
                        {
                            echo 'set was successfully added to set Table';
                        }
                        else if (!$setQuery_result)
                        {
                            echo 'set table add weightlifting Query Failed!' .mysqli_error($connect);
                        }
                    }
                    else 
                    {
                        echo 'One of the weightlifting set values is empty!';
                    }

                    

                }
                if ($exerciseType == 'bodyweight') 
                {
                    echo 'This is a bodyweight exercise!';

                    $setNum = $set['setNum'];
                    $reps = $set['reps'];

                    if (!empty($reps))
                    {
                        $setQuery = "INSERT INTO bodyweightSet (setNum, reps, exerciseID) VALUES ('$setNum', '$reps', '$exerciseID')";

                        $setQuery_result = mysqli_query($connect, $setQuery);

                        if ($setQuery_result)
                        {
                            echo 'set was successfully added to set Table';
                        }
                        else if (!$setQuery_result)
                        {
                            echo 'set table add Query Failed!';
                        }
                    }
                    else 
                    {
                        echo 'One of the bodyweight set values is empty!';
                    }
                    
                }
                if ($exerciseType == 'cardio') 
                {
                    echo 'This is a cardio exercise!';

                    $setNum = $set['setNum'];
                    $distance = $set['distance'];
                    $hours = $set['hours'];
                    $minutes = $set['minutes'];
                    $seconds = $set['seconds'];

                    if (!empty($distance) && !empty($hours) && !empty($minutes) && !empty($seconds))
                    {
                        $setQuery = "INSERT INTO cardioSet (setNum, distance, `hours`, `minutes`, seconds,  exerciseID) VALUES ('$setNum', '$distance', '$hours', '$minutes', '$seconds' , '$exerciseID')";

                        $setQuery_result = mysqli_query($connect, $setQuery);

                        if ($setQuery_result)
                        {
                            echo 'set was successfully added to set Table';
                        }
                        else if (!$setQuery_result)
                        {
                            echo 'set table add Query Failed!' .mysqli_error($connect);
                        }

                    }
                    else 
                    {
                        echo 'One of the cardio set values is empty!';
                    }
                }

            }
        }



       

       

       
    //     foreach($workout['exercises'] as $exercise) 
    //    {
    //         $exerciseName = $exercise['exerciseName'];
    //         $exerciseID = $exercise['exerciseID'];
    //         $exerciseType = $exercise['exerciseType'];

    //        $deleteQuery = "DELETE FROM weightliftingSet where exerciseID =  '$exerciseID'";

    //        $deleteQuery_result = mysqli_query($connect, $deleteQuery);

    //        if ($deleteQuery_result)
    //        {
    //            echo 'delete weightlifting was successful';
    //        }
    //        else if (!$deleteQuery_result)
    //        {
    //            echo 'delete weightlifting was not successful' . mysqli_error($connect);
    //        }

    //        $deleteQuery = "DELETE FROM bodyweightSet where exerciseID =  '$exerciseID'";

    //        $deleteQuery_result = mysqli_query($connect, $deleteQuery);

    //        if ($deleteQuery_result)
    //        {
    //            echo 'delete bodyweight was successful';
    //        }
    //        else if (!$deleteQuery_result)
    //        {
    //            echo 'delete bodyweight was not successful' . mysqli_error($connect);
    //        }

    //        $deleteQuery = "DELETE FROM cardioSet where exerciseID =  '$exerciseID'";

    //        $deleteQuery_result = mysqli_query($connect, $deleteQuery);

    //        if ($deleteQuery_result)
    //        {
    //            echo 'delete cardio was successful';
    //        }
    //        else if (!$deleteQuery_result)
    //        {
    //            echo 'delete cardio was not successful' . mysqli_error($connect);
    //        }
       

    //        $deleteExerciseQuery = "DELETE FROM exercise where workoutID =  '$workoutID' AND exerciseName = '$exerciseName'";

    //        $deleteExerciseQuery_result = mysqli_query($connect, $deleteExerciseQuery);

    //        if ($deleteExerciseQuery_result)
    //        {
    //            echo 'delete ' . $exercise['exerciseName'] . ' was successful';
    //        }
    //        else if (!$deleteExerciseQuery_result)
    //        {
    //            echo 'delete ' . $exercise['exerciseName'] . ' was not successful' . mysqli_error($connect);
    //        }

    //        //INSERT after deleteing all orevious records
    //        $exerciseQuery = "INSERT INTO exercise (exerciseID, exerciseName, workoutID) VALUES ('$exerciseID', '$exerciseName', '$workoutID')";
            
    //        $exerciseQuery_result = mysqli_query($connect, $exerciseQuery);

    //        if ($exerciseQuery_result)
    //        {
    //            echo ' ' . $exercise['exerciseName'] . ' was successfully added to exercise Table';
    //        }
    //        else if (!$exerciseQuery_result)
    //        {
    //            echo 'Exercise table add Query Failed! when adding  ' . $exercise['exerciseName'] . ' ' . mysqli_error($connect);
    //        }

    //        //loop through each set and store it in the appropriate set table
    //        foreach($exercise['sets'] as $set)
    //        {
    //            if ($exerciseType == 'weightlifting') 
    //            {
    //                echo 'This is a weightlifitng exercise!';
                   
    //                $setNum = $set['setNum'];
    //                $reps = $set['reps'];
    //                $weight = $set['weight'];

    //                if (!empty($reps) && !(empty($weight)))
    //                {
    //                    $setQuery = "INSERT INTO weightliftingSet (setNum, reps, `weight`, exerciseID) VALUES ('$setNum', '$reps', '$weight', '$exerciseID')";

    //                    $setQuery_result = mysqli_query($connect, $setQuery);

    //                    if ($setQuery_result)
    //                    {
    //                        echo 'set was successfully added to set Table';
    //                    }
    //                    else if (!$setQuery_result)
    //                    {
    //                        echo 'set table add weightlifting Query Failed!' .mysqli_error($connect);
    //                    }
    //                }
    //                else 
    //                {
    //                    echo 'One of the weightlifting set values is empty!';
    //                }

                   

    //            }
    //            if ($exerciseType == 'bodyweight') 
    //            {
    //                echo 'This is a bodyweight exercise!';

    //                $setNum = $set['setNum'];
    //                $reps = $set['reps'];

    //                if (!empty($reps))
    //                {
    //                    $setQuery = "INSERT INTO bodyweightSet (setNum, reps, exerciseID) VALUES ('$setNum', '$reps', '$exerciseID')";

    //                    $setQuery_result = mysqli_query($connect, $setQuery);

    //                    if ($setQuery_result)
    //                    {
    //                        echo 'set was successfully added to set Table';
    //                    }
    //                    else if (!$setQuery_result)
    //                    {
    //                        echo 'set table add Query Failed!';
    //                    }
    //                }
    //                else 
    //                {
    //                    echo 'One of the bodyweight set values is empty!';
    //                }
                   
    //            }
    //            if ($exerciseType == 'cardio') 
    //            {
    //                echo 'This is a cardio exercise!';

    //                $setNum = $set['setNum'];
    //                $distance = $set['distance'];
    //                $time = $set['time'];

    //                if (!empty($distance) && !(empty($time)))
    //                {
    //                    $setQuery = "INSERT INTO cardioSet (setNum, distance, `time`, exerciseID) VALUES ('$setNum', '$distance', '$time', '$exerciseID')";

    //                    $setQuery_result = mysqli_query($connect, $setQuery);

    //                    if ($setQuery_result)
    //                    {
    //                        echo 'set was successfully added to set Table';
    //                    }
    //                    else if (!$setQuery_result)
    //                    {
    //                        echo 'set table add Query Failed!';
    //                    }
    //                }
    //                else 
    //                {
    //                    echo 'One of the cardio set values is empty!';
    //                }
    //            }//end type cardio

    //        }//end foreach for sets
    //     }//end for each exercise

           


    }
    
    
    


    //$title = mysqli_real_escape_string($connect, $username);
    
     
    

//     if ($username && $password)
//    {
//         //echo 'Username is ' . $username . ' and Password is ' . $password;

//         $query = "INSERT INTO users (username, passw) VALUES ('$username', '$password')";

//         $result = mysqli_query($connect, $query);
        
//        if ($result)
//        {
//            echo 'User was successfully added';
//        }
//        else if (!$result)
//         {
//             echo 'Query Failed!';
//         }
//    }
   
// }


}




