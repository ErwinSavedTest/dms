<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Candidates extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array('Candidate_Model', 'Project_Model'));
	}

	protected function validator()
	{
		$this->form_validation->set_rules('name', 'Candidate Name', 'required');
		$this->form_validation->set_rules('long', 'Long', 'required');
		$this->form_validation->set_rules('lat', 'Lat', 'required');
		$this->form_validation->set_rules('address', 'Address', 'required');

		$this->form_validation->set_rules('owner_name', 'Owner Name', 'required');
		$this->form_validation->set_rules('id_card', 'No. KTP Owner', 'required|numeric');
		$this->form_validation->set_rules('phone_number', 'Phone Number', 'required|numeric');
		$this->form_validation->set_rules('address', 'Owner Address', 'required');
	}

	public function create($project_id)
	{
		$project = $this->Project_Model->findOne($project_id)->result();

		return view('vendor.candidate.create', array(
			'project' => $project[0]
		));
	}

	public function store($project_id)
	{
		$this->validator();

		if($this->form_validation->run()) {
			$candidate = $this->Candidate_Model->storeData($this->input->post());
			$this->session->set_flashdata('success', 'Candidate was added, complete the following document for this candidate.');
			return redirect("vendor/candidate/document/survey/index/" . $candidate, 'refresh');
		} else {
			return $this->create($project_id);
		}
	}

	public function documenta($candidate_id)
	{
		return view('vendor.candidate.document', array(
			'candidate' => $this->Candidate_Model->getCandidateById($candidate_id)->result()
		));
	}

	public function survey()
	{

	}

	public function bap()
	{
		
	}
}