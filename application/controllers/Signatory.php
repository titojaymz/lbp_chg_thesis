<?php

/**
 * Created by PhpStorm.
 * User: joseffriedrichbaldo
 * Date: 2/21/2020
 * Time: 3:47 PM
 */
class Signatory extends CI_Controller
{
    public function title()
    {
        return 'Signatories';
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
        $this->load->view('signatory_list',$data);
        $this->load->view('footer');
    }

    public function signatoryadd()
    {
        if (!$this->session->userdata('user_data')){
            redirect('user','location');
        }

        $user_id = $this->session->userdata('user_id');

        $landRegList = new Signatory_model();

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
            $this->load->view('signatory_add',$data);
            $this->load->view('footer');
        }
        else
        {
            $x_signatory_position = $this->input->post('x_signatory_position');
            $x_signatory_name = $this->input->post('x_signatory_name');

            $insertResult = $landRegList->create($x_signatory_position,$x_signatory_name);
            if($insertResult > 0)
            {
                redirect('signatory/index/landaddsuccess','location');
            }
        }
    }

    public function signatoryedit($signatory_id)
    {
        if (!$this->session->userdata('user_data')){
            redirect('user','location');
        }

        $user_id = $this->session->userdata('user_id');

        $landRegList = new Signatory_model();

        $this->validatelandregistrationadd();

        if (!$this->form_validation->run())
        {
            $data = array(
                'system_message' => '',
                'access_level' => $this->accessLevel(),
                'position_data' => $landRegList->getSignatoryDetail($signatory_id),
                'page_title' => $this->title()
            );

            $this->load->view('header');
            $this->load->view('navbar',$data);
            $this->load->view('sidebar');
            $this->load->view('signatory_edit.php',$data);
            $this->load->view('footer');
        }
        else
        {
            $x_signatory_position = $this->input->post('x_signatory_position');
            $x_signatory_name = $this->input->post('x_signatory_name');

            $insertResult = $landRegList->update($signatory_id,$x_signatory_position,$x_signatory_name);
            if($insertResult > 0)
            {
                redirect('signatory/index/landaddsuccess','location');
            }
        }
    }

    protected function validatelandregistrationadd()
    {
        $config = array(
            array(
                'field'   => 'x_signatory_position',
                'label'   => 'Signatory position',
                'rules'   => 'required'
            ),
            array(
                'field'   => 'x_signatory_name',
                'label'   => 'Signatory name',
                'rules'   => 'required'
            )
        );

        return $this->form_validation->set_rules($config);
    }

    public function rendersignatorylist() {

        $Psgc = new Signatory_model();

        $results_array = $Psgc->getSignatories();
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