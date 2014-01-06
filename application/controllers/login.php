<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class login extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        session_start();
    }
            

    public function index()
	{  
            $data['title'] = 'Index';
            $this->load->view('templates/head', compact('data'));
            $this->load->view('login');
            $this->load->view('templates/footer');
        }
        
        public function validar()
        {
         
            $password = $this->input->post('password', true);
            $rut = $this->input->post('rut', true);
            $_SESSION['rut'] = $rut;
            $pass = hash('sha256', strtoupper($password));
            $this->load->library('ws_dirdoc');
            //var_dump($docente);
            //echo $docente->tipo;
            $auth = $this->ws_dirdoc->autenticar($rut, $pass);
            $docente = $this->ws_dirdoc->getAcademico('55850402');//ingresar rut academico para probar...
            $tipo = $docente->tipo;
            $jer = $docente->jerarquia;
            echo $jer;
            echo $tipo;
            //¿QUE HACER CUANDO TIRE ERROR?? 
            if($auth)
            {
                if(isset($docente->jerarquia) && $tipo == "PROF")
                {
                    $jerarquia = $docente->jerarquia;
                    if ($jerarquia == "ASISTENTE") {
                        $this->load->helper('url');
                        $data['title'] = 'Index';
                        $this->load->model('evaluacion_model');
                        $academico_eval = $this->evaluacion_model->getIDAcademico('55850402');
                        $id_academico_eval = $academico_eval->id_academico;
                        $query = $this->evaluacion_model->mostrar_x_rut($id_academico_eval);
                        $this->load->view('templates/head', compact('data'));
                        $this->load->view('administrativo/academicos', compact("query", "id_academico_eval"));
                        $this->load->view('templates/footer');    
                    }
                    else{
                        echo 'Solo acceso a Jefes de Carrera';
                    }
                     
                }
                else{
                    if($tipo == "PROF")
                    {
                        $this->load->helper('url');
                        $data['title'] = 'Index';
                        $this->load->model('evaluacion_model');
                        $academico_eval = $this->evaluacion_model->getIDAcademico('104716482');
                        $id_academico_eval = $academico_eval->id_academico;
                        $query = $this->evaluacion_model->mostrar_x_rut($id_academico_eval);
                        $this->load->view('templates/head', compact('data'));
                        $this->load->view('academico/evaluaciones', compact("query", "id_academico_eval"));
                        $this->load->view('templates/footer');    
                    }
                    else{
                        echo 'Solo acceso a Académicos';
                    }
                }
            }
            else
                echo 'Usted no tiene los permisos para acceder! >:D';
        }

        
        
}  
?>