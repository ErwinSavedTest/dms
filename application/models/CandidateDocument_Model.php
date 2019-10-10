<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class CandidateDocument_Model extends CI_Model
{
	protected $table = 'document_candidate';

	public function findOne($id)
	{
		return $this->db->get_where($this->table, array('id' => $id));
	}

    public function getDataSurvey($rowno,$rowperpage,$search="")
    {
        $this->db->select('document_candidate.id,
                           document_candidate.created_at,
                           document_candidate.path,
                           document_candidate.status_revision,
                           candidate.name as candidate_name,
                           vendor.name as vendor_name,
                           project.wbs_id');
        $this->db->from($this->table);
        $this->db->join('candidate','document_candidate.candidate_id = candidate.id','inner');
        $this->db->join('vendor','document_candidate.vendor_id = vendor.id','inner');
        $this->db->join('project','document_candidate.project_id = project.id','inner');
        $this->db->where(['document_candidate.name' => 'SURVEY']);
        if($search != ''){
            $this->db->like('candidate.name', $search);
            $this->db->or_like('vendor.name', $search);
        }
        $this->db->limit($rowperpage, $rowno);
        $query = $this->db->get();
        return $query->result();
    }

    public function getrecordCountSurvey($search = '')
    {
        $this->db->select('count(*) as allcount');
        $this->db->from($this->table);
        $this->db->join('candidate','document_candidate.id = candidate.id','inner');
        $this->db->join('vendor','document_candidate.vendor_id = vendor.id','inner');
        $this->db->join('project','document_candidate.project_id = project.id','inner');
        $this->db->where(['document_candidate.name' => 'SURVEY']);
        if($search != ''){
            $this->db->like('candidate.name', $search);
            $this->db->or_like('vendor.name', $search);
        }
        $query = $this->db->get();
        $result = $query->result_array();
        return $result[0]['allcount'];
    }

    public function save($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    public function update($id, $update)
    {
        $this->db->where('id', $id);
        $this->db->update($this->table, $update);
    }

    public function findCandidateSurveyDone($candidate_id)
    {
        return $this->db->get_where($this->table, array('candidate_id' => $candidate_id, 'name' => 'SURVEY', 'status_revision' => 'Done'));
    }

    public function findCandidateBapDone($candidate_id)
    {
        return $this->db->get_where($this->table, array('candidate_id' => $candidate_id, 'name' => 'BAP', 'status_revision' => 'Done'));
    }

}
