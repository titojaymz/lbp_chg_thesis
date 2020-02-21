<?php

/**
 * Created by PhpStorm.
 * User: joseffriedrichbaldo
 * Date: 2/21/2020
 * Time: 3:36 PM
 */
class Land_class_model extends CI_Model
{
    public function create($land_class_code,$land_class_name)
    {
        $data = array(
            'land_class_code' => $land_class_code,
            'land_class_name' => $land_class_name
        );
        $this->db->insert('lib_land_class',$data);
        return $this->db->insert_id();
    }

    public function update($land_class_id,$land_class_code,$land_class_name)
    {
        $data = array(
            'land_class_code' => $land_class_code,
            'land_class_name' => $land_class_name
        );
        $this->db->update('lib_land_class',$data,array('land_class_id' => $land_class_id));
        return $this->db->affected_rows();
    }

    public function getLandClassDetail($land_class_id)
    {
        $q = $this->db->get_where('lib_land_class',array('land_class_id'=>$land_class_id));
        return $q->row();
    }

    public function getLandClassSelect()
    {
        $q = $this->db->get('lib_land_class');
        return $q->result();
    }

    public function getLandClass()
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
            $where.= " AND ( a.land_class_id LIKE '%".$search."%' or a.land_class_code LIKE '%".$search."%' or a.land_class_name LIKE '%".$search."%' ) ";
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
                land_class_id,
                land_class_code,
                land_class_name
                FROM lib_land_class as a
                  Where $where $limit";
        $sql1 = "SELECT
                land_class_id,
                land_class_code,
                land_class_name
                FROM lib_land_class as a Where $where";
        //echo $sql;
        $query = $this->db->query($sql);
        $query1 = $this->db->query($sql1);

        return array($query->result(),$query1->num_rows());
    }
}