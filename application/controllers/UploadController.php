<?php
class UploadController extends CI_Controller
{
    public function __construct()
        {
            parent::__construct();
            $this->load->helper(array('form', 'url'));
            $this->load->library('upload');
            
        }

        public function index()
        {
            $this->load->view('uploadview', array('error' => ' ' ));
        }

        public function do_upload()
        {  
            $config['upload_path']          = './uploads/';
            $config['allowed_types']        = 'gif|jpg|png|xlsx|xlsm';
            $config['max_size']             = 10000;
            $config['max_width']            = 3000;
            $config['max_height']           = 2000;
            $this->upload->initialize($config);
            $this->load->library('upload', $config);
            
            if ( ! $this->upload->do_upload('userfile'))
            {
                $error = array('error' => $this->upload->display_errors());

                $this->load->view('uploadview', $error);
            }
            else
            {
                $data = array('upload_data' => $this->upload->data());

                $this->load->view('upload_success', $data);
            }
        }

}
?>