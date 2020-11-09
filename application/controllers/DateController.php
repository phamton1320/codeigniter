<?php
class DateController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('date');
        $this->load->model('DateModel');
    }

    public function index()
    {
        echo $this->DateModel->datenow()."<br/>";
        $dates = "Nam: %Y Thang: %m Ngay: %d - %h:%i %a";
        $time = time();
        echo mdate($dates, $time)."<br/>";

        echo days_in_month(11,2020)."<br/>"; // dem so ngay trong thang

        echo timezone_menu('UP7')."<br/>"; // lay mui gio


    }
}

?>