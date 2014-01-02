<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class academico extends CI_Controller {

        public function index()
	{       
		$data['title'] = 'Index';
		$this->load->model('academico_model');
		$query = $this->academico_model->mostrar();
		$this->load->view('templates/head', compact('data'));
		$this->load->view('academico/index', compact("query"));
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
                $this->load->view('academico/nueva');
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
                    $this->load->view('academico/error');
            }
            else
            {
                $query = $this->academico_model->getAcademico($id);
		if($query){
                    $this->load->view('templates/head');
                    $this->load->view('academico/editar', compact('query', 'id'));
                    $this->load->view('templates/footer');
                }
		else
                    $this->load->view('academico/error');
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
