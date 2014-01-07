<?php 

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class publico extends CI_Controller {

        public function index()
	{
            $data['title'] = 'Index';
            $this->load->model('evaluacion_model');
            if($this->input->post())
            {
                $id_asignatura = $this->input->post('asignatura', true);
		$query = $this->evaluacion_model->mostrar_por_asignatura($id_asignatura);
                $query_asignatura = $this->evaluacion_model->mostrar_asignatura();
		$this->load->view('templates/head', compact('data'));
        $this->load->view('templates/public_head');
		$this->load->view('publico/inicio', compact("query", "query_asignatura"));
		$this->load->view('templates/footer');
            }
            else
            {
		$query = $this->evaluacion_model->mostrar();
                $query_asignatura = $this->evaluacion_model->mostrar_asignatura();
		$this->load->view('templates/head', compact('data'));
        $this->load->view('templates/public_head');
		$this->load->view('publico/inicio', compact("query", "query_asignatura"));
		$this->load->view('templates/footer');
            }
        }
        
//        public function examinarEvaluacion($id = NULL)
//        {
//            $this->load->model('evaluacion_model');
//            $query = $this->evaluacion_model->getEvaluacion_cp($id);
//            if($query)
//            {
//                $this->load->view('templates/head');
//                $this->load->view('academico/info_evaluacion', compact('query', 'id'));
//                $this->load->view('templates/footer');
//            }
//            else
//            {
//                $query = $this->evaluacion_model->getEvaluacion($id);
//                if($query)
//                {
//                    $this->load->view('templates/head');
//                    $this->load->view('academico/info_evaluacion', compact('query', 'id'));
//                    $this->load->view('templates/footer');
//                }
//                else
//                    $this->load->view('error');
//            }     
//        }
        
        
}
?>
