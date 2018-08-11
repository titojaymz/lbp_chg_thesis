<?php
/**
 * Created by Josef Friedrich Baldo
 * Date: 11/08/2018
 * Time: 06:25
 */
class Reports_model extends CI_Model
{
    public function getLandRegistration()
    {
        $a = $this->db->get('tbl_land_reg');
        return $a->result_array();
    }
}