<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {

    private static $solapa = "usuarios";

	public function __construct()
    {
        parent::__construct();
        
        $this->load->model('usuarios_model');
        $this->load->model('paginas_model');
        $this->load->library('grocery_CRUD');
    }

	public function index()
    {
        $data['titulo'] = "Usuarios";
        $data['subtitulo'] = "Listado";
        $data['breadcum'] = array( array('link' => 'javascript:;', 'texto' => 'Slider'), array('link' => '', 'texto' => 'listado') );
        

        $crud = new grocery_CRUD();

        //$crud->order_by('pagos.Fecha','desc');

        $crud->unset_bootstrap();
        $crud->unset_jquery();
        $crud->set_table('usuarios');
        $crud->set_subject('usuarios');
        $crud->required_fields('usr_id', 'usr_mail', 'usr_clave');
        $crud->columns('usr_id', 'usr_mail', 'usr_nombre', 'usr_apellido', 'usr_telefono');

        $crud->display_as('usr_id','Id');
        $crud->display_as('usr_mail','Usuario');
        $crud->display_as('usr_nombre','Nombre');
        $crud->display_as('usr_apellido','Apellido');
        $crud->display_as('usr_clave','Clave');
        $crud->display_as('usr_telefono','Telefono');

        //$crud->set_field_upload('sli_imagen','../assets/img/slider');

        //$crud->unset_texteditor('sli_texto_es','sli_texto_en');

        //$crud->unset_add();
        //$crud->unset_edit();

        //$crud->add_action('Opiniones', '', site_url().'pages/opiniones/', 'fa fa-comment fa-lg');

        $crud->field_type('ut_id', 'hidden', 1);
        $crud->field_type('usr_fecha', 'hidden', date('Y-m-d H:i:s'));
        //$crud->callback_after_upload(array($this,'callback_after_upload'));

        $output = $crud->render($data);

        $this->load->view('pages/index', $output);
    }
	
}
