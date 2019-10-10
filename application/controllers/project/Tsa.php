<?php


class Tsa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(['generatepdf', 'custom']);
        $this->lang->load('auth');
        $this->load->model(['Candidate_Model','Tsa_Model','CandidateDocument_Model','Project_Model', 'User_Model', 'UserVendor_Model', 'Vendor_Model']);
        authentication($this->ion_auth->logged_in());
    }

    public function index()
    {

    }

    public function create($candidate_id)
    {
        $candidate           = $this->Candidate_Model->getCandidateById($candidate_id)->row();
        $candidate_document  = $this->CandidateDocument_Model->findCandidateSurveyDone($candidate->id)->row_array();
        $bap                 = $this->CandidateDocument_Model->findCandidateBapDone($candidate->id)->row_array();
        $project             = $this->Project_Model->findOne($candidate_document['project_id'])->row_array();
        $vendor              = $this->Vendor_Model->findOne($candidate_document['vendor_id'])->row_array();
        $vendorUser          = $this->UserVendor_Model->getPIC($vendor['id'])->row_array();
        $content_bap         = json_decode($bap['attribute'], true);
        $content             = json_decode($candidate_document['attribute'], true);
        return view('project.tsa.create', array(
           'candidate_document'  => $candidate_document,
           'candidate'           => $candidate,
           'content'             => $content,
           'project'             => $project,
           'vendor'              => $vendor,
           'bap'                 => $bap,
           'content_bap'         => $content_bap,
           'vendorUser'          => $vendorUser
         ));
    }

    protected $attribute = [];

    public function store()
    {
        $this->attribute = [
            'project_name'  => $this->input->post('project_name'),
            'operator'      => $this->input->post('operator'),
            'tsa_number'    => $this->input->post('tsa_number'),
            'site_id_ibs'   => $this->input->post('site_id_ibs'),
            'site_name'     => $this->input->post('site_name'),
            'long'          => $this->input->post('long'),
            'lat'           => $this->input->post('lat'),
            'region'        => $this->input->post('region'),
            'site_type'     => $this->input->post('site_type'),
            'tower_type'    => $this->input->post('tower_type'),
            'tower_height'  => $this->input->post('tower_height'),
            'initil_price_peryear'  => $this->input->post('initil_price_peryear'),
            'land_size'             => $this->input->post('land_size'),
            'access_road'           => $this->input->post('access_road'),
            'status_site'           => $this->input->post('status_site'),
            'land_status'           => $this->input->post('land_status'),
            'owner_name'            => $this->input->post('owner_name'),
            'phone_number'          => $this->input->post('phone_number'),
            'topology'              => $this->input->post('topology'),
            'contact_persons'       => $this->input->post('contact_persons'),
            'address'               => $this->input->post('address'),
            'time_access'           => $this->input->post('time_access'),
            'acquition_status'      => $this->input->post('acquition_status'),
            'final_per_year'        => $this->input->post('final_per_year'),
            'total_price'           => $this->input->post('total_price'),
            'vendor_pic'            => $this->input->post('vendor_pic'),
            'vendor_phone'          => $this->input->post('vendor_phone'),
            'start_year'            => $this->input->post('start_year'),
            'end_year'              => $this->input->post('end_year'),
            'purchased_option'      => $this->input->post('purchased_option'),
            'ibs_pic'               => $this->input->post('ibs_pic'),
            'location_site'         => $this->input->post('location_site'),
        ];
          $this->attribute['other_condition']     =  $this->input->post('other_condition[]');
          $this->attribute['phase']               = $this->input->post('phase[]');
          $this->attribute['percen']              = $this->input->post('percen[]');
          $this->attribute['amount']              = $this->input->post('amount[]');
          $this->attribute['description']         = $this->input->post('description[]');
          $this->attribute['jarak_dari_kandidat'] = $this->input->post('jarak_dari_kandidat[]');
          $this->attribute['tower_existing']      = $this->input->post('tower_existing[]');
          $this->attribute['potensi_market']      = $this->input->post('potensi_market[]');
          $this->attribute['kandidates']          = $this->input->post('kandidates[]');
          $this->attribute['e_longiude']          = $this->input->post('e_longiude[]');
          $this->attribute['ns_latitude']         = $this->input->post('ns_latitude[]');
          $this->attribute['masa_sewa']           = $this->input->post('masa_sewa[]');
          $this->attribute['harga_sewa']          = $this->input->post('harga_sewa[]');
          $this->attribute['cancelation_remarks'] = $this->input->post('cancelation_remarks[]');

        $data = [
            'project_id'    => $this->input->post('project_id'),
            'vendor_id'     => $this->input->post('vendor_id'),
            'name'          => 'TSA',
            'code'          => 'FM-SPA-005',
            'type'          => 'SITAC',
            'candidate_id'  => $this->input->post('candidate_id'),
            'status'        => 'submited',
            'created_at'    => date('Y-m-d H:i:s'),
            'attribute'     => json_encode($this->attribute),
        ];
        $data  =  $this->CandidateDocument_Model->save($data);
        if(!empty($data)) {
              $template = $this->CandidateDocument_Model->findOne($data)->row_array();
              generateTsa($template);
              $this->session->set_flashdata('success', 'Data Uploded');
              redirect("project/tsa/index/", 'refresh');
          }
    }

    public function testpdf()
    {
        $model = $this->CandidateDocument_Model->findOne(184)->row_array();
        return view('test_template.tsa', ['model' => $model]);
    }



}