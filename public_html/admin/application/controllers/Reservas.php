<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reservas extends CI_Controller {

    private static $solapa = "reservas";

	public function __construct()
    {
        parent::__construct();
        
        $this->load->model('usuarios_model');
        $this->load->model('paginas_model');
        $this->load->library('grocery_CRUD');
    }

	public function index()
    {
        $data['titulo'] = "Reservas";
        $data['subtitulo'] = "Listado";
        $data['breadcum'] = array( array('link' => 'javascript:;', 'texto' => 'Reservas'), array('link' => '', 'texto' => 'listado') );
        

        $crud = new grocery_CRUD();

        //$crud->order_by('pagos.Fecha','desc');

        $crud->unset_bootstrap();
        $crud->unset_jquery();
        $crud->set_table('reservas');
        $crud->set_subject('reserva');
        $crud->required_fields('res_id', 'prod_id', 'res_fecha_ini', 'res_fecha_fin');
        $crud->columns('prod_id', 'res_nombre', 'res_fecha_ini', 'res_fecha_fin');

        $crud->set_relation('prod_id', 'productos', 'prod_titulo_es');

        $crud->display_as('res_id','Id');
        $crud->display_as('prod_id','Propiedad');
        $crud->display_as('res_nombre','Nombre');
        $crud->display_as('res_fecha_ini','Fecha inicio');
        $crud->display_as('res_fecha_fin','Fecha fin');

        $output = $crud->render($data);

        $this->load->view('pages/index', $output);
    }
	
}
