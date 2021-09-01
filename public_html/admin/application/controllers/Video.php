<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Video extends CI_Controller {

    private static $solapa = "video";

	public function __construct()
    {
        parent::__construct();
        
        $this->load->model('usuarios_model');
        $this->load->model('paginas_model');
        $this->load->library('grocery_CRUD');
    }

	public function index()
	{
        $data['titulo'] = "Video";
        $data['subtitulo'] = "Listado";
        $data['breadcum'] = array( array('link' => 'javascript:;', 'texto' => 'Video'), array('link' => '', 'texto' => 'listado') );
        

        $crud = new grocery_CRUD();

        //$crud->order_by('pagos.Fecha','desc');

        $crud->unset_bootstrap();
        $crud->unset_jquery();
        $crud->set_table('videos');
        $crud->set_subject('video');
        $crud->required_fields('vid_id', 'vid_ruta');
        $crud->columns('vid_id', 'vid_ruta');

        $crud->display_as('vid_id','Id');
        $crud->display_as('vid_ruta','Video');

        $crud->set_field_upload('vid_ruta','../img');

        //$crud->unset_texteditor('opi_desc_es','opi_desc_en');

        $crud->unset_add();
        $crud->unset_delete();
        //$crud->unset_edit();

        //$crud->add_action('Modificar', '', site_url().'cobros/modificar/', 'fa fa-pencil fa-lg');

        //$crud->field_type('opi_estado', 'hidden', 1);
        //$crud->field_type('opi_fecha', 'hidden', date('Y-m-d H:i:s'));
        //$crud->callback_after_upload(array($this,'callback_after_upload'));

        $output = $crud->render($data);

        $this->load->view(self::$solapa.'/index', $output);
	}
	
}
