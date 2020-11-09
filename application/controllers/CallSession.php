<?php
class CallSession extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->library("session");
        $this->load->helper("url");
    }
    public function index(){
        $data=array(
            "username" => "Kaito",
            "email" => "codephp2013@gmail.com",
            "website" => "freetuts.net",
            "gender" => "Male",
        );
        //sử dụng session 
        $this->session->set_userdata($data);
        //set flashdata chỉ sử dụng 1 lần.
        $this->session->set_flashdata("flash_open", "Khoi tao session thanh cong");
        redirect(base_url(),"CallSession/index2");
        //$this->load->view('session_views.php',$data);
        //echo "Goi dc session";
    }
    public function index2(){
        echo $this->session->flashdata("flash_open");
        $user=$this->session->userdata("username");
        $level=$this->session->userdata("level");
        $email=$this->session->userdata("email");
        echo "Username: $user, Email: $email, Level: $level";
        $data=$this->session->all_userdata();
        echo "<pre>";
        print_r($data);
        echo "</pre>"; 
  }
  public function index3()
  {
    $this->session->sess_destroy();
        echo "Huy session thanh cong.";
  }
}
?>