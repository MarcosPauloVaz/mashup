<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuario_model extends CI_Model
{
	public function salvar($dados=NULL)
	{
        if ($dados != null) 
        {            
            $this->db->insert('usuario', $dados);   
			         
            return $this->db->insert_id();                                         
        }
		return false;
    }
	
	
	public function get_usuario_by_condicao($condicao){
		return( $this->db->select('*')
						->from('usuario')
						->where('email = "'.$condicao['email'].'" and senha = "'.$condicao['senha'].'"')
						->get()
						->row());
	}


	public function get_by_id($id_usuario){
		return( $this->db->select('*')
						->from('usuario')
						->where('id_usuario ='.$id_usuario)
						->get()
						->row());
	}
	
}