package br.ce.waquino.servicos;

import static br.ce.wcaquino.utils.DataUtils.isMesmaData;
import static org.hamcrest.CoreMatchers.equalTo;
import static org.hamcrest.CoreMatchers.is;
import static org.junit.Assert.assertThat;
import static org.junit.Assert.fail;

import java.util.Date;

import org.junit.Assert;
import org.junit.Rule;
import org.junit.Test;
import org.junit.rules.ErrorCollector;

import br.ce.wcaquino.entidades.Filme;
import br.ce.wcaquino.entidades.Locacao;
import br.ce.wcaquino.entidades.Usuario;
import br.ce.wcaquino.servicos.LocacaoService;
import br.ce.wcaquino.utils.DataUtils;

public class locacaoServiceTest {
	
	@Rule
	public ErrorCollector error = new ErrorCollector();
	@SuppressWarnings({})
	@Test
	public void testes() throws Exception {
	
		LocacaoService service = new LocacaoService();
		Usuario usuario = new Usuario("Usuario 1");
		Filme filme = new Filme("Filme 1",2,5.0);
		
		
		Locacao locacao = service.alugarFilme(usuario, filme);
		
			
			error.checkThat(locacao.getValor(), (equalTo(5.0)));
			error.checkThat(isMesmaData(locacao.getDataLocacao(), new Date()), is(true));// verificando se é uma data
			error.checkThat(isMesmaData( locacao.getDataRetorno(), DataUtils.obterDataComDiferencaDias(1)), 
					is(true));// verificando se é uma data

		
	}
	@Test(expected=Exception.class)
	public void testLocacao_filmeSemestoque() throws Exception{
		
		LocacaoService service = new LocacaoService();
		Usuario usuario = new Usuario("Usuario 1");
		Filme filme = new Filme("Filme 1",0,5.0);
		
		service.alugarFilme(usuario, filme);
		
		
		
	}
	
	@SuppressWarnings("deprecation")
	
	@Test
	public void testeLocacao_filmeSemEstoque_2() {
		
		LocacaoService service = new LocacaoService();
		Usuario usuario = new Usuario("Usuario 1");
		Filme filme = new Filme("Filme 1",0,5.0);
	 
		try {
			service.alugarFilme(usuario, filme);
			Assert.fail("Deveria ter lançado uma exeção");
			
		}catch(Exception e) {
			assertThat(e.getMessage(), is("Filme sem Estoque"));
		}
		
	}
	
	@Test
	public void testeLocacao_filmeSemEstoque_3() throws Exception {
		
		LocacaoService service = new LocacaoService();
		Usuario usuario = new Usuario("Usuario 1");
		Filme filme = new Filme("Filme 1",0,5.0);
	 
		service.alugarFilme(usuario, filme);
	}
}




