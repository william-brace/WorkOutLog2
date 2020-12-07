const tabs = document.querySelectorAll('[data-tab-target');
const tabContents = document.querySelectorAll('[data-tab-content]');

  tabs.forEach(tab => {
    tab.addEventListener('click', () => {
      

      const target = document.querySelector(tab.dataset.tabTarget);
      tabContents.forEach(content => {
        //clear active classes before adding new ones
        content.classList.remove('active');
        if("lastActive" in localStorage){
          let selectedTab = (`tabs-${localStorage.getItem('lastActive')}`);
          document.getElementById(selectedTab).classList.remove('active');
        }
      });

      //only need to do form active here because focus class in css takes care of tab changing colour
      target.classList.add('active');
      localStorage.setItem('lastActive', target.id);
    });
  });



//Ensures that last selected form tab, whether sign-up or signin, is still selected on page refresh
window.addEventListener('load', (event) => {

  //In the case that the person has used this app before, and thus has a tab selected stored in their local storage
  if("lastActive" in localStorage){
    document.getElementById(localStorage.getItem('lastActive')).classList.add('active');

  //get selected tab based on which form is selected since form id is a part of tab id
  let selectedTab = (`tabs-${localStorage.getItem('lastActive')}`);
  //add active class to tab, make it turn green
  document.getElementById(selectedTab).classList.add('active');
 }
 else { //if their cache does not have a value stored for the lastActive tab, by default set it to sign-up
  //Set sign up form to be default displayed 
  document.getElementById('sign-up').classList.add('active')
   let selectedTab = (`tabs-sign-up`);;

   //Make sure the sign up tab is displayed green as active
   document.getElementById(selectedTab).classList.add('active');

  //Add sign up tab as lastActive By default
   localStorage.setItem('lastActive', 'sign-up');
 }
});

