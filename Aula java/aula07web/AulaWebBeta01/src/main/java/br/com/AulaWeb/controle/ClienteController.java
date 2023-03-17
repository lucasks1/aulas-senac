package br.com.AulaWeb.controle;

import java.io.IOException;


import java.util.List;

import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

import br.com.AulaWeb.dao.ClienteDao;
import br.com.AulaWeb.entidades.Cliente;



/**
 * Servlet implementation class ClienteController
 */
@WebServlet(name="/ClienteController",
urlPatterns = {
		"/cadastrarCliente",
		"/buscarCliente",
		"/confirmarCliente",
		"/editarCliente",
		"/excluirCliente"})
public class ClienteController extends HttpServlet {
	private static final long serialVersionUID = 1L;
       
    /**
     * @see HttpServlet#HttpServlet()
     */
    public ClienteController() {
        super();
        // TODO Auto-generated constructor stub
    }

	/**
	 * @see HttpServlet#doGet(HttpServletRequest request, HttpServletResponse response)
	 */
	protected void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		// TODO Auto-generated method stub
		response.getWriter().append("Served at: ").append(request.getContextPath());
		executar(request,response);
	}

	/**
	 * @see HttpServlet#doPost(HttpServletRequest request, HttpServletResponse response)
	 */
	protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		// TODO Auto-generated method stub
		doGet(request, response);
		
		
	}
	
	public void executar(HttpServletRequest request,HttpServletResponse response) 
	throws ServletException, IOException  {
		try {
			String url = request.getServletPath();
			if(url.equalsIgnoreCase("/cadastrarCliente")) {
				cadastrar(request,response);
			}else if(url.equalsIgnoreCase("/buscarCliente")) {
				buscar(request,response);
			
			}else if(url.equalsIgnoreCase("/confirmarCliente")) {
				confirmar(request,response);
			}else if(url.equalsIgnoreCase("/editarCliente")) {
				editar(request,response);
			}else if(url.equalsIgnoreCase("/excluirCliente")) {
				excluir(request,response);
			}
			else {
				throw new Exception("URL Inválida");
			}
		}catch(Exception e) {
			response.sendRedirect("cliente.jsp");
			e.printStackTrace();
		}
	}
	
	protected void cadastrar(HttpServletRequest request, HttpServletResponse response)
			throws ServletException, IOException {
		
		// Pegando os parâmetros passados pelo formulário
		
		String nome = request.getParameter("nome");
		String email = request.getParameter("email");
		String cpf = request.getParameter("cpf");
	

		// Instanciando um Objeto do tipo Cliente
		Cliente cliente = new Cliente();
		cliente.setNomeCliente(nome);
		cliente.setEmailCliente(email);		
		cliente.setCpfCliente(cpf);
		
		// Instanciando um Objeto do tipo ClienteDao
		try {
			ClienteDao dao = new ClienteDao();
			dao.adicionar(cliente);
			//request.setAttribute("msg", "<div class='alert alert-danger'>Cliente Cadastrado!!!!</div>");
		} catch (Exception e) {
			e.printStackTrace();
			//request.setAttribute("msg", "<div class='alert alert-danger'>Cliente não Cadastrado!!!!");
		} finally {		
			request.getRequestDispatcher("cliente.jsp").forward(request, response);
		}
	}
	
	public void buscar(HttpServletRequest request, HttpServletResponse response) {
		try {
		String nomeCliente = request.getParameter("nome");
		ClienteDao pd = new ClienteDao();

		List<Cliente> lista = pd.listarCliente(nomeCliente);

		if (lista.size() == 0) {
		request.setAttribute("msg", "<div class='alert alert-info'>Nenhum Cliente Encontrado!</div>");
		}
		request.setAttribute("nomeCliente", nomeCliente);
		request.setAttribute("lista", lista);
		request.getRequestDispatcher("consultarCliente.jsp").forward(request, response);
		} catch (Exception e) {
			e.printStackTrace();
		}
		}
/*aquiiii*/
	//@SuppressWarnings("removal")
	public void confirmar(HttpServletRequest request, HttpServletResponse response)
			throws ServletException, IOException {
			try {

			// Pegando os parâmetros passados pelo formulário
			String nome = request.getParameter("nome");
			String email = request.getParameter("email");
			String cpf = request.getParameter("cpf");
			String codCliente = request.getParameter("codigo");

			// Instanciando um Objeto do tipo Cliente
			Cliente cliente = new Cliente();
			cliente.setNomeCliente(nome);
			cliente.setEmailCliente(email);
			cliente.setCpfCliente(cpf);// Instanciando um Objeto do tipo ClienteDao
			cliente.setCodCliente(new Integer(codCliente));
			// Gravando os dados no Banco de Dados

			ClienteDao pd = new ClienteDao();
			pd.editar(cliente);
			request.getSession().setAttribute("cliente", cliente);
			request.setAttribute("msg", "<div class='alert alert-success'>Cliente atualizado!</div>");

			} catch (Exception e) {
			e.printStackTrace();
			request.setAttribute("msg", "<div class='alert alert-danger'>Cliente não Atualizado!</div>");
			} finally {
			request.getRequestDispatcher("consultarCliente.jsp").forward(request, response);
			}

			}

	
	//@SuppressWarnings("removal")
	public void editar(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		try {
		// Capturando o Id do Cliente vindo do formulário
		Integer codCliente = new Integer(request.getParameter("codCliente"));
		Cliente cli = new ClienteDao().buscarPorIdCliente(codCliente);

		if (cli == null) {
		request.setAttribute("msg", "<div class='alert alert-info'>Cliente não encontrado!</div>");
		request.getRequestDispatcher("consultarCliente.jsp").forward(request, response);
		} else {
		request.setAttribute("linha", cli);
		request.getRequestDispatcher("editarCliente.jsp").forward(request, response);
		}
		} catch (Exception e) {
		e.printStackTrace();
		request.setAttribute("msg", "<div class='alert alert-danger'>Erro: " + e.getMessage() + "</div>");
		request.getRequestDispatcher("consultarCliente.jsp").forward(request, response);
		}
		}
	
	protected void excluir(HttpServletRequest request, HttpServletResponse response)
			throws ServletException, IOException {
		// Pegando os par�metros passados pelo formul�rio
		int codCliente = new Integer(request.getParameter("codCliente"));

		// Instanciando um Objeto do tipo Cliente
		Cliente cliente = new Cliente();
		cliente.setCodCliente(codCliente);

		// Instanciando um Objeto do tipo ClienteDao
		try {
			ClienteDao dao = new ClienteDao();
			dao.excluir(cliente);

		} catch (Exception e) {
			request.setAttribute("msg", "Erro ao excluir cliente" + cliente.getNomeCliente());
			//request.getRequestDispatcher("erro.jsp").forward(request, response);

		} finally {
			response.sendRedirect("consultarCliente.jsp");
		}
	}
	
	
}
