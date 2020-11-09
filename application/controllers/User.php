<?php
class User extends CI_Controller {
 
    protected $_data;
 
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('Muser');
    }
 
    public function index() {
        $this->_data['info']        = $this->Muser->getList();
        $this->_data['total_user']  = $this->Muser->countAll();
        $this->_data['mess'] = $this->session->flashdata('flash_mess');
        $this->_data['subview']     = 'user/index_view';
        $this->_data['titlePage']   = 'List All User';
        $this->load->view('user/main.php', $this->_data);
    }

    public function del($id) {
        $this->load->model('Muser');
        $this->Muser->deleteUser($id);
        $this->session->set_flashdata("flash_mess", "Delete Success");
        redirect(base_url() . "user");
    }

    public function add() {
        $this->_data['titlePage'] = 'Add A User';
        $this->_data['subview'] = 'user/add_view';
  
        $this->form_validation->set_rules("username", "Username", "required|trim|min_length[4]|callback_check_user");
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('password2', 'Confirm Password','required|matches[password]');
        $this->form_validation->set_rules("email", "Email", "required|trim|valid_email|callback_check_email");
  
        if ($this->form_validation->run() == TRUE) {
            $this->load->model("Muser");
            $data_insert = array(
                "username" => $this->input->post("username"),
                "password" => $this->input->post("password"),
                "email"    => $this->input->post("email"),
                "level"    => $this->input->post("level"),
            );
            $this->Muser->insertUser($data_insert);
            $this->session->set_flashdata("flash_mess", "Added");
            redirect(base_url() . "user");
        }
        $this->load->view('user/main.php', $this->_data);
    }

    public function check_user($user) {
        $this->load->model('Muser');
        $id=$this->uri->segment(3);
        if ($this->Muser->checkUsername($user) == FALSE) {
            $this->form_validation->set_message("check_user", "Your username has been registed, please try again!");
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function check_email($email) {
        $this->load->model('Muser');
        $id=$this->uri->segment(3);
        if ($this->Muser->checkUsername($email) == FALSE) {
            $this->form_validation->set_message("check_email", "Your email has been registed, please try again!");
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function edit($id) {
        $this->load->model('Muser');
        $this->_data['titlePage'] = "Edit A User";
        $this->_data['subview'] = "user/edit_view";
 
        $this->_data['info'] = $this->Muser->getUserById($id);
        $this->form_validation->set_rules("username", "Username", "required|trim|min_length[4]|callback_check_user");
        
        $this->form_validation->set_rules("email", "Email", "required|trim|valid_email|callback_check_email");
        if ($this->form_validation->run() == TRUE) {
            $data_update = array(
                "username" => $this->input->post("username"),
                "email" => $this->input->post("email"),
                "level" => $this->input->post("level"),
            );
            if ($this->input->post("password")) {
                $this->form_validation->set_rules('password', 'Password', 'required');
                $this->form_validation->set_rules('password2', 'Confirm Password','required|matches[password]');
                $data_update['password'] = $this->input->post("password");
            }
            $this->Muser->updateUser($data_update, $id);
            $this->session->set_flashdata("flash_mess", "Update Success");
            redirect(base_url() . "user");
        }
        $this->load->view('user/main.php', $this->_data);
    }

}
?>