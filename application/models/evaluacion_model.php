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

	public function mostrar()
	{
		$query = $this->db->select('*')->from('evaluacion')->join('academico', 'evaluacion.academico_evaluacion = academico.id_academico')->join('asignatura', 'evaluacion.asignatura_evaluacion = asignatura.id_asignatura')->join('tipo_evaluacion', 'evaluacion.tipo_evaluacion = tipo_evaluacion.id_tipo')->get();
                return $query->result();
	}
        
        
        
        
	public function editar($id, $data)
	{
		if($this->db->where('id_evaluacion', $id)->update('evaluacion', $data))
			return true;
		else
			return false;
	}
	
	public function getEvaluacion($id)
	{
            return $this->db->select('*')->from('evaluacion')->join('academico', 'evaluacion.academico_evaluacion = academico.id_academico')->join('asignatura', 'evaluacion.asignatura_evaluacion = asignatura.id_asignatura')->join('tipo_evaluacion', 'evaluacion.tipo_evaluacion = tipo_evaluacion.id_tipo')->where('id_evaluacion', $id)->get()->row();
	}
        
        public function getEvaluacion_cp($id)
	{
            return $this->db->select('*')->from('evaluacion')->join('academico', 'evaluacion.academico_evaluacion = academico.id_academico')->join('asignatura', 'evaluacion.asignatura_evaluacion = asignatura.id_asignatura')->join('tipo_evaluacion', 'evaluacion.tipo_evaluacion = tipo_evaluacion.id_tipo')->join('pauta', 'evaluacion.pauta_evaluacion = pauta.id_pauta')->where('id_evaluacion', $id)->get()->row();
	}


	public function eliminar($id)
        {
            if($this->db->delete('evaluacion', array('id_evaluacion'=>$id)))
                return true;
            else
                return false;
        }
        
        public function getIDPauta()
        {
             return $this->db->select('MAX(id_pauta) as id_pauta')->from('pauta')->get()->row();
        }
        
        public function insertar_pauta($new_pauta)
        {
            if($this->db->insert('pauta', $new_pauta))
			return true;
		else
			return false;
        }
        
        public function ingresar_pauta_evaluacion($id_evaluacion, $id_pauta)
        {
            $data = array(
               'pauta_evaluacion' => $id_pauta,
            );

            $this->db->where('id_evaluacion', $id_evaluacion);
            if($this->db->UPDATE('evaluacion', $data))
			return true;
		else
			return false;
        }
         
}
