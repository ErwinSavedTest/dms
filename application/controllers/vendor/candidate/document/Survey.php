<?php

class Survey extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(['generatepdf', 'custom']);
        $this->lang->load('auth');
		$this->load->model(['Document_Model','Candidate_Model', 'Project_Model', 'CandidateDocument_Model', 'User_Model', 'UserVendor_Model', 'Vendor_Model']);
        authentication($this->ion_auth->logged_in());
	}

	public function index($rowno=0)
    {
        $this->make_bread->add('Index');
        $breadcrumb = $this->make_bread->output();
        $search_text = "";
        if($this->input->post('submit') != NULL ){
            $search_text = $this->input->post('search');
            $this->session->set_userdata(["search" => $search_text]);
        }else{
            if($this->session->userdata('search') != NULL){
                $search_text = $this->session->userdata('search');
            }
        }
        $rowperpage = 20;
        if($rowno  != 0){
            $rowno  = ($rowno-1) * $rowperpage;
        }
        $allcount             = $this->CandidateDocument_Model->getrecordCount($search_text);
        $records              = $this->CandidateDocument_Model->getData($rowno, $rowperpage, $search_text);
        $config['base_url']   = base_url().'vendor/candidate/document/survey/index';
        $config['total_rows'] = $allcount;
        $config['per_page']   = $rowperpage;
        $this->pagination->initialize($config);
        $pagination = $this->pagination->create_links();


        return view('vendor.candidate.document.survey.index', array(
            'pagination' => $pagination,
            'candidates' => $records,
            'search'     => $search_text,
            'breadcrumb' => $breadcrumb,
        ));
    }

	public function create($candidate_id)
	{
		$candidate = $this->Candidate_Model->getCandidateById($candidate_id)->row();
        $project   = $this->Project_Model->findOne($candidate->project_id)->row();
        $vendor    = $this->Vendor_Model->findOne($candidate->vendor_id)->row();
        $vendorPIC = $this->UserVendor_Model->getPIC($vendor->id)->row();
        return view('vendor.candidate.document.survey.create', array(
			'candidate' => $candidate,
            'project'   => $project,
            'vendor'    => $vendor,
            'pic'       => $vendorPIC,
		));
	}

	public function store()
    {
       $config = [];
       $config['upload_path']   = './uploads/attachment/survey/';
       $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
       $config['max_size']      = '2000';
       $config['encrypt_name']  = TRUE;
       //$config['file_name'] = $new_name;

       $this->load->library('upload', $config);
            $site_location_map = '';
            if (!$this->upload->do_upload('site_location_map')) {
                $error = ['error' => $this->upload->display_errors()];
                $this->session->set_flashdata('error', $error['error']);
                redirect("vendor/candidate/document/survey/index", 'refresh');
            }else{
                $site_location_map = $this->upload->data();
            }
            $site_layout ='';
            if (!$this->upload->do_upload('site_layout')) {
                $error = ['error' => $this->upload->display_errors()];
                $this->session->set_flashdata('error', $error['error']);
                redirect("vendor/candidate/document/survey/index", 'refresh');
            }else{
                $site_layout  = $this->upload->data();
            }
            $site_contour = '';
            if (!$this->upload->do_upload('site_contour')) {
                $error = ['error' => $this->upload->display_errors()];
                $this->session->set_flashdata('error', $error['error']);
                redirect("vendor/candidate/document/survey/index", 'refresh');
            }else{
                $site_contour = $this->upload->data();
            }
            if(!empty($site_location_map) && !empty($site_layout) && !empty($site_contour)) {
                $attribute =  [
                    'contractor'        => $this->input->post('contractor'),
                    'project_manger'    => $this->input->post('project_manger'),
                    'sitac_ho'          => $this->input->post('sitac_ho'),
                    'rf'                => $this->input->post('rf'),
                    'tx'                => $this->input->post('tx'),
                    'site_id'           => $this->input->post('site_id'),
                    'site_name'         => $this->input->post('site_name'),
                    'nominal_long'      => $this->input->post('nominal_long'),
                    'nominal_lat'       => $this->input->post('nominal_lat'),
                    'region'            => $this->input->post('region'),
                    'site_type'         => $this->input->post('site_type'),
                    'search_radius'     => $this->input->post('search_radius'),
                    'antena_height'     => $this->input->post('antena_height'),
                    'candidate'         => $this->input->post('candidate'),
                    'candidate_long'    => $this->input->post('candidate_long'),
                    'candidate_lat'     => $this->input->post('candidate_lat'),
                    'distance_from_nom' => $this->input->post('distance_from_nom'),
                    'azimuth'           => $this->input->post('azimuth'),
                    'site_address'      => $this->input->post('site_address'),
                    'city'              => $this->input->post('city'),
                    'site_location'     => $this->input->post('site_location'),
                    'tower_type'        => $this->input->post('tower_type'),
                    'building_height'   => $this->input->post('building_height'),
                    'floor_no'          => $this->input->post('floor_no'),
                    'tower_height'      => $this->input->post('tower_height'),
                    'space_dimension'   => $this->input->post('space_dimension'),
                    'access_road'       => $this->input->post('access_road'),
                    'access'            => $this->input->post('access'),
                    'owner'             => $this->input->post('owner'),
                    'address_owner'     => $this->input->post('address_owner'),
                    'pic_owner'         => $this->input->post('pic_owner'),
                    'phone_owner'       => $this->input->post('phone_owner'),
                ];
                $attachment = [
                    'site_location_map' => $site_location_map['file_name'],
                    'site_layout'       => $site_layout['file_name'],
                    'site_contour'      => $site_contour['file_name'],
                ];
                $data = [
                    'project_id'    => $this->input->post('project_id'),
                    'vendor_id'     => $this->input->post('vendor_id'),
                    'candidate_id'  => $this->input->post('candidate_id'),
                    'name'          => 'SURVEY',
                    'code'          => 'FM-STP-019',
                    'type'          => 'SITAC',
                    'status'        => 'submited',
                    'created_at'    => date('Y-m-d H:i:s'),
                    'attribute'     => json_encode($attribute), //nanti didecode
                    'attachment'    => json_encode($attachment)
                ];

                $data  =  $this->CandidateDocument_Model->save($data);
                if(!empty($data)) {
                    $template = $this->CandidateDocument_Model->findOne($data)->row_array();
                    generateSurvey($template);
                    $this->session->set_flashdata('success', 'Data Uploded');
                    redirect("vendor/candidate/document/survey/index/", 'refresh');
                }
             }else{
                $error = ['error' => $this->upload->display_errors()];
                $this->session->set_flashdata('error', $error['error']);
                redirect("vendor/candidate/document/survey/index/", 'refresh');
            }
     }

   public function download($file_name)
   {
       if(!empty($file_name)) {
           $this->load->helper('download');
           $file = 'uploads/surveysitac/' . $file_name . '';
           force_download($file, NULL);
       }
       $this->session->set_flashdata('error', 'File Empty');
       redirect("vendor/candidate/document/survey/index", 'refresh');
   }
   
    public function choose($id)
    {
        $candidateModel  = $this->CandidateDocument_Model->findOne($id)->row_array();
        $this->CandidateDocument_Model->update($id,  ['status_revision' => 'Choose']);
        $candidateChoose = $this->Candidate_Model->update($candidateModel['candidate_id'], ['has_selected' => 1]);
        if($candidateChoose == true){
            $this->session->set_flashdata('success', 'Candidate Selected');
            redirect("vendor/candidate/document/survey/index", 'refresh');
        }
    }

   /*public function choose($id)
   {
       $candidateModel = $this->CandidateDocument_Model->findOne($id)->row_array();
       $candidate = $this->CandidateDocument_Model->update($id,  ['status_revision' => 'Choose']);
       if($candidate == true){
           $data = [
               'project_id'      => $candidateModel['project_id'],
               'vendor_id'       => $candidateModel['vendor_id'],
               'name'            => $candidateModel['name'],
               'code'            => $candidateModel['code'],
               'type'            => $candidateModel['type'],
               'attachment'      => $candidateModel['attachment'],
               'path'            => $candidateModel['path'],
               'attribute'       => $candidateModel['attribute'],
               'created_at'      => $candidateModel['created_at'],
               'status_revision' => $candidateModel['status_revision']
           ];
           $this->Document_Model->save($data);
           $this->session->set_flashdata('success', 'Candidate Selected');
           redirect("vendor/candidate/document/survey/index", 'refresh');
       }
   }*/

    public function testpdf()
    {
        $model = $this->CandidateDocument_Model->findOne(119)->row_array();
        return view('test_template.survey', ['model' => $model]);
    }


}
