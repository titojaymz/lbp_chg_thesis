<?php

/**
 * Created by PhpStorm.
 * User: joseffriedrichbaldo
 * Date: 2/21/2020
 * Time: 3:36 PM
 */
class Status_model extends CI_Model
{
    public function create($status_name)
    {
        $data = array(
            'status_name' => $status_name
        );
        $this->db->insert('lib_status',$data);
        return $this->db->insert_id();
    }

    public function update($id,$status_name)
    {
        $data = array(
            'status_name' => $status_name
        );
        $this->db->update('lib_status',$data,array('status_id' => $id));
        return $this->db->affected_rows();
    }

    public function getStatusDetail($land_class_id)
    {
        $q = $this->db->get_where('lib_status',array('status_id'=>$land_class_id));
        return $q->row();
    }

    public function getLandClassSelect()
    {
        $q = $this->db->get('lib_land_class');
        return $q->result();
    }

    public function getStatus()
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
            $where.= " AND ( a.status_name LIKE '%".$search."%' ) ";
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
                status_id,
                status_name
                FROM lib_status as a
                  Where $where $limit";
        $sql1 = "SELECT
                status_id,
                status_name
                FROM lib_status as a
                  Where $where";
        //echo $sql;
        $query = $this->db->query($sql);
        $query1 = $this->db->query($sql1);

        return array($query->result(),$query1->num_rows());
    }
}