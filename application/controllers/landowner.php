<?php
/**
 * Created by Josef Friedrich Baldo
 * Date: 24/02/2018
 * Time: 5:04 PM
 */
class landowner extends CI_Controller
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

        $landRegList = new Landregistration_model();

        $data = array(
            'system_message' => $message,
            'access_level' => $this->accessLevel(),
            'landRegList' => $landRegList->getAllLandRegistration($this->session->userdata('user_region')),
            'user_region' => $this->session->userdata('user_region')
        );

        $this->load->view('header');
        $this->load->view('navbar',$data);
        $this->load->view('sidebar');
        $this->load->view('landownerlist',$data);
        $this->load->view('footer');
    }

    public function landowneradd()
    {
        if (!$this->session->userdata('user_data')){
            redirect('user','location');
        }

        $user_id = $this->session->userdata('user_id');

        $landRegList = new Landowner_model();
        $landclass = new Land_class_model();

        $this->validatelandregistrationadd();

        if (!$this->form_validation->run())
        {
            $data = array(
                'system_message' => '',
                'access_level' => $this->accessLevel(),
                // 'landRegList' => $landRegList->getAllLandRegistration($this->session->userdata('user_region')),
                'prov_data' => $landRegList->getProvinces(),
                'lib_status' => $landRegList->getStatus(),
                'lib_regions' => $landRegList->getRegions(),
                'landclass' => $landclass->getLandClassSelect()
            );

            $this->load->view('header');
            $this->load->view('navbar',$data);
            $this->load->view('sidebar');
            $this->load->view('landowneradd',$data);
            $this->load->view('footer');
        }
        else
        {
            $x_lastname = $this->input->post('x_lastname');
            $x_firstname = $this->input->post('x_firstname');
            $x_middlename = $this->input->post('x_middlename');
            $x_extname = $this->input->post('x_extname');
            $x_region_id = $this->input->post('x_region_id');
            $x_prov_id = $this->input->post('x_prov_id');
            $x_muni_city_id = $this->input->post('x_muni_city_id');
            $x_brgy_id = $this->input->post('x_brgy_id');

            $insertResult = $landRegList->addlandowner($x_lastname,$x_firstname,$x_middlename,$x_extname,$x_region_id,$x_prov_id,$x_muni_city_id,$x_brgy_id);
            if($insertResult)
            {
                redirect('landowner/index/landaddsuccess','location');
            }
        }
    }

    protected function validatelandregistrationadd()
    {
        $config = array(
            array(
                'field'   => 'x_lastname',
                'label'   => 'Last name',
                'rules'   => 'required'
            ),
            array(
                'field'   => 'x_firstname',
                'label'   => 'First name',
                'rules'   => 'required'
            ),
            array(
                'field'   => 'x_middlename',
                'label'   => 'Middle name',
                'rules'   => 'required'
            ),
            array(
                'field'   => 'x_extname',
                'label'   => 'Extension name',
                'rules'   => 'required'
            ),
            array(
                'field'   => 'x_region_id',
                'label'   => 'Region',
                'rules'   => 'required'
            ),
            array(
                'field'   => 'x_prov_id',
                'label'   => 'Province',
                'rules'   => 'required'
            ),
            array(
                'field'   => 'x_muni_city_id',
                'label'   => 'Municipality/City',
                'rules'   => 'required'
            ),
            array(
                'field'   => 'x_brgy_id',
                'label'   => 'Barangay',
                'rules'   => 'required'
            ),
        ); 

        return $this->form_validation->set_rules($config);
    }

    public function ajaxProvOpt()
    {
        $region_id = $_REQUEST['region_id'];
        $landRegList = new Landregistration_model();
        $data['prov_list'] = $landRegList->getProvinces($region_id);
        $this->load->view('ajax_prov_opt',$data);
    }

    public function ajaxProvBodyOpt()
    {
        $region_id = $_REQUEST['region_id'];
        $landRegList = new Landregistration_model();
        $data['prov_data'] = $landRegList->getProvinces($region_id);
        $this->load->view('ajax_body_prov_opt',$data);
    }

    public function ajaxCitiesOpt()
    {
        $prov_id = $_REQUEST['prov_id'];
        $landRegList = new Landregistration_model();
        $data['cities_list'] = $landRegList->getCities($prov_id);
        $this->load->view('ajax_cities_opt',$data);
    }

    public function ajaxBrgyOpt()
    {
        $prov_id = $_REQUEST['muni_city_id'];
        $landRegList = new Landregistration_model();
        $data['cities_list'] = $landRegList->getBrgy($prov_id);
        $this->load->view('ajax_brgy_opt',$data);
    }

    public function ajaxbodyProvOpt()
    {
        $landRegList = new Landregistration_model();
        $data['prov_data'] = $landRegList->getProvinces($_REQUEST['region_id']);
        $data['ajax_prov_id'] = $_REQUEST['prov_id'];
        $this->load->view('ajax_body_prov_opt',$data);
    }

    public function ajaxbodyCitiesOpt()
    {
        $landRegList = new Landregistration_model();
        $data['cities_list'] = $landRegList->getCities($_REQUEST['prov_id']);
        $data['ajax_muni_city_id'] = $_REQUEST['muni_city_id'];
        $this->load->view('ajax_body_cities_opt',$data);
    }

    public function ajaxbodyBrgyOpt()
    {
        $landRegList = new Landregistration_model();
        $data['cities_list'] = $landRegList->getBrgy($_REQUEST['muni_city_id']);
        $data['ajax_brgy_id'] = $_REQUEST['brgy_id'];
        $this->load->view('ajax_body_brgy_opt',$data);
    }

    public function landowneredit($id = NULL)
    {
        if (!$this->session->userdata('user_data')){
            redirect('user','location');
        }

        if($id == NULL)
        {
            redirect('landregistration/index/norecord','location');
        }

        $user_id = $this->session->userdata('user_id');

        $landRegList = new Landowner_model();

        $landclass = new Land_class_model();

        $landData = $landRegList->getDetailsById($id);

        $this->validatelandregistrationadd();

        if (!$this->form_validation->run())
        {
            $data = array(
                'system_message' => '',
                'access_level' => $this->accessLevel(),
                // 'landRegList' => $landRegList->getAllLandRegistration(),
                'prov_data' => $landRegList->getProvinces(),
                'lib_status' => $landRegList->getStatus(),
                'landregistrationdata' => $landData,
                'lib_regions' => $landRegList->getRegions(),
                'landclass' => $landclass->getLandClassSelect()
            );

            $this->load->view('header');
            $this->load->view('navbar',$data);
            $this->load->view('sidebar');
            $this->load->view('landowneredit',$data);
            $this->load->view('footer');
        }
        else
        {
            $x_lastname = $this->input->post('x_lastname');
            $x_firstname = $this->input->post('x_firstname');
            $x_middlename = $this->input->post('x_middlename');
            $x_extname = $this->input->post('x_extname');
            $x_region_id = $this->input->post('x_region_id');
            $x_prov_id = $this->input->post('x_prov_id');
            $x_muni_city_id = $this->input->post('x_muni_city_id');
            $x_brgy_id = $this->input->post('x_brgy_id');

            $insertResult = $landRegList->updatelandowner($x_lastname,$x_firstname,$x_middlename,$x_extname,$x_region_id,$x_prov_id,$x_muni_city_id,$x_brgy_id,$id);
            if($insertResult)
            {
                redirect('landowner/index/landupdatesuccess','location');
            }
            else
            {
                redirect('landowner/index/landupdatesuccess','location');
            }
        }
    }

    public function renderLandRegistration() {

        $VolunteerProfileAdminModel = new Landowner_model();

        $results_array = $VolunteerProfileAdminModel->getAllLandOwners();


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

    public function landownerjson()
    {
        header('Content-Type: application/json'); //tell the broswer JSON is coming
        $pms = new Landregistration_model();
        $array = $pms->getLandOwners();
        // print_r($array);
        // die();
        echo json_encode($array);

        exit();
    }
}