<?php

/**
 * Created by PhpStorm.
 * User: joseffriedrichbaldo
 * Date: 6/1/2020
 * Time: 8:19 PM
 */
class Division_model extends CI_Model
{
    public function getAllDivision()
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
            $where.= " Where ( a.division_name LIKE '%".$search."%' or a.division_short_name LIKE '%".$search."%' ) ";
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
                a.division_id,
                a.division_name,
                a.division_short_name
                FROM
                lib_division as a
                 $where $limit";
        $sql1 = "SELECT
                a.division_id,
                a.division_name,
                a.division_short_name
                FROM
                lib_division as a
                  $where";
        //echo $sql;
        $query = $this->db->query($sql);
        $query1 = $this->db->query($sql1);

        return array($query->result(),$query1->num_rows());
    }

    public function getDivision($id)
    {
        $q = $this->db->get_where('lib_division',array('division_id'=>$id));
        return $q->row();
    }

    public function insert($division_name,$division_short_name)
    {
        $data = array(
            'division_name' => $division_name,
            'division_short_name' => $division_short_name
        );
        $this->db->insert('lib_division',$data);
        return $this->db->insert_id();
    }

    public function update($division_name,$division_short_name,$id)
    {
        $data = array(
            'division_name' => $division_name,
            'division_short_name' => $division_short_name
        );
        $this->db->update('lib_division',$data,array('division_id'=>$id));
        return $this->db->affected_rows();
    }
}