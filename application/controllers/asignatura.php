<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class asignatura extends CI_Controller {

        public function index()
	{       
		$data['title'] = 'Index';
		$this->load->model('asignatura_model');
		$query = $this->asignatura_model->mostrar();
		$this->load->view('templates/head', compact('data'));
		$this->load->view('administrativo/asignaturas', compact("query"));
		$this->load->view('templates/footer');
        }
	
	public function agregar()
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
                $this->load->view('administrativo/agregar_asignatura', compact("query_academico"));
                $this->load->view('templates/footer');   
            }
	}
	
	public function editar($id = NULL)
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
                    $this->load->view('administrativo/editar_asignatura', compact('query', 'id', 'query_academico'));
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
		$this->load->model('asignatura_model');
		if($this->asignatura_model->eliminar($id))
			redirect('asignatura');
	}
        

	 public function modificar($id)
        {
//	    $this->load->model('academico_model');
//            if($this->academico_model->getAcademico($id) )
//            {
//                 $academico = array(
//                                        'nombre_academico' => $this->input->post('nombre_academico', true),
//                                        'rut_academico' => $this->input->post('rut_academico', true),
//                        );
//		if($this->academico_model->editar($id,$academico))
//                    {
//                        redirect('academico');
//                    }
//		else
//                    {
//                        $this->load->view('academico/error');
//                    }
//	    }
//	    else
//            {
//                $this->load->view('academico/error');
//            }
             
             
        }

}
