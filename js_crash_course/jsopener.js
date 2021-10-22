//var, let, const(let can reassign value but const does not)
//String, Numbers, Boolean, null undefined

// const name = 'John';
// const age = 30;
// const rating = 4.5;
// const isCool = true;
// const x = null;
// const y = undefined;
// let z;

//console.log(typeof z);

//Concatenation
//console.log('My name is ' +name + ' and I am ' + age);
//Template String
//console.log(`My name is ${name} and I am ${age}`);
//const hello = `My name is ${name} and I am ${age}`;
//console.log(hello);

//const s ='technology, computers, it, code';

//console.log(s.length);
// console.log(s.toUpperCase());
// console.log(s.toLowerCase());
// console.log(s.substring(0, 7).toUpperCase());
//console.log(s.split(''));
//console.log(s.split(', '));

// Arrays - variables that hold multiple values

//const numbers = new Array(1,2,3,4,5);
//const fruits = ['apples', 'oranges', 'pears'];

//fruits[3] = 'grapes';

//Insert the last array
//fruits.push('mangos');

//Insert the first array
//fruits.unshift('avocado');

//Take the last off
//fruits.pop();

//console.log(Array.isArray(fruits));

//console.log(fruits.indexOf('oranges'));

//console.log(fruits);

// const person = {
//     firstName: 'John',
//     lastName: 'Doe',
//     age: 30,
//     hobbies: ['music', 'movies', 'sports'],
//     address: {
//         street: '50 main st',
//         city: 'Boston',
//         state: 'MA'
//     }
// }

// console.log(person.firstName, person.hobbies[1]);

// const { firstName, lastName, address: {city}} = person;

// console.log(city);

// can add variable later
// person.email = 'john@gmail.com';


// console.log(person);

//settings

// const todos = [
//     {
//         id: 1,
//         text: 'Take out trash',
//         isCompleted: true
//     },
//     {
//         id: 2,
//         text: 'Meeting with boss',
//         isCompleted: true
//     },
//     {
//         id: 3,
//         text: 'Dentist appt',
//         isCompleted: false
//     }
// ];

//console.log(todos[0].id);

//similar with JSON way. search JSON converter. 
//difference is lkie "id" "Take out trash"

//JSON
// const todoJSON = JSON.stringify(todos);
// console.log(todoJSON);

//result for JSON
// [{"id":1,"text":"Take out trash","isCompleted":true},{"id":2,"text":"Meeting with boss","isCompleted":true},{"id":3,"text":"Dentist appt","isCompleted":false}]

//For loop
// for(let i = 0; i < 10; i++) {
// console.log(`For loop Number: ${i}`);
// }

// for(let i = 0; i < todos.length; i++) {
//     console.log(todos[i].text);
//     }
    

//While
// let i = 0;
// while(i<10){
//     console.log(`While loop Number: ${i}`);
//     i++;
// }

//change variable name
// for(let todo of todos){
//     console.log(todo.text);
// }

//forEach, map, filter
// todos.forEach(function(todo){
//     console.log(todo.text);
// });

//map
// const todoText = todos.map(function(todo){
//     return todo.text;
// });
// console.log(todoText);

//filter
// const todoCompleted = todos.filter(function(todo){
//    return todo.isCompleted === true;
// });
// console.log(todoCompleted);

//+map
// const todoCompleted = todos.filter(function(todo){
//     return todo.isCompleted === true;
//  }).map(function(todo){
//      return todo.text;
//  });
//  console.log(todoCompleted);

//*conditionals
// difference between == and === is that === includes datatype as well.

// const x = '10';

// if(x===10){
//     console.log('x is 10');
// }

//result 
//none as this is not true
//=== is recommended

//  const x = 6;
//  const y = 11;

//  if(x > 5 || y > 10){
//      console.log('x is 10');
//  } else if(x > 10){
//     console.log('x is greater than 10');
//  } else {
//      console.log('x is less than 10')
//  }

//////////////////////////////////////////////////////////

// const x = 6;
// const y = 11;
// if(x > 5 && y > 10){
//     console.log('x is more than 5 or y is more than 10');
// }

// if(x>5){
//     if(y>10){

//     }
// }

/////////////////////////////////////////////////////
//ternary operator

// const x =9;

// const color = x > 10 ? 'red' : 'blue'; //if represent if, : is else

// console.log(color);

// const color = 'green';

// switch(color){
//     case 'red':
//         console.log('color is red');
//         break;
//         case 'blue':
//             console.log('color is blue');
//             break;
//             default:
//                 console.log('color is NOT red or blue');
//                 break;
// }

/////////////////////////////////////////////////
//functions

// function addNums(num1 = 1, num2 = 1){
// return num1+num2;
// }

// console.log(addNums(5,5)); 
//if i set value here, value will be overwrited. so result is 10.

// the same way

// const addNums = (num1 = 1, num2 = 1) => {
//     return num1+num2;
//     }
    
//     console.log(addNums(5,5)); 

    ////////////////////////

    // const addNums = (num1 = 1, num2 = 1) => num1+num2;
           
    //     console.log(addNums(5,5)); 
        ////////////////////////////

        // const addNums = num1 => num1+5;
           
        // console.log(addNums(5)); 

/////////////////////////////////////////////////////////
//Constructor function

// function Person(firstName, lastName, dob) {
// this.firstName = firstName;
// this.lastName = lastName;
// this.dob = new Date(dob);
// this.getBirthYear = function(){
//     return this.dob.getFullYear();
// }
// this.getFullName = function() {
//     return `${this.firstName} ${this.lastName}`;
// }
//}
//prototype generates one return even though many returns occurs
// Person.prototype.getBirthYear = function() {
//     return this.dob.getFullYear();
// }

// Person.prototype.getFullName = function(){
//     return `${this.firstName} ${this.lastName}`;
// }
//Instantiate object
// const person1 = new Person('John','Doe','4-3-1980');
// const person2 = new Person('Mary','Smith','3-6-1970');

//console.log(person2.dob.getFullYear());
//console.log(person1.getBirthYear());
//console.log(person1.getFullName());
// console.log(person2.getFullName());
// console.log(person1);

///////////////////////////////////////////////////
//ES6 classses
class Person {
    constructor(firstName, lastName, dob){
        this.firstName = firstName;
        this.lastName = lastName;
        this.dob = new Date(dob);
    }

    getBirthYear(){
        return this.dob.getFullYear();
    }

    getFullName(){
        return `${this.firstName} ${this.lastName}`;
    }
}
//Instantiate object
const person1 = new Person('John','Doe','4-3-1980');
 const person2 = new Person('Mary','Smith','3-6-1970');

 console.log(person2.getFullName());
console.log(person1);

