<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Cadastro extends CI_Controller
{
    
    public function __construct(){
        parent:: __construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library(array('form_validation'));
		$this->load->helper(array('array'));
        $this->load->library('form_validation');
		$this->load->library('session');  
        
    }
    
    public function index()
    {
        
        $this->load->view('cadastro');  
    }
	
	
}