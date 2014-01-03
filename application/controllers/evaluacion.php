<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class evaluacion extends CI_Controller {

    public function agregar()
    {
        if($this->input->post())
        {
            $this->load->model('evaluacion_model');
                
            $evaluacion = array(
                'nombre_evaluacion' => $this->input->post('nombre', true),
                'fecha_evaluacion' => $this->input->post('fecha', true),
                'hora_evaluacion' => $this->input->post('hora', true),
                'ponderacion_evaluacion' => $this->input->post('ponderacion', true),
                'observacion_evaluacion' => $this->input->post('observacion', true),
                'tipo_evaluacion' => $this->input->post('tipo', true),
                'asignatura_evaluacion' => $this->input->post('asignatura', true),
                'academico_evaluacion' => $this->input->post('academico', true)
            );
            if($this->evaluacion_model->insertar($evaluacion))
                redirect ('evaluacion/mostrarEvaluacion');          
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
    
        public function editar($id = NULL)
	{
            $this->load->model('evaluacion_model');
            if($this->input->post())
            {
                $evaluacion= array(
                    'nombre_evaluacion' => $this->input->post('nombre', true),
                    'fecha_evaluacion' => $this->input->post('fecha', true),
                    'hora_evaluacion' => $this->input->post('hora', true),
                    'ponderacion_evaluacion' => $this->input->post('ponderacion', true),
                    'observacion_evaluacion' => $this->input->post('observacion', true),
                    'tipo_evaluacion' => $this->input->post('tipo', true),
                    'asignatura_evaluacion' => $this->input->post('asignatura', true),
                    'academico_evaluacion' => $this->input->post('academico', true)
            );
                if($this->evaluacion_model->editar($this->input->post('id', true), $evaluacion))
                    redirect('evaluacion/mostrarEvaluacion');
                else
                    $this->load->view('error');
            }
            else
            {
                $query = $this->evaluacion_model->getEvaluacion($id);
                $query_asignatura = $this->evaluacion_model->mostrar_asignatura();
                $query_academico = $this->evaluacion_model->mostrar_academico();
                $query_tipo = $this->evaluacion_model->mostrar_tipo();
		if($query){
                    $this->load->view('templates/head');
                    $this->load->view('academico/editar_evaluacion', compact('query', 'id', 'query_asignatura', 'query_academico','query_tipo'));
                    $this->load->view('templates/footer');
                }
		else
                    $this->load->view('error');
            }
        }
    
    public function mostrarEvaluacion()
    {       
        $this->load->model('evaluacion_model');
        $query = $this->evaluacion_model->mostrar();
	$this->load->view('templates/head', compact('data'));
	$this->load->view('academico/evaluaciones', compact("query"));
	$this->load->view('templates/footer');
    }
    

    
    public function examinarEvaluacion($id = NULL)
    {
        $this->load->model('evaluacion_model');
        $query = $this->evaluacion_model->getEvaluacion_cp($id);
        if($query)
        {
            $this->load->view('templates/head');
            $this->load->view('academico/info_evaluacion', compact('query', 'id'));
            $this->load->view('templates/footer');
        }
	else
        {
            $query = $this->evaluacion_model->getEvaluacion($id);
            if($query)
            {
                $this->load->view('templates/head');
                $this->load->view('academico/info_evaluacion', compact('query', 'id'));
                $this->load->view('templates/footer');
            }
            else
                $this->load->view('error');
        }     
    }

    public function eliminar()
    {    
        $id = $this->uri->segment(3);
        $this->load->model('evaluacion_model');
	if($this->evaluacion_model->eliminar($id))
            redirect('evaluacion/mostrarEvaluacion');
    }   
    
    public function subir_pauta()
    {
        if($this->input->post())
        {
            $this->load->model('evaluacion_model');
            $pauta = array(
                'nombre_pauta' => $this->input->post('titulo', true),
                'archivo_pauta' => $this->input->post('pauta', true),
                'asignatura_pauta' => $this->input->post('id_asignatura', true)
            );   
            
            if($this->evaluacion_model->insertar_pauta($pauta))
            {
                $id_pauta = $this->evaluacion_model->getIDPauta();
                
                $id_pauta_new = $id_pauta->id_pauta;
                
                $id_evaluacion = $this->input->post('id_evaluacion', true);
//                $pauta_evaluacion = array(
//                    'pauta_evaluacion' => $id_pauta
//                );
               // echo $id_evaluacion;
                $this->evaluacion_model->ingresar_pauta_evaluacion($id_evaluacion, $id_pauta_new);
                redirect ('evaluacion/mostrarEvaluacion');
            }
        }

    }
}