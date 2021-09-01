<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    private static $solapa = "login";

    public function __construct()
    {
        parent::__construct();
        $this->load->model('usuarios_model');
        $this->load->model('paginas_model');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>', '</div>');
    }

    public function index()
    {
        $data['solapa'] = self::$solapa;
        $data['title'] = 'Login';
        $data['error'] = "";
        $data['success'] = "";

        $this->form_validation->set_rules('usuario', 'usuario', 'required');
        $this->form_validation->set_rules('clave', 'contraseña', 'required');

        if($this->form_validation->run() === FALSE)
        {
          if($this->session->userdata('usr_id')) // Ya esta logueado
          {
            redirect('pages');
          }
          else // no esta logueado
          {
            $this->load->view(self::$solapa.'/index', $data);
          }
        }
        else
        {
            $user = $this->usuarios_model->login($this->input->post('usuario'), $this->input->post('clave'));
            if($user)
            {
                $this->session->set_userdata('usr_id', $user['usr_id']);
                $this->session->set_userdata('usr_nombre', $user['usr_nombre']);
                $this->session->set_userdata('usr_apellido', $user['usr_apellido']);
                $this->session->set_userdata('usr_usuario', $user['usr_usuario']);
                $this->session->set_userdata('usr_mail', $user['usr_mail']);
                $this->session->set_userdata('ut_id', $user['ut_id']);

                redirect('pages');
            }
            else
            {
                $data['error'] = "El usuario o la contrase&ntilde;a son incorrectos.";
                $this->load->view(self::$solapa.'/index', $data);
            }
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('usr_id');
        $this->session->sess_destroy();

        redirect(self::$solapa.'/index', 'refresh');
    }

    public function check_login()
    {
        if($this->session->userdata('usr_id') != "")
        {
            return TRUE;
        }
        return FALSE;
    }
}
