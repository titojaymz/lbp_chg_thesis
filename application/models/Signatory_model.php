<?php

/**
 * Created by PhpStorm.
 * User: joseffriedrichbaldo
 * Date: 2/21/2020
 * Time: 3:36 PM
 */
class Signatory_model extends CI_Model
{
    public function create($signatory_position,$signatory_name)
    {
        $data = array(
            'signatory_position' => $signatory_position,
            'signatory_name' => $signatory_name
        );
        $this->db->insert('lib_signatory',$data);
        return $this->db->insert_id();
    }

    public function update($signatory_id,$signatory_position,$signatory_name)
    {
        $data = array(
            'signatory_position' => $signatory_position,
            'signatory_name' => $signatory_name
        );
        $this->db->update('lib_signatory',$data,array('signatory_id' => $signatory_id));
        return $this->db->affected_rows();
    }

    public function getSignatoryDetail($signatory_id)
    {
        $q = $this->db->get_where('lib_signatory',array('signatory_id'=>$signatory_id));
        return $q->row();
    }

    public function getSignatorySelect()
    {
        $q = $this->db->get('lib_signatory');
        return $q->result();
    }

    public function getSignatories()
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
            $where.= " AND ( a.signatory_id LIKE '%".$search."%' or a.signatory_position LIKE '%".$search."%' or a.signatory_name LIKE '%".$search."%' ) ";
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
                signatory_id,
                signatory_position,
                signatory_name
                FROM lib_signatory as a
                  Where $where $limit";
        $sql1 = "SELECT
                signatory_id,
                signatory_position,
                signatory_name
                FROM lib_signatory as a Where $where";
        //echo $sql;
        $query = $this->db->query($sql);
        $query1 = $this->db->query($sql1);

        return array($query->result(),$query1->num_rows());
    }
}