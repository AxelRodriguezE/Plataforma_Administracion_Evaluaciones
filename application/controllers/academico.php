<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class academico extends CI_Controller {

        public function index()
	{       
		$data['title'] = 'Index';
		$this->load->model('academico_model');
		$query = $this->academico_model->mostrar();
		$this->load->view('templates/head', compact('data'));
		$this->load->view('administrativo/academicos', compact("query", "estudiante"));
		$this->load->view('templates/footer');
        }
	
	public function agregar()
	{
            if($this->input->post())
            {
                $this->load->model('academico_model');
                
                $academico = array(
                    'nombre_academico' => $this->input->post('nombre', true),
                    'apellidos_academico' => $this->input->post('apellidos', true),
                    'rut_academico' => $this->input->post('rut', true),
                );
                if($this->academico_model->insertar($academico))
                    redirect ('academico');          
            }
            else
            {
                $this->load->view('templates/head');
                $this->load->view('administrativo/nuevo_academico');
                $this->load->view('templates/footer');   
            }
	}
	
	public function editar($id = NULL)
	{
            $this->load->model('academico_model');
            if($this->input->post())
            {
                $academico = array(
                    'nombre_academico' => $this->input->post('nombre', true),
                    'apellidos_academico' => $this->input->post('apellidos', true),                  
                    'rut_academico' => $this->input->post('rut', true),
            );
                if($this->academico_model->editar($this->input->post('id', true), $academico))
                    redirect('academico');
                else
                    $this->load->view('error');
            }
            else
            {
                $query = $this->academico_model->getAcademico($id);
		if($query){
                    $this->load->view('templates/head');
                    $this->load->view('administrativo/editar_academico', compact('query', 'id'));
                    $this->load->view('templates/footer');
                }
		else
                    $this->load->view('error');
            }
            
//            $saludar = 'Holaaa axel';
//            $data['saluda'] = $saludar;
//            
//            $this->load->view('templates/head');
//            $this->load->model('academico_model');
//            $query = $this->academico_model->mostrar();
//            $this->load->view('academico/editar', compact("query"));
//            $this->load->view('templates/footer');
         
	}

	 public function eliminar()
        {    
//            $this->load->model('academico_model');
//            if($this->input->post())
//            {
//                $academico = array(
//                    'nombre_academico' => $this->input->post('nombre_academico', true),
//                    'apellidos_academico' => $this->input->post('apellidos_academico', true),
//                    'rut_academico' => $this->input->post('rut_academico', true),
//                );
//            }
//            else
//            {
//                $query = $this->academico_model->getAcademico($id);
//                if($query)
//                {
//                    $this->academico_model->eliminar($id);
//                    //Buscando como mostrar un mensaje bonito en home que se elimino
//                    redirect('academico');
//                }
//                else
//                {
//                    $this->load->view("academico/error");
//                }
//            }
		$id = $this->uri->segment(3);
		$this->load->model('academico_model');
		if($this->academico_model->eliminar($id))
			redirect('academico');
	}

        public function examinarAcademico($id = NULL)
        {
            $this->load->model('academico_model');
            $academico_actual = $this->academico_model->getAcademico($id);
            $query = $this->academico_model->mostrar_all($id);
            if($query)
            {
                $this->load->view('templates/head');
                $this->load->view('administrativo/info_academico', compact('query', 'id', 'academico_actual'));
                $this->load->view('templates/footer');
            }
            else
            {
                $query = $this->academico_model->mostrar_asign($id);
                if($query)
                {
                    $this->load->view('templates/head');
                    $this->load->view('administrativo/info_academico', compact('query', 'id', 'academico_actual'));
                    $this->load->view('templates/footer');
                }
                else
                    $query = $this->academico_model->mostrar_basic($id);
                    if($query)
                    {
                        $this->load->view('templates/head');
                        $this->load->view('administrativo/info_academico', compact('query', 'id', 'academico_actual'));
                        $this->load->view('templates/footer');
                    }
                    else
                        $this->load->view('error');
            }     
        }
}