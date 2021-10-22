// Single element (single selector)
// console.log(document.getElementById('my-form'));
// console.log(document.querySelector('h1'));


//Multiple element
// console.log(document.querySelectorAll('.item'));
 //console.log(document.getElementsByClassName('item'));
//console.log(document.getElementsByTagName('li'));
//Normally used querySelector, querySelectorAll and sometimes getElementById

// const items = document.querySelectorAll('.item');

// items.forEach((item) => console.log(item));

////////////////////////////////

//const ul = document.querySelector('.items');

//ul.remove();
//ul.lastElementChild.remove();
// ul.firstElementChild.textContent = 'Hello';
// ul.children[1].innerHTML = 'Brad';
// ul.lastElementChild.innerHTML = '<h1>Hello</h1>';

// const btn = document.querySelector('.btn');
// btn.style.background = 'red';

////////////////////////////////////////////
//Event
// const btn = document.querySelector('.btn');

// btn.addEventListener('mouseout', (e) => {
//     e.preventDefault();
//     //console.log(e.target.className); //btn
//     document.querySelector('#my-form').style.background = '#ccc';
//     document.querySelector('body').classList.add('bg-dark');
//     document.querySelector('.items').lastElementChild.innerHTML = '<h1>Hello</h1>'
// });

/////////////////////////////////////////
const myform = document.querySelector('#my-form');
const nameInput = document.querySelector('#name');
const emailInput = document.querySelector('#email');
const msg = document.querySelector('.msg');
const userList = document.querySelector('#users');

myform.addEventListener('submit', onsubmit);

function onsubmit(e) {
    e.preventDefault();

    //console.log(nameInput.value);
    if(nameInput.value === '' || emailInput.value === '') {
        //alert('Please enter fields');
        msg.classList.add('error'); //background color for error
        msg.innerHTML = 'Please enter all fields'; //display msg from inside of box

        setTimeout(() => msg.remove(), 3000); //set time for error msg
    } else {
        //console.log('success');
        const li = document.createElement('li');
        li.appendChild(document.createTextNode(`${nameInput.value} : ${emailInput.value}`));

        userList.appendChild(li);

        //Clear fields
        nameInput.value = '';
        emailInput.value = '';
    }
}