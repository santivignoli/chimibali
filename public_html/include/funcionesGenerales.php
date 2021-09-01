<?php

// Abre la pagina en el tiempo requerido
function refreshPage($tiempo,$url)
{
  print "<META HTTP-EQUIV=\"Refresh\"  CONTENT=\"$tiempo; URL=$url\">";
  if($tiempo==0)
    exit();
}

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
  if($tipo == 1) //Formato AAAA-MM-DD
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
  else  //Formato DD-MM-AAAA
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
        $fecha_final = $fecha_aux[0].'-'.$fecha_aux[1].'-'.$fecha_aux[2];
  }

  return $fecha_final;
}


function esVacio($variable)
{
  if(isset($variable) && !empty($variable) )
      return   "'".$variable."'";
  else
      return 'NULL';
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

// VERIFICO QUE EL USUARIO ESTE LOGUEADO //
function checkLogged()
{
	if(isset($_SESSION['user_id']) && $_SESSION['user_id'] != "")
		return true;

	return false;
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

function strpos_Array($agujas, $pajar)
{
  if($agujas && $pajar){
    if(is_array($agujas)){
      foreach ($agujas as $aguja){
        //if(in_array($aguja, $pajar)) return TRUE;
        if(strpos($pajar,$aguja) > 0) return TRUE;
      }
    }else {
      print $aguja;
      //if(in_array($agujas, $pajar)) return TRUE;
      if(strpos($pajar,$agujas) > 0) return TRUE;
    }
  }
  return FALSE;
}
?>
