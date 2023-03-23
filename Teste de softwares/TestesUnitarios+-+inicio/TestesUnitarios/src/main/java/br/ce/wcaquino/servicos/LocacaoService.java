package br.ce.wcaquino.servicos;

import static br.ce.wcaquino.utils.DataUtils.adicionarDias;

import java.util.Date;

import org.junit.Assert;
import org.junit.Test;

import br.ce.wcaquino.entidades.Filme;
import br.ce.wcaquino.entidades.Locacao;
import br.ce.wcaquino.entidades.Usuario;
import br.ce.wcaquino.utils.DataUtils;

public class LocacaoService {

	public Locacao alugarFilme(Usuario usuario, Filme filme) throws Exception {
		if(filme.getEstoque()==0) {
			throw new Exception("Filme sem Estoque");
		}
		
		Locacao locacao = new Locacao();
		locacao.setFilme(filme);
		locacao.setUsuario(usuario);
		locacao.setDataLocacao(new Date());
		locacao.setValor(filme.getPrecoLocacao());

		// Entrega no dia seguinte
		Date dataEntrega = new Date();
		dataEntrega = adicionarDias(dataEntrega, 1);
		locacao.setDataRetorno(dataEntrega);

		// Salvando a locacao...
		// TODO adicionar método para salvar

		return locacao;
	}

	@Test
	public void testes() throws Exception {

		LocacaoService service = new LocacaoService();
		Usuario usuario = new Usuario("user 1");

		Filme filme = new Filme("O Profissional", 3, 3.0);
		Locacao locacao = service.alugarFilme(usuario, filme);

		Assert.assertTrue(locacao.getValor() >= 4.0);// vendo se o valor é maior ou igual a 5
		Assert.assertTrue(DataUtils.isMesmaData(locacao.getDataLocacao(), new Date()));// verificando se é uma data
		Assert.assertTrue(DataUtils.isMesmaData(locacao.getDataRetorno(), DataUtils.obterDataComDiferencaDias(1)));



	}
}// verificando se é uma data