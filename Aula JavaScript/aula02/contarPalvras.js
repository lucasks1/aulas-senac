function contarPalavras(text) {
    existe_separador = true
    palavras = 0

    for (var c of text) {
        if (separador(c)) {
           existe_separador = true
           continue 
        } 
    }
    
    if (existe_separador) {
        palavras++
        existe_separador = false
    }
    return palavras
}

function separador(c) {
   var separadores = ["","\t","\n","\r",",",";",".","!","?"]
    return separadores.includes(c);  
}
console.log(contarPalavras(""));
console.log(contarPalavras(" "));
console.log(contarPalavras("SQL Server!! "));
console.log(contarPalavras(" React Native PHP ASP"));
console.log(contarPalavras(" O PHP existe a mais de 26 anos "));
console.log(contarPalavras("Vamos estudar brancos de dados relacionais"));