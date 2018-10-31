console.log('hello world');

var person = {
	name: ['Maryfaith', 'Mgbede'],
	age: 24,
	gender: 'female',
	interests: ['swimming', 'travelling'],
	bio: function() {
		alert(this.name[0] + ' ' + this.name[1] + ' is ' + this.age +
		' years old. She likes ' + this.interests[0] + ' and ' +
		this.interests[1] + '.');
	},
	greeting: function() {
		alert('Hi! I\'m ' + this.name[0] + '.');
	}
};

console.log(person.age);
console.log(person.gender);
console.log(person.interests[0]);
console.log('My name is '+ person.name[0] +' '+ person.name[1]);
person.bio();
person.greeting();
