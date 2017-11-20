<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends CI_Controller
{
    
    public function __construct(){
        parent:: __construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library(array('form_validation'));
		$this->load->helper(array('array'));
        $this->load->library('form_validation');
		$this->load->library('session');          
        
		$this->load->model('usuario_model', 'usuario');
		
    }
    
    public function index()
    {
         		
        $this->load->view('login');  
    }
	
	public function entrar()
    {
        $condicao = array(
            'email' => $this->input->post('email'),
            'senha' => md5($this->input->post('senha'))
        );
		
        if ($dados = $this->usuario->get_usuario_by_condicao($condicao))
        {
            $itens_sessao = array(
                'logado' => TRUE,
			  );
			  
		    $this->session->set_userdata($itens_sessao);
			
			redirect('/mashup');
        }
             	
			$dados = array(
	                'error' => 'Usuário e senha inválidos.',
	                'email' => $this->input->post('email'),
	                'senha' => $this->input->post('senha'));
					
            $this->load->view('login', $dados);	
    }
	
	public function sair()
    {
    	$sessaoItens = array(
            'logado' => false
        );

        $this->session->set_userdata($sessaoItens);
        $this->session->sess_destroy();
        redirect(base_url());
    }
	
}