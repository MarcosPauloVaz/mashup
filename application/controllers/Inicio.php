<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

/**
 * Class Inicio
 *
 * Classe que carrega a tela de boas vindas
 *
 */
class Inicio extends CI_Controller
{
	public function index()
	{
		redirect('login'); 
	}
}