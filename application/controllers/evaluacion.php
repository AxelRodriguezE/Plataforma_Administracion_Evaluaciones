<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class evaluacion extends CI_Controller {

    public function agregar($id = NULL)
	{
            if($this->input->post())
            {
                $this->load->model('evaluacion_model');
                
                $evaluacion = array(
                    'nombre_evaluacion' => $this->input->post('nombre', true),
                    'fecha_evaluacion' => $this->input->post('fecha', true),
                    'hora_evaluacion' => $this->input->post('rut', true),
                    'ponderación_evaluacion' => $this->input->post('ponderacion', true),
                    'observacion_evaluacion' => $this->input->post('observacion', true),
                    'tipo_evaluacion' => $this->input->post('tipo', true),
                    'asignatura_evaluacion' => $this->input->post('asignatura', true),
                    'academico_evaluacion' => $this->input->post('academico', true)
                );
                if($this->academico_model->insertar($evaluacion))
                    redirect ('agregar_evaluacion');          
            }
            else
            {
//                $academico_evaluacion = $this->evaluacion_model->getAcademico_evaluacion();
//                $asignatura_evaluacion = $this->evaluacion_model->getAsignatura_evaluacion();
                $query_asignatura = $this->evaluacion_model->mostrar_asignatura();
                $query_academico = $this->evaluacion_model->mostrar_academico();
                $query_tipo = $this->evaluacion_model->mostrar_tipo();
                $this->load->view('templates/head');
                $this->load->view('academico/agregar_evaluacion', compact("query_tipo", "query_asignatura", "query_academico"));
                $this->load->view('templates/footer');   
            }
	}
}