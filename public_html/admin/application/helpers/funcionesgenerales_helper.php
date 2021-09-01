<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// Se utiliza en RECUPERAR PASSWORD.PHP
function RandomString($length=10,$uc=TRUE,$n=TRUE,$sc=FALSE)
{
    $source = 'abcdefghijklmnopqrstuvwxyz';
    if($uc==1) $source .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    if($n==1) $source .= '1234567890';
    if($sc==1) $source .= '|@#~$%()=^*+[]{}-_';
    if($length>0){
        $rstr = "";
        $source = str_split($source,1);
        for($i=1; $i<=$length; $i++){
            mt_srand((double)microtime() * 1000000);
            $num = mt_rand(1,count($source));
            $rstr .= $source[$num-1];
        }

    }
    return $rstr;
}

// ------------- FORMATEAR lA FECHA ------///
function formatear_fecha($fecha, $tipo)
{
  if($tipo == 1) //Formato salida AAAA-MM-DD
  {
    $fecha_aux = explode('-',$fecha);
    if(count($fecha_aux)<3)
    {
        $fecha_aux = explode('/',$fecha);
    }
    if(count($fecha_aux)<3)
    {
        return $fecha;
    }

    if(strlen($fecha_aux[0])>2)
    {
        $fecha_final = $fecha_aux[0].'-'.$fecha_aux[1].'-'.$fecha_aux[2];
    }
    else
        $fecha_final = $fecha_aux[2].'-'.$fecha_aux[1].'-'.$fecha_aux[0];
  }
  else  //Formato salida DD-MM-AAAA
  {
    $fecha_aux = explode('-',$fecha);
    if(count($fecha_aux)<3)
    {
        $fecha_aux = explode('/',$fecha);
    }
    if(count($fecha_aux)<3)
    {
        return $fecha;
    }

    if(strlen($fecha_aux[0])>2)
    {
        $fecha_final = $fecha_aux[2].'-'.$fecha_aux[1].'-'.$fecha_aux[0];
    }
    else
    {
        $fecha_final = $fecha_aux[0].'-'.$fecha_aux[1].'-'.$fecha_aux[2];
    }
  }

  return $fecha_final;
}

// ------------- FORMATEAR FECHA Y HORA ------///
function formatear_fecha_hora($fecha, $tipo)
{
    $fecha_hora_aux = explode(' ',$fecha);
    $fecha = $fecha_hora_aux[0];
    $hora = $fecha_hora_aux[1];

  if($tipo == 1) //Formato salida AAAA-MM-DD
  {
    $fecha_aux = explode('-',$fecha);
    if(count($fecha_aux)<3)
    {
        $fecha_aux = explode('/',$fecha);
    }
    if(count($fecha_aux)<3)
    {
        return $fecha . " " . $hora;
    }

    if(strlen($fecha_aux[0])>2)
    {
        $fecha_final = $fecha_aux[0].'-'.$fecha_aux[1].'-'.$fecha_aux[2];
    }
    else
    {
        $fecha_final = $fecha_aux[2].'-'.$fecha_aux[1].'-'.$fecha_aux[0];
    }
  }
  else  //Formato salida DD-MM-AAAA
  {
    $fecha_aux = explode('-',$fecha);
    if(count($fecha_aux)<3)
    {
        $fecha_aux = explode('/',$fecha);
    }
    if(count($fecha_aux)<3)
    {
        return $fecha . " " . $hora;
    }

    if(strlen($fecha_aux[0])>2)
    {
        $fecha_final = $fecha_aux[2].'-'.$fecha_aux[1].'-'.$fecha_aux[0];
    }
    else
        $fecha_final = $fecha_aux[0].'-'.$fecha_aux[1].'-'.$fecha_aux[2];
  }

  return $fecha_final . " " . $hora;
}

// VERIFICO QUE EL FORMATO DEL EMAIL SEA CORRECTO //
function checkEmail($email)
{
  // checks proper syntax
  if( !preg_match( "/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/", $email))
    return false;
  else
  	return true;
}

// VERIFICO SI UN CAMPO ESTA VACIO
function esVacio($variable)
{
  if($variable == NULL || $variable == "" )
      return TRUE;

  return FALSE;
}

function cortarTexto($texto, $tam)
{
    $tamano = $tam; // tamaño máximo
    $textoFinal = ''; // Resultado

    // Si el numero de carateres del texto es menor que el tamaño maximo,
    // el tamaño maximo pasa a ser el del texto
    if (strlen($texto) < $tamano)
    {
    	 $textoFinal = $texto;
    }
    else
    {
	    for ($i=0; $i <= $tamano - 1; $i++)
	    {
	        // Añadimos uno por uno cada caracter del texto
	        // original al texto final, habiendo puesto
	        // como limite la variable $tamano
	        $textoFinal .= $texto[$i];
	    }
	    $textoFinal .= '...';
    }
    // devolvemos el texto final
    return $textoFinal;
}

function calcular_edad($fecha)
{
    $dias = explode("-", $fecha, 3);
    if($dias && count($dias)==3)
    {
        $dias = mktime(0,0,0,$dias[1],$dias[2],$dias[0]);
        $edad = (int)((time()-$dias)/31556926);
        return $edad;
    }
    
    return FALSE;
}

function filesize_formatted($path)
{
    $size = filesize($path);
    $units = array( 'B', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB');
    $power = $size > 0 ? floor(log($size, 1024)) : 0;
    return number_format($size / pow(1024, $power), 2, '.', ',') . ' ' . $units[$power];
}

function ordenarPorFecha($a, $b)
{
    if ($a['fecha'] == $b['fecha']) {
        return 0;
    }
    return ($a['fecha'] > $b['fecha']) ? -1 : 1;
}

function buscador()
{
    $CI = get_instance();
    $CI->load->model('mensajes_model');
    $CI->load->model('user_model');
    $CI->load->model('cursos_model');

    $data['alumnos'] = array();
    $data['padres'] = array();
    $data['docentes'] = array();
    $data['administradores'] = array();

    if($CI->session->userdata('tu_id') == 1) // ADMINISTRADOR
    {
        $data['administradores'] = $CI->user_model->get_usuarios_por_tipo(1);
        $data['docentes'] = $CI->user_model->get_usuarios_por_tipo(2);
        $data['padres'] = $CI->user_model->get_usuarios_por_tipo(3);
        $data['alumnos'] = $CI->user_model->get_usuarios_por_tipo(4);
    }
    elseif($CI->session->userdata('tu_id') == 2) // PROFESOR
    {
        $cursos = $CI->cursos_model->get_cursos_profesor($CI->session->userdata('usr_id'));
        foreach($cursos as $curso)
        {
            $alumnos = $CI->user_model->get_alumnos($curso['cur_id']);
            $data['alumnos'] = array_merge((array)$alumnos, $data['alumnos']);
            foreach($alumnos as $alumno)
            {
                $padres = $CI->user_model->get_padres($alumno['usr_id']);
                $data['padres'] = array_merge((array)$padres, $data['padres']);
            }
        }
        $administradores = $CI->user_model->get_usuarios_por_tipo(1);
        $data['administradores'] = array_merge((array)$administradores, $data['administradores']);
    }
    elseif($CI->session->userdata('tu_id') == 3) // PADRE
    {
        $hijos = $CI->user_model->get_hijos($CI->session->userdata('usr_id'));
        foreach($hijos as $hijo)
        {
            if($hijo['cur_id'])
            {
                $alumnos = $CI->user_model->get_alumnos($hijo['cur_id']);
                foreach($alumnos as $alumno)
                {
                    $padres = $CI->user_model->get_padres($alumno['usr_id']);
                    $data['padres'] = array_merge((array)$padres, $data['padres']);
                }
                $profesores = $CI->user_model->get_docentes($hijo['cur_id']);
                $data['docentes'] = array_merge((array)$profesores, $data['docentes']);
            }
        }
    }
    elseif($CI->session->userdata('tu_id') == 4) // ALUMNO
    {
        $curso = $CI->cursos_model->get_alumno_curso_actual($CI->session->userdata('usr_id'));
        if($curso)
        {
          $data['alumnos'] = $CI->user_model->get_alumnos($curso['cur_id']);
          $data['docentes'] = $CI->user_model->get_docentes($curso['cur_id']);
        }
    }

    $data['alumnos'] = remove_dup($data['alumnos']);
    $data['padres'] = remove_dup($data['padres']);
    $data['docentes'] = remove_dup($data['docentes']);
    $data['administradores'] = remove_dup($data['administradores']);
    return $data;
}

function remove_dup($matriz)
{
    $CI = get_instance();
    $usr_id_ant = 0;
    $entrega=array();
    for($n=0;$n<count($matriz);$n++)
    {
      if($matriz[$n]['usr_id'] != $usr_id_ant && $matriz[$n]['usr_id'] != $CI->session->userdata('usr_id'))
      {
        $entrega[] = $matriz[$n];
        $usr_id_ant = $matriz[$n]['usr_id'];
      }
    }
    return $entrega;
}

function enviar_mail($destino, $titulo, $cuerpo)
{
    $CI = get_instance();
    $CI->load->library('email');

    $config['mailtype'] = 'html';
    $CI->email->initialize($config);

    $CI->email->from(MAIL_SENDER, MAIL_USER_SENDER);
    $CI->email->to($destino);
    //$CI->email->cc('another@another-example.com'); 
    //$CI->email->bcc('them@their-example.com'); 

    $CI->email->subject($titulo);
    $CI->email->message($cuerpo);  

    if ( ! $CI->email->send())
    {
        return false;
    }
    return true;
    //echo $CI->email->print_debugger();
}

function my_escapeshellarg($input)
{
  $input = str_replace('\'', '\\\'', $input);

  return '\''.$input.'\'';
}

function random_color_part() {
    return str_pad( dechex( mt_rand( 0, 255 ) ), 2, '0', STR_PAD_LEFT);
}

function random_color() {
    return random_color_part() . random_color_part() . random_color_part();
}

function validar_tipo_usuario($usr_id = FALSE, $tu_id = FALSE){
    $CI = get_instance();
    $CI->load->model('user_model');

    if($usr_id == FALSE || $tu_id == FALSE)
    {
        return FALSE;
    }
    
    $tipos_usuario = $CI->user_model->get_tipos_usuario($usr_id);
    foreach ($tipos_usuario as $key => $tipo)
    {
        if($tipo['tu_id'] == $tu_id)
        {
            return TRUE;
        }
    }
    return FALSE;
}

function validar_imagen_curso($img){
    if($img == "")
    {
        $num = rand(1,22);
        return base_url('assets/images/cursos/curso'.$num.'.jpg');
    }
    return base_url('assets/images/cursos/'.$img);
}

function validar_imagen_usuario_portada($img){
    if($img == "")
    {
        $num = rand(1,22);
        return base_url('assets/images/usuarios/portada/usuario'.$num.'.jpg');
    }
    return base_url('assets/images/usuarios/portada/'.$img);
}