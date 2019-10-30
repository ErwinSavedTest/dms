<?php

class Foundation extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array('Project_Model', 'Document_Model'));
	}

	public function index($project_id)
	{
		$project = $this->findProjectById($project_id);

		return view('vendor.cme.foundation.index', array(
			'project' => $project
		));
	}

	public function sitepreparation($project_id)
	{
		$project = $this->findProjectById($project_id);

		return view('vendor.cme.foundation.form.site_preparation', array(
			'project' => $project
		));
	}

	public function excavation($project_id)
	{
		$project = $this->findProjectById($project_id);

		return view('vendor.cme.foundation.form.excavation', array(
			'project' => $project
		));
	}

	public function rebarformwork($project_id)
	{
		$project = $this->findProjectById($project_id);

		return view('vendor.cme.foundation.form.re_bar_form_works', array(
			'project' => $project
		));
	}

	public function foundationanchor($project_id)
	{
		$project = $this->findProjectById($project_id);

		return view('vendor.cme.foundation.form.anchor', array(
			'project' => $project
		));
	}

	public function concreteproposal($project_id)
	{

	}

	public function pouringpreparation($project_id)
	{

	}

	public function readymix($project_id)
	{

	}

	public function concretepouring($project_id)
	{

	}

	public function drivenpile($project_id)
	{

	}

	public function wooddenpile($project_id)
	{

	}

	public function borepreparation($project_id)
	{

	}

	public function borepileactivity($project_id)
	{

	}

	public function concretecuring($project_id)
	{

	}

	public function shelterfoundation($project_id)
	{

	}

	public function permanentshelter($project_id)
	{

	}

	public function raftfoundation($project_id)
	{

	}

	public function towererection($project_id)
	{

	}

	public function towerpainting($project_id)
	{

	}

	public function towergrouting($project_id)
	{

	}

	/**
	 * Find project by ID of the project.
	 *
	 * @param $project_id
	 * @return mixed
	 */
	private function findProjectById($project_id)
	{
		$project = $this->Project_Model->findOne($project_id);
		return $project->row();
	}

}