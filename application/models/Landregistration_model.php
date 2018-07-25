<?php
/**
 * Created by Josef Friedrich Baldo
 * Date: 24/02/2018
 * Time: 5:07 PM
 */
class Landregistration_model extends CI_Model
{
    public function getAllLandRegistration()
    {
        $query = $this->db->get('tbl_land_reg');
        return $query->result();
    }

    public function addLandRegistration($date_recvd_dar,$claim_fld_no,$name_land_owner,$no_fbs,
                    $area_per_title,$area_acqrd,$title_no,$area_aprvd,$easementt,$lot_no,
                    $land_use,$prov_id,$muni_city_id,$brgy_id,$land_val_total_land_value,
                    $land_val_cash,$land_val_bond,$status,$pending_division,$date_mov_cvpf,
                    $date_cod,$date_last_ammended,$date_cod2,$date_returned,$bond_serial_no,
                    $status2,$less_rel_total,$less_rel_cash,$less_rel_bond,$less_rel_bond_ao2,
                    $end_bal_total,$end_bal_cash,$end_bal_bond,$created_by)
    {
        $this->db->trans_begin();

        $this->db->query('INSERT INTO tbl_land_reg
                      (date_recvd_dar, claim_fld_no, name_land_owner,
                      no_fbs, area_per_title, area_acqrd, title_no,
                      area_aprvd, easementt, lot_no, land_use, prov_id,
                      muni_city_id, brgy_id, land_val_total_land_value,
                      land_val_cash, land_val_bond, status, pending_division,
                      date_mov_cvpf, date_cod, date_last_ammended, date_cod2,
                      date_returned, bond_serial_no, status2, less_rel_total,
                      less_rel_cash, less_rel_bond, less_rel_bond_ao2, end_bal_total,
                      end_bal_cash, end_bal_bond, created_by, date_created)
                VALUES
                (
                "'.$date_recvd_dar.'",
                "'.$claim_fld_no.'",
                "'.$name_land_owner.'",
                "'.$no_fbs.'",
                "'.$area_per_title.'",
                "'.$area_acqrd.'",
                "'.$title_no.'",
                "'.$area_aprvd.'",
                "'.$easementt.'",
                "'.$lot_no.'",
                "'.$land_use.'",
                "'.$prov_id.'",
                "'.$muni_city_id.'",
                "'.$brgy_id.'",
                "'.$land_val_total_land_value.'",
                "'.$land_val_cash.'",
                "'.$land_val_bond.'",
                "'.$status.'",
                "'.$pending_division.'",
                "'.$date_mov_cvpf.'",
                "'.$date_cod.'",
                "'.$date_last_ammended.'",
                "'.$date_cod2.'",
                "'.$date_returned.'",
                "'.$bond_serial_no.'",
                "'.$status2.'",
                "'.$less_rel_total.'",
                "'.$less_rel_cash.'",
                "'.$less_rel_bond.'",
                "'.$less_rel_bond_ao2.'",
                "'.$end_bal_total.'",
                "'.$end_bal_cash.'",
                "'.$end_bal_bond.'",
                "'.$created_by.'",
                NOW()
                )');
        if ($this->db->trans_status() === FALSE)
        {
            $this->db->trans_rollback();
            $queryReult = 0;
        }
        else
        {
            $this->db->trans_commit();
            $queryReult = 1;
        }
        return $queryReult;
    }

    public function getProvinces($id = 5) // provinces were filtered by default to region 5
    {
        $query = $this->db->get_where('lib_provinces',array('region_id' => $id));
        return $query->result();
    }

    public function getCities($id) // provinces were filtered by default to region 5
    {
        $query = $this->db->get_where('lib_cities',array('prov_id' => $id));
        return $query->result();
    }

    public function getBrgy($id) // provinces were filtered by default to region 5
    {
        $query = $this->db->get_where('lib_barangay',array('muni_city_id' => $id));
        return $query->result();
    }

    public function getStatus()
    {
        $query = $this->db->get('lib_status');
        return $query->result();
    }
}