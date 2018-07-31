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

        $operation = $_REQUEST['operation'];
        if($operation <> '')
        {
            $operation = $_REQUEST['operation'];
        }
        else
        {
            $operation = NULL;
        }

        if($operation <> NULL)
        {
            if($operation == 'landaddsuccess')
            {
                $message = 'Add success';
            }
            else
            {
                $message = '';
            }
        }
        else
        {
            $message = '';
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
        else
        {
            $x_date_recvd_dar = $this->input->post('x_date_recvd_dar');
            $x_claim_fld_no = $this->input->post('x_claim_fld_no');
            $x_name_land_owner = $this->input->post('x_name_land_owner');
            $x_no_fbs = $this->input->post('x_no_fbs');
            $x_area_per_title = $this->input->post('x_area_per_title');
            $x_area_acqrd = $this->input->post('x_area_acqrd');
            $x_title_no = $this->input->post('x_title_no');
            $x_area_aprvd = $this->input->post('x_area_aprvd');
            $x_easement = $this->input->post('x_easement');
            $x_lot_no = $this->input->post('x_lot_no');
            $x_land_use = $this->input->post('x_land_use');
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

            $insertResult = $landRegList->addLandRegistration($x_date_recvd_dar,$x_claim_fld_no,$x_name_land_owner,$x_no_fbs,$x_area_per_title,$x_area_acqrd,$x_title_no,$x_area_aprvd,
                                                $x_easement,$x_lot_no,$x_land_use,$x_prov_id,$x_muni_city_id,$x_brgy_id,$x_land_val_total_land_value,$x_land_val_cash,
                                                $x_land_val_bond,$x_status_id,$x_pending_division,$x_date_mov_cvpf,$x_date_cod,$x_date_last_ammended,$x_date_returned,
                                                $x_bond_serial_no,$x_status_2,$x_less_rel_total,$x_less_rel_cash,$x_less_rel_bond,$x_less_rel_bond_ao2,$x_end_bal_total,
                                                $x_end_bal_cash,$x_end_bal_bond,$user_id);
            if($insertResult == 1)
            {
                redirect('landregistration/index/?operation=landaddsuccess','location');
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
                'rules'   => 'required|decimal'
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
            array(
                'field'   => 'x_area_aprvd',
                'label'   => 'Area approved',
                'rules'   => 'required|numeric'
            ),
            array(
                'field'   => 'x_easement',
                'label'   => 'Easement',
                'rules'   => 'required|decimal'
            ),
            array(
                'field'   => 'x_lot_no',
                'label'   => 'Lot number',
                'rules'   => 'required'
            ),
            array(
                'field'   => 'x_land_use',
                'label'   => 'Land use',
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
            array(
                'field'   => 'x_land_val_total_land_value',
                'label'   => 'Total land value (Land valuation)',
                'rules'   => 'required|decimal'
            ),
            array(
                'field'   => 'x_land_val_cash',
                'label'   => 'Cash (Land valuation)',
                'rules'   => 'required|decimal'
            ),
            array(
                'field'   => 'x_land_val_bond',
                'label'   => 'Bond (Land valuation)',
                'rules'   => 'required|decimal'
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
                'rules'   => 'required|decimal'
            ),
            array(
                'field'   => 'x_less_rel_cash',
                'label'   => 'Cash (Less: Releases)',
                'rules'   => 'required|decimal'
            ),
            array(
                'field'   => 'x_less_rel_bond',
                'label'   => 'Bond (Less: Releases)',
                'rules'   => 'required|decimal'
            ),
            array(
                'field'   => 'x_less_rel_bond_ao2',
                'label'   => 'Bond AO2 (Less: Releases)',
                'rules'   => 'required|decimal'
            ),
            array(
                'field'   => 'x_end_bal_total',
                'label'   => 'Total (Ending balances)',
                'rules'   => 'required|decimal'
            ),
            array(
                'field'   => 'x_end_bal_cash',
                'label'   => 'Cash (Ending balances)',
                'rules'   => 'required|decimal'
            ),
            array(
                'field'   => 'x_end_bal_bond',
                'label'   => 'Bond (Ending balances)',
                'rules'   => 'required|decimal'
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

    public function landregistrationedit($id)
    {
        if (!$this->session->userdata('user_data')){
            redirect('user','location');
        }

        $user_id = $this->session->userdata('user_id');

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
            $this->load->view('landregistrationedit',$data);
            $this->load->view('footer');
        }
    }


}