#Exercício 10 - Transformar km/h em metros/s
kmh = float(input('Informe a velocidade em Km/h: '))
mts = round((kmh / 3.6),2)

print(f'{kmh} em km/h equivale a {mts} m/s')