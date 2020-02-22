// bolean
let isCool: boolean = true;

// number
let age: number = 56;

// string
let eyeColor: string = 'brown';
let favouriteQuote: string = `I'm not old, i'm only ${age}`;

// Array
let pets: string[] = ['cat', 'dog', 'pig'];
let pets2: Array<string> = ['lion', 'dragon', 'lizard'];

// Object
let wizard: object = {
    a: 'John',
}

// null and undefined
let meh: undefined = undefined;
let noo: null = null;

// Tuple
let basket: [string, number];
basket = ['basketball', 5];

// Enum
enum Size { Small = 1, Medium = 2, Large = 3 }
let sizeName: string = Size[2];

// Any - !!!!!!!!!!!!!!!! BE CAREFUL
let whatever: any = 'aghhhhhh noooooooo!';

// void - does not return anything
let single = (): void => {
    console.log('lalala');
}

// never
let error = (): never => {
    throw Error('oops');
}

// interface
interface RobotArmy {
    count: number,
    type: string,
    // ? mean nullable
    magic?: string
}

let fightRobotArmy = (robots: RobotArmy) => {
    console.log('FIGHT!');
}
// equivalent to
let fightRobotArmy2 = (robots: { count: number, type: string, magic: string }) => {
    console.log('FIGHT!');
}

// Type Assertions
interface AnimalArmy {
    count: number,
    type: string,
    magic: string
}

let dog = {} as AnimalArmy;
dog.count;

// Function
let fightRobotArmy3 = (robots: RobotArmy): void => {
    console.log('FIGHT!');
}

let fightRobotArmy4 = (robots: { count: number, type: string, magic: string }): number => {
    return 5;
}

// Classes
class Animal {
    sing: string = 'lalalalala';
    constructor(sound: string) {
        this.sing = sound;
    }

    greet(): string {
        return `Hello ${this.sing}`
    }
}

let lion = new Animal('RAWWW');

// Union - can be either one
let confused: string | number = 'hello';
let confused2: string | number = 5;

let x = 4;