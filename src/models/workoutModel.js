//give uniqid to every workout that is created
export const createNewBlankWorkout = () => {
    console.log('clicked!');

    var workout = {
        workoutID: createID(),
        title:'Workout1',
        date: new Date(Date.now()).toLocaleString().split(',')[0],
        exercises: [],
        unit: 'lbs'
    };

    localStorage.setItem('workout', JSON.stringify(workout));
    console.log(JSON.parse(localStorage.getItem('workout')));
}

export const updateWorkoutTitle = (name) => {

    console.log(`workout name is ${name}`);

    let workout = localStorage.getItem('workout');
    workout = JSON.parse(workout);

    workout.title = name;

    workout = JSON.stringify(workout);

    localStorage.setItem('workout', workout);
    
}

export const updateWorkoutDate = (date) => {

    console.log(`workout date is ${date}`);

    let workout = localStorage.getItem('workout');
    workout = JSON.parse(workout);

    workout.date = date;

    workout = JSON.stringify(workout);

    localStorage.setItem('workout', workout);
    
}

export const addPreviousWorkout = () => {
    const selectedItem = document.querySelector('.search-list__item--selected');
    let workoutTitle = selectedItem.innerText;
    console.log(workoutTitle);

    let allWorkouts = JSON.parse(localStorage.getItem('allWorkouts'));

    allWorkouts.forEach(workout => {
        if (workout.title == workoutTitle) {

            //give added workout new ID
            workout.workoutID = createID();

            let exercises = workout.exercises;

            exercises.forEach(exercise => {
                exercise.exerciseID = createID();
            });

            localStorage.setItem('workout', JSON.stringify(workout));

            window.location = "addWorkout2.html.php";

            
        }
    })


}

export const addExercises = () => {

    const listItems = document.querySelectorAll('.search-list__item');
    
    
    listItems.forEach(item => {

        
        if (item.classList.contains("search-list__item--selected")) {
            let workout = localStorage.getItem('workout');
            console.log('found one selected');
            
            if (workout){
                workout = JSON.parse(workout);
                console.log(`This is parsed workout ${workout}`);

                let id = createID();
                console.log(id);
                
                if (item.classList.contains('weightlifting')) {
                    
                    

                    var exercise = {
                        exerciseName: item.innerText,
                        exerciseID: id,
                        exerciseType: "weightlifting",
                        sets: [{setNum:1,reps:"", weight: "",submit:false}]
                        
                    }
                }
                else if (item.classList.contains('bodyweight')) {
                    var exercise = {
                        exerciseName: item.innerText,
                        exerciseID: id,
                        exerciseType: "bodyweight",
                        sets: [{setNum:1,reps:"",submit:false}]
                    }
                }
                else if (item.classList.contains('cardio')) {
                    var exercise = {
                        exerciseName: item.innerText,
                        exerciseID: id,
                        exerciseType: "cardio",
                        sets: [{setNum:1,distance:"", hours:"00", minutes:"00", seconds:"00",submit:false}]
                    }
                }
                

                workout.exercises.push(exercise);
                workout = JSON.stringify(workout);

                localStorage.setItem('workout', workout);


            }

            item.classList.remove("search-list__item--selected");
        }
    })
}

export const deleteExercise = (close_circle_set) => {
    
    //1. Get ID of card (exercise) and get workout from local storage 
    let exerciseId = getCardId(close_circle_set);
    let workout = JSON.parse(localStorage.getItem('workout'));
    let exercises = workout.exercises;
    
    console.log(exerciseId);

    //2. Look through local storage of workout in exercises array until exercise id's match
    exercises.forEach((exercise, index) => {
            
        if (exercise.exerciseID == exerciseId) {
            exercises.splice(index, 1);
        }
    });
    workout = JSON.stringify(workout);
    localStorage.setItem('workout', workout);

    // export const deleteSet = (closecircle) => {
    
    //     const setNum = closecircle.parentNode.querySelector('.card__number').innerText;
    
    //     console.log(setNum);
    
    //     //1. Get ID of card (exercise) and get workout from local storage 
    //     const exerciseId = getCardId(closecircle);
    //     let workout = JSON.parse(localStorage.getItem('workout'));
    //     let exercises = workout.exercises;
    
    //     //2. Look through local storage of workout in exercises array until exercise id's match
    //     exercises.forEach(exercise => {
                
    //         if (exercise.exerciseID == exerciseId) {
    //             let sets = exercise.sets;
                
    //             //3. Remove card slot of red cross from sets array - identified by set number
    //             let setsLength = sets.length-1;
    //             sets.forEach((set, index) => {
    //                 //If its not the last index
    //                 if(index != setsLength) {
    //                     if (set.set == setNum)
    //                     {
    //                         sets.splice(index,1);
                            
    //                     }
    //                     sets[index].set = index + 1;
    //                     console.log(`new set = ${sets[index].set}`);
    //                 }
    //                 else {
    //                     if (set.set == setNum)
    //                     {
    //                         sets.splice(index,1);
                            
    //                     }
    //                 }
                        
                            
                        
                        
                   
    //             });
    //         } 
    //     });
}

export const submitSet = (checkmark) => {

      

    //When green check is clicked
    //1. only if all fields are full  then continue
    const exerciseContainer = document.getElementById('exercise-container');
    
    //get inputs, using checkmark as base
    const inputs = checkmark.parentNode.querySelectorAll('.card__input');

    let  emptyCount = 0;
    inputs.forEach( input =>  {
        console.log(input.value);

        if (input.value == "") {
            emptyCount++;
        }
    });

    if (emptyCount == 0) {
        console.log('None are empty!');

        //2. Get ID of card (exercise)
        const exerciseId = getCardId(checkmark);
        let workout = JSON.parse(localStorage.getItem('workout'));
        let exercises = workout.exercises;

        //3. Look through local storage of workout in exercises array until exercise id's match
        exercises.forEach(exercise => {
            
            if (exercise.exerciseID == exerciseId) {
            //     //4. Get names and values of reps and sets dynamically - works for all three exercise types
            //     let volume, volumeNum, intensity, intensityNum;

            //     inputs.forEach( (input, index) =>  {
            //         if (index == 0) {
            //             volume = input.previousElementSibling.innerText;
            //             volumeNum = input.value;
            //         }
                    
            //         if (index == 1) {
            //             intensity = input.previousElementSibling.innerText;
            //             intensityNum = input.value;
            //         }
            //     });

            //         //5. Push new values as new set
            //     let sets = exercise.sets;
            //     console.log(sets.length);

            //     if (sets.length == 1) {
            //         sets.pop();
            //         exercise.sets.push({
            //             set:1,
            //             [volume]:volumeNum,
            //             [intensity]:intensityNum,
            //             submit:true
            //         });
            //     }
            //     else {
            //         exercise.sets.push({
            //             //sets: [{set:"1",distance:"", time:""}]


            //             set:(sets.length + 1),
            //             [volume]:volumeNum,
            //             [intensity]:intensityNum,
            //             submit:true

            //         });
            //     }
            //     //6. Save to local storage
            //     workout = JSON.stringify(workout);
            //     localStorage.setItem('workout', workout);
            let sets = exercise.sets;

            const setNum = parseInt(checkmark.parentNode.querySelector('.card__number').innerText);

            if (exercise.exerciseType == "weightlifting") {
                // 4. Get names and values of reps and sets dynamically - works for all three exercise types
                

                // inputs.forEach( (input, index) =>  {
                //     if (index == 0) {
                //         volume = input.previousElementSibling.innerText;
                //         volumeNum = input.value;
                //     }
                    
                //     if (index == 1) {
                //         intensity = input.previousElementSibling.innerText;
                //         intensityNum = input.value;
                //     }
                // });


                let volume = inputs[0].value;
                let intensity = inputs[1].value;

                console.log(`volume is ${volume}, intensity is ${intensity}`);
                

                deleteSet(checkmark);

                let submitSet = {
                    "setNum":setNum,
                    "reps":volume,
                    "weight":intensity,
                    "submit":true
                }

                sets.splice(setNum-1,1,submitSet);
                
                //4. Push to local storage
                workout = JSON.stringify(workout);
                localStorage.setItem('workout', workout);


                // sets.forEach(set => {
                    
                // });
            }
            if (exercise.exerciseType == "bodyweight") {
                // 4. Get names and values of reps and sets dynamically - works for all three exercise types
                

                // inputs.forEach( (input, index) =>  {
                //     if (index == 0) {
                //         volume = input.previousElementSibling.innerText;
                //         volumeNum = input.value;
                //     }
                    
                //     if (index == 1) {
                //         intensity = input.previousElementSibling.innerText;
                //         intensityNum = input.value;
                //     }
                // });


                let volume = inputs[0].value;

                //console.log(`volume is ${volume}`);
                

                deleteSet(checkmark);

                let submitSet = {
                    "setNum":setNum,
                    "reps":volume,
                    "submit":true
                }

                sets.splice(setNum-1,1,submitSet);
                
                //4. Push to local storage
                workout = JSON.stringify(workout);
                localStorage.setItem('workout', workout);


                // sets.forEach(set => {
                    
                // });
            }
            if (exercise.exerciseType == "cardio") {
                // 4. Get names and values of reps and sets dynamically - works for all three exercise types
                

                // inputs.forEach( (input, index) =>  {
                //     if (index == 0) {
                //         volume = input.previousElementSibling.innerText;
                //         volumeNum = input.value;
                //     }
                    
                //     if (index == 1) {
                //         intensity = input.previousElementSibling.innerText;
                //         intensityNum = input.value;
                //     }
                // });


                let volume = inputs[0].value;
                let hours = inputs[1].value;
                let minutes = inputs[2].value;
                let seconds = inputs[3].value;

                //console.log(`volume is ${volume}`);
                

                deleteSet(checkmark);

                let submitSet = {
                    "setNum":setNum,
                    "distance":volume,
                    "hours":hours,
                    "minutes":minutes,
                    "seconds":seconds,
                    "submit":true
                }

                sets.splice(setNum-1,1,submitSet);
                
                //4. Push to local storage
                workout = JSON.stringify(workout);
                localStorage.setItem('workout', workout);


                // sets.forEach(set => {
                    
                // });
            }
        }
    });

            //green select for when checkmark is clicked
            //Add select value to sets: true or false; display accordindlgy
            
           
            
            
        }
    }

export const deleteSet = (closecircle) => {
    
    const setNum = closecircle.parentNode.querySelector('.card__number').innerText;

    console.log(setNum);

    //1. Get ID of card (exercise) and get workout from local storage 
    const exerciseId = getCardId(closecircle);
    let workout = JSON.parse(localStorage.getItem('workout'));
    let exercises = workout.exercises;

    //2. Look through local storage of workout in exercises array until exercise id's match
    exercises.forEach(exercise => {
            
        if (exercise.exerciseID == exerciseId) {
            let sets = exercise.sets;
            
            //3. Remove card slot of red cross from sets array - identified by set number
            let setsLength = sets.length-1;
            sets.forEach((set, index) => {
                //If its not the last index
                if(index != setsLength) {
                    if (set.setNum == setNum)
                    {
                        sets.splice(index,1);
                        
                    }
                    sets[index].setNum = index + 1;
                    console.log(`new set = ${sets[index].setNum}`);
                }
                else {
                    if (set.setNum == setNum)
                    {
                        sets.splice(index,1);
                        
                    }
                }
                    
                        
                    
                    
               
            });
        } 
    });

    //4. Push to local storage
    workout = JSON.stringify(workout);
    localStorage.setItem('workout', workout);
}

 //Add set function
 export const addSet = (cardElement, submit = false) => {
    
    //Get ID of exercise from event and get workout from local storage
    let exerciseId = getCardId(cardElement);
    let workout = JSON.parse(localStorage.getItem('workout'));
    let exercises = workout.exercises;

    exercises.forEach(exercise => {
        //Match exercise clicked to exercise in localstorage
        if (exercise.exerciseID == exerciseId) {
            let sets = exercise.sets;

            if (exercise.exerciseType == "weightlifting") {
                //if there are some sets
                if (sets.length && sets[sets.length-1].submit) {
                    let previousSet = sets[sets.length-1];
                    console.log(previousSet);

                    let newSetNum =  1 + parseInt(previousSet.setNum);
                    console.log(`newSetNum = ${newSetNum}`);
                    
                    let newSet = {
                        "setNum":newSetNum,
                        "reps":previousSet.reps,
                        "weight":previousSet.weight,
                        "submit":submit
                    }

                    sets.push(newSet);
                    workout = JSON.stringify(workout);
                    localStorage.setItem('workout', workout)

                }
                else if (sets.length) { //if array is not empty but has no submit sets
                    let previousSet = sets[sets.length-1];
                    
                    console.log(previousSet);
                    console.log(previousSet.setNum);
                    
                    let newSetNum =   1 + parseInt(previousSet.setNum);

                    console.log(`newSetNum = ${newSetNum}`);

                    let newSet = {
                        "setNum":newSetNum,
                        "reps":"",
                        "weight":"",
                        "submit":submit
                    }

                    sets.push(newSet);
                    workout = JSON.stringify(workout);
                    localStorage.setItem('workout', workout)
                }
                else if (!sets.length)  {
                    let newSet = {
                        "setNum":1,
                        "reps":"",
                        "weight":"",
                        "submit":submit
                    }

                    sets.push(newSet);
                    workout = JSON.stringify(workout);
                    localStorage.setItem('workout', workout)
                }

                // sets.forEach(set => {
                    
                // });
            }
            if (exercise.exerciseType == "bodyweight") {
                //if there are some sets
                if (sets.length && sets[sets.length-1].submit) {
                    let previousSet = sets[sets.length-1];
                    console.log(previousSet);

                    let newSetNum =  1 + parseInt(previousSet.setNum);
                    console.log(`newSetNum = ${newSetNum}`);
                    
                    let newSet = {
                        "setNum":newSetNum,
                        "reps":previousSet.reps,
                        "submit":submit
                    }

                    sets.push(newSet);
                    workout = JSON.stringify(workout);
                    localStorage.setItem('workout', workout)

                }
                else if (sets.length) { //if array is not empty but has no submit sets
                    let previousSet = sets[sets.length-1];
                    
                    console.log(previousSet);
                    console.log(previousSet.setNum);
                    
                    let newSetNum =  1 + parseInt(previousSet.setNum);

                    console.log(`newSetNum = ${newSetNum}`);

                    let newSet = {
                        "setNum":newSetNum,
                        "reps":"",
                        "submit":submit
                    }

                    sets.push(newSet);
                    workout = JSON.stringify(workout);
                    localStorage.setItem('workout', workout)
                }
                else if (!sets.length)  {
                    let newSet = {
                        "setNum":1,
                        "reps":"",
                        "submit":submit
                    }

                    sets.push(newSet);
                    workout = JSON.stringify(workout);
                    localStorage.setItem('workout', workout)
                }

                // sets.forEach(set => {
                    
                // });
            }
            if (exercise.exerciseType == "cardio") {
                //if there are some sets
                if (sets.length && sets[sets.length-1].submit) {
                    let previousSet = sets[sets.length-1];
                    console.log(previousSet);

                    let newSetNum =  1 + parseInt(previousSet.setNum);
                    console.log(`newSetNum = ${newSetNum}`);
                    
                    let newSet = {
                        "setNum":newSetNum,
                        "distance":previousSet.distance,
                        "hours":previousSet.hours,
                        "minutes":previousSet.minutes,
                        "seconds":previousSet.seconds,
                        "submit":submit
                    }

                    sets.push(newSet);
                    workout = JSON.stringify(workout);
                    localStorage.setItem('workout', workout)

                }
                else if (sets.length) { //if array is not empty but has no submit sets
                    let previousSet = sets[sets.length-1];
                    
                    console.log(previousSet);
                    console.log(previousSet.setNum);
                    
                    let newSetNum =  1 + parseInt(previousSet.setNum);

                    console.log(`newSetNum = ${newSetNum}`);

                    let newSet = {
                        "setNum":newSetNum,
                        "distance":"",
                        "hours":"00",
                        "minutes":"00",
                        "seconds":"00",
                        "submit":submit
                    }

                    sets.push(newSet);
                    workout = JSON.stringify(workout);
                    localStorage.setItem('workout', workout)
                }
                else if (!sets.length)  {
                    let newSet = {
                        "setNum":1,
                        "distance":"",
                        "hours":"00",
                        "minutes":"00",
                        "seconds":"00",
                        "submit":submit
                    }

                    sets.push(newSet);
                    workout = JSON.stringify(workout);
                    localStorage.setItem('workout', workout)
                }

                // sets.forEach(set => {
                    
                // });
            }
            
        } 
    });

  
    

    //If there is a previous set that is submit, take values and apply them to a new set

    //push changes to localStorage
}

// export const updateSet = (cardElement = this) => {
//     console.log('This is an input!');
//     console.log(cardElement.closest('.card__slot').classList);

//     console.log('updateSet running!')

//     //if the input clicked is from a submiteed set
//     if (cardElement.closest('.card__slot').classList.contains('card__slot--submit')) {
    
//         let exerciseId = getCardId(cardElement);
//         let workout = JSON.parse(localStorage.getItem('workout'));
//         let exercises = workout.exercises;

//         const setNum = parseInt(cardElement.closest('.card__slot').querySelector('.card__number').innerText);

//         exercises.forEach(exercise => {
//             //Match exercise clicked to exercise in localstorage
//             if (exercise.exerciseID == exerciseId) {
//                 let sets = exercise.sets;

//                 sets.forEach((set, index) => {
//                     if (set.set == setNum) {
//                         sets[index].submit = false;
//                     }
//                 });
//             }
//         });

//         workout = JSON.stringify(workout);
//         localStorage.setItem('workout', workout)            
        




//     }
// }

export const editWorkout = (cardElement) => {

    let selectedWorkoutID = getCardId(cardElement);

    console.log(selectedWorkoutID);
    
    let allWorkouts = JSON.parse(localStorage.getItem('allWorkouts'));

    console.log(allWorkouts);

    allWorkouts.forEach(workout => {
        if (workout.workoutID == selectedWorkoutID) {

        localStorage.setItem('workout', JSON.stringify(workout));

        window.location = "/WorkOutLog/addWorkout2.html.php";


        }
    });

}




  const createID = () => {
    return '_' + Math.random().toString(36).substr(2, 9);
  }

  export const getCardId = (cardElement) => {
    let ID = cardElement.closest('.card').id;
    console.log(ID);
    return ID;
  }

  //Update function for sets
  

 
//  export const deleteWorkout = (cardElement) => {

//     let workoutID = getCardId(cardElement);
//     console.log(workoutID);

//     let allWorkouts = JSON.parse(localStorage.getItem('allWorkouts'));

//     console.log(allWorkouts);

//     allWorkouts.forEach(workout => {
//         if (workout.workoutID == workoutID) {
//             let clickedWorkout = JSON.stringify(workout);

//             console.log(clickedWorkout);

//             const xhr = new XMLHttpRequest();

//             xhr.open('POST', "/WorkOutlog/includes/deleteWorkout.php");
//             xhr.setRequestHeader("Content-Type", "application/json");
//             xhr.send(clickedWorkout);

//             xhr.onreadystatechange = () => {
//                 if (xhr.readyState == 4) {
//                     if (xhr.status == 200) {
//                         //window.location = "/WorkOutlog/includes/deleteWorkout.php";
//                     }
        
//                     if (xhr.status == 400) {
//                        console.log('Error!, Resource not found!');
//                     }
//                 }
//             }

//         }
//     })
//  }

//  export const getWorkouts = () => {
//      console.log('getWorkouts is working');

//     //call ajax 
//     const xhr = new XMLHttpRequest();
//     xhr.open('GET', "/WorkOutlog/includes/getWorkouts.php", true);

//     //send ajax
//     xhr.send()

//     complete: function (data) {
//         printWithAjax(); 
//        }

//     //recieving response from getWorkouts.php
//     xhr.onreadystatechange = () => {
//         if (xhr.readyState == 4) {
//             if (xhr.status == 200) {
//                 console.log(`getWorkouts ${xhr.responseText}`);

//                 let allWorkouts = JSON.parse(xhr.responseText);
//                 //console.log(workouts);

//                 allWorkouts = JSON.stringify(allWorkouts);

//                 localStorage.setItem('allWorkouts', allWorkouts);

//                 console.log('getWorkouts is complete!');
                
//             }

           

//             if (xhr.status == 400) {
//                console.log('Error!, Resource not found!');
//             }
//         }
//     }
//  }

 export const changeToPHP = () => {
     window.location = "/WorkOutlog/includes/finishWorkout.php"
 }



    


  //Things to Do:

  //1. Make set nums update after a set is deleted √

  //2. Create update function : If input of a submitted set is changed - clear values from local storage and
  //de colour it.

  //Make add set work for all types of exercises√

  //Make sure entire exercise section is working