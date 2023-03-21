package br.ce.wcaquino.servicos;

import java.util.Date;

import org.junit.Assert;
import org.junit.Test;

import br.ce.wcaquino.entidades.Filme;
import br.ce.wcaquino.entidades.Locacao;
import br.ce.wcaquino.entidades.Usuario;
import br.ce.wcaquino.utils.DataUtils;

public class locacaoServiceTest {

	@Test
	public void testes() {

		LocacaoService service = new LocacaoService();
		Usuario usuario = new Usuario("user 1");

		Filme filme = new Filme("O Profissional", 3, 3.0);
		Locacao locacao = service.alugarFilme(usuario, filme);

		Assert.assertTrue(locacao.getValor() >= 4.0);// vendo se o valor é maior ou igual a 5
		Assert.assertTrue(DataUtils.isMesmaData(locacao.getDataLocacao(), new Date()));// verificando se é uma data
		Assert.assertTrue(DataUtils.isMesmaData(locacao.getDataRetorno(), DataUtils.obterDataComDiferencaDias(1)));
	}
}
