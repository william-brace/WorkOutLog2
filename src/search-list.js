

const input = document.querySelector('#myInput');
const listItems = document.querySelectorAll('.search-list__item');
const addExercisesBtn = document.querySelector('#btn-add-exercises');




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
        item.classList.toggle("search-list__item--selected");
    });
});


addExercisesBtn.addEventListener('click', () => {


    
});




function addExercises(searchItems) {
    
    
}
