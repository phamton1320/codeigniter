<?php
class PageController extends CI_Controller
{
        public function __construct()
        {
            parent::__construct();
            $this->load->helper('url');
        }
        public function index()
        {
            $this->load->model('UserModel');
            $config['total_rows'] = $this->UserModel->countAllUser();
            $config['base_url'] = base_url()."PageController/index";
            $config['per_page'] = 1;
            $this->load->library('pagination',$config);
            

            $startpage = $this->uri->segment(4);
            $this->load->library('pagination',$config);
            $data['data'] = $this->UserModel->getList($config['per_page'],$startpage);
            $this->load->view("page_view", $data);
            echo $this->pagination->create_links();
        }
}
        

?>