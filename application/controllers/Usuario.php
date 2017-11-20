<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Usuario extends CI_Controller
{
    
    public function __construct(){
        parent:: __construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library(array('form_validation'));
		$this->load->helper(array('array'));
        $this->load->library('form_validation');
		$this->load->library('session');          
        
		$this->load->model('Usuario_model', 'usuario');
		
    }
    
	public function salvar()
    {
    	$dados = array('nome'=>$this->input->post('nome'),
					   'email'=>$this->input->post('email'),
					   'senha'=>md5($this->input->post('senha')));
		
		
		
		$id_usuario = $this->usuario->salvar($dados);	
		
		
		$itens_sessao = array(
	        'nome' => $this->input->post('nome'),
	        'profissao' => $this->input->post('profissao'),
	        'id_usuario' => $id_usuario,
	        'avatar' => $this->input->post('nome-img'),
	        'logado' => true                
		);
		  
	    $this->session->set_userdata($itens_sessao);
		
		$this->session->set_userdata('sucesso','Cadastro realizad com sucesso!');
		redirect('mashup');
    }

	public function recebe_imagem()
	{
		$retorno 		= array();
		$dados_upload 	= array();
		$config 		= array();

		$retorno['status'] 	= 'erro';
		$retorno['mensagem'] = '';

		$x 				= $this->input->post('x');
		$y 				= $this->input->post('y');
		$height 		= $this->input->post('height');
		$width 			= $this->input->post('width');

		
		$config['upload_path'] = './tmp/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['encrypt_name'] = TRUE;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('foto'))
		{
			$erro_imagem_mensagem = $this->upload->display_errors();

			$retorno['mensagem'] = $erro_imagem_mensagem;
		}
		else
		{
			$upload_data = $this->upload->data();
			
			$image_config = array();

			$image_config['image_library'] = 'gd2';
			$image_config['source_image'] = $upload_data["full_path"];
			$image_config['new_image'] = $upload_data["file_path"] . $upload_data['raw_name'] . '_n.jpg';
			$image_config['quality'] = "75%";
			$image_config['maintain_ratio'] = FALSE;
			$image_config['width'] = $width;
			$image_config['height'] = $height;
			$image_config['x_axis'] = $x;
			$image_config['y_axis'] = $y;
			
			$this->load->library('image_lib');
			$this->image_lib->initialize($image_config);
			
			if (!$this->image_lib->crop())
			{
				$retorno['mensagem'] = 'Erro ao cortar a imagem.';
			}
			else
			{
				
				$image_config = array();

				$image_config["image_library"] = "gd2";
				$image_config["source_image"] = $upload_data["file_path"]. $upload_data['raw_name'] . '_n.jpg';
				$image_config['maintain_ratio'] = FALSE;
				$image_config['new_image'] = $upload_data["file_path"] . $upload_data['raw_name'] . '_n.jpg';
				$image_config['quality'] = "75%";
				$image_config['width'] = $width;
				$image_config['height'] = $height;
				
				while ($width > 800 || $height > 800) {
					
					$width = $width / 1.5;
					$height = $height / 1.5;
					$image_config['width'] = (int)$width;
					$image_config['height'] = (int)$height;
				}
				
				$this->image_lib->clear();
				$this->image_lib->initialize($image_config);

				if ($this->image_lib->resize())
				{
					unlink('./tmp/' . $upload_data['file_name']);
					$retorno['status'] = 'sucesso';
					$retorno['url_img'] =  $upload_data['raw_name'] . '_n.jpg';
				}
				else
				{
					$retorno['mensagem'] = 'Erro ao redimencionar a imagem.';
				}
				
			}
		}
		echo json_encode($retorno);
	}
	
}