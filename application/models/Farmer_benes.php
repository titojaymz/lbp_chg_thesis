<?php

/**
 * Created by PhpStorm.
 * User: joseffriedrichbaldo
 * Date: 6/3/2020
 * Time: 8:23 PM
 */
class Farmer_benes extends CI_Model
{
    public function getAllFbs($land_reg_id)
    {
        $limit_lower = "";
        $where =" Where a.land_reg_id=" . $land_reg_id;
        $rows=25;
        $current=1;
        $limit_l=($current * $rows) - ($rows);
        $limit_h=$limit_lower + $rows  ;

        //Handles Sort querystring sent from Bootgrid


        //Handles search  querystring sent from Bootgrid
        if (isset($_REQUEST['searchPhrase']) )
        {
            $search=trim($_REQUEST['searchPhrase']);
            $where.= " AND ( a.lastname LIKE '%".$search."%' OR a.firstname LIKE '%".$search."%' OR a.middlename LIKE '%".$search."%' OR a.extname LIKE '%".$search."%' ) ";
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
                a.fb_id,
                a.land_reg_id,
                CONCAT(COALESCE(a.lastname,''),' ',COALESCE(a.firstname,''),' ',COALESCE(a.middlename,''),' ',COALESCE(a.extname,'')) as fullname,
                (SELECT region_name FROM lib_regions where region_id=a.region_id) as region,
                (select prov_name from lib_provinces where prov_id=a.prov_id) as province,
                (select muni_city_name from lib_cities where muni_city_id=a.muni_city) as city,
                (select brgy_name from lib_barangay where brgy_id=a.brgy_id) as brgy
                FROM
                tbl_fbs AS a
                 $where $limit";
        $sql1 = "SELECT
                a.fb_id,
                a.land_reg_id,
                CONCAT(COALESCE(a.lastname,''),' ',COALESCE(a.firstname,''),' ',COALESCE(a.middlename,''),' ',COALESCE(a.extname,'')) as fullname,
                (SELECT region_name FROM lib_regions where region_id=a.region_id) as region,
                (select prov_name from lib_provinces where prov_id=a.prov_id) as province,
                (select muni_city_name from lib_cities where muni_city_id=a.muni_city) as city,
                (select brgy_name from lib_barangay where brgy_id=a.brgy_id) as brgy
                FROM
                tbl_fbs AS a
                  $where";
        //echo $sql;
        $query = $this->db->query($sql);
        $query1 = $this->db->query($sql1);

        return array($query->result(),$query1->num_rows());
    }

    public function getFbData($id)
    {
        return $this->db->get_where('tbl_fbs',array('fb_id'=>$id))->row();
    }

    public function insert($land_reg_id,$lastname,$firstname,$middlename,$extname,$region_id,$prov_id,$muni_city,$brgy_id)
    {
        $data = array(
            'land_reg_id' => $land_reg_id,
            'lastname' => $lastname,
            'firstname' => $firstname,
            'middlename' => $middlename,
            'extname' => $extname,
            'region_id' => $region_id,
            'prov_id' => $prov_id,
            'muni_city' => $muni_city,
            'brgy_id' => $brgy_id,
        );
        $this->db->insert('tbl_fbs',$data);
        return $this->db->insert_id();
    }

    public function update($lastname,$firstname,$middlename,$extname,$region_id,$prov_id,$muni_city,$brgy_id,$id)
    {
        $data = array(
            'lastname' => $lastname,
            'firstname' => $firstname,
            'middlename' => $middlename,
            'extname' => $extname,
            'region_id' => $region_id,
            'prov_id' => $prov_id,
            'muni_city' => $muni_city,
            'brgy_id' => $brgy_id,
        );
        $this->db->update('tbl_fbs',$data,array('fb_id' => $id));
        return $this->db->affected_rows();
    }
}