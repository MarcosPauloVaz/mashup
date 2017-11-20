<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

/**
 * Imprime um jquery para marcar o menu através de um id
 *
 * @return string
 * @param string id
 */
if (!function_exists('marca_menu'))
{
	function marca_menu($id = '')
	{
		if ($id != '')
			return '<script type="text/javascript">$(function(){$("#' . $id . '").addClass("active");})</script>';
		else
			return '';
	}
}

// ------------------------------------------------------------------------

/**
 * Base URL
 * 
 * Create a local URL based on your basepath.
 * Segments can be passed in as a string or an array, same as site_url
 * or a URL to a file can be passed in, e.g. to an image file.
 *
 * @access	public
 * @param string
 * @return	string
 */
if ( ! function_exists('base_url'))
{
	function base_url($uri = '')
	{
		$CI =& get_instance();
		return $CI->config->base_url($uri);
	}
}

if (!function_exists('retorna_data_evento'))
{
	function retorna_data_evento($data_inicio, $data_fim)
	{
		$arr_ini = explode('-', $data_inicio);
		$arr_fim = explode('-', $data_fim);
		 
		$mes[1] ='Janeiro';
		$mes[2] ='Fevereiro';
		$mes[3] ='Março';
		$mes[4] ='Abril';
		$mes[5] ='Maio';
		$mes[6] ='Junho';
		$mes[7] ='Julho';
		$mes[8] ='Agosto';
		$mes[9] ='Setembro';
		$mes[10]='Outubro';
		$mes[11]='Novembro';
		$mes[12]='Dezembro';
		
		
		if($arr_ini[1] == $arr_fim[1])
		{
			return $arr_ini[2]." a ".$arr_fim[2]." de ".$mes[$arr_ini[1]]." de ".$arr_fim[0];
		}
		else
		{
			return $arr_ini[2]." de ".$mes[$arr_ini[1]]." a ".$arr_fim[2]." de ".$mes[$arr_fim[1]]." de ".$arr_fim[0];
		}
	}
}

if (!function_exists('ordinal_para_extenso'))
{
	function ordinal_para_extenso($edicao)
	{
		$dezena = floor($edicao/10);
		$resto = $edicao % 10;
		$return1 = "";
		$return2 = "";
		
		if($dezena == 2)
		{
			$return1 = "VIGESIMA";
		}
		if($dezena == 3)
		{
			$return1 = "TRIGESIMA";
		}
		if($dezena == 4)
		{
			$return1 = "QUADRAGESIMA";
		}
		if($dezena == 5)
		{
			$return1 = "QUINQUAGESIMA";
		}
		if($resto == 1)
		{
			$return2 = "PRIMEIRA";
		}
		if($resto == 2)
		{
			$return2 = "SEGUNDA";
		}
		if($resto == 3)
		{
			$return2 = "TERCEIRA";
		}
		if($resto == 4)
		{
			$return2 = "QUARTA";
		}
		if($resto == 5)
		{
			$return2 = "QUINTA";
		}
		if($resto == 6)
		{
			$return2 = "SEXTA";
		}
		if($resto == 7)
		{
			$return2 = "SETIMA";
		}
		if($resto == 8)
		{
			$return2 = "OITAVA";
		}
		if($resto == 9)
		{
			$return2 = "NONA";
		}
		if($resto == 0)
		{
			$return2 = "";
		}
		
		return $return1." ".$return2;
	}
}

if (!function_exists('data_para_extenso'))
{
	function data_para_extenso($data)
	{
		$arr = explode('-', $data);		
		 
		$mes[1] ='Janeiro';
		$mes[2] ='Fevereiro';
		$mes[3] ='Março';
		$mes[4] ='Abril';
		$mes[5] ='Maio';
		$mes[6] ='Junho';
		$mes[7] ='Julho';
		$mes[8] ='Agosto';
		$mes[9] ='Setembro';
		$mes[10]='Outubro';
		$mes[11]='Novembro';
		$mes[12]='Dezembro';
		
		return $arr[2]." de ".$mes[$arr[1]]." de ".$arr[0];
	}
}

if (!function_exists('data_sql_para_dia_e_mes'))
{
	function data_sql_para_dia_e_mes($data)
	{
		$arr = explode('-', $data);		
		 
		$mes['01'] ='Janeiro';
		$mes['02'] ='Fevereiro';
		$mes['03'] ='Março';
		$mes['04'] ='Abril';
		$mes['05'] ='Maio';
		$mes['06'] ='Junho';
		$mes['07'] ='Julho';
		$mes['08'] ='Agosto';
		$mes['09'] ='Setembro';
		$mes['10']='Outubro';
		$mes['11']='Novembro';
		$mes['12']='Dezembro';
		
		//var_dump($data, $arr[1], $mes[$arr[1]]);
		
		return $arr[2]." de ".$mes[$arr[1]];
	}
}

if (!function_exists('data_para_sql'))
{
	function data_para_sql($data_para_sql)
	{
		if (!empty($data_para_sql))
		{
			$p_dt = explode('/', $data_para_sql);
			$data_para_sql = $p_dt[2] . '-' . $p_dt[1] . '-' . $p_dt[0];
			return $data_para_sql;
		}
	}
}

if (!function_exists('trim_value'))
{
	function trim_value(&$value) 
	{ 
	    $value = trim($value); 
	}
}

if (!function_exists('sql_para_data'))
{
	function sql_para_data($data_para_sql)
	{
		if (!empty($data_para_sql))
		{
			$p_dt = explode('-', $data_para_sql);
			$data_para_sql = $p_dt[2] . '/' . $p_dt[1] . '/' . $p_dt[0];
			return $data_para_sql;
		}
	}

}

function array_value_recursive($key, &$arr)
{
   	$cont =  count($arr);
    for($i = 0; $i < $cont; $i++)
		if($arr[$i]['posicao'] == $key)
			return $arr[$i];
}

function busca_array($field, $key, &$arr)
{
   	foreach ($arr as $value) 
   	{
		if($value[$field] == $key)
		{
			return true;
		}
	}	
	return false;
}

if (!function_exists('sql_para_data_tempo'))
{
	function sql_para_data_tempo($sql)
	{
		if (!empty($sql))
		{
			$explode = explode(' ', $sql);

			$hora = explode(':', $explode[1]);
			$data = explode('-', $explode[0]);

			$data_para_sql = $data[2] . '/' . $data[1] . '/' . $data[0] . ' às ' . $hora[0] . ':' . $hora[1];
			return $data_para_sql;
		}
	}

}

if (!function_exists('sql_para_data_sem_tempo'))
{
	function sql_para_data_sem_tempo($sql)
	{
		if (!empty($sql))
		{
			$explode = explode(' ', $sql);

			$hora = explode(':', $explode[1]);
			$data = explode('-', $explode[0]);

			$data_para_sql = $data[2] . '/' . $data[1] . '/' . $data[0];
			return $data_para_sql;
		}
	}

}

/**
 * Imprime um jquery para marcar o menu através de um id
 *
 * @return string
 * @param string id
 */
if (!function_exists('pesquisa_array_url'))
{
	function pesquisa_array_url($url, $array)
	{
		$existe = FALSE;
		foreach ($array as $value)
		{
			if ($value['url'] == $url)
			{
				$existe = TRUE;
				return $existe;
			}
		}
		return $existe;
	}

}

/**
 * Seta o focus em um input com id
 *
 * @param string id
 * @return string
 */
if (!function_exists('set_focus'))
{
	function set_focus($id = '')
	{
		if ($id != '')
			return '<script type="text/javascript">$(function(){$("#' . $id . '").focus();})</script>';
		else
			return '';
	}

}


if (!function_exists('retornaTextoBusca'))
{
	function retornaTextoBusca($texto = 'null', $pesquisa = 'null')
	{
		$textoantes='';				
		$array = explode( strtolower($pesquisa) , strtolower(strip_tags($texto)));
		if(count($array)!=1){
			
			$array1 = explode(' ', $array[0]);
			if(count($array1)>20){
				for($i=count($array1)-20-1; $i<count($array1); $i++){										
					$textoantes .= $array1[$i].' ';					
				}				
			}
			else{				
				$textoantes = implode(' ', $array1);
			}
						
			return $textoantes.'<b style="color: #BA2B00">'.$pesquisa.'</b> '.word_limiter($array[1], 59);
		}else{			
			return word_limiter($array[0], 60);
		}				
	}

}


/**
 * Retorna uma mensagem no padrao do bootstrap fechavel
 *
 * @param int opcao
 * @param string mensagem
 * @return string
 */
if (!function_exists('mensagem'))
{
	function mensagem($opcao, $mensagem)
	{
		$var = '';

		// case para exbir as mensagem
		switch($opcao)
		{

			// sucesso
			case 1 :
				$var = "<div class='alert alert-success fade in'>
            <button type='button' class='close' data-dismiss='alert'>&times;</button>
             " . $mensagem . "
            </div>";
				break;

			//informacao
			case 2 :
				$var = "<div class='alert alert-info fade in'>
            <button type='button' class='close' data-dismiss='alert'>&times;</button>
             " . $mensagem . "
            </div>";
				break;

			// cuidado
			case 3 :
				$var = "<div class='alert alert-warning fade in'>
            <button type='button' class='close' data-dismiss='alert'>&times;</button>
            " . $mensagem . "
            </div>";
				break;

			// error
			case 4 :
				$var = "<div class='alert alert-danger fade in'>
            <button type='button' class='close' data-dismiss='alert'>&times;</button>
            " . $mensagem . "
            </div>";
				break;
		}

		return $var;
	}

}

/**
 * Retorna uma mensagem no padrao do bootstrap fixa
 *
 * @param int opcao
 * @param string mensagem
 * @return string
 */
if (!function_exists('mensagem_fixa'))
{
	function mensagem_fixa($opcao, $mensagem)
	{
		$var = '';

		// case para exbir as mensagem
		switch($opcao)
		{

			// sucesso
			case 1 :
				$var = "<div class='alert alert-success fade in'>
             " . $mensagem . "
            </div>";
				break;

			//informacao
			case 2 :
				$var = "<div class='alert alert-info fade in'>
             " . $mensagem . "
            </div>";
				break;

			// cuidado
			case 3 :
				$var = "<div class='alert alert-warning fade in'>
            " . $mensagem . "
            </div>";
				break;

			// error
			case 4 :
				$var = "<div class='alert alert-danger fade in'>
            " . $mensagem . "
            </div>";
				break;
		}

		return $var;
	}

}

/**
 * Retorna as configurações para o upload da imagem
 * @return array
 */
if (!function_exists('configuracao_upload'))
{
	function configuracao_upload()
	{
		$config['upload_path'] = './pecas_img/';
		// pasta
		$config['allowed_types'] = 'gif|jpg|png';
		// extensoes
		$config['max_size'] = '300';
		// tamanho em bytes
		$config['max_width'] = '300';
		// largura
		$config['max_height'] = '300';
		// altura
		$config['encrypt_name'] = TRUE;
		// gera um nome criptogrado para o arquivo

		return $config;
	}

}

if (!function_exists('tratar_nome'))
{
	function tratar_nome($nome)
	{
		$saida = null;
		$nome = mb_strtolower($nome, "UTF-8");
		// Converter o nome todo para minúsculo
		$nome = explode(" ", $nome);
		// Separa o nome por espaços
		for ($i = 0; $i < count($nome); $i++)
		{

			// Tratar cada palavra do nome
			if ($nome[$i] == "de" or $nome[$i] == "da" or $nome[$i] == "e" or $nome[$i] == "dos" or $nome[$i] == "do")
			{
				$saida .= $nome[$i] . ' ';
				// Se a palavra estiver dentro das complementares mostrar toda em minúsculo
			}
			else
			{
				$saida .= ucfirst($nome[$i]) . ' ';
				// Se for um nome, mostrar a primeira letra maiúscula
			}

		}
		return trim($saida);
	}

}

/**
 * Retorna as configurações para a paginação da view do publico
 * @return array
 */
if (!function_exists('config_paginacao'))
{
	function config_paginacao()
	{
		$config['first_link'] = '&laquo; Primeiro';
		$config['first_tag_open'] = '<li class="prev page" onclick="return load()">';
		$config['first_tag_close'] = '</li>';

		$config['last_link'] = 'Último &raquo;';
		$config['last_tag_open'] = '<li class="next page" onclick="return load()">';
		$config['last_tag_close'] = '</li>';

		$config['next_link'] = 'Próximo &rarr;';

		$config['next_tag_open'] = '<li class="next page" onclick="return load()">';
		$config['next_tag_close'] = '</li>';

		$config['prev_link'] = '&larr; Anterior';
		$config['prev_tag_open'] = '<li class="prev page" onclick="return load()">';
		$config['prev_tag_close'] = '</li>';

		$config['cur_tag_open'] = '<li class="active"><a href="">';
		$config['cur_tag_close'] = '</a></li>';

		$config['num_tag_open'] = '<li class="page" onclick="return load()">';
		$config['num_tag_close'] = '</li>';
		$inicio = '';

		//$config['last_link'] = false;
		//$config['first_link'] = false;

		return $config;
	}

}

/**
 * Retora uma string no modo Titulo
 * @param string
 * @return string
 */
if (!function_exists('mb_ucwords'))
{
	function mb_ucwords($string = '')
	{
		return mb_convert_case($string, MB_CASE_UPPER, "UTF-8");
	}

}

/**
 * Retorna a string limpa, sem caracteres especiais e lower case
 * @param string
 * @return string
 */
if (!function_exists('clean'))
{
	function clean($txt)
	{
		$transliterationTable = array(
			'á' => 'a',
			'Á' => 'A',
			'à' => 'a',
			'À' => 'A',
			'ă' => 'a',
			'Ă' => 'A',
			'â' => 'a',
			'Â' => 'A',
			'å' => 'a',
			'Å' => 'A',
			'ã' => 'a',
			'Ã' => 'A',
			'ą' => 'a',
			'Ą' => 'A',
			'ā' => 'a',
			'Ā' => 'A',
			'ä' => 'ae',
			'Ä' => 'AE',
			'æ' => 'ae',
			'Æ' => 'AE',
			'ḃ' => 'b',
			'Ḃ' => 'B',
			'ć' => 'c',
			'Ć' => 'C',
			'ĉ' => 'c',
			'Ĉ' => 'C',
			'č' => 'c',
			'Č' => 'C',
			'ċ' => 'c',
			'Ċ' => 'C',
			'ç' => 'c',
			'Ç' => 'C',
			'ď' => 'd',
			'Ď' => 'D',
			'ḋ' => 'd',
			'Ḋ' => 'D',
			'đ' => 'd',
			'Đ' => 'D',
			'ð' => 'dh',
			'Ð' => 'Dh',
			'é' => 'e',
			'É' => 'E',
			'è' => 'e',
			'È' => 'E',
			'ĕ' => 'e',
			'Ĕ' => 'E',
			'ê' => 'e',
			'Ê' => 'E',
			'ě' => 'e',
			'Ě' => 'E',
			'ë' => 'e',
			'Ë' => 'E',
			'ė' => 'e',
			'Ė' => 'E',
			'ę' => 'e',
			'Ę' => 'E',
			'ē' => 'e',
			'Ē' => 'E',
			'ḟ' => 'f',
			'Ḟ' => 'F',
			'ƒ' => 'f',
			'Ƒ' => 'F',
			'ğ' => 'g',
			'Ğ' => 'G',
			'ĝ' => 'g',
			'Ĝ' => 'G',
			'ġ' => 'g',
			'Ġ' => 'G',
			'ģ' => 'g',
			'Ģ' => 'G',
			'ĥ' => 'h',
			'Ĥ' => 'H',
			'ħ' => 'h',
			'Ħ' => 'H',
			'í' => 'i',
			'Í' => 'I',
			'ì' => 'i',
			'Ì' => 'I',
			'î' => 'i',
			'Î' => 'I',
			'ï' => 'i',
			'Ï' => 'I',
			'ĩ' => 'i',
			'Ĩ' => 'I',
			'į' => 'i',
			'Į' => 'I',
			'ī' => 'i',
			'Ī' => 'I',
			'ĵ' => 'j',
			'Ĵ' => 'J',
			'ķ' => 'k',
			'Ķ' => 'K',
			'ĺ' => 'l',
			'Ĺ' => 'L',
			'ľ' => 'l',
			'Ľ' => 'L',
			'ļ' => 'l',
			'Ļ' => 'L',
			'ł' => 'l',
			'Ł' => 'L',
			'ṁ' => 'm',
			'Ṁ' => 'M',
			'ń' => 'n',
			'Ń' => 'N',
			'ň' => 'n',
			'Ň' => 'N',
			'ñ' => 'n',
			'Ñ' => 'N',
			'ņ' => 'n',
			'Ņ' => 'N',
			'ó' => 'o',
			'Ó' => 'O',
			'ò' => 'o',
			'Ò' => 'O',
			'ô' => 'o',
			'Ô' => 'O',
			'ő' => 'o',
			'Ő' => 'O',
			'õ' => 'o',
			'Õ' => 'O',
			'ø' => 'oe',
			'Ø' => 'OE',
			'ō' => 'o',
			'Ō' => 'O',
			'ơ' => 'o',
			'Ơ' => 'O',
			'ö' => 'oe',
			'Ö' => 'OE',
			'ṗ' => 'p',
			'Ṗ' => 'P',
			'ŕ' => 'r',
			'Ŕ' => 'R',
			'ř' => 'r',
			'Ř' => 'R',
			'ŗ' => 'r',
			'Ŗ' => 'R',
			'ś' => 's',
			'Ś' => 'S',
			'ŝ' => 's',
			'Ŝ' => 'S',
			'š' => 's',
			'Š' => 'S',
			'ṡ' => 's',
			'Ṡ' => 'S',
			'ş' => 's',
			'Ş' => 'S',
			'ș' => 's',
			'Ș' => 'S',
			'ß' => 'SS',
			'ť' => 't',
			'Ť' => 'T',
			'ṫ' => 't',
			'Ṫ' => 'T',
			'ţ' => 't',
			'Ţ' => 'T',
			'ț' => 't',
			'Ț' => 'T',
			'ŧ' => 't',
			'Ŧ' => 'T',
			'ú' => 'u',
			'Ú' => 'U',
			'ù' => 'u',
			'Ù' => 'U',
			'ŭ' => 'u',
			'Ŭ' => 'U',
			'û' => 'u',
			'Û' => 'U',
			'ů' => 'u',
			'Ů' => 'U',
			'ű' => 'u',
			'Ű' => 'U',
			'ũ' => 'u',
			'Ũ' => 'U',
			'ų' => 'u',
			'Ų' => 'U',
			'ū' => 'u',
			'Ū' => 'U',
			'ư' => 'u',
			'Ư' => 'U',
			'ü' => 'ue',
			'Ü' => 'UE',
			'ẃ' => 'w',
			'Ẃ' => 'W',
			'ẁ' => 'w',
			'Ẁ' => 'W',
			'ŵ' => 'w',
			'Ŵ' => 'W',
			'ẅ' => 'w',
			'Ẅ' => 'W',
			'ý' => 'y',
			'Ý' => 'Y',
			'ỳ' => 'y',
			'Ỳ' => 'Y',
			'ŷ' => 'y',
			'Ŷ' => 'Y',
			'ÿ' => 'y',
			'Ÿ' => 'Y',
			'ź' => 'z',
			'Ź' => 'Z',
			'ž' => 'z',
			'Ž' => 'Z',
			'ż' => 'z',
			'Ż' => 'Z',
			'þ' => 'th',
			'Þ' => 'Th',
			'µ' => 'u',
			'а' => 'a',
			'А' => 'a',
			'б' => 'b',
			'Б' => 'b',
			'в' => 'v',
			'В' => 'v',
			'г' => 'g',
			'Г' => 'g',
			'д' => 'd',
			'Д' => 'd',
			'е' => 'e',
			'Е' => 'e',
			'ё' => 'e',
			'Ё' => 'e',
			'ж' => 'zh',
			'Ж' => 'zh',
			'з' => 'z',
			'З' => 'z',
			'и' => 'i',
			'И' => 'i',
			'й' => 'j',
			'Й' => 'j',
			'к' => 'k',
			'К' => 'k',
			'л' => 'l',
			'Л' => 'l',
			'м' => 'm',
			'М' => 'm',
			'н' => 'n',
			'Н' => 'n',
			'о' => 'o',
			'О' => 'o',
			'п' => 'p',
			'П' => 'p',
			'р' => 'r',
			'Р' => 'r',
			'с' => 's',
			'С' => 's',
			'т' => 't',
			'Т' => 't',
			'у' => 'u',
			'У' => 'u',
			'ф' => 'f',
			'Ф' => 'f',
			'х' => 'h',
			'Х' => 'h',
			'ц' => 'c',
			'Ц' => 'c',
			'ч' => 'ch',
			'Ч' => 'ch',
			'ш' => 'sh',
			'Ш' => 'sh',
			'щ' => 'sch',
			'Щ' => 'sch',
			'ъ' => '',
			'Ъ' => '',
			'ы' => 'y',
			'Ы' => 'y',
			'ь' => '',
			'Ь' => '',
			'э' => 'e',
			'Э' => 'e',
			'ю' => 'ju',
			'Ю' => 'ju',
			'я' => 'ja',
			'Я' => 'ja'
		);
		$txt = str_replace(array_keys($transliterationTable), array_values($transliterationTable), $txt);
		return strtolower($txt);
	}

}

/**
 * Retorna a string limpa, sem caracteres especiais e lower case
 * @param string
 * @return string
 */
if (!function_exists('converteTextoParaExibicao'))
{
	function converteTextoParaExibicao($txt)
	{		
		$new = str_replace('\n', '</br>', $txt);
		return $new;
	}

}

if (!function_exists('configuracao_email'))
{
	function configuracao_email()
	{
		$config = Array(
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_port' => 465,
			'smtp_user' => 'pousoeprosa@pousoeprosa.com.br',
			'smtp_pass' => 'pousoeprosa01',
			'mailtype' => 'html',
			'charset' => 'utf8'
		);

		return $config;
	}

}

if (!function_exists('gera_hash'))
{
	function gera_hash()
	{

		//caracteres que serão usados na senha randomica
		$chars = 'abcdxyswzABCDZYWSZ0123456789';
		//ve o tamnha maximo que a senha pode ter
		$max = strlen($chars) - 1;
		//declara $senha
		$senha = null;

		//loop que gerará a senha de 8 caracteres
		for ($i = 0; $i < 8; $i++)
		{

			$senha .= $chars{mt_rand(0, $max)};

		}
		return $senha;
	}

}

if (!function_exists('formata_data_agenda_dia'))
{
	function formata_data_agenda_dia($data)
	{
		if (!empty($data))
		{
			$p_dt = explode('-', $data);
			$data_para_sql = $p_dt[2];
			return $data_para_sql;
		}
	}

}

if (!function_exists('formata_data_agenda_mes'))
{
	function formata_data_agenda_mes($data)
	{
		if (!empty($data))
		{
			$data_ = explode('-', $data);
			if ($data_[1] == 1)
			{
				$data_return = "JAN";
			}
			if ($data_[1] == 2)
			{
				$data_return = "FEV";
			}
			if ($data_[1] == 3)
			{
				$data_return = "MAR";
			}
			if ($data_[1] == 4)
			{
				$data_return = "ABR";
			}
			if ($data_[1] == 5)
			{
				$data_return = "MAI";
			}
			if ($data_[1] == 6)
			{
				$data_return = "JUN";
			}
			if ($data_[1] == 7)
			{
				$data_return = "JUL";
			}
			if ($data_[1] == 8)
			{
				$data_return = "AGO";
			}
			if ($data_[1] == 9)
			{
				$data_return = "SET";
			}
			if ($data_[1] == 10)
			{
				$data_return = "OUT";
			}
			if ($data_[1] == 11)
			{
				$data_return = "NOV";
			}
			if ($data_[1] == 12)
			{
				$data_return = "DEZ";
			}
			return $data_return;
		}
	}

}

if (!function_exists('formata_mes'))
{
	function formata_mes($mes)
	{
		if (!empty($mes))
		{
			if ($mes == 1)
			{
				$mes_return = "Janeiro";
			}
			if ($mes == 2)
			{
				$mes_return = "Fevereiro";
			}
			if ($mes == 3)
			{
				$mes_return = "Março";
			}
			if ($mes == 4)
			{
				$mes_return = "Abril";
			}
			if ($mes == 5)
			{
				$mes_return = "Maio";
			}
			if ($mes == 6)
			{
				$mes_return = "Junho";
			}
			if ($mes == 7)
			{
				$mes_return = "Julho";
			}
			if ($mes == 8)
			{
				$mes_return = "Agosto";
			}
			if ($mes == 9)
			{
				$mes_return = "Setembro";
			}
			if ($mes == 10)
			{
				$mes_return = "Outubro";
			}
			if ($mes == 11)
			{
				$mes_return = "Novembro";
			}
			if ($mes == 12)
			{
				$mes_return = "Dezembro";
			}
			return $mes_return;
		}
	}

}

if (!function_exists('formata_data_agenda_ano'))
{
	function formata_data_agenda_ano($data)
	{
		if (!empty($data))
		{
			$p_dt = explode('-', $data);
			$data_para_sql = $p_dt[0];
			return $data_para_sql;
		}
	}

}

if (!function_exists('remove_caracter_especial'))
{
	function remove_caracter_especial($str)
	{
		$str = preg_replace('/[áàãâä]/ui', 'a', $str);
	    $str = preg_replace('/[éèêë]/ui', 'e', $str);
	    $str = preg_replace('/[íìîï]/ui', 'i', $str);
	    $str = preg_replace('/[óòõôö]/ui', 'o', $str);
	    $str = preg_replace('/[úùûü]/ui', 'u', $str);
	    $str = preg_replace('/[ç]/ui', 'c', $str);
		
		$str = preg_replace('/[ÁÀÃÂÄ]/ui', 'A', $str);
	    $str = preg_replace('/[ÉÈÊË]/ui', 'E', $str);
	    $str = preg_replace('/[ÍÌÎÏ]/ui', 'I', $str);
	    $str = preg_replace('/[ÓÒÕÔÖ]/ui', 'O', $str);
	    $str = preg_replace('/[ÚÙÛÜ]/ui', 'U', $str);
	    $str = preg_replace('/[Ç]/ui', 'C', $str);
		
	    
	    //$str = preg_replace('/[^a-z0-9]/i', '_', $str);
	    //$str = preg_replace('/_+/', '_', $str); // ideia do Bacco :)
	    return $str;	
		
	}
}

if (!function_exists('validar_imagem'))
{
	function validar_imagem($tamanho, $imagem)
	{
		if (!empty($imagem))
		{
			$except = array(
				"png",
				"jpg",
				"jpeg",
				"gif"
			);
			
			
			if ($imagem['name'] != '')
			{				
				if ($imagem['size'] > $tamanho)
				{
					return false;  
				}		
						
				$imp = implode('|', $except);
				
				if (!preg_match("/\.(" . $imp . "){1}$/i", $imagem['name']))
				{
					return false;  			
				}
				
				return true;
			}
		}
		return false;
	}

}

if (!function_exists('multiexplode'))
{
	function multiexplode ($delimiters,$string) {
	    if (!empty($delimiters) && !empty($string))
		{
		    $ready = str_replace($delimiters, $delimiters[0], $string);
		    $launch = explode($delimiters[0], $ready);
		    return  $launch;
		}
	}
}


