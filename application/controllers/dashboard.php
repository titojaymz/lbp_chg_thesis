<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by Josef Friedrich S Baldo
 * Date: 6 Mar 2020
 * Time: 07:23
 */

class dashboard extends CI_Controller
{
    public function title()
    {
        return 'Dashboard';
    }

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

    public function index_old($operation = NULL)
    {
        if (!$this->session->userdata('user_data')){
            redirect('user','location');
        }

        if($operation == NULL)
        {
            $message = '';
        }
        else
        {
            if($operation == 'landaddsuccess')
            {
                $message = 'Add success';
            }
            else if($operation == 'norecord')
            {
                $message = 'No record found';
            }
            else if($operation == 'landupdatesuccess')
            {
                $message = 'Update success';
            }
            else
            {
                $message = '';
            }
        }

        $landRegList = new Land_class_model();
        $reports = new Reports_model();

        $data = array(
            'system_message' => $message,
            'access_level' => $this->accessLevel(),
            'page_title' => $this->title(),
            'landclass' => $reports->getLandClass(),
            'apprv_claims' => $reports->getApproveClaims(1)
        );

        $this->load->view('header');
        $this->load->view('navbar',$data);
        $this->load->view('sidebar');
        $this->load->view('dashboard_list',$data);
        $this->load->view('footer');
    }

    public function index($operation = NULL)
    {
        if (!$this->session->userdata('user_data')){
            redirect('user','location');
        }

        if($operation == NULL)
        {
            $message = '';
        }
        else
        {
            if($operation == 'landaddsuccess')
            {
                $message = 'Add success';
            }
            else if($operation == 'norecord')
            {
                $message = 'No record found';
            }
            else if($operation == 'landupdatesuccess')
            {
                $message = 'Update success';
            }
            else
            {
                $message = '';
            }
        }

        $landRegList = new Land_class_model();
        $reports = new Reports_model();

        $data = array(
            'system_message' => $message,
            'access_level' => $this->accessLevel(),
            'page_title' => $this->title(),
            'landclass' => $reports->getLandClass(),
            'apprv_claims' => $reports->report1(),
            'totals' => $reports->getTotalLandOwner()
        );

        $this->load->view('header');
        $this->load->view('navbar',$data);
        $this->load->view('sidebar');
        $this->load->view('dashboard_list2',$data);
        $this->load->view('footer');
    }

    public function index2($operation = NULL)
    {
        if (!$this->session->userdata('user_data')){
            redirect('user','location');
        }

        if($operation == NULL)
        {
            $message = '';
        }
        else
        {
            if($operation == 'landaddsuccess')
            {
                $message = 'Add success';
            }
            else if($operation == 'norecord')
            {
                $message = 'No record found';
            }
            else if($operation == 'landupdatesuccess')
            {
                $message = 'Update success';
            }
            else
            {
                $message = '';
            }
        }

        $landRegList = new Land_class_model();
        $reports = new Reports_model();

        $data = array(
            'system_message' => $message,
            'access_level' => $this->accessLevel(),
            'page_title' => $this->title(),
            'landclass' => $reports->getLandClass(),
            'apprv_claims' => $reports->report2()
        );

        $this->load->view('header');
        $this->load->view('navbar',$data);
        $this->load->view('sidebar');
        $this->load->view('dashboard_list3',$data);
        $this->load->view('footer');
    }

    public function fully_paid_claims($operation = NULL)
    {
        if (!$this->session->userdata('user_data')){
            redirect('user','location');
        }

        if($operation == NULL)
        {
            $message = '';
        }
        else
        {
            if($operation == 'landaddsuccess')
            {
                $message = 'Add success';
            }
            else if($operation == 'norecord')
            {
                $message = 'No record found';
            }
            else if($operation == 'landupdatesuccess')
            {
                $message = 'Update success';
            }
            else
            {
                $message = '';
            }
        }

        $landRegList = new Land_class_model();
        $reports = new Reports_model();

        $data = array(
            'system_message' => $message,
            'access_level' => $this->accessLevel(),
            'page_title' => $this->title(),
            'landclass' => $reports->getLandClass(),
            'apprv_claims' => $reports->report3()
        );

        $this->load->view('header');
        $this->load->view('navbar',$data);
        $this->load->view('sidebar');
        $this->load->view('dashboard_list4',$data);
        $this->load->view('footer');
    }

    public function partial_paid_claims($operation = NULL)
    {
        if (!$this->session->userdata('user_data')){
            redirect('user','location');
        }

        if($operation == NULL)
        {
            $message = '';
        }
        else
        {
            if($operation == 'landaddsuccess')
            {
                $message = 'Add success';
            }
            else if($operation == 'norecord')
            {
                $message = 'No record found';
            }
            else if($operation == 'landupdatesuccess')
            {
                $message = 'Update success';
            }
            else
            {
                $message = '';
            }
        }

        $landRegList = new Land_class_model();
        $reports = new Reports_model();

        $data = array(
            'system_message' => $message,
            'access_level' => $this->accessLevel(),
            'page_title' => $this->title(),
            'landclass' => $reports->getLandClass(),
            'apprv_claims' => $reports->report4()
        );

        $this->load->view('header');
        $this->load->view('navbar',$data);
        $this->load->view('sidebar');
        $this->load->view('dashboard_list5',$data);
        $this->load->view('footer');
    }

    public function paid_under_ao2($operation = NULL)
    {
        if (!$this->session->userdata('user_data')){
            redirect('user','location');
        }

        if($operation == NULL)
        {
            $message = '';
        }
        else
        {
            if($operation == 'landaddsuccess')
            {
                $message = 'Add success';
            }
            else if($operation == 'norecord')
            {
                $message = 'No record found';
            }
            else if($operation == 'landupdatesuccess')
            {
                $message = 'Update success';
            }
            else
            {
                $message = '';
            }
        }

        $landRegList = new Land_class_model();
        $reports = new Reports_model();

        $data = array(
            'system_message' => $message,
            'access_level' => $this->accessLevel(),
            'page_title' => $this->title(),
            'landclass' => $reports->getLandClass(),
            'apprv_claims' => $reports->report5()
        );

        $this->load->view('header');
        $this->load->view('navbar',$data);
        $this->load->view('sidebar');
        $this->load->view('dashboard_list6',$data);
        $this->load->view('footer');
    }

    public function approved_claims($operation = NULL)
    {
        if (!$this->session->userdata('user_data')){
            redirect('user','location');
        }

        if($operation == NULL)
        {
            $message = '';
        }
        else
        {
            if($operation == 'landaddsuccess')
            {
                $message = 'Add success';
            }
            else if($operation == 'norecord')
            {
                $message = 'No record found';
            }
            else if($operation == 'landupdatesuccess')
            {
                $message = 'Update success';
            }
            else
            {
                $message = '';
            }
        }

        $landRegList = new Land_class_model();
        $reports = new Reports_model();

        $data = array(
            'system_message' => $message,
            'access_level' => $this->accessLevel(),
            'page_title' => $this->title(),
            'landclass' => $reports->getLandClass(),
            'apprv_claims' => $reports->report6()
        );

        $this->load->view('header');
        $this->load->view('navbar',$data);
        $this->load->view('sidebar');
        $this->load->view('dashboard_list7',$data);
        $this->load->view('footer');
    }

    public function area_approved($operation = NULL)
    {
        if (!$this->session->userdata('user_data')){
            redirect('user','location');
        }

        if($operation == NULL)
        {
            $message = '';
        }
        else
        {
            if($operation == 'landaddsuccess')
            {
                $message = 'Add success';
            }
            else if($operation == 'norecord')
            {
                $message = 'No record found';
            }
            else if($operation == 'landupdatesuccess')
            {
                $message = 'Update success';
            }
            else
            {
                $message = '';
            }
        }

        $landRegList = new Land_class_model();
        $reports = new Reports_model();

        $data = array(
            'system_message' => $message,
            'access_level' => $this->accessLevel(),
            'page_title' => $this->title(),
            'landclass' => $reports->getLandClass(),
            'apprv_claims' => $reports->report7()
        );

        $this->load->view('header');
        $this->load->view('navbar',$data);
        $this->load->view('sidebar');
        $this->load->view('dashboard_list8',$data);
        $this->load->view('footer');
    }

    public function area_partial_paid($operation = NULL)
    {
        if (!$this->session->userdata('user_data')){
            redirect('user','location');
        }

        if($operation == NULL)
        {
            $message = '';
        }
        else
        {
            if($operation == 'landaddsuccess')
            {
                $message = 'Add success';
            }
            else if($operation == 'norecord')
            {
                $message = 'No record found';
            }
            else if($operation == 'landupdatesuccess')
            {
                $message = 'Update success';
            }
            else
            {
                $message = '';
            }
        }

        $landRegList = new Land_class_model();
        $reports = new Reports_model();

        $data = array(
            'system_message' => $message,
            'access_level' => $this->accessLevel(),
            'page_title' => $this->title(),
            'landclass' => $reports->getLandClass(),
            'apprv_claims' => $reports->report8()
        );

        $this->load->view('header');
        $this->load->view('navbar',$data);
        $this->load->view('sidebar');
        $this->load->view('dashboard_list9',$data);
        $this->load->view('footer');
    }

    public function area_paid_under_ao2($operation = NULL)
    {
        if (!$this->session->userdata('user_data')){
            redirect('user','location');
        }

        if($operation == NULL)
        {
            $message = '';
        }
        else
        {
            if($operation == 'landaddsuccess')
            {
                $message = 'Add success';
            }
            else if($operation == 'norecord')
            {
                $message = 'No record found';
            }
            else if($operation == 'landupdatesuccess')
            {
                $message = 'Update success';
            }
            else
            {
                $message = '';
            }
        }

        $landRegList = new Land_class_model();
        $reports = new Reports_model();

        $data = array(
            'system_message' => $message,
            'access_level' => $this->accessLevel(),
            'page_title' => $this->title(),
            'landclass' => $reports->getLandClass(),
            'apprv_claims' => $reports->report9()
        );

        $this->load->view('header');
        $this->load->view('navbar',$data);
        $this->load->view('sidebar');
        $this->load->view('dashboard_list10',$data);
        $this->load->view('footer');
    }

    public function area_approved_claims($operation = NULL)
    {
        if (!$this->session->userdata('user_data')){
            redirect('user','location');
        }

        if($operation == NULL)
        {
            $message = '';
        }
        else
        {
            if($operation == 'landaddsuccess')
            {
                $message = 'Add success';
            }
            else if($operation == 'norecord')
            {
                $message = 'No record found';
            }
            else if($operation == 'landupdatesuccess')
            {
                $message = 'Update success';
            }
            else
            {
                $message = '';
            }
        }

        $landRegList = new Land_class_model();
        $reports = new Reports_model();

        $data = array(
            'system_message' => $message,
            'access_level' => $this->accessLevel(),
            'page_title' => $this->title(),
            'landclass' => $reports->getLandClass(),
            'apprv_claims' => $reports->report10()
        );

        $this->load->view('header');
        $this->load->view('navbar',$data);
        $this->load->view('sidebar');
        $this->load->view('dashboard_list11',$data);
        $this->load->view('footer');
    }

    public function area_pending($operation = NULL)
    {
        if (!$this->session->userdata('user_data')){
            redirect('user','location');
        }

        if($operation == NULL)
        {
            $message = '';
        }
        else
        {
            if($operation == 'landaddsuccess')
            {
                $message = 'Add success';
            }
            else if($operation == 'norecord')
            {
                $message = 'No record found';
            }
            else if($operation == 'landupdatesuccess')
            {
                $message = 'Update success';
            }
            else
            {
                $message = '';
            }
        }

        $landRegList = new Land_class_model();
        $reports = new Reports_model();

        $data = array(
            'system_message' => $message,
            'access_level' => $this->accessLevel(),
            'page_title' => $this->title(),
            'landclass' => $reports->getLandClass(),
            'apprv_claims' => $reports->report11()
        );

        $this->load->view('header');
        $this->load->view('navbar',$data);
        $this->load->view('sidebar');
        $this->load->view('dashboard_list121',$data);
        $this->load->view('footer');
    }
}