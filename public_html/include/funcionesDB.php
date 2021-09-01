<?php
// VALIDO SI EL E-MAIL YA ESTA REGISTRADO POR OTRO USUARIO //
function existeMail($mail)
{
  global $db;
  $usuario = $db->get_row("SELECT usr_id FROM Usuarios WHERE usr_mail = '$mail'");
  if($db->num_rows > 0)
  {
    return true;
  }

  return false;
}

// BUSCO EL ULTIMO ID DE UNA TABLA Y LE SUMO 1 //
function nuevoId($tabla, $campo_id)
{
	if(empty($tabla))
	{
		return false;
	}
	else
	{
	    global $db;
        $row = $db->get_row("SELECT MAX($campo_id) AS ultimo FROM $tabla");

		if($db->num_rows > 0)
        {
			return ($row->ultimo + 1);
        }
		else
        {
			return 1;
        }
	}
}
?>
