package br.com.AulaWeb.controle;

import java.io.IOException;
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;


import br.com.AulaWeb.dao.*;
import br.com.AulaWeb.entidades.*;
/**
 * Servlet implementation class ClienteController
 */
@WebServlet(name="/ClienteController",urlPatterns = {"/cadastrarCliente"})
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
	throws ServletException, IOException{
		try {
			String url = request.getServletPath();
			if(url.equalsIgnoreCase("/cadastrarCliente")) {
				cadastrar(request,response);
			}else {
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
	
}