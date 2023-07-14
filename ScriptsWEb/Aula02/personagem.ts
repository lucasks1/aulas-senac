import prompt from "prompt-sync";

class Personagem {
    nome: string;
    atk: number;
    vida: number;
    def: number;

    constructor(nome: string, atk: number, vida: number, def: number) {

        this.nome = nome;
        this.atk = atk;
        this.vida = vida;
        this.def = def;


    }
}



let heroi: Personagem;

let teclado = prompt();

function menu() {

    console.log('============MENU==============');
    console.log('= 1- insira um heroi ou alterar heroi =');
    console.log('= 2- atualizar informações de atk =');
    console.log('= 3- atualizar informações de def =');
    console.log('= 4- atualizar unformações de vida =');
    console.log('= 5-resetar heroi =');
    console.log('= 6- visializar heroi =');
    console.log('= 9 sair =');
    console.log('==============================');



}

function addHero() {
    let nomeHero: string = teclado('insira o nome do heroi: ');
    let atkHero: number = +teclado('insira o atk do heroi: ');
    let defHero: number = +teclado('insira a def do heroi: ');
    let vidaHero: number = +teclado('insira a vida do heroi: ');

    heroi = new Personagem(nomeHero, atkHero, defHero, vidaHero);

    console.log('Heroi registrado!!');

}

function viiewHero() {

    if (heroi) {


        console.log('==========================');
        console.log('Nome: ' + heroi.nome);
        console.log('Ataque: ' + heroi.atk);
        console.log('Defesa: ' + heroi.def);
        console.log('Vida: ' + heroi.vida);
        console.log('==========================');

    } else {
        console.log('Nenhum Heroi existente!!!');
    }
}




function updateAtk() {
    if (heroi) {
        let newAtk: number = +teclado('insira o novo ataque: ');
        heroi.atk = newAtk;
        console.log("Ataque atualisado");

    } else {
        console.log("Nenhum heroi existente");
    }
}


function updatedef() {
    if (heroi) {
        let newDef: number = +teclado('Insira o numero da sua defesa');
        heroi.def = newDef;
        console.log("Defesa Atualisada");
    } else {
        console.log("Defesa não encontrada");
    }
}

function updaVida() {
    if (heroi) {
        let newVida: number = +teclado('insira a sua vida: ');
        heroi.vida = newVida;
        console.log("Vida Atualisada");

    } else {
        console.log("Vida nãio atualisada");
    }
}

function resetAll() {
    if (heroi) {
        heroi.atk = 0;
        heroi.def = 0;
        heroi.vida = 0;

        console.log("Heroi Resetado!!!");
    }
}


let teste: boolean = true;

while (teste) {

    menu();
    let option: number = +teclado('Escolha uma opção: ');

    switch (option) {


        case 1:
            addHero();
            break;

        case 2:
            updateAtk();

            break;

        case 3:
            updatedef();
            break;
        case 4:
            updaVida();
            break;

        case 5:
            resetAll();
            break;

        case 6:
            viiewHero();
            break;

        case 9:
            console.log('Finalizando tarefa');
            teste = false;
            break;
    }
}