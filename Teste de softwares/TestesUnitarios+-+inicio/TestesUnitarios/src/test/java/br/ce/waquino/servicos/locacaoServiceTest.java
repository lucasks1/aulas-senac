package br.ce.waquino.servicos;

import static br.ce.wcaquino.utils.DataUtils.isMesmaData;
import static org.hamcrest.CoreMatchers.equalTo;
import static org.hamcrest.CoreMatchers.is;
import java.util.Date;

import org.junit.Assert;
import org.junit.Rule;
import org.junit.Test;
import org.junit.rules.ErrorCollector;
import org.junit.rules.ExpectedException;

import br.ce.wcaquino.entidades.Filme;
import br.ce.wcaquino.entidades.Locacao;
import br.ce.wcaquino.entidades.Usuario;
import br.ce.wcaquino.servicos.LocacaoService;
import br.ce.wcaquino.utils.DataUtils;

public class locacaoServiceTest {

	@Rule
	public ErrorCollector error = new ErrorCollector();
	
	
	@Rule
	public ExpectedException exception = ExcepectedException.none();

	@Test
	public void testes() throws Exception {

		LocacaoService service = new LocacaoService();
		Usuario usuario = new Usuario("Usuario 1");
		Filme filme = new Filme("Filme 1", 1, 5.0);

		try {
			Locacao locacao = service.alugarFilme(usuario, filme);

			error.checkThat(locacao.getValor(), (equalTo(5.0)));
			error.checkThat(isMesmaData(locacao.getDataLocacao(), new Date()), is(true));// verificando se é uma data
			error.checkThat(isMesmaData(locacao.getDataRetorno(), DataUtils.obterDataComDiferencaDias(1)), is(true));// verificando
																														// se
																														// é
																														// uma
																														// data
			
		}catch(Exception e) {
			e.printStackTrace();
		}
	}


	@SuppressWarnings("deprecation")
	@Test(expected = Exception.class) //elegance
	
	public void testLocacao_filmeSemestoque() throws Exception {

		//cenario
		LocacaoService service = new LocacaoService();
		Filme filme = new Filme("Filme 2", 1, 4.0);

		//ação

		try {
			service.alugarFilme(null, filme);
			Assert.fail();
			
		}catch(Exception e) {
			Assert.assertThat(e.getMessage(), is("Usuario vazio"));
		}
	}

/*
	@SuppressWarnings("deprecation")

	@Test
	
	public void testeLocacao_filmeSemEstoque_2() {

		LocacaoService service = new LocacaoService();
		Usuario usuario = new Usuario("Usuario 1");
		Filme filme = new Filme("Filme 1", 0, 5.0);

		try {
			service.alugarFilme(usuario, filme);
			Assert.fail("Deveria ter lançado uma exeção");

		} catch (Exception e) {
			assertThat(e.getMessage(), is("Filme sem Estoque"));
		}

	}

	@Test
	public void testLocacao_filmeSemestoque_3() throws Exception {

		LocacaoService service = new LocacaoService();
		Usuario usuario = new Usuario("Usuario 1");
		Filme filme = new Filme("Filme 1", 0, 5.0);

		
		exception.expect(Exception.class);
		exception.expectMessage("Filme sem estoque");
		
		service.alugarFilme(usuario, filme);
	}   */
}
	