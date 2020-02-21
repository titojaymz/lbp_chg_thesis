<?php

/**
 * Created by PhpStorm.
 * User: joseffriedrichbaldo
 * Date: 2/21/2020
 * Time: 3:47 PM
 */
class Position extends CI_Controller
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

        $landRegList = new Psgc_region_model();

        $data = array(
            'system_message' => $message,
            'access_level' => $this->accessLevel()
        );

        $this->load->view('header');
        $this->load->view('navbar',$data);
        $this->load->view('sidebar');
        $this->load->view('position_list',$data);
        $this->load->view('footer');
    }

    public function positionadd()
    {
        if (!$this->session->userdata('user_data')){
            redirect('user','location');
        }

        $user_id = $this->session->userdata('user_id');

        $landRegList = new Position_model();

        $this->validatelandregistrationadd();

        if (!$this->form_validation->run())
        {
            $data = array(
                'system_message' => '',
                'access_level' => $this->accessLevel()
            );

            $this->load->view('header');
            $this->load->view('navbar',$data);
            $this->load->view('sidebar');
            $this->load->view('position_add',$data);
            $this->load->view('footer');
        }
        else
        {
            $position_code = $this->input->post('x_position_code');
            $position_name = $this->input->post('x_position_name');

            $insertResult = $landRegList->create($position_code,$position_name);
            if($insertResult > 0)
            {
                redirect('position/index/landaddsuccess','location');
            }
        }
    }

    public function positionedit($position_id)
    {
        if (!$this->session->userdata('user_data')){
            redirect('user','location');
        }

        $user_id = $this->session->userdata('user_id');

        $landRegList = new Position_model();

        $this->validatelandregistrationadd();

        if (!$this->form_validation->run())
        {
            $data = array(
                'system_message' => '',
                'access_level' => $this->accessLevel(),
                'position_data' => $landRegList->getPositionDetail($position_id)
            );

            $this->load->view('header');
            $this->load->view('navbar',$data);
            $this->load->view('sidebar');
            $this->load->view('position_edit',$data);
            $this->load->view('footer');
        }
        else
        {
            $position_code = $this->input->post('x_position_code');
            $position_name = $this->input->post('x_position_name');

            $insertResult = $landRegList->update($position_id,$position_code,$position_name);
            if($insertResult > 0)
            {
                redirect('position/index/landaddsuccess','location');
            }
        }
    }

    protected function validatelandregistrationadd()
    {
        $config = array(
            array(
                'field'   => 'x_position_code',
                'label'   => 'Position code',
                'rules'   => 'required'
            ),
            array(
                'field'   => 'x_position_name',
                'label'   => 'Position name',
                'rules'   => 'required'
            )
        );

        return $this->form_validation->set_rules($config);
    }

    public function renderpositionlist() {

        $Psgc = new Position_model();

        $results_array = $Psgc->getPositions();
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