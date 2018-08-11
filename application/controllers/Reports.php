<?php
/**
 * Created by Josef Friedrich Baldo
 * Date: 11/08/2018
 * Time: 08:47
 */
class Reports extends CI_Controller
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

        redirect('landregistration');
    }

    public function masterlist()
    {
        if (!$this->session->userdata('user_data')){
            redirect('user','location');
        }

        $reports = new Reports_model();

        $message = '';

        $data = array(
            'system_message' => $message,
            'access_level' => $this->accessLevel(), // this is needed for the navbar
            'tbl_land_reg' => $reports->getLandRegistration()
        );

        $this->load->view('header');
        $this->load->view('navbar',$data);
        $this->load->view('sidebar');
        $this->load->view('masterlist',$data);
        $this->load->view('footer');
    }

    public function generateMasterlist()
    {
        //LOAD OUR NEW PHPEXCEL LIBRARY
        $this->load->library('excel');

        $excel = new Excel();

        //ACTIVATE WORKSHEET 1
        $excel->setActiveSheetIndex(0);

        $excel->setActiveSheetIndex(0)
            ->setCellValue('A1','LANDBANK OF THE PHILIPPINES')
            ->setCellValue('A2','AGRARIAN OPERATIONS CENTER');

        //NAME THE WORKSHEET
        $this->excel->getActiveSheet()->setTitle('masterlist_' . date("Ymdhis"));

        $filename = 'Revised AWFP Form.xls'; //save our workbook as this file name

        header('Content-Type: application/vnd.ms-excel'); //mime type
        header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
        header('Cache-Control: max-age=0'); //no cache

        //save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
        //if you want to save it as .XLSX Excel 2007 format
        $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');

        //force user to download the Excel file without writing it to server's HD
        $objWriter->save('php://output');
    }
}