#Exercício 4 - Ler um número real e imprimir o quadrado deste número
print('Digite um número real:')
num1 = float(input())
quadrado = round((num1 * num1),2)
#o resultado será exibido com a limitação de 2 casas decimais
print ('O quadrado de ', num1, 'é: ', quadrado)