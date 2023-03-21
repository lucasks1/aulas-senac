#Exercício 7 - Ler temperatura em graus Kelvin e converter para Celsius
print('Digite a temperatura em graus Fahrenheit:')
kelvin = float(input())
celsius = round((kelvin-273.15),1)
#o resultado será exibido com a limitação de 1 casas decimal
print(f'Neste momento {celsius} graus Celsius')