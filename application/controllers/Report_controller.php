<?php
/**
 * Created by Josef Friedrich Baldo
 * Date: 11/08/2018
 * Time: 08:47
 */
class Report_controller extends CI_Controller
{
    public function accessLevel()
    {
        if (!$this->session->userdata('access_level'))
        {
            return false;
        }
        else
        {
            return $this->session->userdata('access_level');
        }
    }

    public function index()
    {
        if (!$this->session->userdata('user_data')){
            redirect('user','location');
        }

        redirect('landregistration');
    }

    public function masterlist()
    {
        if (!$this->session->userdata('user_data')){
            redirect('user','location');
        }

        $reports = new Reports();

        $message = '';

        $data = array(
            'system_message' => $message,
            'access_level' => $this->accessLevel(), // this is needed for the navbar
            'tbl_land_reg' => $reports->getLandRegistration()
        );

        $this->load->view('header');
        $this->load->view('navbar',$data);
        $this->load->view('sidebar');
        $this->load->view('masterlist',$data);
        $this->load->view('footer');
    }
}