import * as workoutModel from '../models/workoutModel.js';
import * as workoutView from '../views/workoutView.js';


(function(window, document, undefined){

  
    
    window.onload = init;
    
    //code that should be taked care of after page is fully loaded
    function init(){
        

        //TopNav Elements
        const topNavAddWorkout = document.getElementById('topNav__addWorkoutBtn');

        const bottomNavIcons = document.getElementsByClassName('nav__link');
        const bottomNavHome = document.getElementById('bottomnav-home');
        const bottomNavAddWorkout = document.getElementById('bottomnav-addWorkout');
        const bottomNavProfile = document.getElementById('bottomnav-profile');
        const bottomNavProgress = document.getElementById('bottomnav-progress');
        
        //Index page Elements
        const indexPage = document.getElementById('index-page');

        //AddWorkout1 page Elements
        const addWorkout1Page = document.getElementById('addWorkout1-page');
        const createNewWorkout = document.getElementById('create-new-workout');
        const btnAddWorkout = document.getElementById('btn-add-workout');

        //AddWorkout2 page Elements
        const addWorkout2Page = document.getElementById('addWorkout2-page');
        const workoutTitleInput = document.getElementById('workout-title-input');
        const workoutDateInput = document.getElementById('date-input');
        const addExercisesBtn = document.querySelector('#btn-add-exercises');
        const toggle = document.getElementById('togBtn');
        const finishWorkoutBtn = document.querySelector('#finish-workout-btn');
        const cancelWorkoutBtn = document.querySelector('#cancel-workout-btn');
        
        //Profile page Elements
        const profilePage = document.getElementById('profile-page');
        const signOutBtn = document.querySelector('#sign-out-btn');

        //Progress page elements
        const progressPage = document.getElementById('progress-page');

        //If top nav is on page
        if (topNavAddWorkout) {

            topNavAddWorkout.addEventListener('click', () => {
                let workout = JSON.parse(localStorage.getItem('workout'));

                if (workout) {
                    window.location = "addWorkout2.html.php";
                }
                else {
                    window.location = "addWorkout1.html.php";;
                }
            });

        }
        
        if (bottomNavHome) {
            console.log('BOTTOM NAV IS ON PAGE');

            if (bottomNavAddWorkout) {
                console.log("ass workout button is found");
            }

            //If on AddWorkout 1 page
            if (addWorkout1Page || addWorkout2Page) {
                bottomNavAddWorkout.classList.add("nav__link--active");
            }
            else if (profilePage) {
                bottomNavProfile.classList.add("nav__link--active");
            }
            else if (progressPage) {
                bottomNavProgress.classList.add("nav__link--active");
            }
            else if (indexPage) {
                bottomNavHome.classList.add("nav__link--active");
            }

            bottomNavAddWorkout.addEventListener('click', () => {
                console.log('bottom nav is clicked');

                //Remove nav__link--active from all links
                //Add nav__link--active to the link that is clicked

                console.log('hello');

                let workout = JSON.parse(localStorage.getItem('workout'));

                if (workout) {
                    window.location = "addWorkout2.html.php";

                    
                }
                else {
                    window.location = "addWorkout1.html.php";;
                }
            })
        }

        //decided to just add html for bottom nav into each page with class added
        // if (bottomNavIcons) {
        //     if (createNewWorkout) {
        //         bottomNavIcons.forEach(icon => {
        //             icon.classList.remove('nav__link--active');

        //             if icon.classList.contains('addworkout')
        //         })
        //     }
        // }
        
        
        //If on AddWorkout1 Page
        if (createNewWorkout) {
            if (createNewWorkout) {
                console.log(createNewWorkout);
    
                createNewWorkout.addEventListener('click', () => {
    
                    //Creates new blank workout and saves its values to local storage
                    workoutModel.createNewBlankWorkout();
                });
            }

            getWorkouts();
            btnAddWorkout.addEventListener('click', workoutModel.addPreviousWorkout);

            


        }
        //if stat5ement for all buttons on all pages to launch event listeners
        
        
        /*
        Workout process:

        ON page 1:
        When create new workout button is pressed, create new blank workout and save it to local storage and send
        user to page 2.

        On page 2: 
        1.  listen for click on add exercises button on the bottom of exercises search field which will which will 
        add blank exercise cards for the exercises selected above the search menu
         */
        

        

       

        //if on addWorkout2 page
        if (addExercisesBtn) {

            
            
            window.onload = workoutView.createExerciseCards();

            let workout = JSON.parse(localStorage.getItem('workout'));
            workoutDateInput.value = workout.date;

            window.addEventListener('click', e => {

                $('#date-input').dateDropper('getDate',function(date){
                    console.log(`The selected date is ${date.d}-${date.m}-${date.Y}`);
                    
                    let theDate = `${date.d}/${date.m}/${date.Y}`;
                    let workout = JSON.parse(localStorage.getItem('workout'));
                    workout.date = theDate;

                    localStorage.setItem('workout', JSON.stringify(workout));
                });
            });

              $("#date-input").dateDropper({ onchange : function(response){ console.log(response.date.Y) } });

              
            
              

            
            workoutView.setToggleValue();
            toggle.addEventListener('change', workoutView.setUnit);
            

            workoutTitleInput.addEventListener('input', e => {
                workoutModel.updateWorkoutTitle(e.target.value);
            });



            // console.log(workoutDateInput.id);

            // //does not work due to datedropper plugin
            // workoutDateInput.addEventListener('input', e => {
            //     console.log('penis');
            //     workoutModel.updateWorkoutDate(e.target.value);
            // });

            

            let editIcon = document.querySelector('.title-and-input__icon').addEventListener('click', () => {
                document.querySelector('.title-and-input__input--big').focus();
            })

            addExercisesBtn.addEventListener('click', workoutModel.addExercises);
            addExercisesBtn.addEventListener('click', workoutView.createExerciseCards);

            finishWorkoutBtn.addEventListener('click', sendWorkout);

            workoutView.setWorkoutTitle();

            cancelWorkoutBtn.addEventListener('click', () => {

                localStorage.clear();

            })
            

            
            
            document.querySelector('#exercise-container').addEventListener('click', e => {
                const cardInput = document.querySelectorAll('.card__input');
                console.log(e.target.classList);
                
                //If checkmark is clicked
                if (e.target.classList.contains('card__btn--SaveSet'))
                {
                    console.log('checkmark pressed!');
                    workoutModel.submitSet(e.target);
                    workoutView.createExerciseCards(); 

                }

                if (e.target.classList.contains('close-circle-set')) {
                    console.log('close-circle set pressed!');
                    workoutModel.deleteSet(e.target);
                    workoutView.createExerciseCards(); 
                }

                if (e.target.classList.contains('close-circle-exercise')) {
                    console.log('close-circle exercise pressed!');
                    workoutModel.deleteExercise(e.target);
                    workoutView.createExerciseCards(); 
                }

                if (e.target.classList.contains('card__btn--AddSet')) {
                    workoutModel.addSet(e.target);
                    workoutView.createExerciseCards();

                }

            //     if (cardInput) {
            //         cardInput.forEach(input => {
            //             input.addEventListener('input', function(){
            //                 console.log('This is an input!');
            //                 console.log(input.closest('.card__slot').classList);
                        
            //                 console.log('updateSet running!')
                        
            //                 //if the input clicked is from a submiteed set
            //                 if (input.closest('.card__slot').classList.contains('card__slot--submit')) {
                            
            //                     let exerciseId = input.closest('.card').id;
            //                     let workout = JSON.parse(localStorage.getItem('workout'));
            //                     let exercises = workout.exercises;
                        
            //                     const setNum = parseInt(input.closest('.card__slot').querySelector('.card__number').innerText);
                        
            //                     exercises.forEach(exercise => {
            //                         //Match exercise clicked to exercise in localstorage
            //                         if (exercise.exerciseID == exerciseId) {
            //                             let sets = exercise.sets;
                        
            //                             sets.forEach((set, index) => {
            //                                 if (set.set == setNum) {
            //                                     sets[index].submit = false;
            //                                 }
            //                             });
            //                         }
            //                     });
                        
            //                     workout = JSON.stringify(workout);
            //                     localStorage.setItem('workout', workout)   
            //                     workoutView.createExerciseCards();         
                                
                        
                        
                        
            //                 }
            //             });
                    
            //         });
                    
            //     }
                
             });
                // document.querySelector('#exercise-container').addEventListener('input', e => {
   
                //     console.log(e.target.classList);
                //     if (e.target.classList.contains('card__input')) {
                //         workoutModel.updateSet(e.target);
                //         workoutView.createExerciseCards();
    
                //     }
                      
    
                //     });

            
        }

        //If on Profile Page
        if (signOutBtn) {
            //on page load, display all workouts from database
            getWorkouts();
            

            document.querySelector('#workout-container').addEventListener('click', e => {
                
                if (e.target.classList.contains('close-circle-workout')) {
                    console.log('close-circle workout pressed!');
                    deleteWorkout(e.target);
                }

                if (e.target.classList.contains('btn-edit-workout')) {

                    console.log('Edit workout pressed!');

                    workoutModel.editWorkout(e.target)
                }

                 
            
            });


            
        }

  

        
        
        
    }
    
    })(window, document, undefined);

    const getWorkouts = function() {
        console.log('getWorkouts is working');
   
       //call ajax 
       const xhr = new XMLHttpRequest();
       xhr.open('GET', "/WorkOutlog/includes/getWorkouts.php", true);

   
       //send ajax
       xhr.send()
   
       //recieving response from getWorkouts.php
       xhr.onreadystatechange = () => {
           if (xhr.readyState == 4) {
               if (xhr.status == 200) {
                   console.log(`getWorkouts ${xhr.response}`);
                   console.log(`getWorkouts response is a ${typeof(xhr.response)}`)

                //    if (xhr.response)
                //    {
                    let allWorkouts = JSON.parse(xhr.response);
                    //console.log(workouts);
    
                    allWorkouts = JSON.stringify(allWorkouts);
    
                    localStorage.setItem('allWorkouts', allWorkouts);
                 
                    console.log('getWorkouts is complete!');
                //    }
   
                  

                   const createNewWorkout = document.getElementById('create-new-workout');
                   const signOutBtn = document.querySelector('#sign-out-btn');
                    

                   if (signOutBtn) {
                    workoutView.createWorkoutCards();
                    workoutView.noWorkoutsNotice();
                   }

                   if (createNewWorkout) {
                       workoutView.createWorkoutSearchList();
                       workoutView.workoutSearchListFunctionality();
                   }
                        
                   
               }
   
              
   
               if (xhr.status == 400) {
                  console.log('Error!, Resource not found!');
               }
           }
       }
    }

const deleteWorkout = function(cardElement) {

        let workoutID = workoutModel.getCardId(cardElement);
        console.log(workoutID);
    
        let allWorkouts = JSON.parse(localStorage.getItem('allWorkouts'));
    
        console.log(allWorkouts);
    
        allWorkouts.forEach(workout => {
            if (workout.workoutID == workoutID) {
                let clickedWorkout = JSON.stringify(workout);
    
                console.log(clickedWorkout);
    
                const xhr = new XMLHttpRequest();
    
                xhr.open('POST', "/WorkOutlog/includes/deleteWorkout.php");
                xhr.setRequestHeader("Content-Type", "application/json");
                xhr.send(clickedWorkout);
    
                xhr.onreadystatechange = () => {
                    if (xhr.readyState == 4) {
                        if (xhr.status == 200) {
                            getWorkouts();
                        }
            
                        if (xhr.status == 400) {
                           console.log('Error!, Resource not found!');
                        }
                    }
                }
    
            }
        })
     }

const sendWorkout = function() {

        let workout = localStorage.getItem('workout');
    
        console.log(workout);
        const xhr = new XMLHttpRequest();
    
        xhr.open('POST', "/WorkOutlog/includes/finishWorkout.php");
        xhr.setRequestHeader("Content-Type", "application/json");
        xhr.send(workout);
    
        xhr.onreadystatechange = () => {
            if (xhr.readyState == 4) {
                if (xhr.status == 200) {
                    
                    console.log('send workout function completed!!!')
                    localStorage.clear();
                    window.location = "/WorkOutlog/profile.html.php";
                }
    
                if (xhr.status == 400) {
                   console.log('Error!, Resource not found!');
                }
            }
        }
     }
    

   