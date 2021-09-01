<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {

    private static $solapa = "pages";

	public function __construct()
    {
        parent::__construct();
        
        $this->load->model('usuarios_model');
        $this->load->model('paginas_model');
        $this->load->library('grocery_CRUD');
    }

	public function index()
    {
        $data['titulo'] = "Textos";
        $data['subtitulo'] = "Listado";
        $data['breadcum'] = array( array('link' => 'javascript:;', 'texto' => 'Textos'), array('link' => '', 'texto' => 'listado') );
        

        $crud = new grocery_CRUD();

        //$crud->order_by('pagos.Fecha','desc');

        $crud->unset_bootstrap();
        $crud->unset_jquery();
        $crud->set_table('textos');
        $crud->set_subject('Texto');
        $crud->required_fields('tex_id', 'tex_descripcion');
        $crud->columns('tex_id', 'tex_descripcion');

        $crud->display_as('tex_id','Id');
        $crud->display_as('tex_descripcion','Texto');

        //$crud->set_field_upload('prod_imagen','../assets/img/productos');
        //$crud->set_field_upload('prod_imagen2','../assets/img/productos');

        $crud->unset_texteditor('tex_descripcion');

        $crud->unset_add();
        $crud->unset_delete();
        //$crud->unset_edit();

        //$crud->add_action('Opiniones', '', site_url().'pages/opiniones/', 'fa fa-comment fa-lg');
        //$crud->add_action('Slider', '', site_url().'pages/slider/', 'fas fa-image fa-lg');

        //$crud->field_type('prod_estado', 'hidden', 1);
        //$crud->field_type('prod_fecha', 'hidden', date('Y-m-d H:i:s'));
        //$crud->callback_after_upload(array($this,'callback_after_upload'));

        $output = $crud->render($data);

        $this->load->view(self::$solapa.'/index', $output);
    }
	
}
