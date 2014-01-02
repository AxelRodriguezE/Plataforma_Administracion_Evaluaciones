<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class evaluacion_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	
	public function insertar($new_evaluacion)
	{
		if($this->db->insert('evaluacion', $new_evaluacion))
			return true;
		else
			return false;
	}
        
        public function mostrar_tipo()
        {
                $query_tipo = $this->db->SELECT('*')->FROM('tipo_evaluacion')->get();
                return $query_tipo->result();
        }
        
//        public function getAcademico_evaluacion($id)
//        {
//                $query_academico = $this->db->SELECT('*')->FROM('academico')->WHERE('id_academico', $id)->get();
//                return $query_academico->result();
//        }
//        
//        public function getAsignatura_evaluacion($id)
//        {
//                $query_asignatura = $this->db->SELECT('*')->FROM('asignatura')->WHERE('id_academico', $id)->get();
//                return $query_asignatura->result();
//        }

        public function mostrar_asignatura()
        {
                $query_asignatura = $this->db->SELECT('*')->FROM('asignatura')->get();
                return $query_asignatura->result();
        }

        public function mostrar_academico()
        {
                $query_academico = $this->db->SELECT('*')->FROM('academico')->get();
                return $query_academico->result();
        }
  


//	public function mostrar()
//	{
//		$query = $this->db->order_by('id_academico', 'asc')->get('academico');
//		return $query->result();
//	}
//	
//	public function editar($id, $data)
//	{
//		if($this->db->where('id_academico', $id)->update('academico', $data))
//			return true;
//		else
//			return false;
//	}
//	
//	public function getAcademico($id)
//	{
//		return $this->db->select('*')->from('academico')->where('id_academico', $id)->get()->row();
//	}
//
//	public function eliminar($id)
//        {
//            if($this->db->delete('academico', array('id_academico'=>$id)))
//                return true;
//            else
//                return false;
//        }
}
