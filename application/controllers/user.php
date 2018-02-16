<?php

/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2/16/2018
 * Time: 2:50 PM
 */
class user extends CI_Controller
{
    public function index()
    {
        $data = array(
            'message' => 'taena!'
        );
        $this->load->view('userindex',$data);
    }
}