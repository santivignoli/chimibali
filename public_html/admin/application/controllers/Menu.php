<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {

	private static $solapa = "menu";

	public function __construct()
	{
		parent::__construct();

        $this->load->model('usuarios_model');
        $this->load->model('paginas_model');
		$this->load->library('grocery_CRUD');
	}

	public function index()
	{
        $data['titulo'] = "Menu";
        $data['subtitulo'] = "Listado";
        $data['breadcum'] = array( array('link' => 'javascript:;', 'texto' => 'Menu'), array('link' => '', 'texto' => 'listado') );
        

		$crud = new grocery_CRUD();

		//$crud->order_by('pagos.Fecha','desc');

		$crud->unset_bootstrap();
		$crud->unset_jquery();
		$crud->set_table('menu');
		$crud->set_subject('menu');
		$crud->required_fields('menu_id', 'menu_ruta');
		$crud->columns('menu_id', 'menu_ruta');

		//$crud->set_relation('cat_id','categorias','cat_nombre');

		$crud->display_as('menu_id','Id');
		$crud->display_as('menu_ruta','Menu');

		$crud->set_field_upload('menu_ruta','../img');

		//$crud->unset_texteditor('ser_texto_es','ser_texto_en');

        $crud->unset_add();
        $crud->unset_delete();
        //$crud->unset_edit();

        //$crud->add_action('Opiniones', '', site_url().'cobros/modificar/', 'fa fa-pencil fa-lg');

		//$crud->field_type('prod_fecha', 'hidden', date('Y-m-d H:i:s'));
		//$crud->callback_after_upload(array($this,'callback_after_upload'));

		$output = $crud->render($data);

		$this->load->view(self::$solapa.'/index', $output);
	}

	function callback_after_upload($uploader_response, $field_info, $files_to_upload)
	{
	    $this->load->library('image_moo');

	    //Is only one file uploaded so it ok to use it with $uploader_response[0].
	    $file_uploaded = $field_info->upload_path.'/'.$uploader_response[0]->name;

	    $this->image_moo->load($file_uploaded)->resize(800,600)->save($file_uploaded,true);
		/*
	 	$config['image_library'] = 'gd2';
		$config['source_image']	= $field_info->upload_path.'/'.$uploader_response[0]->name;
		$config['create_thumb'] = FALSE;
		$config['maintain_ratio'] = TRUE;
		$config['width']	= 736;
		$config['height']	= 736;

		$this->load->library('image_lib', $config);

		if ( ! $this->image_lib->resize())
		{
		    echo $this->image_lib->display_errors();
		    return FALSE;
		}
		*/
	    return true;
	}

}
