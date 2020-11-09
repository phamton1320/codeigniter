<?php
class DateModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('date');
    }

    public function datenow()
    {
        return now('Asia/Ho_Chi_Minh');
    }
}
?>