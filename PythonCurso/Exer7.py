#Exercício 7 - Ler temperatura em graus Fahrenheit e converter para Celsius
print('Digite a temperatura em graus Fahrenheit:')
fahrenheit = float(input())
celsius = round((5.0*(fahrenheit-32.0)/9.0),1)
#o resultado será exibido com a limitação de 1 casa decimal
print(f'Neste momento {celsius} graus Celsius')