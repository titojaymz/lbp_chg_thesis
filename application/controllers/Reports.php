<?php
/**
 * Created by Josef Friedrich Baldo
 * Date: 11/08/2018
 * Time: 08:47
 */
class Reports extends CI_Controller
{
    public function title()
    {
        return 'Reports';
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

    public function index()
    {
        if (!$this->session->userdata('user_data')){
            redirect('user','location');
        }

        redirect('landregistration');
    }

    public function generateMasterlist()
    {
        if (!$this->session->userdata('user_data')){
            redirect('user','location');
        }

        $reportsModel = new Reports_model();

        //LOAD OUR NEW PHPEXCEL LIBRARY
        $this->load->library('excel');

        $excel = new Excel();

        //ACTIVATE WORKSHEET 1
        $excel->setActiveSheetIndex(0)
            ->setCellValue('A1','LANDBANK OF THE PHILIPPINES')
            ->setCellValue('A2','AGRARIAN OPERATIONS CENTER')
            ->setCellValue('A3','Legazpi City');

        $excel->getActiveSheet()->mergeCells('A8:A9');
        $excel->getActiveSheet()->mergeCells('B8:B9');
        $excel->getActiveSheet()->mergeCells('C8:C9');
        $excel->getActiveSheet()->mergeCells('D8:D9');
        $excel->getActiveSheet()->mergeCells('E8:E9');
        $excel->getActiveSheet()->mergeCells('F8:F9');
        $excel->getActiveSheet()->mergeCells('G8:G9');
        $excel->getActiveSheet()->mergeCells('H8:H9');
        $excel->getActiveSheet()->mergeCells('I8:I9');
        $excel->getActiveSheet()->mergeCells('J8:J9');
        $excel->getActiveSheet()->mergeCells('K8:K9');
        $excel->getActiveSheet()->mergeCells('R8:R9');
        $excel->getActiveSheet()->mergeCells('S8:S9');
        $excel->getActiveSheet()->mergeCells('T8:T9');
        $excel->getActiveSheet()->mergeCells('U8:U9');
        $excel->getActiveSheet()->mergeCells('V8:V9');
        $excel->getActiveSheet()->mergeCells('W8:W9');
        $excel->getActiveSheet()->mergeCells('X8:X9');
        $excel->getActiveSheet()->mergeCells('Y8:Y9');
        $excel->getActiveSheet()->mergeCells('Z8:Z9');
        $excel->getActiveSheet()->mergeCells('AA8:AA9');
        $excel->getActiveSheet()->mergeCells('AC8:AF8');
        $excel->getActiveSheet()->mergeCells('AG8:AI8');

        $excel->getActiveSheet()->mergeCells('L8:N8');
        $excel->getActiveSheet()->mergeCells('O8:Q8');

        $excel->getActiveSheet()->getStyle('A8:AA9')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $excel->getActiveSheet()->getStyle('A8:AA9')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);

        $excel->getActiveSheet()->getStyle('AC8:AF8')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $excel->getActiveSheet()->getStyle('AC8:AF8')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);

        $excel->getActiveSheet()->getStyle('AC9:AF9')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $excel->getActiveSheet()->getStyle('AC9:AF9')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);

        $excel->getActiveSheet()->getRowDimension(8)->setRowHeight(13.00);
        $excel->getActiveSheet()->getRowDimension(9)->setRowHeight(13.00);
        $excel->getActiveSheet()->getColumnDimension('A')->setWidth(30.00);
        $excel->getActiveSheet()->getColumnDimension('B')->setWidth(30.00);
        $excel->getActiveSheet()->getColumnDimension('C')->setWidth(30.00);
        $excel->getActiveSheet()->getColumnDimension('D')->setWidth(30.00);
        $excel->getActiveSheet()->getColumnDimension('E')->setWidth(30.00);
        $excel->getActiveSheet()->getColumnDimension('F')->setWidth(30.00);
        $excel->getActiveSheet()->getColumnDimension('G')->setWidth(30.00);
        $excel->getActiveSheet()->getColumnDimension('H')->setWidth(30.00);
        $excel->getActiveSheet()->getColumnDimension('I')->setWidth(30.00);
        $excel->getActiveSheet()->getColumnDimension('J')->setWidth(30.00);
        $excel->getActiveSheet()->getColumnDimension('K')->setWidth(30.00);
        $excel->getActiveSheet()->getColumnDimension('L')->setWidth(15.00);
        $excel->getActiveSheet()->getColumnDimension('M')->setWidth(15.00);
        $excel->getActiveSheet()->getColumnDimension('N')->setWidth(15.00);
        $excel->getActiveSheet()->getColumnDimension('O')->setWidth(15.00);
        $excel->getActiveSheet()->getColumnDimension('P')->setWidth(15.00);
        $excel->getActiveSheet()->getColumnDimension('Q')->setWidth(15.00);
        $excel->getActiveSheet()->getColumnDimension('R')->setWidth(20.00);
        $excel->getActiveSheet()->getColumnDimension('S')->setWidth(20.00);
        $excel->getActiveSheet()->getColumnDimension('T')->setWidth(20.00);
        $excel->getActiveSheet()->getColumnDimension('U')->setWidth(20.00);
        $excel->getActiveSheet()->getColumnDimension('V')->setWidth(20.00);
        $excel->getActiveSheet()->getColumnDimension('W')->setWidth(20.00);
        $excel->getActiveSheet()->getColumnDimension('X')->setWidth(20.00);
        $excel->getActiveSheet()->getColumnDimension('Y')->setWidth(20.00);
        $excel->getActiveSheet()->getColumnDimension('Z')->setWidth(20.00);
        $excel->getActiveSheet()->getColumnDimension('AA')->setWidth(20.00);
        $excel->getActiveSheet()->getColumnDimension('AC')->setWidth(10.00);
        $excel->getActiveSheet()->getColumnDimension('AD')->setWidth(10.00);
        $excel->getActiveSheet()->getColumnDimension('AE')->setWidth(10.00);
        $excel->getActiveSheet()->getColumnDimension('AF')->setWidth(10.00);
        $excel->getActiveSheet()->getColumnDimension('AG')->setWidth(10.00);
        $excel->getActiveSheet()->getColumnDimension('AH')->setWidth(10.00);
        $excel->getActiveSheet()->getColumnDimension('AI')->setWidth(10.00);


        $excel->setActiveSheetIndex(0)
            ->setCellValue('A8','Date Received from DAR')
            ->setCellValue('B8','Claim Folder No.')
            ->setCellValue('C8','Name of Landowner')
            ->setCellValue('D8','No. of FBs')
            ->setCellValue('E8','Area Per Title')
            ->setCellValue('F8','Area Acq\'d')
            ->setCellValue('G8','Title No.')
            ->setCellValue('H8','Area Approved')
            ->setCellValue('I8','Easement')
            ->setCellValue('J8','Lot Number')
            ->setCellValue('K8','Land Use')
            ->setCellValue('L8','Location of Property')
            ->setCellValue('L9','Barangay')
            ->setCellValue('M9','Municipality')
            ->setCellValue('N9','Province')
            ->setCellValue('O8','Land Valuation')
            ->setCellValue('O9','Total land Value')
            ->setCellValue('P9','Cash')
            ->setCellValue('Q9','Bond')
            ->setCellValue('R8','Status')
            ->setCellValue('S8','Pending Division')
            ->setCellValue('T8','Date Approved')
            ->setCellValue('U8','Date of MOV/CVPF')
            ->setCellValue('V8','Date of COD')
            ->setCellValue('W8','Date of Last Ammended')
            ->setCellValue('X8','Date of COD')
            ->setCellValue('Y8','Date of Returned')
            ->setCellValue('Z8','Bond Serial Number')
            ->setCellValue('AA8','Status')

            ->setCellValue('AC8','Less: Releases')
            ->setCellValue('Ag8','Ending Balances')
            ->setCellValue('AC9','Total')
            ->setCellValue('Ad9','Cash')
            ->setCellValue('Ae9','Bond')
            ->setCellValue('Af9','Bond AO2')
            ->setCellValue('Ag9','Total')
            ->setCellValue('Ah9','Cash')
            ->setCellValue('Ai9','Bond');

        $lastRow = $excel->getActiveSheet()->getHighestRow();

        foreach($reportsModel->getLandRegistration() as $i => $rowData)
        {
            $ctr = $i + 1;
            $activeRow = $lastRow + $ctr;

            $prov = $reportsModel->getNameById('lib_provinces','prov_id',$rowData['prov_id']);
            $muni_city = $reportsModel->getNameById('lib_cities','muni_city_id',$rowData['muni_city_id']);
            $brgy = $reportsModel->getNameById('lib_barangay','brgy_id',$rowData['brgy_id']);
            $status = $reportsModel->getNameById('lib_status','status_id',$rowData['status_id']);

            $excel->setActiveSheetIndex(0)
                ->setCellValue('A' . $activeRow,date("M j, Y",strtotime($rowData['date_recvd_dar'])))
                ->setCellValue('B'. $activeRow,$rowData['claim_fld_no'])
                ->setCellValue('C'. $activeRow,$rowData['full_name'])
                ->setCellValue('D'. $activeRow,$rowData['no_fbs'])
                ->setCellValue('E'. $activeRow,$rowData['area_per_title'])
                ->setCellValue('F'. $activeRow,$rowData['area_acqrd'])
                ->setCellValue('G'. $activeRow,$rowData['title_no'])
                ->setCellValue('H'. $activeRow,$rowData['area_aprvd'])
                ->setCellValue('I'. $activeRow,$rowData['easementt'])
                ->setCellValue('J'. $activeRow,$rowData['lot_no'])
                ->setCellValue('K'. $activeRow,$rowData['land_use'])
                ->setCellValue('L'. $activeRow,$brgy->brgy_name)
                ->setCellValue('M'. $activeRow,$muni_city->muni_city_name)
                ->setCellValue('N'. $activeRow,$prov->prov_name)
                ->setCellValue('O'. $activeRow,$rowData['land_val_total_land_value'])
                ->setCellValue('P'. $activeRow,$rowData['land_val_cash'])
                ->setCellValue('Q'. $activeRow,$rowData['land_val_bond'])
                ->setCellValue('R'. $activeRow,$status->status_name)
                ->setCellValue('S'. $activeRow,$rowData['pending_division'])
                ->setCellValue('T'. $activeRow,'')
                ->setCellValue('U'. $activeRow,$rowData['date_mov_cvpf'])
                ->setCellValue('V'. $activeRow,$rowData['date_cod'])
                ->setCellValue('W'. $activeRow,$rowData['date_last_ammended'])
                ->setCellValue('X'. $activeRow,$rowData['date_cod2'])
                ->setCellValue('Y'. $activeRow,$rowData['date_returned'])
                ->setCellValue('z'. $activeRow,$rowData['bond_serial_no'])
                ->setCellValue('aa'. $activeRow,$rowData['status2'])

                ->setCellValue('ac'. $activeRow,$rowData['less_rel_total'])
                ->setCellValue('ad'. $activeRow,$rowData['less_rel_cash'])
                ->setCellValue('ae'. $activeRow,$rowData['less_rel_bond'])
                ->setCellValue('af'. $activeRow,$rowData['less_rel_bond_ao2'])

                ->setCellValue('ag'. $activeRow,$rowData['end_bal_total'])
                ->setCellValue('ah'. $activeRow,$rowData['end_bal_cash'])
                ->setCellValue('ai'. $activeRow,$rowData['end_bal_bond']);

            $excel->getActiveSheet()->getStyle('A8:AA'.$activeRow)->applyFromArray(array('borders' => array('allborders' => array('style' => PHPExcel_Style_Border::BORDER_THIN))));
            $excel->getActiveSheet()->getStyle('AC8:AI'.$activeRow)->applyFromArray(array('borders' => array('allborders' => array('style' => PHPExcel_Style_Border::BORDER_THIN))));
            $excel->getActiveSheet()->getStyle('A'.$activeRow.':AI'.$activeRow.'')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $excel->getActiveSheet()->getStyle('A'.$activeRow.':AI'.$activeRow.'')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
            $excel->getActiveSheet()->getStyle('A8:AI'.$activeRow)->getAlignment()->setWrapText(true);
        }

        //NAME THE WORKSHEET
        $this->excel->getActiveSheet()->setTitle('masterlist_' . date("Ymdhis"));

        $filename = 'masterlist_' . date("Ymdhis") . '.xls'; //save our workbook as this file name

        header('Content-Type: application/vnd.ms-excel'); //mime type
        header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
        header('Cache-Control: max-age=0'); //no cache

        //save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
        //if you want to save it as .XLSX Excel 2007 format
        $objWriter = PHPExcel_IOFactory::createWriter($excel, 'Excel5');

        //force user to download the Excel file without writing it to server's HD
        $objWriter->save('php://output');
    }

    public function approvedClaims()
    {
        if (!$this->session->userdata('user_data')){
            redirect('user','location');
        }

        $reports = new Reports_model();
        $data = array(
            'landclass' => $reports->getLandClass(),
            'apprv_claims' => $reports->getApproveClaims(1)
        );
        $this->load->view('approve_claims',$data);
    }

    public function approvedClaimsview()
    {
        if (!$this->session->userdata('user_data')){
            redirect('user','location');
        }

        $page_type = 'approved claims';
        $reports = new Reports_model();

        // if year and month is selected
        if(isset($_REQUEST['year']) && isset($_REQUEST['month']))
        {
            $year = $_REQUEST['year'];
            $month = $_REQUEST['month'];
            $repots = $reports->getApproveClaimsByYearMonth(1,$year,$month);
        }
        else
        {
            $repots = $reports->getApproveClaims(1);
        }

        $data = array(
            'landclass' => $reports->getLandClass(),
            'apprv_claims' => $repots,
            'page_title' => $this->title() . ' - ' . $page_type,
            'access_level' => $this->accessLevel()
        );
        $this->load->view('header');
        $this->load->view('navbar',$data);
        $this->load->view('sidebar');
        $this->load->view('approveclaim_list',$data);
        $this->load->view('footer');
    }

    public function masterlistview()
    {
        if (!$this->session->userdata('user_data')){
            redirect('user','location');
        }

        $page_type = 'Masterlist';
        $reports = new Reports_model();
        $data = array(
            'landclass' => $reports->getLandClass(),
            'apprv_claims' => $reports->getApproveClaims(1),
            'page_title' => $this->title() . ' - ' . $page_type,
            'access_level' => $this->accessLevel(),
            'masterlist' => $reports->getLandRegistration()
        );
        $this->load->view('header');
        $this->load->view('navbar',$data);
        $this->load->view('sidebar');
        $this->load->view('masterlistview_list',$data);
        $this->load->view('footer');
    }

    public function tester()
    {
        $reports = new Reports_model();
        echo '<pre>';
        print_r($reports->getApproveClaimsByYearMonth(1,2018,1));
        echo '</pre>';
    }
}