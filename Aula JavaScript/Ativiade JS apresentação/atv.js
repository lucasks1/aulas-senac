preg1 = prompt(
  "Você quer calcular em qual operação: 1-juros compostos, 2-capital ou 3-Montante?"
);

function juros() {
  var m = parseFloat(prompt("Digite montante da equação:"));
  var c = parseFloat(prompt("Valor da capital inicial:"));
  var j = m - c;
  alert("O valor do juros é " + j);
  preg1 = prompt(
    "Você quer calcular em qual operação: 1-capital ou 2-Montante?"
  );
  if (preg1 == 1) {
    capital();
  } else if (preg1 == 2) {
    montante();
  } else console.log("Digite um número idiota: ");
}

function capital() {
  var m2 = parseFloat(prompt("Digite montante da equação:"));
  var n = parseFloat(prompt("Digite o periodo:"));
  var i = parseFloat(prompt("Digite a taxa:")) / 100;
  var ca = (m2 * (1 + i) ** -n).toFixed(2);
  alert("O valor da capital é " + ca);
  preg1 = prompt(
    "Você quer calcular em qual operação: 1-juros compostos ou 2-Montante?"
  );
  if (preg1 == 1) {
    juros();
  } else if (preg1 == 2) {
    montante();
  } else console.log("Digite um número: ");
}

function montante() {
  var c2 = parseFloat(prompt("Digite capital:"));
  var n2 = parseFloat(prompt("Digite o periodo:"));
  var i2 = parseFloat(prompt("Digite a taxa:")) / 100;

  var mo = (c2 * (1 + i2) ** n2).toFixed(2);
  alert("O valor de montante é " + mo);
  preg1 = prompt(
    "Você quer calcular em qual operação: 1-juros compostos ou 2-capital"
  );
  if (preg1 == 2) {
    juros();
  } else if (preg1 == 2) {
    capital();
  } else {
    console.log("Digite um número idiota: ");
  }
}

if (preg1 == 1) {
  juros();
} else if (preg1 == 2) {
  capital();
} else {
  montante();
}
