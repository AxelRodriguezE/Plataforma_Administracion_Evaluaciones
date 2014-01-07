<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class academico_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	
	public function insertar($new_academico)
	{
		if($this->db->insert('academico', $new_academico))
			return true;
		else
			return false;
	}
	
	public function mostrar()
	{
		$query = $this->db->order_by('id_academico', 'asc')->get('academico');
		return $query->result();
	}
        
        public function mostrar_all($id)
        {
                $query = $this->db->select('*')->from('evaluacion')->join('academico', 'evaluacion.academico_evaluacion = academico.id_academico')->join('asignatura', 'evaluacion.asignatura_evaluacion = asignatura.id_asignatura')->join('tipo_evaluacion', 'evaluacion.tipo_evaluacion = tipo_evaluacion.id_tipo')->where('academico_evaluacion', $id)->get();
                return $query->result();
        }
        
        public function mostrar_asign($id)
        {
                $query = $this->db->select('*')->from('academico')->join('asignatura', 'academico.id_academico = asignatura.academico_asignatura')->where('id_academico', $id)->get();
                return $query->result();
        }

        public function mostrar_basic($id)
        {
                $query = $this->db->select('*')->from('academico')->where('id_academico', $id)->get();
                return $query->result();
        }
	
	public function editar($id, $data)
	{
		if($this->db->where('id_academico', $id)->update('academico', $data))
			return true;
		else
			return false;
	}
	
	public function getAcademico($id)
	{
		return $this->db->select('*')->from('academico')->where('id_academico', $id)->get()->row();
	}
        
        public function getIDAcademico()
        {
             return $this->db->select('MAX(id_academico) as id_academico')->from('academico')->get()->row();
        }

        public function getIDAcademico_rut($rut)
        {
             return $this->db->select('*')->from('academico')->where('rut_academico', $rut)->get()->row();
        }
                        
        public function eliminar($id)
        {
            if($this->db->delete('evaluacion', array('academico_evaluacion'=>$id)))
            {
                    if($this->db->delete('asignatura', array('academico_asignatura'=>$id)))
                    {
                            if($this->db->delete('academico', array('id_academico'=>$id)))
                                    return true;
                            return true;
                    }
                    else
                    {
                            if($this->db->delete('academico', array('id_academico'=>$id)))
                                    return true;
                    }
                    return true;
            }
            else
            {
                    if($this->db->delete('asignatura', array('academico_asignatura'=>$id)))
                    {
                            if($this->db->delete('academico', array('id_academico'=>$id)))
                                    return true;
                            return true;
                    }
                    else
                    {
                            if($this->db->delete('academico', array('id_academico'=>$id)))
                                    return true;
                            else
                                    return false;
                    }
            }
        }
}
