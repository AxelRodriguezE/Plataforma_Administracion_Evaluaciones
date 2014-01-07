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
            $this->load->view('templates/public_head');
            $this->load->view('login');
            $this->load->view('templates/footer');
        }
        
    public function validar()
    {
        $password = $this->input->post('password', true);
        $rut = $this->input->post('rut', true);
        $_SESSION['rut'] = $rut;
//        $rut_login = (int)$_SESSION['rut'];
//        echo $rut_login;
        //var_dump($_SESSION['rut']);
        $pass = hash('sha256', strtoupper($password));
        $this->load->library('ws_dirdoc');
        //echo $docente->tipo;
        $auth = $this->ws_dirdoc->autenticar($rut, $pass);
        
//        $rut_login = $_SESSION['rut'];
//        var_dump($rut_login);
        
        
        //¿QUE HACER CUANDO TIRE ERROR?? 
//        
//        $cursos = $this->ws_dirdoc->cursos_semestre_anio('55850402', '2', '2013');
//        var_dump($cursos);
//        echo '<br>';
//        foreach ($cursos as $cursos):
//            $oli = $cursos->seccion;
//            echo $oli; 
//        endforeach;
//        
        if($auth)
        {
            //echo 'entro a auth';
            $docente = $this->ws_dirdoc->getAcademico('104716482');//ingresar rut academico para probar...
            //var_dump($docente);
            if(isset($docente))
            {
                $tipo = $docente->tipo;
                $nombre = $docente->alias;
                $_SESSION['nombre'] = $nombre;
                if(isset($docente->jerarquia) && $tipo == "PROF")
                {
                    //echo 'entro a jerarquia';
                    $jerarquia = $docente->jerarquia;
                    if ($jerarquia == "ASISTENTE") {
                        $_SESSION['jerarquia'] = $jerarquia;
                        //echo 'entro como asistente';
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
                        $this->load->view('templates/error_usuario3');
                        $this->load->view('login');
                        $this->load->view('templates/footer');
                    }

                }
                else{
                    if($tipo == "PROF")
                    {
                        //echo 'entro a profesor';
                        $this->load->helper('url');
                        $data['title'] = 'Index';
                        $this->load->model('evaluacion_model');
                        $academico_eval = $this->evaluacion_model->getIDAcademico('104716482');
                        $id_academico_eval = $academico_eval->id_academico;
                        $query = $this->evaluacion_model->mostrar_x_rut($id_academico_eval);
                        $this->load->view('templates/head', compact('data'));
                        $this->load->view('templates/login_head');
                        $this->load->view('academico/evaluaciones', compact("query", "id_academico_eval"));
                        $this->load->view('templates/footer');    
                    }
                    else{
                        $this->load->view('templates/head', compact('data'));
                        $this->load->view('templates/public_head');
                        $this->load->view('templates/error_usuario2');
                        $this->load->view('login');
                        $this->load->view('templates/footer');
                    }
                }
            }
            else {
                $this->load->view('templates/head', compact('data'));
                $this->load->view('templates/public_head');
                $this->load->view('templates/error_usuario2');
                $this->load->view('login');
                $this->load->view('templates/footer');
            }

        }
        else{
            $this->load->view('templates/head', compact('data'));
            $this->load->view('templates/public_head');
            $this->load->view('templates/error_usuario');
            $this->load->view('login');
            $this->load->view('templates/footer');
        }
    }     

    public function cerrarsesion()
    {
        session_destroy();
        redirect(base_url('index.php/'));
    }   
}  
?>