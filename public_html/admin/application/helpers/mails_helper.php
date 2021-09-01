<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

////////////////////
// USO COMUN /////
///////////////////
function mail_style()
{
    $htmlData = "<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>";

    return $htmlData;
}

function mail_header()
{
    $htmlData = "<tr>
                    <td>
                        <a href='".site_url()."'><img src='".base_url('assets/img/logo_negro_email.png')."' alt='' border='0' /></a>
                    </td>
                </tr>";

    return $htmlData;
}

function mail_footer($texto)
{
    $htmlData = "<table width='580' border='0' cellpadding='0' cellspacing='0' align='center' class='deviceWidth' bgcolor='#fff'>
                <tr>
                    <td style='font-size: 9px; font-weight: normal; line-height: 12px; vertical-align: top;'>
                        <p style='mso-table-lspace:0;mso-table-rspace:0; margin:0 auto; color:#1FB7A6; padding:25px 20px;'>
                            ".$texto."
                        </p>
                    </td>
                    <td style='font-size: 13px; color:#1FB7A6; font-weight: normal; line-height: 10px; vertical-align: top;'>
                        <p style='padding:10px 20px; color:#666666; text-align:right;'>
                            <strong>Seguinos!</strong>
                            <a href='https://www.facebook.com/edukrar/'><img style='margin-bottom:-8px;' src='".base_url('assets/images/fb.png')."' /></a>
                            <a href='https://twitter.com/Edukr_AR'><img style='margin-bottom:-8px;' src='".base_url('assets/images/tw.png')."' /></a>
                        </p>
                    </td>
                </tr>
            </table>";

    return $htmlData;
}


////////////////////////
/// MAILS
///////////////////////

function mail_prueba()
{
    $CI =& get_instance();
    
    $CI->load->library('email'); // load library 
    $config['mailtype'] = 'text';
    
    $config['protocol'] = 'smtp';
    $config['smtp_host'] = "mail.nt000347.ferozo.com";
    $config['smtp_user'] = "no-reply@kickaboo.com.ar";
    $config['smtp_pass'] = "2PeeZoW8TP@G";
    $config['smtp_port'] = 25;
    //$config['smtp_timeout'] = 30;
    
    $CI->email->initialize($config);
    
    $CI->load->model('turnos_model');
    $CI->load->model('mails_model');

    $cuerpo = "prueba";
    
    $CI->email->from('no-reply@kickaboo.com.ar', 'Kickaboo');
    $CI->email->to("fabianmayoral@hotmail.com");
    //$CI->email->cc("contacto@3ddos.com.ar");
    //$CI->email->cc('another@another-example.com');
    //$CI->email->bcc('them@their-example.com');

    $CI->email->subject('Confirmación de turno');
    $CI->email->message($cuerpo); 

    if ( ! $CI->email->send())
    {
        return false;
    }
    return true;
}

function mail_turno_confirmado($tur_id)
{
    $CI =& get_instance();
    
    $CI->load->library('email'); // load library 
    $config['mailtype'] = 'html';
    
    $config['protocol'] = 'smtp';
    $config['smtp_host'] = "mail.nt000347.ferozo.com";
    $config['smtp_user'] = "no-reply@kickaboo.com.ar";
    $config['smtp_pass'] = "2PeeZoW8TP@G";
    $config['smtp_port'] = 25;
    //$config['smtp_timeout'] = 50;
    
    $CI->email->initialize($config);
    
    $CI->load->model('turnos_model');
    $CI->load->model('mails_model');

    $turno = $CI->turnos_model->get_items($tur_id);
    //$usuario = $CI->usuarios_model->get_items($turno['usr_id_paciente']);
    //$empresa = $CI->empresas_model->get_items($turno['emp_id']);
    $contenido_mail = $CI->mails_model->get_items_empresa($turno['emp_id'], 1);
    //$firma_mail = $CI->mails_model->get_items_empresa($turno['emp_id'], 3);

    $cuerpo = mail_style();

    $cuerpo .= "<table width='100%' border='0' cellpadding='0' cellspacing='0' align='left' style='font-family: \"Open Sans\", sans-serif;'>";
        
        $cuerpo .= mail_header();

        $cuerpo .= "<tr>";
            $cuerpo .= "<td>";
                $cuerpo .= "<p>".nl2br($contenido_mail['mail_contenido'])."</p>";
            $cuerpo .= "</td>";
        $cuerpo .= "</tr>";

        $cuerpo .= "<tr>";
            $cuerpo .= "<td width='100%' valign='top' bgcolor='#ffffff' style='padding-top:20px'>";
                    
                $cuerpo .= "<!-- One Column -->
                            <table width='580'  class='deviceWidth' border='0' cellpadding='0' cellspacing='0' align='left' bgcolor='#FFF'>
                                <tr>
                                    <td class='left' valign='top' style='padding:0; color:#000; text-align:left;' bgcolor='#FFF'>
                                        <h1 style='font-size:22px; color:#000;'> Su turno:</h1>
                                        <p>
                                            ".$turno['usr_nombre']." ".$turno['usr_apellido']."<br>
                                            ".formatear_fecha($turno['tur_fecha'],2)."<br>
                                            ".substr($turno['tur_hora'],0,5)." hs.<br>
                                            ".$turno['esp_nombre']."<br>
                                            ".$turno['medico_apellido']." ".$turno['medico_nombre']."<br>
                                        </p>
                                        <p style='font-size:12px; padding:0 10px 20px 0px; margin:0px auto; text-align:left;'>
                                            Si quiere cancelar el turno obtenido, por favor haga click <a href='".site_url('login/cancelar_turno/'.$turno['usr_id_paciente'].'/'.$tur_id)."'>aquí</a>.
                                        </p>
                                    </td>
                                </tr>           
                            </table>";
            $cuerpo .= "</td>";
        $cuerpo .= "</tr>";
        /*
        $cuerpo .= "<tr>";
            $cuerpo .= "<td>";
                $cuerpo .= "<img src='".base_url('assets/img/contenido/'.$firma_mail['mail_contenido'])."'>";
            $cuerpo .= "</td>";
        $cuerpo .= "</tr>";
        */
    $cuerpo .= "</table>";
    
    $CI->email->from('no-reply@kickaboo.com.ar', $turno['emp_nombre']);
    $CI->email->to($turno['usr_mail']);
    //$CI->email->cc("contacto@3ddos.com.ar");
    //$CI->email->cc('another@another-example.com');
    //$CI->email->bcc('them@their-example.com');

    $CI->email->subject('Confirmación de turno');
    $CI->email->message($cuerpo); 

    if ( ! $CI->email->send())
    {
        return false;
    }
    return true;
}

function mail_turno_cancelado($tur_id)
{
    $CI =& get_instance();
    
    $CI->load->library('email'); // load library 
    $config['mailtype'] = 'html';

    $config['protocol'] = 'smtp';
    $config['smtp_host'] = "mail.nt000347.ferozo.com";
    $config['smtp_user'] = "no-reply@kickaboo.com.ar";
    $config['smtp_pass'] = "2PeeZoW8TP@G";
    $config['smtp_port'] = 25;
    //$config['smtp_timeout'] = 50;
    
    $CI->email->initialize($config);
    
    $CI->load->model('turnos_model');
    $CI->load->model('mails_model');

    $turno = $CI->turnos_model->get_items($tur_id);
    if($turno)
    {
        $contenido_mail = $CI->mails_model->get_items_empresa($turno['emp_id'], 2);
        //$firma_mail = $CI->mails_model->get_items_empresa($turno['emp_id'], 3);

        $cuerpo = mail_style();

        $cuerpo .= "<table width='100%' border='0' cellpadding='0' cellspacing='0' align='left' style='font-family: \"Open Sans\", sans-serif;'>";
            
            $cuerpo .= mail_header();

            $cuerpo .= "<tr>";
                $cuerpo .= "<td>";
                    $cuerpo .= "<p>".nl2br($contenido_mail['mail_contenido'])."</p>";
                $cuerpo .= "</td>";
            $cuerpo .= "</tr>";

            $cuerpo .= "<tr>";
                $cuerpo .= "<td width='100%' valign='top' bgcolor='#ffffff' style='padding-top:20px'>";

                    $cuerpo .= "<!-- One Column -->
                                <table width='580'  class='deviceWidth' border='0' cellpadding='0' cellspacing='0' align='left' bgcolor='#FFF'>
                                    <tr>
                                        <td class='left' valign='top' style='padding:0; color:#000; text-align:left;' bgcolor='#FFF'>
                                            <h1 style='font-size:22px; color:#000;'> Su turno:</h1>
                                            <p>
                                                ".$turno['usr_nombre']." ".$turno['usr_apellido']."<br>
                                                ".formatear_fecha($turno['tur_fecha'],2)."<br>
                                                ".substr($turno['tur_hora'],0,5)." hs.<br>
                                                ".$turno['esp_nombre']."<br>
                                                ".$turno['medico_apellido']." ".$turno['medico_nombre']."<br>
                                            </p>
                                        </td>
                                    </tr>           
                                </table>";
                $cuerpo .= "</td>";
            $cuerpo .= "</tr>";
            /*
            $cuerpo .= "<tr>";
                $cuerpo .= "<td>";
                    $cuerpo .= "<img src='".base_url('assets/img/contenido/'.$firma_mail['mail_contenido'])."'>";
                $cuerpo .= "</td>";
            $cuerpo .= "</tr>";
            */
        $cuerpo .= "</table>";
        
        $CI->email->from('no-reply@kickaboo.com.ar', $turno['emp_nombre']);
        $CI->email->to($turno['usr_mail']);
        //$CI->email->cc("contacto@3ddos.com.ar");
        //$CI->email->cc('another@another-example.com');
        //$CI->email->bcc('them@their-example.com');

        $CI->email->subject('Cancelación de turno');
        $CI->email->message($cuerpo); 

        if ( ! $CI->email->send())
        {
            return false;
        }
        return true;
    }
    else
    {
        return true;
    }
}
