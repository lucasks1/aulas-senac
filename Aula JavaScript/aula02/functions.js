//Criação básica de função
/*
function nomeFunção(param1, param2, paramn)
{ 
    codigo
}
*/
function multiplicar(a,b) {
    return a*b
}
c1 = multiplicar(5,4)
c2 = multiplicar(3,8)
console.log(c1)
console.log(c2)
console.log("-------------------------")

function coverterFtoC(f) {
    return (5/9) * (f-32)
}
temp = coverterFtoC(10)
texto = "A temperatura é de:" + temp + "Celsius"
texto2 = "A temperatura é de:" + coverterFtoC(10) + "Celsius"
console.log(texto)
console.log(texto2)