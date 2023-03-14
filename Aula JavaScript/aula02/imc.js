function iMc (p,a) { 
    
    resultado = p / (a*a)
    if (resultado<18.5 ) {
        console.log("Abaixo do peso")
        console.log("IMC: " + resultado)
    }
     else if (resultado<25.0 && resultado >18.5 ) {
        console.log("Peso ideal")
        console.log("IMC: " + resultado)
    }
    else if (resultado<30.0 && resultado >18.6 ) {
       console.log("Levimente acima do peso")
        console.log("IMC: " + resultado)
    }
    else if (resultado<35.0 && resultado >25.0 ) {
       console.log("Obesidade grua 1")
        console.log("IMC: " + resultado)
    }
    else if (resultado<40.0 && resultado >30.0 ) {
       console.log("Obesidade grua 2(severa)")
        console.log("IMC: " + resultado)
    }
    else {}
       console.log("Obesidade 3 (mórbida)")
        console.log("IMC: " + resultado)
       
        
    


}

gabriel = iMc(299.9, 1.10)

console.log(gabriel)