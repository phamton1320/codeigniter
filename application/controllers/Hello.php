<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hello extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
    
    //Ham khoi tao
    function __construct(){
        //Goi den ham khoi tao cua cha(CI_Controller)
        parent::__construct();
    }

	public function index()
	{
		$this->load->view('hello_views');
    }
    public function other()
    {
        echo " hell other";
    }
    public function thamso($message = "", $id = 0)
    {
        echo "Test tham so truyen vao : ". $message . " va id = " .$id ;
    }
}
