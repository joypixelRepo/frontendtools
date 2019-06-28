<!DOCTYPE html>
<html>
<head>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <style>
  
  </style>
  
  
</head>
<body>
  
  <script>
    // console.log()
console.log("Hola, hoy es: ", Date(Date.now()));

// console.error()
function NotFound() {
	console.error("Error: Página no encontrada",  404);
}
NotFound();

// console.warn()
console.warn("Solo falta 1 hora para finalizar el partido");

// console.dir()
console.dir(document.head);

// console.group() - console.groupEnd()
class User {
	constructor(firstName, lastName, email)  {
		this.firstName  =  firstName;
		this.lastName   =  lastName;
		this.email      =  email;
	}

	print() {
		console.group("User");
		console.log("firstName: ",  this.firstName);
		console.log("lastName:  ",  this.lastName);
		console.log("email:     ",  this.email);
		console.groupEnd();
	}
}

const user1 = new User("Alejandro", "Rodriguez", "aj@ed.team");
user1.print();

const users = [
new User("Alejandro", "Rodriguez", "aj@ed.team"),
new User("Alexys", "Lozada", "alexys@ed.team")
];

users.printAll = function() {
	console.group("EDteam Users");
	for(let i = 0; i < this.length; i++) {
		this[i].print();
	}
	console.groupEnd();
};

users.printAll();

// console.groupCollapsed()
console.groupCollapsed("click aquí para expandir");
console.log("ahora me puedes ver");
console.groupEnd();

// console.table()
const users2  = [
new User("Alejandro", "Rodriguez", "aj@ed.team"),
new User("Alexys", "Lozada", "alexys@ed.team")
];

console.table(users2);

// console.assert()
console.assert(10 < 5, "10 no es menor que 5");

// console.count(label)
function  hello(name)  {
	console.count("Hola "  +  name);
}

hello("Alejandro");
hello("Alejandro");
hello("Alejandro");
hello("Comunidad EDteam");
hello("Alejandro");
hello("Comunidad EDteam");
  </script>
</body>
</html>