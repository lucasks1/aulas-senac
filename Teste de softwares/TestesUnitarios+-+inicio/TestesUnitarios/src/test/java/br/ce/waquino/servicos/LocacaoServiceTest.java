package br.ce.waquino.servicos;

import static br.ce.wcaquino.utils.DataUtils.isMesmaData;
import static org.hamcrest.CoreMatchers.equalTo;
import static org.hamcrest.CoreMatchers.is;
import static org.hamcrest.CoreMatchers.not;
import java.util.Date;

import org.junit.Rule;
import org.junit.Test;
import org.junit.rules.ErrorCollector;

import br.ce.wcaquino.entidades.Filme;
import br.ce.wcaquino.entidades.Locacao;
import br.ce.wcaquino.entidades.Usuario;
import br.ce.wcaquino.servicos.LocacaoService;
import br.ce.wcaquino.utils.DataUtils;

public class LocacaoServiceTest {
	
	@Rule
	public ErrorCollector error = new ErrorCollector();
	@SuppressWarnings({})
	@Test
	public void testes() {
	
		LocacaoService service = new LocacaoService();
		Usuario usuario = new Usuario("user 1");
		Filme filme = new Filme("Filme 1", 2,6.0);
		
		
		try {
			
			Locacao locacao = service.alugarFilme(usuario, filme);

			error.checkThat(locacao.getValor(), (equalTo(6.0)));
			error.checkThat(locacao.getValor(), is(not(5.0)));// vendo se o valor é maior ou igual a 5
			error.checkThat(isMesmaData(locacao.getDataLocacao(), new Date()), is(true));// verificando se é uma data
			error.checkThat(isMesmaData( locacao.getDataRetorno(), DataUtils.obterDataComDiferencaDias(1)), 
					is(true));// verificando se é uma data

			
		}catch (Exception e){
			e.printStackTrace();
			
		}
		
		
		
	}
}
