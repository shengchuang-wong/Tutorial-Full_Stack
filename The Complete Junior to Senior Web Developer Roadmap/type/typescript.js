// bolean
var isCool = true;
// number
var age = 56;
// string
var eyeColor = 'brown';
var favouriteQuote = "I'm not old, i'm only " + age;
// Array
var pets = ['cat', 'dog', 'pig'];
var pets2 = ['lion', 'dragon', 'lizard'];
// Object
var wizard = {
    a: 'John'
};
// null and undefined
var meh = undefined;
var noo = null;
// Tuple
var basket;
basket = ['basketball', 5];
// Enum
var Size;
(function (Size) {
    Size[Size["Small"] = 1] = "Small";
    Size[Size["Medium"] = 2] = "Medium";
    Size[Size["Large"] = 3] = "Large";
})(Size || (Size = {}));
var sizeName = Size[2];
// Any - !!!!!!!!!!!!!!!! BE CAREFUL
var whatever = 'aghhhhhh noooooooo!';
// void - does not return anything
var single = function () {
    console.log('lalala');
};
// never
var error = function () {
    throw Error('oops');
};
var fightRobotArmy = function (robots) {
    console.log('FIGHT!');
};
// equivalent to
var fightRobotArmy2 = function (robots) {
    console.log('FIGHT!');
};
var dog = {};
dog.count;
// Function
var fightRobotArmy3 = function (robots) {
    console.log('FIGHT!');
};
var fightRobotArmy4 = function (robots) {
    return 5;
};
// Classes
var Animal = /** @class */ (function () {
    function Animal(sound) {
        this.sing = 'lalalalala';
        this.sing = sound;
    }
    Animal.prototype.greet = function () {
        return "Hello " + this.sing;
    };
    return Animal;
}());
var lion = new Animal('RAWWW');
// Union - can be either one
var confused = 'hello';
var confused2 = 5;
var x = 4;
