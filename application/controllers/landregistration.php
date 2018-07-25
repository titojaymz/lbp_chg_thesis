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

    public function landregistrationadd()
    {
        if (!$this->session->userdata('user_data')){
            redirect('user','location');
        }

        $landRegList = new Landregistration_model();

        $this->validatelandregistrationadd();

        if (!$this->form_validation->run())
        {
            $data = array(
                'system_message' => '',
                'access_level' => $this->accessLevel(),
                'landRegList' => $landRegList->getAllLandRegistration(),
                'prov_data' => $landRegList->getProvinces(),
                'lib_status' => $landRegList->getStatus()
            );

            $this->load->view('header');
            $this->load->view('navbar',$data);
            $this->load->view('sidebar');
            $this->load->view('landregistrationadd',$data);
            $this->load->view('footer');
        }
    }

    protected function validatelandregistrationadd()
    {
        $config = array(
            array(
                'field'   => 'purpose_trip',
                'label'   => 'Purpose of trip',
                'rules'   => 'required'
            ),
            array(
                'field'   => 'place_travel',
                'label'   => 'Place of travel',
                'rules'   => 'required'
            ),
            array(
                'field'   => 'date_needed_from',
                'label'   => 'Date needed from',
                'rules'   => 'required'
            ),
            array(
                'field'   => 'date_needed_to',
                'label'   => 'Date needed to',
                'rules'   => 'required'
            ),
            array(
                'field'   => 'time_needed_from',
                'label'   => 'Time needed from',
                'rules'   => 'required'
            ),
            array(
                'field'   => 'time_needed_to',
                'label'   => 'Time needed to',
                'rules'   => 'required'
            ),
            array(
                'field'   => 'trf_date_departure',
                'label'   => 'Date of travel departure',
                'rules'   => 'required'
            ),
            array(
                'field'   => 'trf_date_return',
                'label'   => 'Date of travel return',
                'rules'   => 'required'
            ),
            array(
                'field'   => 'trf_purpose_travel',
                'label'   => 'Purpose of travel',
                'rules'   => 'required'
            )
        );

        return $this->form_validation->set_rules($config);
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


}