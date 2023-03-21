#Exercício 6 - Ler temperatura em graus Celsius e converter para Fahrenheit
print('Digite a temperatura em graus Celsius:')
celsius = float(input())
fahrenheit = round((celsius*(9.0/5.0)+32.0),1)
#o resultado será exibido com a limitação de 2 casas decimais
print(f'Neste momento {fahrenheit} graus Fahrenheit')
