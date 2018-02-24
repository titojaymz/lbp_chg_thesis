<?php
/**
 * Created by Josef Friedrich Baldo
 * Date: 24/02/2018
 * Time: 5:04 PM
 */
class landregistration extends CI_Controller
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

        $landRegList = new Landregistration_model();

        $data = array(
            'system_message' => '',
            'access_level' => $this->accessLevel(),
            'landRegList' => $landRegList->getAllLandRegistration()
        );

        $this->load->view('header');
        $this->load->view('navbar',$data);
        $this->load->view('sidebar');
        $this->load->view('landregistrationlist',$data);
        $this->load->view('footer');
    }
}