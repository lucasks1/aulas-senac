#Exercício 5 - ler um número real e exibir sua quinta parte
print('Digite um número real:')
num1 = float(input())
quintap = round((num1 / 5),2)
#o resultado será exibido com a limitação de 2 casas decimais
print(f'A quinta parte de {num1} é: {quintap}')
