<?php
class Login extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->database();
        $this->load->helper(array('form', 'url'));
        $this->load->library(['form_validation','session']);
    }

    public function index(){
        $data = array(
            'title' => 'Login',
            'message' => 'Vui long nhap tai khoan'
        );
        $this->load->view("login.php",$data);
        //kiem tra nut nhan login
        if(isset($_POST['submit_login'])){
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            //$query = $this->db->get('user');
            $dataUser = $this->db->get_where('user',['username'=>$username]);
            $row = $dataUser->row();
            if($row){
                if($row->password == $password){
                    $_SESSION['username'] = $username;
                    //$this->load->view('grid2');
                    redirect('usercontroller/showdb');// Controller
                }else{
                    echo "kiem tra lai pw";
                }
            }else{
                echo "Kiem tra lai Tai khoan OR PW";
            }
            print_r($row);
        }
        // $this->load->model('LoginModel');
        // $login = $this->LoginModel->login();
    }
}
?>