export const clearExercises = () => {
    document.getElementById('exercise-container').innerHTML = "";
}

export const clearWorkouts = () => {
    document.getElementById('workout-container').innerHTML = "";
}

export const createExerciseCards = () => {
    console.log('This is working');

    let workout = JSON.parse(localStorage.getItem('workout'));

    
    let allExercises = workout.exercises;

        console.log(allExercises);
        clearExercises();

        allExercises.forEach(exercise => {

        if (exercise.exerciseType == "weightlifting") {
            var markup = `<div class=card id=${exercise.exerciseID}>
                            <div class="card__title card__title--exercise">
                                <span>${exercise.exerciseName}</span>
                                <ion-icon class="card__icon card__icon--close-circle card__icon--close-circle--title close-circle-exercise" name="close-circle-sharp"></ion-icon>

                            </div>`;

                            let setsArray = exercise.sets;

                            setsArray.forEach((set, index) => {

                                console.log(`reps are ${set.reps}`);
                            
                                let setMarkup = 
                                `<div class="card__slot ${set.submit ? `card__slot--submit` : ''}">
                                        <div class="flex-col-center">
                                            <span>Set</span>
                                            <span class="card__number"> ${set.setNum} </span>
                                        </div>
                                        <span class="card__text">X</span>
                                        <div class="flex-col-center">
                                            <span>reps</span>
                                            <input class="card__input" type="number" min=0 oninput="validity.valid||(value='');" ${set.submit ? `name=${exercise.exerciseID}-reps[]` : `` } value="${set.reps}" ${set.submit ? `readonly` : ''}>
                                        </div>
                                        <span class="card__text">at</span>
                                        <div class="flex-col-center">
                                            <span>weight</span>
                                            <div>
                                            <input class="card__input" type="number" min=0 value="${set.weight}" ${set.submit ? `name=${exercise.exerciseID}-weight[]` : `` } value="${set.reps}" ${set.submit ? `readonly` : ''}>
                                            <span>${workout.unit}</span>
                                            </div>
                                        </div>
                                            <ion-icon class="card__icon card__icon--checkmark" name="checkmark-circle-sharp"></ion-icon>
                                            <ion-icon class="card__icon card__icon--close-circle close-circle-set" name="close-circle-sharp"></ion-icon>
                                    </div>`;
                                        
                                markup = markup + setMarkup;

                                
                            });
                            markup = markup + `<button type=button class="btn btn--green card__btn"> Add Set </button>
                                            </div>
                                        </div>`;          
        }         

        if (exercise.exerciseType == "bodyweight") {
                            var markup = `<div class=card id=${exercise.exerciseID}>
                            <div class="card__title card__title--exercise">
                                <span>${exercise.exerciseName}</span>
                                <ion-icon class="card__icon card__icon--close-circle card__icon--close-circle--title close-circle-exercise" name="close-circle-sharp"></ion-icon>
                            </div>`;

                            let setsArray = exercise.sets;

                            setsArray.forEach((set, index) => {

                                
                            
                                let setMarkup = 
                            `<div class="card__slot ${set.submit ? `card__slot--submit` : ''}">
                                <div class="flex-col-center">
                                    <span>Set</span>
                                    <span class="card__number"> ${set.setNum} </span>
                                </div>
                                <span class="card__text">X</span>
                                <div class="flex-col-center">
                                    <span>reps</span>
                                    <input class="card__input" type="number" min=0 value="${set.reps}" ${set.submit ? `readonly` : ''}>
                                </div>
                                <span class="card__text"></span> 
                                <ion-icon class="card__icon card__icon--checkmark" name="checkmark-circle-sharp"></ion-icon>
                                <ion-icon class="card__icon card__icon--close-circle close-circle-set" name="close-circle-sharp"></ion-icon>         
                            </div>`;

                        markup = markup + setMarkup;
                    });
                    markup = markup + `<button type=button class="btn btn--green card__btn"> Add Set </button>
                                    </div>
                                </div>`; 
        }
                        

        if (exercise.exerciseType == "cardio") {
                            var markup = `<div class=card id=${exercise.exerciseID}>
                            <div class="card__title card__title--exercise">
                                <span>${exercise.exerciseName}</span>
                                <ion-icon class="card__icon card__icon--close-circle card__icon--close-circle--title close-circle-exercise" name="close-circle-sharp"></ion-icon>
                            </div>`;

                            let setsArray = exercise.sets;

                            setsArray.forEach((set, index) => {

                                
                            
                                let setMarkup = 
                            `<div class="card__slot ${set.submit ? `card__slot--submit` : ''}">
                                <div class="flex-col-center">
                                    <span>Set</span>
                                    <span class="card__number"> ${set.setNum} </span>
                                </div>
                                <span class="card__text">for</span>
                                <div class="flex-col-center">
                                    <span>distance</span>
                                    <div>
                                        <input class="card__input" type="number" min=0 value="${set.distance}" ${set.submit ? `readonly` : ''}>
                                        <span>km</span>
                                    </div>
                                </div>
                                <span class="card__text">in</span>
                                <div class="flex-col-center">
                
                                        <span>Hours</span>
                                        <input class="card__input" type="number" min=0  value="${set.hours}" ${set.submit ? `readonly` : ''}></input>
                                    
                                        
                                </div>
                                <span class="card__text">:</span>
                                <div class="flex-col-center">
                                    <span>Minutes</span>
                                    <input class="card__input" type="number" min=0 value="${set.minutes}" ${set.submit ? `readonly` : ''}></input>
                                </div>
                                <span class="card__text">:</span>
                                <div class="flex-col-center">
                                    <span>Seconds</span>
                                    <input class="card__input" type="number" min=0  value="${set.seconds}" ${set.submit ? `readonly` : ''}></input>
                                </div>

                                <ion-icon class="card__icon card__icon--checkmark" name="checkmark-circle-sharp"></ion-icon>
                                <ion-icon class="card__icon card__icon--close-circle close-circle-set" name="close-circle-sharp" ></ion-icon>
                            </div>`;

                            markup = markup + setMarkup;
                            });

                            //original time inputs
                            // <span>time</span>
                            // <input class="card__input html-duration-picker"  value="${set.time}" ${set.submit ? `readonly` : ''}></input>

                            
                      markup = markup + `<button type=button class="btn btn--green card__btn"> Add Set </button>
                                    </div>
                                </div>`; 
                    }
                        
                        
                        document.getElementById('exercise-container').insertAdjacentHTML('beforeend', markup);
                    });
};

// export const createWorkoutCards = () => {
//     console.log('create workout cards!');

//     let allWorkouts = JSON.parse(localStorage.getItem('allWorkouts'));

//     console.log(`create workout cards \n${allWorkouts}`);

//     clearWorkouts();

//     allWorkouts.forEach(workout => {

//         var markup = `<div class=card id=${workout.workoutID}>
//                 <div class="card__title card__title--workout">
//                     <span>${workout.date}</span>
//                     <span>${workout.title}</span>
                    
//                         <ion-icon class="card__icon--workout card__icon--close-circle close-circle-workout" name="close-circle-sharp" ></ion-icon>
                    
//                 </div>`

//                 let exerciseArray = workout.exercises

//                 exerciseArray.forEach(exercise => {
                    
                    
//                     let exerciseMarkup = `<div class="card__slot card__slot--workout">
//                     <p class="card__exercise-title">${exercise.exerciseName}</p>`

//                     let setArray = exercise.sets;

//                     setArray.forEach(set => {
//                         if (exercise.exerciseType == "weightlifting") {
//                             let setMarkup = `<p>1 set x ${set.reps} reps at ${set.weight}${workout.unit}</p>
//                             </div>`

//                             markup = markup + exerciseMarkup + setMarkup;
//                         }

//                         if (exercise.exerciseType == "bodyweight") {
//                             let setMarkup = `<p>1 set x ${set.reps} reps</p>
//                             </div>`

//                             markup = markup + exerciseMarkup + setMarkup;
//                         }

//                         if (exercise.exerciseType == "cardio") {
//                             let setMarkup = `<p>1 set for ${set.distance}km distance in ${set.time} time</p>
//                             </div>`

//                             markup = markup + exerciseMarkup + setMarkup;
//                         }

                        

//                     });

                    
//                 });
                
//                 markup = markup + `<a href=# class="btn btn--green card__btn card__btn--workout btn-edit-workout"> Edit Workout </a>
//                 </div>`;

//                 document.getElementById('workout-container').insertAdjacentHTML('beforeend', markup);
//     });

    
// };

export const createWorkoutCards = () => {
        console.log('create workout cards!');
    
        let allWorkouts = JSON.parse(localStorage.getItem('allWorkouts'));
    
        console.log(`create workout cards \n${allWorkouts}`);
    
        clearWorkouts();
    
        allWorkouts.forEach(workout => {
    
            var markup = `<div class=card id=${workout.workoutID}>
                    <div class="card__title card__title--workout">
                        <span>${workout.date}</span>
                        <span>${workout.title}</span>
                        
                            <ion-icon class="card__icon--workout card__icon--close-circle close-circle-workout" name="close-circle-sharp" ></ion-icon>
                        
                    </div>`
    
                    let exerciseArray = workout.exercises
    
                    exerciseArray.forEach(exercise => {
                        
                        
                        let exerciseMarkup = `<div class="card__slot card__slot--workout">
                        <p class="card__exercise-title">${exercise.exerciseName}</p>`
    
                        let setArray = exercise.sets;
                        let setInfo = [];
                        let removeArray = [];
                        var setMarkup = ``;

                        if (exercise.exerciseType == "weightlifting") {
                            setArray.forEach((set, index) => {
                            
                            let timesOccuring = 1;

                            setInfo[index] = {
                                "timesOccuring": timesOccuring,
                                "reps": set.reps,
                                "weight": set.weight
                            }

                            for (let i=index+1; i < setArray.length; i++)
                            {
                                //If there is a match within the set array where reps and weight are the same
                                if (set.reps == setArray[i].reps && set.weight == setArray[i].weight)
                                {
                                    timesOccuring++;
                                    setInfo[index] = {
                                        "timesOccuring": timesOccuring,
                                        "reps": set.reps,
                                        "weight": set.weight
                                    }
                                    removeArray.push(i); 
                                }
                            }

                            console.log(setInfo);
                            console.log(`Indexes of setArray to be removed are ${removeArray}`);

                            removeArray.sort(function(a,b){ return b - a; });
                            
                            removeArray.forEach(removeIndex => {
                                        setArray.splice(removeIndex, 1);
                            });

                                    removeArray = [];
                            });

                            setInfo.forEach(set => {
                                setMarkup = setMarkup + `<p>${set.timesOccuring} set x ${set.reps} reps at ${set.weight}${workout.unit}</p>`
                            });

                            setMarkup = setMarkup + `</div>`

                            markup = markup + exerciseMarkup + setMarkup;
        
                        }

                        if (exercise.exerciseType == "bodyweight") {
                            setArray.forEach((set, index) => {
                            
                            let timesOccuring = 1;

                            setInfo[index] = {
                                "timesOccuring": timesOccuring,
                                "reps": set.reps,
                            }

                            for (let i=index+1; i < setArray.length; i++)
                            {
                                //If there is a match within the set array where reps and weight are the same
                                if (set.reps == setArray[i].reps)
                                {
                                    timesOccuring++;
                                    setInfo[index] = {
                                        "timesOccuring": timesOccuring,
                                        "reps": set.reps,
                                    }
                                    removeArray.push(i); 
                                }
                            }

                            console.log(setInfo);
                            console.log(`Indexes of setArray to be removed are ${removeArray}`);

                            removeArray.sort(function(a,b){ return b - a; });
                            
                            removeArray.forEach(removeIndex => {
                                        setArray.splice(removeIndex, 1);
                            });

                                    removeArray = [];
                            });

                            setInfo.forEach(set => {
                                setMarkup = setMarkup + `<p>${set.timesOccuring} set x ${set.reps} reps</p>`
                            });

                            setMarkup = setMarkup + `</div>`

                            markup = markup + exerciseMarkup + setMarkup;
        
                        }

                        if (exercise.exerciseType == "cardio") {
                            setArray.forEach((set, index) => {
                            
                            let timesOccuring = 1;

                            setInfo[index] = {
                                "timesOccuring": timesOccuring,
                                "distance": set.distance,
                                "hours": set.hours,
                                "minutes": set.minutes,
                                "seconds": set.seconds
                            }

                            for (let i=index+1; i < setArray.length; i++)
                            {
                                //If there is a match within the set array where reps and weight are the same
                                if (set.distance == setArray[i].distance && set.hours == setArray[i].hours && set.minutes == setArray[i].minutes && set.seconds == setArray[i].seconds)
                                {
                                    timesOccuring++;
                                    setInfo[index] = {
                                        "timesOccuring": timesOccuring,
                                        "distance": set.distance,
                                        "hours": set.hours,
                                        "minutes": set.minutes,
                                        "seconds": set.seconds
                                    }
                                    removeArray.push(i); 
                                }
                            }

                            console.log(setInfo);
                            console.log(`Indexes of setArray to be removed are ${removeArray}`);

                            removeArray.sort(function(a,b){ return b - a; });
                            
                            removeArray.forEach(removeIndex => {
                                        setArray.splice(removeIndex, 1);
                            });

                                    removeArray = [];
                            });

                            setInfo.forEach(set => {
                                setMarkup = setMarkup + `<p>${set.timesOccuring} set for ${set.distance}km in ${set.hours}:${set.minutes}:${set.seconds} time</p>`
                            });

                            setMarkup = setMarkup + `</div>`

                            markup = markup + exerciseMarkup + setMarkup;
        
                        }
                            // if (exercise.exerciseType == "bodyweight") {
                            //     let setMarkup = `<p>1 set x ${set.reps} reps</p>
                            //     </div>`
    
                            //     markup = markup + exerciseMarkup + setMarkup;
                            // }
    
                            // if (exercise.exerciseType == "cardio") {
                            //     let setMarkup = `<p>1 set for ${set.distance}km distance in ${set.hours}:${set.minutes}:${set.seconds} time</p>
                            //     </div>`
    
                            //     markup = markup + exerciseMarkup + setMarkup;
                            // }
                    });
                    
                    markup = markup + `<a href=# class="btn btn--green card__btn card__btn--workout btn-edit-workout"> Edit Workout </a>
                    </div>`;
    
                    document.getElementById('workout-container').insertAdjacentHTML('beforeend', markup);
        });
    
        
    };

export const noWorkoutsNotice = () => {
    
    let allWorkouts = localStorage.getItem('allWorkouts');
    allWorkouts = JSON.parse(allWorkouts);

    console.log('its working');
    if (allWorkouts.length < 1) {
        console.log(`all workouts is empty`)
        let markup = `<div class="notice__body">
                        <p class="notice__text">You don't have any workouts added!</p>
                        <a href="/WorkOutLog/addWorkout1.html.php" class="notice__link"><button class="btn btn--green notice__btn flex-row">Add Workout</button></a>
                    </div>`
        
                    document.querySelector('#notice-container').classList.add('notice');
                    document.querySelector('.notice').insertAdjacentHTML('beforeend', markup);
    }
};

export const setUnit = () => {


    let toggleVal = document.getElementById('togBtn').checked;

    if (toggleVal) {
        toggleVal = 'kg';
    }
    else {
        toggleVal = 'lbs';
    }

    console.log(toggleVal);

    let workout = JSON.parse(localStorage.getItem('workout'));

    workout.unit = toggleVal;

    console.log(workout);

    localStorage.setItem('workout',JSON.stringify(workout));

    location.reload();
}

export const setToggleValue = () => {

    let workout = JSON.parse(localStorage.getItem('workout'));

    let toggleVal = workout.unit;
    console.log(toggleVal);

    if (toggleVal == 'kg') {
        console.log(`toggle Val is kg`)
        toggleVal = true;
    }
    else {
        console.log(`toggle Val is lbs`)
        toggleVal = false;
    }
    
    document.getElementById('togBtn').checked = toggleVal;
}

export const setWorkoutTitle = () => {
    let workout = JSON.parse(localStorage.getItem('workout'));

    let workoutTitle = document.getElementById('workout-title-input');



    if (workout) {
        workoutTitle.value = workout.title;
    }
}


export const createWorkoutSearchList = () => {
    
    let allWorkouts = JSON.parse(localStorage.getItem('allWorkouts'));
    const searchList = document.getElementById('myUL');

    let markup = ``;

    allWorkouts.forEach(workout => {
        markup = markup + 
        `<li class="search-list__item">${workout.title}</li>`;
    });

    searchList.innerHTML = markup;

    


}

export const workoutSearchListFunctionality = () => {
    const input = document.querySelector('#myInput');
    const listItems = document.querySelectorAll('.search-list__item');

    input.addEventListener('input', filter);

    function filter() {
        let search = input.value.toLowerCase();

        listItems.forEach(function(li) {
            let text = li.innerHTML.toLowerCase();
            let found = text.indexOf(search);
            if (search == '' || found != -1) {
                li.style.display = 'block';
            }else {
            li.style.display = 'none';
            }
        });
    }

    //Allow list multiple list items to be selected by adding "selected" class which gives them a background color
    //to show they are selected. They can then be identified as selected by this same class
    listItems.forEach(item => {

        item.addEventListener('click', () => {
            listItems.forEach(item => {
                item.classList.remove('search-list__item--selected');
            });
            
            item.classList.toggle("search-list__item--selected");
        });
    });

}
