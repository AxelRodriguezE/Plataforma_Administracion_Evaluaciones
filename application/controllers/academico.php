<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class academico extends CI_Controller {
    
        public function __construct(){
            parent::__construct();
            session_start();
        }

        public function index()
	{
            //echo $_SESSION['rut'];
            if(isset($_SESSION['rut']) && isset($_SESSION['jerarquia']))
            {
                $data['title'] = 'Index';
		$this->load->model('academico_model');
		$query = $this->academico_model->mostrar();
		$this->load->view('templates/head', compact('data'));
                $this->load->view('templates/login_head');
                $this->load->view('templates/menu_admin');
		$this->load->view('administrativo/academicos', compact("query", "estudiante"));
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
                    $this->load->view('templates/login_head');
                    $this->load->view('administrativo/nuevo_academico');
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
	
        public function asignar_asignatura()
	{
            if(isset($_SESSION['rut']) && isset($_SESSION['jerarquia']))
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
                        $el_academico = $this->academico_model->getIDAcademico();
                        $id_del_academico = $el_academico->id_academico;
                        $datos_academico = $this->academico_model->getAcademico($id_del_academico);
    //                var_dump($el_academico);
    //                var_dump($datos_academico);
                        //$id_academico = $el_academico->id_academico;
                        $this->load->view('templates/head');
                        $this->load->view('templates/login_head');
                        $this->load->view('administrativo/asignar_asignatura', compact("el_academico", "datos_academico"));
                        $this->load->view('templates/footer');
                }
                else
                {
                    $this->load->view('templates/head');
                    $this->load->view('templates/login_head');
                    $this->load->view('administrativo/agregar_asignatura');
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
                        $this->load->view('templates/login_head');
                        $this->load->view('administrativo/editar_academico', compact('query', 'id'));
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
		$this->load->model('academico_model');
		if($this->academico_model->eliminar($id))
			redirect('academico');
            }
            else{
                $this->load->view('templates/head', compact('data'));
                $this->load->view('templates/public_head');
                $this->load->view('templates/error_login');
                $this->load->view('templates/footer');
            }
	}

        public function examinarAcademico($id = NULL)
        {
            if(isset($_SESSION['rut']) && isset($_SESSION['jerarquia']))
            {
                $this->load->model('academico_model');
                $academico_actual = $this->academico_model->getAcademico($id);
                $query = $this->academico_model->mostrar_all($id);
                if($query)
                {
                    $this->load->view('templates/head');
                    $this->load->view('templates/login_head');
                    $this->load->view('administrativo/info_academico', compact('query', 'id', 'academico_actual'));
                    $this->load->view('templates/footer');
                }
                else
                {
                    $query = $this->academico_model->mostrar_asign($id);
                    if($query)
                    {
                        $this->load->view('templates/head');
                        $this->load->view('templates/login_head');
                        $this->load->view('administrativo/info_academico', compact('query', 'id', 'academico_actual'));
                        $this->load->view('templates/footer');
                    }
                    else
                        $query = $this->academico_model->mostrar_basic($id);
                        if($query)
                        {
                            $this->load->view('templates/head');
                            $this->load->view('templates/login_head');
                            $this->load->view('administrativo/info_academico', compact('query', 'id', 'academico_actual'));
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
        
        public function autocompletar()
        {
            if(isset($_SESSION['rut']) && isset($_SESSION['jerarquia']))
            {
                if($this->input->post())
                {
                    $this->load->library('ws_dirdoc');
                    $rut = $this->input->post('rut', true);
                    $semestre = $this->input->post('semestre', true);
                    $año = $this->input->post('ano', true);
                    $cursos = $this->ws_dirdoc->cursos_semestre_anio($rut, $semestre, $año);
                    //var_dump($cursos);
                    $this->load->model('academico_model');
                    $docente = $this->ws_dirdoc->getAcademico($rut);
                    $academico = array(
                        'nombre_academico' => $docente->nombres,
                        'apellidos_academico' => $docente->apellidoPaterno .' '. $docente->apellidoMaterno,
                        'rut_academico' => $rut,
                    );
                    if($this->academico_model->insertar($academico))
                    {
                        
                        $academico_rut = $this->academico_model->getIDAcademico_rut($rut);
                        foreach ($cursos as $cursos):
                            $asignatura = array(
                                'codigo_asignatura' => $cursos->codigo,
                                'seccion_asignatura' => $cursos->seccion,
                                'nombre_asignatura' => $cursos->asignatura,
                                'academico_asignatura' => $academico_rut->id_academico,
                            );
                            $this->load->model('asignatura_model');
                            $this->asignatura_model->insertar($asignatura);
                        endforeach;
                        redirect ('academico');
                    }
                }
                else
                {
                    $this->load->view('templates/head');
                    $this->load->view('templates/login_head');
                    $this->load->view('administrativo/llenar_auto');
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
        
}