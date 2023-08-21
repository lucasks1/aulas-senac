import prompt from "prompt-sync";


let teclado = prompt();


let teste: boolean = true;

function menu() {
    console.log('1- Calculadora');
    console.log('2- Adivinhe o numero');
    console.log('3- impar ou par');
    console.log('4- Contagem regressiva');
    console.log('5- sair');

}

while (teste) {
    menu();

    let option = +teclado('Escolha uma opção: ');

    switch (option) {
        case 1:
            //Calculadora
            let num1: number = +teclado('Insira o primeiro numero:');
            let op: string = teclado('Operador Logico: ');
            let num2: number = +teclado('Insira o segundo numero:');

            if (op == '+') {
                console.log(num1 + num2);
            } else

                if (op == '-') {
                    console.log(num1 - num2);

                } else
                    if (op == '/') {
                        console.log(num1 / num2);
                    }
            break;

        case 2:

            //random

            const sorteado: number = Math.floor(Math.random() * 11);

            let teste: boolean = true;
            let contador: number = 0;

            while (teste) {
                contador + 1;

                let num: number = +teclado('Insira um numero: ');

                if (num != sorteado) {
                    console.log('voce errou!!!');

                    /*
                    Mostra as opções 

                    
                    console.log('sorteado' + sorteado);
                    console.log('Inserido' + num);
                    console.log('Temtativas' + contador);

                     */


                } else {
                    console.log('parabens voce acertiou: ');
                    console.log('sorteado' + sorteado);
                    console.log('Inserido' + num);
                    console.log('Temtativas' + contador);

                    teste = false;
                }
            }

            break;

        case 3:
            //impar ou par 

            let numero: number = +teclado('Insira um numero:');

            if (numero % 2 == 0) {
                console.log(numero + 'e par');
            } else {
                console.log(numero + 'e impar');
            }


            break;

        case 4:
            //regressiva
            let num: number = +teclado('insira um numero: ')
            while (num >= 0) {
                console.log(num);
                num--;

            }

            break;

        case 5:
            console.log("encontramos o sistema!!!");
            teste = false;
            break;
    }
}




