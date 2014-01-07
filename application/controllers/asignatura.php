<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class asignatura extends CI_Controller {

        public function __construct(){
            parent::__construct();
            session_start();
        }

        public function index()
	{
            if(isset($_SESSION['rut']) && isset($_SESSION['jerarquia']))
            {
		$data['title'] = 'Index';
		$this->load->model('asignatura_model');
		$query = $this->asignatura_model->mostrar();
		$this->load->view('templates/head', compact('data'));
                $this->load->view('templates/login_head');
                $this->load->view('templates/menu_admin');
		$this->load->view('administrativo/asignaturas', compact("query"));
		$this->load->view('templates/footer');
            }
            else{
                $this->load->view('templates/head', compact('data'));
                $this->load->view('templates/public_head');
                $this->load->view('templates/error_login');
                $this->load->view('templates/footer');
            }
        }
	
	public function agregar()
	{
            if(isset($_SESSION['rut']) && isset($_SESSION['jerarquia']))
            {
                if($this->input->post())
                {
                    $this->load->model('asignatura_model');

                    $asignatura = array(
                        'codigo_asignatura' => $this->input->post('codigo', true),
                        'seccion_asignatura' => $this->input->post('seccion', true),
                        'nombre_asignatura' => $this->input->post('nombre', true),
                        'academico_asignatura' => $this->input->post('academico', true),
                    );
                    if($this->asignatura_model->insertar($asignatura))
                        redirect ('asignatura');          
                }
                else
                {
                    $query_academico = $this->asignatura_model->mostrar_academico();
                    $this->load->view('templates/head');
                    $this->load->view('templates/login_head');
                    $this->load->view('administrativo/agregar_asignatura', compact("query_academico"));
                    $this->load->view('templates/footer');   
                }
            }
            else{
                $this->load->view('templates/head', compact('data'));
                $this->load->view('templates/public_head');
                $this->load->view('templates/error_login');
                $this->load->view('templates/footer');
            }
	}
	
	public function editar($id = NULL)
	{
            if(isset($_SESSION['rut']) && isset($_SESSION['jerarquia']))
            {
                $this->load->model('asignatura_model');
                if($this->input->post())
                {
                    $asignatura = array(
                        'codigo_asignatura' => $this->input->post('codigo', true),
                        'seccion_asignatura' => $this->input->post('seccion', true),
                        'nombre_asignatura' => $this->input->post('nombre', true),
                        'academico_asignatura' => $this->input->post('academico', true),
                );
                    if($this->asignatura_model->editar($this->input->post('id', true), $asignatura))
                        redirect('asignatura');
                    else
                        $this->load->view('error');
                }
                else
                {
                    $query = $this->asignatura_model->getAsignatura($id);
                    $query_academico = $this->asignatura_model->mostrar_academico();
                    if($query){
                        $this->load->view('templates/head');
                        $this->load->view('templates/login_head');
                        $this->load->view('administrativo/editar_asignatura', compact('query', 'id', 'query_academico'));
                        $this->load->view('templates/footer');
                    }
                    else
                        $this->load->view('error');
                }
            }
            else{
                $this->load->view('templates/head', compact('data'));
                $this->load->view('templates/public_head');
                $this->load->view('templates/error_login');
                $this->load->view('templates/footer');
            }
	}

	 public function eliminar()
        {
            if(isset($_SESSION['rut']) && isset($_SESSION['jerarquia']))
            {
		$id = $this->uri->segment(3);
		$this->load->model('asignatura_model');
		if($this->asignatura_model->eliminar($id))
			redirect('asignatura');
            }
            else{
                $this->load->view('templates/head', compact('data'));
                $this->load->view('templates/public_head');
                $this->load->view('templates/error_login');
                $this->load->view('templates/footer');
            }
	}
}
