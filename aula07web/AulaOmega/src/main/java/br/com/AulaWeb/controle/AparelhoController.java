package br.com.AulaWeb.controle;

import java.io.IOException;


import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

import br.com.AulaWeb.dao.AparelhoDao;
import br.com.AulaWeb.entidades.Aparelho;
import br.com.AulaWeb.entidades.Cliente;


import java.util.*;



/**
 * Servlet implementation class AparelhoController
 */
@WebServlet(name="/AparelhoController",
urlPatterns = {
		"/cadastrarAparelho",
		"/buscarAparelho",
		"/confirmarAparelho",
		"/editarAparelho",
		"/excluirAparelho"})
public class AparelhoController extends HttpServlet {
	private static final long serialVersionUID = 1L;
       
    /**
     * @see HttpServlet#HttpServlet()
     */
    public AparelhoController() {
        super();
        // TODO Auto-generated constructor stub
    }

	/**
	 * @see HttpServlet#doGet(HttpServletRequest request, HttpServletResponse response)
	 */
	protected void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		// TODO Auto-generated method stub
		response.getWriter().append("Served at: ").append(request.getContextPath());
		execute(request, response);
	}

	/**
	 * @see HttpServlet#doPost(HttpServletRequest request, HttpServletResponse response)
	 */
	protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		// TODO Auto-generated method stub
		doGet(request, response);
	}
	
	protected void execute(HttpServletRequest request, HttpServletResponse response)
			throws ServletException, IOException {
		try {
			// Pegando uma URL que chamou a Servlet
			String url = request.getServletPath();
			if (url.equalsIgnoreCase("/cadastrarAparelho")) {
				cadastrar(request, response);
			} else if (url.equalsIgnoreCase("/buscarAparelho")) {
				buscar(request, response);
			}else if(url.equalsIgnoreCase("/excluirAparelho")) {
				//excluir(request, response);
			}else if(url.equalsIgnoreCase("/editarAparelho")) {
				//editar(request, response);
			}else if(url.equalsIgnoreCase("/confirmarAparelho")) {
				//confirmar(request, response);
			}else {
				throw new Exception("URL Inv�lida!!!");
			}
		} catch (Exception e) {
			response.sendRedirect("aparelho.jsp");
			e.printStackTrace();
		}
	}
	
	
	@SuppressWarnings("removal")
	protected void cadastrar(HttpServletRequest request, HttpServletResponse response)
			throws ServletException, IOException {
		String nome = request.getParameter("nome");
		String marca = request.getParameter("marca");
		String valor = request.getParameter("valor");
	//	String valor2 = String.valueOf(valor).replace(',', '.');
		String descricao = request.getParameter("descricao");
		int codCliente = Integer.parseInt(request.getParameter("codCliente"));

		Aparelho aparelho = new Aparelho();
		Cliente cliente = new Cliente();

		aparelho.setNomeAparelho(nome);
		aparelho.setValorConserto(new Double(valor.replace(',', '.')));
		aparelho.setDescricaoDefeito(descricao);
		aparelho.setMarcaAparelho(marca);
		aparelho.setDescricaoDefeito(descricao);
				
		cliente.setCodCliente(codCliente);

		// Relacionando as Classes Produto com Categoria
		aparelho.setCliente(cliente);

		// Gravando os dados no Banco de Dados
		// Populando o Banco de Dados
		AparelhoDao ap = new AparelhoDao();
		try {
			ap.adicionar(aparelho);
			request.setAttribute("msg", "<div class='alert alert-success'>Aparelho Cadastrado com sucesso!!!</div>");
		} catch (Exception e) {
			e.printStackTrace();
			request.setAttribute("msg", "<div class='alert alert-danger'>Aparelho não cadastrado!!!</div>");
		} finally {
			request.getRequestDispatcher("aparelho.jsp").forward(request, response);
		}

	}
	
	public void buscar(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		try {
			String nome = request.getParameter("nome");
			AparelhoDao ap = new AparelhoDao();

			List<Aparelho> lista = ap.listarAparelho(nome);

			if (lista.size() == 0) {
				request.setAttribute("msg", "<div class='alert alert-info'>Nenhum Aparelho na lista!!!</div>");
			}
			request.setAttribute("nome", nome);
			request.setAttribute("lista", lista);
			request.getRequestDispatcher("consultarAparelho.jsp").forward(request, response);

		} catch (Exception e) {
			e.printStackTrace();
		}
	}

}
