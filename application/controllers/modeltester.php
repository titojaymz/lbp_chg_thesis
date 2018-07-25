<?php
/**
 * Created by Josef Friedrich Baldo
 * Date: 24/02/2018
 * Time: 5:08 PM
 */
class modeltester extends CI_Controller
{
    public function index()
    {
        $modeltester = new Landregistration_model();

        /*$method_tester = $modeltester->addLandRegistration(
            '2018-01-01','AAASSSDD-12345','Josef Baldo',2,123,23,'TITLE-ASD-123',123,123,'LOT 12','commerial',
            1,2,3,123,123,123,'status1','itasd','2018-01-01','2018-01-01','2018-01-01','2018-01-01','2018-01-01',
            'SERIAL_NO','STATUS 2 na pwede inputan',123,123,123,123,123,123,123,99);*/

        $method_tester = $modeltester->getBrgy(496);

        $data = array(
            'modeltester' => $method_tester
        );

        $this->load->view('modeltester',$data);
    }
}