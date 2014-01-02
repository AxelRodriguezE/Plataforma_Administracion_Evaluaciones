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

	public function eliminar($id)
        {
            if($this->db->delete('academico', array('id_academico'=>$id)))
                return true;
            else
                return false;
        }
}
