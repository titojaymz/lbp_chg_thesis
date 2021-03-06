<?php

/**
 * Created by PhpStorm.
 * User: joseffriedrichbaldo
 * Date: 2/21/2020
 * Time: 10:24 AM
 */
class Psgc_region_model extends CI_Model
{
    public function getAllRegions()
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
            $where.= " AND ( a.region_name LIKE '%".$search."%' or a.region_psgc LIKE '%".$search."%' or a.region_nick LIKE '%".$search."%' ) ";
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
                region_id,
                region_name,
                region_psgc,
                region_nick
                FROM lib_regions as a
                  Where $where $limit";
        $sql1 = "SELECT
                region_id,
                region_name,
                region_psgc,
                region_nick
                FROM lib_regions as a Where $where";
        //echo $sql;
        $query = $this->db->query($sql);
        $query1 = $this->db->query($sql1);

        return array($query->result(),$query1->num_rows());
    }

    public function getAllProvinces($region_id)
    {
        $limit_lower = "";
        $where =" a.DELETED=0 AND a.region_id='".$region_id."' ";
        $rows=25;
        $current=1;
        $limit_l=($current * $rows) - ($rows);
        $limit_h=$limit_lower + $rows  ;

        //Handles Sort querystring sent from Bootgrid


        //Handles search  querystring sent from Bootgrid
        if (isset($_REQUEST['searchPhrase']) )
        {
            $search=trim($_REQUEST['searchPhrase']);
            $where.= " AND ( a.prov_id LIKE '%".$search."%' or a.region_id LIKE '%".$search."%' or a.prov_psgc LIKE '%".$search."%' or a.prov_name LIKE '%".$search."%' ) ";
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
                prov_id,
                region_id,
                prov_psgc,
                prov_name
                FROM lib_provinces as a
                  Where $where $limit";
        $sql1 = "SELECT
                prov_id,
                region_id,
                prov_psgc,
                prov_name
                FROM lib_provinces as a Where $where";
        //echo $sql;
        $query = $this->db->query($sql);
        $query1 = $this->db->query($sql1);

        return array($query->result(),$query1->num_rows());
    }

    public function getAllMuniCity($prov_id)
    {
        $limit_lower = "";
        $where =" a.DELETED=0 AND a.prov_id='".$prov_id."' ";
        $rows=25;
        $current=1;
        $limit_l=($current * $rows) - ($rows);
        $limit_h=$limit_lower + $rows  ;

        //Handles Sort querystring sent from Bootgrid


        //Handles search  querystring sent from Bootgrid
        if (isset($_REQUEST['searchPhrase']) )
        {
            $search=trim($_REQUEST['searchPhrase']);
            $where.= " AND ( a.muni_city_id LIKE '%".$search."%' or a.prov_id LIKE '%".$search."%' or a.muni_city_psgc LIKE '%".$search."%' or a.muni_city_name LIKE '%".$search."%' ) ";
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
                muni_city_id,
                prov_id,
                muni_city_psgc,
                muni_city_name
                FROM lib_cities as a
                  Where $where $limit";
        $sql1 = "SELECT
                muni_city_id,
                prov_id,
                muni_city_psgc,
                muni_city_name
                FROM lib_cities as a Where $where";
        //echo $sql;
        $query = $this->db->query($sql);
        $query1 = $this->db->query($sql1);

        return array($query->result(),$query1->num_rows());
    }

    public function getAllBarangay($muni_city_id)
    {
        $limit_lower = "";
        $where =" a.DELETED=0 AND a.muni_city_id='".$muni_city_id."' ";
        $rows=25;
        $current=1;
        $limit_l=($current * $rows) - ($rows);
        $limit_h=$limit_lower + $rows  ;

        //Handles Sort querystring sent from Bootgrid


        //Handles search  querystring sent from Bootgrid
        if (isset($_REQUEST['searchPhrase']) )
        {
            $search=trim($_REQUEST['searchPhrase']);
            $where.= " AND ( a.brgy_id LIKE '%".$search."%' or a.muni_city_id LIKE '%".$search."%' or a.brgy_psgc LIKE '%".$search."%' or a.brgy_name LIKE '%".$search."%' ) ";
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
                brgy_id,
                muni_city_id,
                brgy_psgc,
                brgy_name
                FROM lib_barangay as a
                  Where $where $limit";
        $sql1 = "SELECT
                brgy_id,
                muni_city_id,
                brgy_psgc,
                brgy_name
                FROM lib_barangay as a Where $where";
        //echo $sql;
        $query = $this->db->query($sql);
        $query1 = $this->db->query($sql1);

        return array($query->result(),$query1->num_rows());
    }

    public function getRegionSelect()
    {
        $q = $this->db->get('lib_regions');
        return $q->result();
    }
}