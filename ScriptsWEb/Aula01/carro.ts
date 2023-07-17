import prompt from "prompt-sync";

class Carro {

    nome: string;
    marca: string;
    ano: number;

    constructor(nome: string, marca: string, ano: number) {
        this.nome = nome;
        this.marca = marca;
        this.ano = ano;
    }

}

let teclado = prompt();


let car: Carro;

let nomeCar: string = teclado('Insira o nome do carro: ');
let marcaCar: string = teclado('Insira a marca do carro:');
let anoCar: number = +teclado('Insira o ano do carro:');

//ao declarar que o carro e um number bote " + " (+teclado) assim eleentende que vai receber numero




car = new Carro(nomeCar, marcaCar, anoCar);

//car.nome = "Fusca Azul";
//car.marca = "Volkswagen";
//car.ano = 1986;

console.log("Carro: ", car);




/*
let carrao : Carro;

carrao = new Carro;

//carrao.nome = "Alvio Custuzio";
//carrao.marca = "Ferrari";
//carrao.ano = 1810;

console.log("Carro: ",carrao);
*/
