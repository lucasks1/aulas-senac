salariofixo = parseFloat(prompt("Salario fixo do vendedor"))
valordevendas = parseFloat(prompt("QUal foi total das vendas"))
carrosvendidos = parseInt(prompt("Números de carros vendidos"))
comissao = (salariofixo*10/100)
resultado = comissao * carrosvendidos
salariofinal = salariofixo + ((valordevendas*5)/100)
console.log("o salario final é: " + salariofinal )



