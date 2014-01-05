<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class login extends CI_Controller {

        public function index()
	{  
            $data['title'] = 'Index';
            $this->load->view('templates/head', compact('data'));
            $this->load->view('login');
            $this->load->view('templates/footer');
        }
}  
?>