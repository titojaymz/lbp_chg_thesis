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

    public function addUser($full_name,$username,$email,$passwd)
    {
        $this->db->trans_begin();

        $this->db->query('INSERT INTO users(full_name, username, email, passwd, date_created)
        VALUES
        (
        "'.$full_name.'",
        "'.$username.'",
        "'.$email.'",
        "'.$passwd.'",
        NOW()
        )
        ');
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


