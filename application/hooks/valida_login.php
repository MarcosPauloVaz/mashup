<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Valida_login extends CI_Hooks
{

	public function verifica_usuario_logado()
	{
		$this->CI = &get_instance();
		
		if ($this->CI->uri->segment(1) == 'mashup')
		{			
			
			if($this->CI->session->userdata('logado') == TRUE)
			{
				return;
			}
			else 
			{
				redirect(base_url());		
			}
		}
	}

}
