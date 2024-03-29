<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Tsa_Model extends CI_Model
{
	protected $table = 'document_project';

	public function storeData(array $data)
	{
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}

	public function getCandidateById($candidate_id)
	{
		return $this->db->get_where($this->table, array('id' => $candidate_id));
	}

    public function save($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }
}
