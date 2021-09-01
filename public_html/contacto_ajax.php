<?php
	extract($_POST);

	$data['error'] = false;
  $mail_sender = "chimichurri.ungasanbali@gmail.com";

	if($nombre == "" || $mail == "" || $mensaje == "")
	{
    $data['error'] = true;
		$data['data'] = "Debe completar todos los campos.";
	}
	else
	{
		if( !preg_match( "/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/", $mail))
		{
      $data['error'] = true;
			$data['data'] = "El email es incorrecto.";
		}
	}

	if($data['error'] == false)
	{
		$headers = "From: ".$mail_sender;
    //$headers = "From: " . $nombre;
		//$headers .= "<" . $mail . ">\r\n";
		//$headers .= "Reply-To: " . $mail;

    $mensaje2 = "";
    $mensaje2 .= "Nombre: ".$nombre."\n";
    $mensaje2 .= "E-mail: ".$mail."\n\n";
    //$mensaje2 .= "Telefono: ".$telefono."\n\n";

    $mensaje2 .= utf8_decode($mensaje);

    $result = mail($mail_sender, "Mail de la web", $mensaje2, $headers);

    if($result)
    {
      $data['error'] = false;
      $data['data'] = "El mensaje fue enviado.<br>Nos comunicaremos a la brevedad.";
    }
    else
    {
      $data['error'] = true;
      $data['data'] = "Ocurrio un error al enviar el e-mail.<br>Vuelva a intentarlo en unos minutos.";
    }
  }

  echo json_encode($data);
?>