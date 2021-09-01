<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Palabras extends CI_Controller {

	private static $solapa = "palabras";

	public function __construct()
	{
		parent::__construct();

        $this->load->model('usuarios_model');
        $this->load->model('paginas_model');
		$this->load->library('grocery_CRUD');
	}

	public function index()
	{
        $data['titulo'] = "Palabras";
        $data['subtitulo'] = "Listado";
        $data['breadcum'] = array( array('link' => 'javascript:;', 'texto' => 'Palabras'), array('link' => '', 'texto' => 'listado') );
        

		$crud = new grocery_CRUD();

		//$crud->order_by('pagos.Fecha','desc');

		$crud->unset_bootstrap();
		$crud->set_table('palabras');
		$crud->set_subject('palabra');
		$crud->required_fields('pal_id', 'pal_desc_es');
		$crud->columns('pal_id', 'pal_desc_es','pal_desc_en');

		//$crud->set_relation('cat_id','categorias','cat_nombre');

		$crud->display_as('pal_id','Id');
		$crud->display_as('pal_desc_es','Español');
		$crud->display_as('pal_desc_en','Ingles');

		$crud->unset_texteditor('pal_desc_es','pal_desc_en');

        $crud->unset_read();
        $crud->unset_add();
        $crud->unset_delete();
        //$crud->unset_edit();

        //$crud->add_action('Modificar', '', site_url().'cobros/modificar/', 'fa fa-pencil fa-lg');

		//$crud->field_type('prod_fecha', 'hidden', date('Y-m-d H:i:s'));
		//$crud->callback_after_upload(array($this,'callback_after_upload'));

		$output = $crud->render($data);

		$this->load->view(self::$solapa.'/index', $output);
	}

}
