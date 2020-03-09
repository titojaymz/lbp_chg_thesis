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

        $user_id = $this->session->userdata('user_id');

        $landRegList = new Landregistration_model();
        $landclass = new Land_class_model();

        $this->validatelandregistrationadd();

        if (!$this->form_validation->run())
        {
            $data = array(
                'system_message' => '',
                'access_level' => $this->accessLevel(),
                'landRegList' => $landRegList->getAllLandRegistration(),
                'prov_data' => $landRegList->getProvinces(),
                'lib_status' => $landRegList->getStatus(),
                'lib_regions' => $landRegList->getRegions(),
                'landclass' => $landclass->getLandClassSelect()
            );

            $this->load->view('header');
            $this->load->view('navbar',$data);
            $this->load->view('sidebar');
            $this->load->view('landregistrationadd',$data);
            $this->load->view('footer');
        }
        else
        {
            $x_date_recvd_dar = $this->input->post('x_date_recvd_dar');
            $x_claim_fld_no = $this->input->post('x_claim_fld_no');
            $x_name_land_owner = $this->input->post('x_name_land_owner');
			$x_Processor_name = $this->input->post('x_Processor_name');
            $x_no_fbs = $this->input->post('x_no_fbs');
            $x_area_per_title = $this->input->post('x_area_per_title');
            $x_area_acqrd = $this->input->post('x_area_acqrd');
            $x_title_no = $this->input->post('x_title_no');
            $x_area_aprvd = $this->input->post('x_area_aprvd');
            $x_easement = $this->input->post('x_easement');
            $x_lot_no = $this->input->post('x_lot_no');
            $x_land_use = $this->input->post('x_land_use');
            $x_region_id = $this->input->post('x_region_id');
            $x_prov_id = $this->input->post('x_prov_id');
            $x_muni_city_id = $this->input->post('x_muni_city_id');
            $x_brgy_id = $this->input->post('x_brgy_id');
            $x_land_val_total_land_value = $this->input->post('x_land_val_total_land_value');
            $x_land_val_cash = $this->input->post('x_land_val_cash');
            $x_land_val_bond = $this->input->post('x_land_val_bond');
            $x_status_id = $this->input->post('x_status_id');
            $x_pending_division = $this->input->post('x_pending_division');
            $x_date_mov_cvpf = $this->input->post('x_date_mov_cvpf');
            $x_date_cod = $this->input->post('x_date_cod');
            $x_date_last_ammended = $this->input->post('x_date_last_ammended');
            $x_date_returned = $this->input->post('x_date_returned');
            $x_bond_serial_no = $this->input->post('x_bond_serial_no');
            $x_status_2 = $this->input->post('x_status_2');
            $x_less_rel_total = $this->input->post('x_less_rel_total');
            $x_less_rel_cash = $this->input->post('x_less_rel_cash');
            $x_less_rel_bond = $this->input->post('x_less_rel_bond');
            $x_less_rel_bond_ao2 = $this->input->post('x_less_rel_bond_ao2');
            $x_end_bal_total = $this->input->post('x_end_bal_total');
            $x_end_bal_cash = $this->input->post('x_end_bal_cash');
            $x_end_bal_bond = $this->input->post('x_end_bal_bond');

            $insertResult = $landRegList->addLandRegistration($x_date_recvd_dar,$x_claim_fld_no,$x_name_land_owner,$x_Processor_name,$x_no_fbs,$x_area_per_title,$x_area_acqrd,$x_title_no,$x_area_aprvd,
                                                $x_easement,$x_lot_no,$x_land_use,$x_region_id,$x_prov_id,$x_muni_city_id,$x_brgy_id,$x_land_val_total_land_value,$x_land_val_cash,
                                                $x_land_val_bond,$x_status_id,$x_pending_division,$x_date_mov_cvpf,$x_date_cod,$x_date_last_ammended,$x_date_returned,
                                                $x_bond_serial_no,$x_status_2,$x_less_rel_total,$x_less_rel_cash,$x_less_rel_bond,$x_less_rel_bond_ao2,$x_end_bal_total,
                                                $x_end_bal_cash,$x_end_bal_bond,$user_id);
            if($insertResult == 1)
            {
                redirect('landregistration/index/landaddsuccess','location');
            }
        }
    }

    protected function validatelandregistrationadd()
    {
        $config = array(
            array(
                'field'   => 'x_date_recvd_dar',
                'label'   => 'Date Received from DAR',
                'rules'   => 'required'
            ),
            array(
                'field'   => 'x_claim_fld_no',
                'label'   => 'Claim folder number',
                'rules'   => 'required'
            ),
            array(
                'field'   => 'x_name_land_owner',
                'label'   => 'Name of land owner',
                'rules'   => 'required'
            ),
            array(
                'field'   => 'x_no_fbs',
                'label'   => 'No. of FBs',
                'rules'   => 'required|numeric'
            ),
            array(
                'field'   => 'x_area_per_title',
                'label'   => 'Area per title',
                'rules'   => 'required|numeric'
            ),
            array(
                'field'   => 'x_area_acqrd',
                'label'   => 'Area acquired',
                'rules'   => 'required|numeric'
            ),
            array(
                'field'   => 'x_title_no',
                'label'   => 'Title number',
                'rules'   => 'required|alpha_dash'
            ),
			
            /*array(
                'field'   => 'x_area_aprvd',
                'label'   => 'Area approved',
                'rules'   => 'required|numeric'
            ),
			
            array(
                'field'   => 'x_easement',
                'label'   => 'Easement',
                'rules'   => 'required|numeric'
            ),
            array(
                'field'   => 'x_lot_no',
                'label'   => 'Lot number',
                'rules'   => 'required'
            ),*/
            array(
                'field'   => 'x_land_use',
                'label'   => 'Land use',
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
			/*
            array(
                'field'   => 'x_land_val_total_land_value',
                'label'   => 'Total land value (Land valuation)',
                'rules'   => 'required|numeric'
            ),
            array(
                'field'   => 'x_land_val_cash',
                'label'   => 'Cash (Land valuation)',
                'rules'   => 'required|numeric'
            ),
            array(
                'field'   => 'x_land_val_bond',
                'label'   => 'Bond (Land valuation)',
                'rules'   => 'required|numeric'
            ), 
			
            array(
                'field'   => 'x_status_id',
                'label'   => 'Status',
                'rules'   => 'required'
            ),
            array(
                'field'   => 'x_pending_division',
                'label'   => 'Pending division',
                'rules'   => 'required'
            ),
            array(
                'field'   => 'x_date_mov_cvpf',
                'label'   => 'Date of MOV/CVPF',
                'rules'   => 'required'
            ),
            array(
                'field'   => 'x_date_cod',
                'label'   => 'Date of COD',
                'rules'   => 'required'
            ),
            array(
                'field'   => 'x_date_last_ammended',
                'label'   => 'Date of last ammended',
                'rules'   => 'required'
            ),
            array(
                'field'   => 'x_date_returned',
                'label'   => 'Date of Returned',
                'rules'   => 'required'
            ),
            array(
                'field'   => 'x_bond_serial_no',
                'label'   => 'Bond serial number',
                'rules'   => 'required|alpha_dash'
            ),
            array(
                'field'   => 'x_status_2',
                'label'   => 'Status/Remarks',
                'rules'   => 'required'
            ),
            array(
                'field'   => 'x_less_rel_total',
                'label'   => 'Total (Less: Releases)',
                'rules'   => 'required|numeric'
            ),
            array(
                'field'   => 'x_less_rel_cash',
                'label'   => 'Cash (Less: Releases)',
                'rules'   => 'required|numeric'
            ),
            array(
                'field'   => 'x_less_rel_bond',
                'label'   => 'Bond (Less: Releases)',
                'rules'   => 'required|numeric'
            ),
            array(
                'field'   => 'x_less_rel_bond_ao2',
                'label'   => 'Bond AO2 (Less: Releases)',
                'rules'   => 'required|numeric'
            ),
            array(
                'field'   => 'x_end_bal_total',
                'label'   => 'Total (Ending balances)',
                'rules'   => 'required|numeric'
            ),
            array(
                'field'   => 'x_end_bal_cash',
                'label'   => 'Cash (Ending balances)',
                'rules'   => 'required|numeric'
            ),
            array(
                'field'   => 'x_end_bal_bond',
                'label'   => 'Bond (Ending balances)',
                'rules'   => 'required|numeric'
            ),
            array(
                'field'   => 'x_land_class_id',
                'label'   => 'Land Classification',
                'rules'   => 'required'
            ),
            array(
                'field'   => 'x_land_class_id',
                'label'   => 'Land Classification',
                'rules'   => 'required'
            ) */
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

    public function landregistrationedit($id = NULL)
    {
        if (!$this->session->userdata('user_data')){
            redirect('user','location');
        }

        if($id == NULL)
        {
            redirect('landregistration/index/norecord','location');
        }

        $user_id = $this->session->userdata('user_id');

        $landRegList = new Landregistration_model();

        $landclass = new Land_class_model();

        $landData = $landRegList->getDetailsById($id);

        $this->validatelandregistrationadd();

        if (!$this->form_validation->run())
        {
            $data = array(
                'system_message' => '',
                'access_level' => $this->accessLevel(),
                'landRegList' => $landRegList->getAllLandRegistration(),
                'prov_data' => $landRegList->getProvinces(),
                'lib_status' => $landRegList->getStatus(),
                'landregistrationdata' => $landData,
                'lib_regions' => $landRegList->getRegions(),
                'landclass' => $landclass->getLandClassSelect()
            );

            $this->load->view('header');
            $this->load->view('navbar',$data);
            $this->load->view('sidebar');
            $this->load->view('landregistrationedit',$data);
            $this->load->view('footer');
        }
        else
        {
            if($landData['date_recvd_dar'] == $this->input->post('x_date_recvd_dar'))
            {
                $x_date_recvd_dar = $landData['date_recvd_dar'];
            }
            else
            {
                $x_date_recvd_dar = $this->input->post('x_date_recvd_dar');
            }

            if($landData['claim_fld_no'] == $this->input->post('x_claim_fld_no'))
            {
                $x_claim_fld_no = $landData['claim_fld_no'];
            }
            else
            {
                $x_claim_fld_no = $this->input->post('x_claim_fld_no');
            }

            if($landData['name_land_owner'] == $this->input->post('x_name_land_owner'))
            {
                $x_name_land_owner = $landData['name_land_owner'];
            }
            else
            {
                $x_name_land_owner = $this->input->post('x_name_land_owner');
            }

            if($landData['Processor_name'] == $this->input->post('x_Processor_name'))
            {
                $x_Processor_name = $landData['Processor_name'];
            }
            else
            {
                $x_Processor_name = $this->input->post('x_Processor_name');
            }

            if($landData['no_fbs'] == $this->input->post('x_no_fbs'))
            {
                $x_no_fbs = $landData['no_fbs'];
            }
            else
            {
                $x_no_fbs = $this->input->post('x_no_fbs');
            }

            if($landData['area_per_title'] == $this->input->post('x_area_per_title'))
            {
                $x_area_per_title = $landData['area_per_title'];
            }
            else
            {
                $x_area_per_title = $this->input->post('x_area_per_title');
            }

            if($landData['area_acqrd'] == $this->input->post('x_area_acqrd'))
            {
                $x_area_acqrd = $landData['area_acqrd'];
            }
            else
            {
                $x_area_acqrd = $this->input->post('x_area_acqrd');
            }

            if($landData['title_no'] == $this->input->post('x_title_no'))
            {
                $x_title_no = $landData['title_no'];
            }
            else
            {
                $x_title_no = $this->input->post('x_title_no');
            }

            if($landData['area_aprvd'] == $this->input->post('x_area_aprvd'))
            {
                $x_area_aprvd = $landData['area_aprvd'];
            }
            else
            {
                $x_area_aprvd = $this->input->post('x_area_aprvd');
            }

            if($landData['easementt'] == $this->input->post('x_easement'))
            {
                $x_easement = $landData['easementt'];
            }
            else
            {
                $x_easement = $this->input->post('x_easement');
            }

            if($landData['lot_no'] == $this->input->post('x_lot_no'))
            {
                $x_lot_no = $landData['lot_no'];
            }
            else
            {
                $x_lot_no = $this->input->post('x_lot_no');
            }

            if($landData['land_use'] == $this->input->post('x_land_use'))
            {
                $x_land_use = $landData['land_use'];
            }
            else
            {
                $x_land_use = $this->input->post('x_land_use');
            }

            if($landData['region_id'] == $this->input->post('x_region_id'))
            {
                $x_region_id = $landData['region_id'];
            }
            else
            {
                $x_region_id = $this->input->post('x_region_id');
            }

            if($landData['prov_id'] == $this->input->post('x_prov_id'))
            {
                $x_prov_id = $landData['prov_id'];
            }
            else
            {
                $x_prov_id = $this->input->post('x_prov_id');
            }

            if($landData['muni_city_id'] == $this->input->post('x_muni_city_id'))
            {
                $x_muni_city_id = $landData['muni_city_id'];
            }
            else
            {
                $x_muni_city_id = $this->input->post('x_muni_city_id');
            }

            if($landData['brgy_id'] == $this->input->post('x_brgy_id'))
            {
                $x_brgy_id = $landData['brgy_id'];
            }
            else
            {
                $x_brgy_id = $this->input->post('x_brgy_id');
            }

            if($landData['land_val_total_land_value'] == $this->input->post('x_land_val_total_land_value'))
            {
                $x_land_val_total_land_value = $landData['land_val_total_land_value'];
            }
            else
            {
                $x_land_val_total_land_value = $this->input->post('x_land_val_total_land_value');
            }

            if($landData['land_val_cash'] == $this->input->post('x_land_val_cash'))
            {
                $x_land_val_cash = $landData['land_val_cash'];
            }
            else
            {
                $x_land_val_cash = $this->input->post('x_land_val_cash');
            }

            if($landData['land_val_bond'] == $this->input->post('x_land_val_bond'))
            {
                $x_land_val_bond = $landData['land_val_bond'];
            }
            else
            {
                $x_land_val_bond = $this->input->post('x_land_val_bond');
            }

            if($landData['status_id'] == $this->input->post('x_status_id'))
            {
                $x_status_id = $landData['status_id'];
            }
            else
            {
                $x_status_id = $this->input->post('x_status_id');
            }

            if($landData['pending_division'] == $this->input->post('x_pending_division'))
            {
                $x_pending_division = $landData['pending_division'];
            }
            else
            {
                $x_pending_division = $this->input->post('x_pending_division');
            }

            if($landData['date_mov_cvpf'] == $this->input->post('x_date_mov_cvpf'))
            {
                $x_date_mov_cvpf = $landData['date_mov_cvpf'];
            }
            else
            {
                $x_date_mov_cvpf = $this->input->post('x_date_mov_cvpf');
            }

            if($landData['date_cod'] == $this->input->post('x_date_cod'))
            {
                $x_date_cod = $landData['date_cod'];
            }
            else
            {
                $x_date_cod = $this->input->post('x_date_cod');
            }

            if($landData['date_last_ammended'] == $this->input->post('x_date_last_ammended'))
            {
                $x_date_last_ammended = $landData['date_last_ammended'];
            }
            else
            {
                $x_date_last_ammended = $this->input->post('x_date_last_ammended');
            }

            if($landData['date_returned'] == $this->input->post('x_date_returned'))
            {
                $x_date_returned = $landData['date_returned'];
            }
            else
            {
                $x_date_returned = $this->input->post('x_date_returned');
            }

            if($landData['bond_serial_no'] == $this->input->post('x_bond_serial_no'))
            {
                $x_bond_serial_no = $landData['bond_serial_no'];
            }
            else
            {
                $x_bond_serial_no = $this->input->post('x_bond_serial_no');
            }

            if($landData['status2'] == $this->input->post('x_status_2'))
            {
                $x_status_2 = $landData['status2'];
            }
            else
            {
                $x_status_2 = $this->input->post('x_status_2');
            }

            if($landData['less_rel_total'] == $this->input->post('x_less_rel_total'))
            {
                $x_less_rel_total = $landData['less_rel_total'];
            }
            else
            {
                $x_less_rel_total = $this->input->post('x_less_rel_total');
            }

            if($landData['less_rel_cash'] == $this->input->post('x_less_rel_cash'))
            {
                $x_less_rel_cash = $landData['less_rel_cash'];
            }
            else
            {
                $x_less_rel_cash = $this->input->post('x_less_rel_cash');
            }

            if($landData['less_rel_bond'] == $this->input->post('x_less_rel_bond'))
            {
                $x_less_rel_bond = $landData['less_rel_bond'];
            }
            else
            {
                $x_less_rel_bond = $this->input->post('x_less_rel_bond');
            }

            if($landData['less_rel_bond_ao2'] == $this->input->post('x_less_rel_bond_ao2'))
            {
                $x_less_rel_bond_ao2 = $landData['less_rel_bond_ao2'];
            }
            else
            {
                $x_less_rel_bond_ao2 = $this->input->post('x_less_rel_bond_ao2');
            }

            if($landData['end_bal_total'] == $this->input->post('x_end_bal_total'))
            {
                $x_end_bal_total = $landData['end_bal_total'];
            }
            else
            {
                $x_end_bal_total = $this->input->post('x_end_bal_total');
            }

            if($landData['end_bal_cash'] == $this->input->post('x_end_bal_cash'))
            {
                $x_end_bal_cash = $landData['end_bal_cash'];
            }
            else
            {
                $x_end_bal_cash = $this->input->post('x_end_bal_cash');
            }

            if($landData['end_bal_bond'] == $this->input->post('x_end_bal_bond'))
            {
                $x_end_bal_bond = $landData['end_bal_bond'];
            }
            else
            {
                $x_end_bal_bond = $this->input->post('x_end_bal_bond');
            }

            if($landData['land_class_id'] == $this->input->post('x_land_class_id'))
            {
                $x_land_class_id = $landData['land_class_id'];
            }
            else
            {
                $x_land_class_id = $this->input->post('x_land_class_id');
            }

            // echo the array below to view posted data
            $postData = array(
                $id,
                $x_date_recvd_dar,
                $x_claim_fld_no,
                $x_name_land_owner,
				$x_Processor_name,
                $x_no_fbs,
                $x_area_per_title,
                $x_area_acqrd,
                $x_title_no,
                $x_area_aprvd,
                $x_easement,
                $x_lot_no,
                $x_land_use,
                $x_region_id,
                $x_prov_id,
                $x_muni_city_id,
                $x_brgy_id,
                $x_land_val_total_land_value,
                $x_land_val_cash,
                $x_land_val_bond,
                $x_status_id,
                $x_pending_division,
                $x_date_mov_cvpf,
                $x_date_cod,
                $x_date_last_ammended,
                $x_date_returned,
                $x_bond_serial_no,
                $x_status_2,
                $x_less_rel_total,
                $x_less_rel_cash,
                $x_less_rel_bond,
                $x_less_rel_bond_ao2,
                $x_end_bal_total,
                $x_end_bal_cash,
                $x_end_bal_bond,
                $user_id
            );

            $updateResult = $landRegList->updateLandRegistration($id,
                $x_date_recvd_dar,
                $x_claim_fld_no,
                $x_name_land_owner,
				$x_Processor_name,
                $x_no_fbs,
                $x_area_per_title,
                $x_area_acqrd,
                $x_title_no,
                $x_area_aprvd,
                $x_easement,
                $x_lot_no,
                $x_land_use,
                $x_region_id,
                $x_prov_id,
                $x_muni_city_id,
                $x_brgy_id,
                $x_land_val_total_land_value,
                $x_land_val_cash,
                $x_land_val_bond,
                $x_status_id,
                $x_pending_division,
                $x_date_mov_cvpf,
                $x_date_cod,
                $x_date_last_ammended,
                $x_date_returned,
                $x_bond_serial_no,
                $x_status_2,
                $x_less_rel_total,
                $x_less_rel_cash,
                $x_less_rel_bond,
                $x_less_rel_bond_ao2,
                $x_end_bal_total,
                $x_end_bal_cash,
                $x_end_bal_bond,
                $user_id,
                $x_land_class_id);

            if($updateResult == 1)
            {
                redirect('landregistration/index/landupdatesuccess','location');
            }
        }
    }

    public function renderLandRegistration() {

        $VolunteerProfileAdminModel = new Landregistration_model();

        $results_array = $VolunteerProfileAdminModel->getAllLandRegistration();
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