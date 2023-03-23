salario = parseFloat(prompt("Digite o seu salário "));
vendas = parseFloat(prompt("Digite o valor das vendas"));

comissao1 = (vendas * 3) / 100;
comissao2 = (vendas * 5) / 100;

if (vendas > 1500) {
  total = salario + comissao2+comissao1;
  console.log("salario total R$" + total);
} else {
  total = salario + comissao1;
  console.log("suas vendas R$" + total);
}
