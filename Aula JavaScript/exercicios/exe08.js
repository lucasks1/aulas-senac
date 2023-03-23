var eleitores = parseInt(prompt("numero de eleitores"))
var nulos = parseInt(prompt("votos nulos"))
var brancos = parseInt(prompt("quantidade de votos brancos"))

votosb = (brancos*100)/eleitores
console.log("Votos brancos" + votosb)

nulos1 = (nulos*100)/eleitores
console.log("Votos nulos" + nulos1)

eleitorest = eleitores - (nulos + brancos)
console.log("Total de votos no municipio" + eleitores)
























