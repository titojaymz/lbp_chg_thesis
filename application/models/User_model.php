<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by Josef Friedrich S Baldo
 * Date: 10 Oct 2017
 * Time: 17:49
 */
class User_model extends CI_Model
{
    public function getUserlogin($username)
    {
        $query = $this->db->get_where('users',array('username' => $username, 'activated' => 1));
        return array(
            'result' => $query->row_array(),
            'count' => $query->num_rows()
        );
    }

    public function getAllUsers()
    {
        $query = $this->db->get('users');
        return $query->result();
    }

    public function addUser($x_username,$x_firstname,$x_middlename,$x_lastname,$x_extname,$x_password,$x_lbp_no,$x_region_id,$x_position,$x_email)
    {
        $data = array(
            'username' => $x_username,
            'firstname' => $x_firstname,
            'middlename' => $x_middlename,
            'lastname' => $x_lastname,
            'extname' => $x_extname,
            'passwd' => $x_password,
            'lbp_id_no' => $x_lbp_no,
            'region_code' => $x_region_id,
            'position_id' => $x_position,
            'email' => $x_email
        );
        $this->db->insert('users',$data);
        return $this->db->insert_id();
    }

    public function getUserDetails($uid = null)
    {
        $query = $this->db->get_where('users',array('uid' => $uid));
        return $query->row_array();
    }

    public function getUserByID($id)
    {
        $query = $this->db->query('SELECT passwd FROM users WHERE uid=' . $id);
        $result = $query->row();
        return $result->passwd;
    }

    public function getPassByUser($username)
    {
        $query = $this->db->get_where('users',array('username' => $username));
        $result = $query->row();
        return $result->passwd;
    }
}


