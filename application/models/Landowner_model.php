<?php
/**
 * Created by Josef Friedrich Baldo
 * Date: 24/02/2018
 * Time: 5:07 PM
 */
class Landowner_model extends CI_Model
{
    public function getAllLandOwners()
    {
        $limit_lower = "";
        $where =" ";
        $rows=25;
        $current=1;
        $limit_l=($current * $rows) - ($rows);
        $limit_h=$limit_lower + $rows  ;

        //Handles Sort querystring sent from Bootgrid


        //Handles search  querystring sent from Bootgrid
        if (isset($_REQUEST['searchPhrase']) )
        {
            $search=trim($_REQUEST['searchPhrase']);
            $where.= " where ( a.lastname LIKE '%".$search."%' or a.firstname LIKE '%".$search."%' ) ";
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
                a.land_owner_id,
                a.lastname,
                a.firstname,
                a.middlename,
                a.extname,
                a.region_id,
                a.prov_id,
                a.muni_city_id,
                a.barangay_id,
                CONCAT(COALESCE(a.lastname,''),' ',COALESCE(a.firstname,''),' ',COALESCE(a.middlename,''),' ',COALESCE(a.extname,'')) as fullname,
                (SELECT region_name FROM lib_regions WHERE region_id=a.region_id) as region_name,
                (SELECT prov_name FROM lib_provinces WHERE prov_id=a.prov_id) as prov_name,
                (SELECT muni_city_name FROM lib_cities WHERE muni_city_id=a.muni_city_id) as muni_city_name,
                (SELECT brgy_name FROM lib_barangay WHERE brgy_id=a.barangay_id) as brgy_id
                FROM
                tbl_land_owners as a
                  $where $limit";
        $sql1 = "SELECT
                a.land_owner_id,
                a.lastname,
                a.firstname,
                a.middlename,
                a.extname,
                a.region_id,
                a.prov_id,
                a.muni_city_id,
                a.barangay_id,
                CONCAT(COALESCE(a.lastname,''),' ',COALESCE(a.firstname,''),' ',COALESCE(a.middlename,''),' ',COALESCE(a.extname,'')),
                (SELECT region_name FROM lib_regions WHERE region_id=a.region_id) as region_name,
                (SELECT prov_name FROM lib_provinces WHERE prov_id=a.prov_id) as prov_name,
                (SELECT muni_city_name FROM lib_cities WHERE muni_city_id=a.muni_city_id) as muni_city_name,
                (SELECT brgy_name FROM lib_barangay WHERE brgy_id=a.barangay_id) as brgy_id
                FROM
                tbl_land_owners as a
                 $where";
        //echo $sql;
        $query = $this->db->query($sql);
        $query1 = $this->db->query($sql1);

        return array($query->result(),$query1->num_rows());
    }

    public function addlandowner($lastname,$firstname,$middlename,$extname,$region_id,$prov,$municity,$brgy)
    {
        $data = array(
            'lastname' => $lastname,
            'firstname' => $firstname,
            'middlename' => $middlename,
            'extname' => $extname,
            'region_id' => $region_id,
            'prov_id' => $prov,
            'muni_city_id' => $municity,
            'barangay_id' => $brgy
        );
        $this->db->insert('tbl_land_owners',$data);
        return $this->db->insert_id();
    }

    public function updatelandowner($lastname,$firstname,$middlename,$extname,$region_id,$prov,$municity,$brgy,$id)
    {
        $data = array(
            'lastname' => $lastname,
            'firstname' => $firstname,
            'middlename' => $middlename,
            'extname' => $extname,
            'region_id' => $region_id,
            'prov_id' => $prov,
            'muni_city_id' => $municity,
            'barangay_id' => $brgy
        );
        $this->db->update('tbl_land_owners',$data,array('land_owner_id'=>$id));
        return $this->db->affected_rows();
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
        $query = $this->db->get_where('tbl_land_owners', array('land_owner_id' => $id));
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
            land_owner_id = "'.$name_land_owner.'",
			-- Processor_name = "'.$Processor_name.'",
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

    public function getLandOwners()
    {
        $this->db->select("land_owner_id,CONCAT(COALESCE(lastname,''),' ',COALESCE(firstname,''),' ',COALESCE(middlename,''),' ',COALESCE(extname,'')) AS fullname",false);
        return $this->db->get_where('tbl_land_owners')->result();
    }
}