<?php

session_start();

include 'db.php';

$username = $_SESSION['username'];

// $get_count_query = "SELECT * FROM workout WHERE username = '$username'";
// $get_count_query_result = mysqli_query($connect, $get_count_query);
// $workout_count = mysqli_num_rows($get_count_query_result);
// $workout_count = ceil($workout_count/2);

//echo $workout_count;

 

$getWorkoutsQuery = "SELECT * FROM workout WHERE username = '$username'";

$getWorkoutsQuery_result = mysqli_query($connect, $getWorkoutsQuery);

$workouts = array();

// while ($row = mysqli_fetch_assoc($getWorkoutsQuery_result))
// {
//     $workouts[] = $row;
// }

if (!$getWorkoutsQuery_result)
{
    die("QUERY TO GET ALL WORKOUTS FROM WORKOUT TABE WITH MATCHI GUSERNAME FAILED! " . mysqli_error);
}
else 
{
    while ($workoutRow = mysqli_fetch_assoc($getWorkoutsQuery_result))
    {
        //array_push($workouts, $workoutRow);
        
        $curWorkoutID = $workoutRow["workoutID"];
        $curWorkoutTitle = $workoutRow["title"];
        $curWorkoutDate = $workoutRow["date"];
        $curWorkoutUnit = $workoutRow["unit"];

        $getExercisesQuery = "SELECT * FROM exercise where workoutID = '$curWorkoutID'";

        $getExercisesQuery_result = mysqli_query($connect, $getExercisesQuery);

        if (!$getExercisesQuery_result)
        {
            die("QUERY TO GET ALL EXERCISES FROM EXERCISE TABLE WITH MATCHING WORKOUTID FAILED! " . mysqli_error($connect));
        }
        else 
        {   

            $exercises = array();

            while ($exerciseRow = mysqli_fetch_assoc($getExercisesQuery_result))
            {
                $curExerciseID = $exerciseRow["exerciseID"];
                $curExerciseName = $exerciseRow["exerciseName"];

                $getExerciseTypeQuery = "SELECT exerciseType from exerciseName_exerciseType where exerciseName = '$curExerciseName'";

                $getExerciseTypeQuery_result = mysqli_query($connect, $getExerciseTypeQuery);

                $exerciseTypeRow = mysqli_fetch_assoc($getExerciseTypeQuery_result);

                $curExerciseType = $exerciseTypeRow['exerciseType'];

                if (!$getExerciseTypeQuery_result)
                {
                    die("QUERY TO GET exercise type from exercise tyype tyable failed! " . mysqli_error($connect));
                }

                $curExercise = [
                    "exerciseName" => $curExerciseName,
                    "exerciseID" => $curExerciseID,
                    "exerciseType" => $curExerciseType
                ];

                //get excersise typetoo then use if to detemine which set to run to get info from

                //array_push($exercises, $curExercise);

                if ($curExerciseType == "weightlifting")
                {

                    $getSetsQuery = "SELECT * FROM weightliftingSet where exerciseID = '$curExerciseID'";

                    $getSetsQuery_result = mysqli_query($connect, $getSetsQuery);

                    if (!$getSetsQuery_result)
                    {
                        die("QUERY TO GET ALL SETS FROM WEIGHTIFTING SET TABLE WITH MATCHING EXERCISEID FAILED! " . mysqli_error);
                    }
                    else 
                    {   
                        $curExercise["sets"] = array();

                        

                        while ($setRow = mysqli_fetch_assoc($getSetsQuery_result))
                        {
                            $curSetNum = $setRow["setNum"];
                            $curSetReps = $setRow["reps"];
                            $curSetWeight = $setRow["weight"];

                            $curSet = [
                                "setNum" => $curSetNum,
                                "reps" => $curSetReps,
                                "weight" => $curSetWeight,
                                "submit" => true
                            ];

                            
                            array_push($curExercise["sets"], $curSet);



                        }


                    }
                }
                
                if ($curExerciseType == "bodyweight")
                {
                    $getSetsQuery = "SELECT * FROM bodyweightSet where exerciseID = '$curExerciseID'";

                    $getSetsQuery_result = mysqli_query($connect, $getSetsQuery);

                    if (!$getSetsQuery_result)
                    {
                        die("QUERY TO GET ALL SETS FROM BODYWEIGHT SET TABLE WITH MATCHING EXERCISEID FAILED! " . mysqli_error);
                    }
                    else 
                    {   
                        $curExercise["sets"] = array();

                        

                        while ($setRow = mysqli_fetch_assoc($getSetsQuery_result))
                        {
                            $curSetNum = $setRow["setNum"];
                            $curSetReps = $setRow["reps"];

                            $curSet = [
                                "setNum" => $curSetNum,
                                "reps" => $curSetReps,
                                "submit" => true
                            ];

                            
                            array_push($curExercise["sets"], $curSet);
                        }


                    }
                }

                if ($curExerciseType == "cardio")
                {
                    $getSetsQuery = "SELECT * FROM cardioSet where exerciseID = '$curExerciseID'";

                    $getSetsQuery_result = mysqli_query($connect, $getSetsQuery);

                    if (!$getSetsQuery_result)
                    {
                        die("QUERY TO GET ALL SETS FROM CARDIO SET TABLE WITH MATCHING EXERCISEID FAILED! " . mysqli_error);
                    }
                    else 
                    {   
                        $curExercise["sets"] = array();

                        while ($setRow = mysqli_fetch_assoc($getSetsQuery_result))
                        {
                            $curSetNum = $setRow["setNum"];
                            $curSetDistance = $setRow["distance"];
                            $curSetHours = $setRow["hours"];
                            $curSetMinutes = $setRow["minutes"];
                            $curSetSeconds = $setRow["seconds"];

                            $curSet = [
                                "setNum" => $curSetNum,
                                "distance" => $curSetDistance,
                                "hours" => $curSetHours,
                                "minutes" => $curSetMinutes,
                                "seconds" => $curSetSeconds,
                                "submit" => true
                            ];
                            
                            array_push($curExercise["sets"], $curSet);
                        }


                    }
                }
                
                
                array_push($exercises, $curExercise);
                

            }

            $curWorkout = [
                "workoutID" => $curWorkoutID,
                "title" => $curWorkoutTitle,
                "date" => $curWorkoutDate,
                "exercises" => $exercises,
                "unit" => $curWorkoutUnit
    
            ];
    
            array_push($workouts, $curWorkout);
        }

        

        

        //Figure out how to put array inside format to allow for for Each navigation in javascript
            
       
    }
}
 
//var_dump($workouts);

echo json_encode($workouts);



  //Think about getting all values and then building array through literlas;
        // $array = [
        //     "data" => [
        //       "year" => 2014,
        //       "year_data" => [
        //         "month" => "January",
        //         "month_data" => [
        //           "day" => [
        //             "1" => 100,
        //             "2" => 200,
        //             "3" => 300,
        //             "4" => 400
        //           ]
        //         ]
        //       ]
        //     ]
        //   ];

        

        //array_push($workouts, $curWorkoutID);
        
        //Figure out how to build object that is passed back to javascript, which is then stored in local storage and 
        //view is constructed from there.