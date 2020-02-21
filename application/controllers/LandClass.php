<?php

/**
 * Created by PhpStorm.
 * User: joseffriedrichbaldo
 * Date: 2/21/2020
 * Time: 3:47 PM
 */
class LandClass extends CI_Controller
{
    public function title()
    {
        return 'Land classification';
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

        $landRegList = new Land_class_model();

        $data = array(
            'system_message' => $message,
            'access_level' => $this->accessLevel(),
            'page_title' => $this->title()
        );

        $this->load->view('header');
        $this->load->view('navbar',$data);
        $this->load->view('sidebar');
        $this->load->view('landclass_list',$data);
        $this->load->view('footer');
    }

    public function landclassnadd()
    {
        if (!$this->session->userdata('user_data')){
            redirect('user','location');
        }

        $user_id = $this->session->userdata('user_id');

        $landRegList = new Land_class_model();

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
            $this->load->view('landclass_add',$data);
            $this->load->view('footer');
        }
        else
        {
            $x_land_class_code = $this->input->post('x_land_class_code');
            $x_land_class_name = $this->input->post('x_land_class_name');

            $insertResult = $landRegList->create($x_land_class_code,$x_land_class_name);
            if($insertResult > 0)
            {
                redirect('landclass/index/landaddsuccess','location');
            }
        }
    }

    public function landclassedit($land_class_id)
    {
        if (!$this->session->userdata('user_data')){
            redirect('user','location');
        }

        $user_id = $this->session->userdata('user_id');

        $landRegList = new Land_class_model();

        $this->validatelandregistrationadd();

        if (!$this->form_validation->run())
        {
            $data = array(
                'system_message' => '',
                'access_level' => $this->accessLevel(),
                'land_class_data' => $landRegList->getLandClassDetail($land_class_id),
                'page_title' => $this->title()
            );

            $this->load->view('header');
            $this->load->view('navbar',$data);
            $this->load->view('sidebar');
            $this->load->view('landclass_edit.php',$data);
            $this->load->view('footer');
        }
        else
        {
            $position_code = $this->input->post('x_land_class_code');
            $position_name = $this->input->post('x_land_class_name');

            $insertResult = $landRegList->update($land_class_id,$position_code,$position_name);
            if($insertResult > 0)
            {
                redirect('landclass/index/landaddsuccess','location');
            }
        }
    }

    protected function validatelandregistrationadd()
    {
        $config = array(
            array(
                'field'   => 'x_land_class_code',
                'label'   => 'Land classification code',
                'rules'   => 'required'
            ),
            array(
                'field'   => 'x_land_class_name',
                'label'   => 'Land classification name',
                'rules'   => 'required'
            )
        );

        return $this->form_validation->set_rules($config);
    }

    public function renderlandclasslist() {

        $Psgc = new Land_class_model();

        $results_array = $Psgc->getLandClass();
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