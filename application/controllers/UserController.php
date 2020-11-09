<?php
class UserController extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('UserModel');
        //$this->load->helper('url');
    }
    public function index1()
    {
        $query=$this->db->query("SELECT * FROM USER order By id");
        //$this->db->where("level", "3");
        $query=$this->db->get("user");
        $data=$query->result_array();
      
        echo json_encode($data);
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
    }
    public function addUser()
    {
        // $data=array(
        //     "username" => "kaito",
        //     "password" => "1212445",
        //     "level"    => "2",
        // );
        // $this->db->insert("user", $data);

        $data = json_decode(file_get_contents('php://input'),true);
        //print_r($data);
        $user = $data[0]['username'];
        $pass = $data[0]['password'];
        $lv   = $data[0]['level'];

        $dataAdd = array(
            'username' => $user,
            'password' => $pass,
            'level' => $lv,
        );
        $this->db->insert('user', $dataAdd);
        echo json_encode(['status'=>1]); 
    }
    public function EditUser()
    {
        // $data=array(
        //     "username" => "phamton",
        //     "password" => "kaito123",
        //     "level"    => "1",
        // );
        // $this->db->where("id", "17");
        // if($this->db->update("user", $data)){
        //     echo "Update Thanh cong";
        // }else{
        //     echo "Update That bai";
        // }

        $data = json_decode(file_get_contents('php://input'),true);
        //print_r($data);
        $user = $data[0]['username'];
        $pass = $data[0]['password'];
        $lv   = $data[0]['level'];

        $dataUpdate = array(
            'username'  => $user,
            'password'  => $pass,
            'level'     => $lv,
        );
        //print_r($data[0]['id']);
        $this->db->where("id", $data[0]['id']);
        $this->db->update('user', $dataUpdate);
        echo json_encode(['status'=>1]); // Phai tra ve json
        //return true;
    }
    public function Destroy()
    {
        // $this->db->where("id", "18");
        // if($this->db->delete("user")){
        //     echo "Xoa thanh cong";
        // }else{
        //     echo "Xoa that bai";
        // }
        //var_dump($_POST);
        $data = json_decode(file_get_contents('php://input'),true); // Them true de chuyen thanh array.
        $id = $data[0]['id'];
        //print_r($id);
        $this->db->where('id', $id);
        $this->db->delete('user');
        // print_r($_POST);
        // $request = file_get_contents('php://input'); //xem kieu tra ve
		// print_r($request);
		//header('Content-Type: application/json');
        //echo json_encode(array("response"=>true));
    }

    public function index5()
    {
        $this->load->model("UserModel");
        $data['data']=$this->UserModel->listUser();
        $this->load->view("user/list_view", $data);
    }

    public function saveuser()
    {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        //$this->load->view('adduser');
        $this->form_validation->set_rules('username', 'Vui lòng nhập user', 'required');
        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('adduser');
        }
        else
        {
            //$this->load->view('formsuccess');
            if($this->input->post('save'))
            {
                $data['username'] = $this->input->post('username');
                $data['password'] = $this->input->post('password');
                $data['level'] = $this->input->post('level');
                $user = $this->UserModel->AddUser($data);
                if($user>0){
                    echo " thành công";
                }
                else{
                    echo "thất bại";
                }
            }
        }  
    }
    public function showdb(){
        $this->load->view('grid2');
    }
    public function gridDB()
    {
        $this->load->view('grid');
    }
}
?>