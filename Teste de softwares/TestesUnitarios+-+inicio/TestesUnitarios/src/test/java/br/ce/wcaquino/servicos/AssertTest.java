package br.ce.wcaquino.servicos;
import org.junit.Assert;
import org.junit.Test;

import br.ce.wcaquino.entidades.Usuario;

public class AssertTest {

	@Test
	public void test() {
	Assert.assertTrue(true);
	Assert.assertFalse(false);
	
	Assert.assertEquals("Erro de Comparacao",2,2);
	Assert.assertEquals(0.5123, 0.5123, 0.0001);
	Assert.assertEquals(Math.PI, 3.14,0.01);
	
	int i = 5; 
	Integer i2 = 5;
	Assert.assertEquals(Integer.valueOf(i), i2);
	Assert.assertEquals(i,i2.intValue());
	
	Assert.assertEquals("bola","bola");
	Assert.assertNotEquals("bola", "casa");
	Assert.assertTrue("bola".equalsIgnoreCase("bola"));
	Assert.assertTrue("bola".startsWith("bo"));
	
	Usuario u1 = new Usuario("usuario 1");
	Usuario u2 = new Usuario("usuario 1");
	Usuario u3 = null;
	
	Assert.assertEquals(u1,u2);
	Assert.assertEquals(u2,u2);
	Assert.assertNotSame(u2, u3);
	Assert.assertNotNull(u2);
	
	}
	
	
}

