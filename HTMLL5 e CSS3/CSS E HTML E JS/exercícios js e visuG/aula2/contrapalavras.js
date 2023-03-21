function contrapalavras(text){
existe_separador
palavras = 0

 for (c of text){
    if(separador(c)){
        existe_separador = true
         continue

    }
 }

if (existe_separador){
    palavras++
    existe_separador = false
}
 return palavras

}

function separador(c){
    separadores = [" ", "\t" , "\n" , "\r", "," , ""}







