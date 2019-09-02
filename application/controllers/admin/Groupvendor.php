<?php

class Groupvendor extends CI_Controller
{

    public function __Construct()
    {
        parent ::__construct();
        $this->load->library('form_validation');
        $this->load->model('GroupVendor_Model');
    }

   public function index()
   {
       $groups = $this->GroupVendor_Model->find()
                      ->select('*')
                      ->where('is_deleted', '1')
                      ->order_by('id')
                      ->get()
                      ->result();

       return view('admin/group-vendor/index', [
             'groups' => $groups
       ]);
   }

   public function create()
   {
      return view('admin/group-vendor/create');
   }

   public  function store()
   {
       $this->form_validation->set_rules('group_name', 'Group Name', 'required');
       if ($this->form_validation->run() == FALSE) {
           return view('admin/group-vendor/create');
       } else {
            $this->GroupVendor_Model->insert([
               'group_name'   => $this->input->post('group_name'),
               'created_by'   => 1,
           ]);
            /*
             * $model = new GroupVendor_Model();
             * $model->group_name = $this->input->post('group_name');
             * $model->created_by = 1;
             * $model->save(false);
             */
           $this->session->set_flashdata('message', 'Data Inserted');
           redirect("admin/groupvendor/index", 'refresh');
       }
   }

}