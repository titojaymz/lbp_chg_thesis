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
        $limit_lower = "";
        $where =" a.DELETED=0 ";
        $rows=25;
        $current=1;
        $limit_l=($current * $rows) - ($rows);
        $limit_h=$limit_lower + $rows  ;

        //Handles Sort querystring sent from Bootgrid


        //Handles search  querystring sent from Bootgrid
        if (isset($_REQUEST['searchPhrase']) )
        {
            $search=trim($_REQUEST['searchPhrase']);
            $where.= " and ( a.name_land_owner LIKE '%".$search."%' or a.title_no LIKE '%".$search."%' or f.land_class_name LIKE '%".$search."%' ) ";
            // $this->db->like('access_list_id', $search);
            // $this->db->like('access_list_name', $search);
        }

        //Handles determines where in the paging count this result set falls in
        if (isset($_REQUEST['rowCount']) )
            $rows=$_REQUEST['rowCount'];

        //calculate the low and high limits for the SQL LIMIT x,y clause
        if (isset($_REQUEST['current']) )
        {
            $current=$_REQUEST['current'];
            $limit_l=($current * $rows) - ($rows);
            $limit_h=$rows ;
        }

        if ($rows==-1)
            $limit="";  //no limit
        else
            $limit=" LIMIT $limit_l,$limit_h  ";

        $sql = "SELECT
                  a.*,
                  e.region_name,
                  b.prov_name as prov_name,
                  c.muni_city_name as muni_city_name,
                  d.brgy_name as brgy_name,
                  f.land_class_name
                  FROM `tbl_land_reg` as a
                  LEFT JOIN lib_provinces as b on a.prov_id=b.prov_id
                  LEFT JOIN lib_cities as c on a.muni_city_id=c.muni_city_id
                  LEFT JOIN lib_barangay as d on a.brgy_id=d.brgy_id
                  LEFT JOIN lib_regions e on a.region_id=e.region_id
                  LEFT JOIN lib_land_class as f on a.land_class_id=f.land_class_id
                  Where $where $limit";
        $sql1 = "SELECT
                  a.*,
                  e.region_name,
                  b.prov_name as prov_name,
                  c.muni_city_name as muni_city_name,
                  d.brgy_name as brgy_name,
                  f.land_class_name
                  FROM `tbl_land_reg` as a
                  LEFT JOIN lib_provinces as b on a.prov_id=b.prov_id
                  LEFT JOIN lib_cities as c on a.muni_city_id=c.muni_city_id
                  LEFT JOIN lib_barangay as d on a.brgy_id=d.brgy_id
                  LEFT JOIN lib_regions e on a.region_id=e.region_id
                  LEFT JOIN lib_land_class as f on a.land_class_id=f.land_class_id Where $where";
        //echo $sql;
        $query = $this->db->query($sql);
        $query1 = $this->db->query($sql1);

        return array($query->result(),$query1->num_rows());
    }

    public function addLandRegistration($date_recvd_dar,$claim_fld_no,$name_land_owner,$Processor_name,$no_fbs,
                    $area_per_title,$area_acqrd,$title_no,$area_aprvd,$easementt,$lot_no,
                    $land_use,$region_id,$prov_id,$muni_city_id,$brgy_id,$land_val_total_land_value,
                    $land_val_cash,$land_val_bond,$status,$pending_division,$date_mov_cvpf,
                    $date_cod,$date_last_ammended,$date_returned,$bond_serial_no,
                    $status2,$less_rel_total,$less_rel_cash,$less_rel_bond,$less_rel_bond_ao2,
                    $end_bal_total,$end_bal_cash,$end_bal_bond,$created_by)
    {
        $this->db->trans_begin();

        $this->db->query('INSERT INTO tbl_land_reg
                      (date_recvd_dar, claim_fld_no, name_land_owner, Processor_name,
                      no_fbs, area_per_title, area_acqrd, title_no,
                      area_aprvd, easementt, lot_no, land_use, region_id, prov_id,
                      muni_city_id, brgy_id, land_val_total_land_value,
                      land_val_cash, land_val_bond, status_id, pending_division,
                      date_mov_cvpf, date_cod, date_last_ammended,
                      date_returned, bond_serial_no, status2, less_rel_total,
                      less_rel_cash, less_rel_bond, less_rel_bond_ao2, end_bal_total,
                      end_bal_cash, end_bal_bond, created_by, date_created)
                VALUES
                (
                "'.$date_recvd_dar.'",
                "'.$claim_fld_no.'",
                "'.$name_land_owner.'",
				"'.$Processor_name.'",
                "'.$no_fbs.'",
                "'.$area_per_title.'",
                "'.$area_acqrd.'",
                "'.$title_no.'",
                "'.$area_aprvd.'",
                "'.$easementt.'",
                "'.$lot_no.'",
                "'.$land_use.'",
                "'.$region_id.'",
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

    public function getDetailsById($id)
    {
        $query = $this->db->get_where('tbl_land_reg', array('land_reg_id' => $id));
        return $query->row_array();
    }

    public function updateLandRegistration($id,$date_recvd_dar,$claim_fld_no,$name_land_owner, $Processor_name, $no_fbs,
                                        $area_per_title,$area_acqrd,$title_no,$area_aprvd,$easementt,$lot_no,
                                        $land_use,$region_id,$prov_id,$muni_city_id,$brgy_id,$land_val_total_land_value,
                                        $land_val_cash,$land_val_bond,$status,$pending_division,$date_mov_cvpf,
                                        $date_cod,$date_last_ammended,$date_returned,$bond_serial_no,
                                        $status2,$less_rel_total,$less_rel_cash,$less_rel_bond,$less_rel_bond_ao2,
                                        $end_bal_total,$end_bal_cash,$end_bal_bond,$modified_by,$land_class_id)
    {
        $this->db->trans_begin();

        $this->db->query('
            UPDATE tbl_land_reg
            SET
            date_recvd_dar = "'.$date_recvd_dar.'",
            claim_fld_no = "'.$claim_fld_no.'",
            name_land_owner = "'.$name_land_owner.'",
			Processor_name = "'.$Processor_name.'",
            no_fbs = "'.$no_fbs.'",
            area_per_title = "'.$area_per_title.'",
            area_acqrd = "'.$area_acqrd.'",
            title_no = "'.$title_no.'",
            area_aprvd = "'.$area_aprvd.'",
            easementt = "'.$easementt.'",
            lot_no = "'.$lot_no.'",
            land_use = "'.$land_use.'",
            region_id = "'.$region_id.'",
            prov_id = "'.$prov_id.'",
            muni_city_id = "'.$muni_city_id.'",
            brgy_id = "'.$brgy_id.'",
            land_val_total_land_value = "'.$land_val_total_land_value.'",
            land_val_cash = "'.$land_val_cash.'",
            land_val_bond = "'.$land_val_bond.'",
            status_id = "'.$status.'",
            pending_division = "'.$pending_division.'",
            date_mov_cvpf = "'.$date_mov_cvpf.'",
            date_cod = "'.$date_cod.'",
            date_last_ammended = "'.$date_last_ammended.'",
            date_returned = "'.$date_returned.'",
            bond_serial_no = "'.$bond_serial_no.'",
            status2 = "'.$status2.'",
            less_rel_total = "'.$less_rel_total.'",
            less_rel_cash  = "'.$less_rel_cash.'",
            less_rel_bond  = "'.$less_rel_bond.'",
            less_rel_bond_ao2 = "'.$less_rel_bond_ao2.'",
            end_bal_total = "'.$end_bal_total.'",
            end_bal_cash = "'.$end_bal_cash.'",
            end_bal_bond = "'.$end_bal_bond.'",
            modified_by = "'.$modified_by.'",
            date_modified = NOW(),
            land_class_id = "'.$land_class_id.'"
            WHERE
            land_reg_id =' . $id);
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

    public function getRegions() // provinces were filtered by default to region 5
    {
        $query = $this->db->get('lib_regions');
        return $query->result();
    }
}