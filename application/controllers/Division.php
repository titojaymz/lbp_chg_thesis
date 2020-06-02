<?php

/**
 * Created by PhpStorm.
 * User: joseffriedrichbaldo
 * Date: 6/1/2020
 * Time: 8:23 PM
 */
class Division extends CI_Controller
{
    public function title()
    {
        return 'Division';
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

        $landRegList = new Signatory_model();

        $data = array(
            'system_message' => $message,
            'access_level' => $this->accessLevel(),
            'page_title' => $this->title()
        );

        $this->load->view('header');
        $this->load->view('navbar',$data);
        $this->load->view('sidebar');
        $this->load->view('division_list',$data);
        $this->load->view('footer');
    }

    public function renderdivisionlist() {

        $Psgc = new Division_model();

        $results_array = $Psgc->getAllDivision();
        $nRows = $results_array[1];  //numRows

        $json=json_encode( $results_array[0] );
        // alert($json);
        // $nRows= $results_array1;   /* specific search then how many match */

        header('Content-Type: application/json'); //tell the broswer JSON is coming
        if (isset($_REQUEST['rowCount']) )  { //Means we're using bootgrid library
            $rows=$_REQUEST['rowCount'];
            $current=$_REQUEST['current'];
            echo "{\"current\":$current,\"rowCount\":$rows,\"rows\":".$json.",\"total\":$nRows}";
        } else {
            echo $json;  //Just plain vanilla JSON output
        }
        exit;
    }

    public function add()
    {
        if (!$this->session->userdata('user_data')){
            redirect('user','location');
        }

        $user_id = $this->session->userdata('user_id');

        $landRegList = new Division_model();

        $this->validatelandregistrationadd();

        if (!$this->form_validation->run())
        {
            $data = array(
                'system_message' => '',
                'access_level' => $this->accessLevel(),
                'page_title' => $this->title()
            );

            $this->load->view('header');
            $this->load->view('navbar',$data);
            $this->load->view('sidebar');
            $this->load->view('division_add',$data);
            $this->load->view('footer');
        }
        else
        {
            $x_signatory_position = $this->input->post('x_division_name');
            $x_signatory_name = $this->input->post('x_division_short_name');

            $insertResult = $landRegList->insert($x_signatory_position,$x_signatory_name);
            if($insertResult > 0)
            {
                redirect('division/index/landaddsuccess','location');
            }
        }
    }

    public function edit($signatory_id)
    {
        if (!$this->session->userdata('user_data')){
            redirect('user','location');
        }

        $user_id = $this->session->userdata('user_id');

        $landRegList = new Division_model();

        $this->validatelandregistrationadd();

        if (!$this->form_validation->run())
        {
            $data = array(
                'system_message' => '',
                'access_level' => $this->accessLevel(),
                'position_data' => $landRegList->getDivision($signatory_id),
                'page_title' => $this->title()
            );

            $this->load->view('header');
            $this->load->view('navbar',$data);
            $this->load->view('sidebar');
            $this->load->view('division_edit',$data);
            $this->load->view('footer');
        }
        else
        {
            $x_signatory_position = $this->input->post('x_division_name');
            $x_signatory_name = $this->input->post('x_division_short_name');

            $insertResult = $landRegList->update($x_signatory_position,$x_signatory_name,$signatory_id);
            if($insertResult > 0)
            {
                redirect('division/index/landaddsuccess','location');
            }
        }
    }

    protected function validatelandregistrationadd()
    {
        $config = array(
            array(
                'field'   => 'x_division_name',
                'label'   => 'Division',
                'rules'   => 'required'
            ),
            array(
                'field'   => 'x_division_short_name',
                'label'   => 'Short name',
                'rules'   => 'required'
            )
        );

        return $this->form_validation->set_rules($config);
    }
}