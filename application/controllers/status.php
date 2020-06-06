<?php

/**
 * Created by PhpStorm.
 * User: joseffriedrichbaldo
 * Date: 2/21/2020
 * Time: 3:47 PM
 */
class status extends CI_Controller
{
    public function title()
    {
        return 'Claim Folders Status';
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

        $Status_model = new Status_model();

        $data = array(
            'system_message' => $message,
            'access_level' => $this->accessLevel(),
            'page_title' => $this->title()
        );

        $this->load->view('header');
        $this->load->view('navbar',$data);
        $this->load->view('sidebar');
        $this->load->view('status_list',$data);
        $this->load->view('footer');
    }

    public function statusadd()
    {
        if (!$this->session->userdata('user_data')){
            redirect('user','location');
        }

        $user_id = $this->session->userdata('user_id');

        $landRegList = new Status_model();

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
            $this->load->view('status_add',$data);
            $this->load->view('footer');
        }
        else
        {
            $x_status_name = $this->input->post('x_status_name');

            $insertResult = $landRegList->create($x_status_name);
            if($insertResult > 0)
            {
                redirect('status/index/landaddsuccess');
            }
        }
    }

    public function statusedit($id)
    {
        if (!$this->session->userdata('user_data')){
            redirect('user','location');
        }

        $user_id = $this->session->userdata('user_id');

        $landRegList = new Status_model();

        $this->validatelandregistrationadd();

        if (!$this->form_validation->run())
        {
            $data = array(
                'system_message' => '',
                'access_level' => $this->accessLevel(),
                'page_title' => $this->title(),
                'status_data' => $landRegList->getStatusDetail($id)
            );

            $this->load->view('header');
            $this->load->view('navbar',$data);
            $this->load->view('sidebar');
            $this->load->view('status_edit',$data);
            $this->load->view('footer');
        }
        else
        {
            $x_status_name = $this->input->post('x_status_name');

            $insertResult = $landRegList->update($id,$x_status_name);
            if($insertResult > 0)
            {
                redirect('status/index/landupdatesuccess');
            }
        }
    }

    protected function validatelandregistrationadd()
    {
        $config = array(
            array(
                'field'   => 'x_status_name',
                'label'   => 'Status',
                'rules'   => 'required'
            )
        );

        return $this->form_validation->set_rules($config);
    }

    public function renderlandclasslist() {

        $Psgc = new Status_model();

        $results_array = $Psgc->getStatus();
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
}