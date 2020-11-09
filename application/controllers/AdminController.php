<?php
class AdminController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
    }
    
    public function index()
    {
        $data['subview'] = 'admin/index_view';
        $data['title'] = "Admin";
        $this->load->view('admin/main',$data);
    }
}
?>