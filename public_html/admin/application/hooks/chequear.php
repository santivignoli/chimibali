<?php
if (!defined( 'BASEPATH')) exit('No direct script access allowed'); 

class Chequear
{
	 	
	public function check_login()
	{	
		$CI =& get_instance();
		
        if( strtolower($CI->uri->segment(1)) != 'login' 
       		&& strtolower($CI->uri->segment(1)) != 'webservices' 
       		&& strtolower($CI->uri->segment(1)) != '' )
        {
        	if($CI->usuarios_model->check_permisos() == FALSE)
	    	{
				redirect();
			}
        }
	}
}
