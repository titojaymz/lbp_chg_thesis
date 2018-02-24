<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by Josef Friedrich S Baldo
 * Date: 10 Oct 2017
 * Time: 17:53
 */
class user extends CI_Controller
{
    public function index()
    {
        $this->validateLogin();

        $user_model = new User_model();

        if(!$this->form_validation->run())
        {
            $data = array(
                'system_message' => ''
            );
        }
        else
        {
            $this->session->set_userdata('failed_login', 0);
            $failed_logins = 0;

            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $hashedPassword = $this->encrypt->decode($user_model->getPassByUser($username));

            if ($password == $hashedPassword)
            {
                $userData = $user_model->getUserlogin($username);

                if($userData['count'] > 0)
                {
                    $newdata = array(
                        'user_id' => $userData['result']['uid'],
                        'user_data' => $userData['result']['full_name'],
                        'access_level' => $userData['result']['access_level']
                    );

                    $this->session->set_userdata($newdata);

                    $system_message = 'Login success!';
                    $data['system_message'] = $system_message;

                    redirect('public_access/index','location');
                }
                else
                {
                    $data = array(
                        'username' => $username,
                        'password' => $password,
                        'userData' => $userData,
                        'system_message' => 'Error login'
                    );
                }
            }
            else
            {
                $data['system_message'] = 'failedddddd';
            }
        }
        $this->load->view('login_header');
        $this->load->view('user_index',$data);
        $this->load->view('login_footer');
    }

    public function userlist()
    {
        if (!$this->session->userdata('user_data')){
            redirect('user','location');
        }

        $userlist = new User_model();

        $data['system_message'] = 'asdasdasd';
        $data['userlist'] = $userlist->getAllUsers();

        $this->load->view('header');
        $this->load->view('navbar');
        $this->load->view('sidebar');
        $this->load->view('userlist',$data);
        $this->load->view('footer');
    }

    public function adduser()
    {
        $this->load->view('header');
        $this->load->view('navbar');
        $this->load->view('sidebar');
        $this->load->view('adduser');
        $this->load->view('footer');
    }

    protected function validateLogin()
    {
        $config = array(
            array(
                'field'   => 'username',
                'label'   => 'username',
                'rules'   => 'required'
            ),
            array(
                'field'   => 'password',
                'label'   => 'password',
                'rules'   => 'required'
            )
        );

        return $this->form_validation->set_rules($config);
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('user','location');
    }

    public function register()
    {
        $userModel = new User_model();

        $data['msg'] = $this->encrypt->decode($userModel->getUserByID(8));

        $this->validateRegister();

        if(!$this->form_validation->run())
        {
            $data['system_message'] = false;
        }
        else
        {
            $x_fullname = $this->input->post('x_fullname');
            $x_email = $this->input->post('x_email');
            $x_username = $this->input->post('x_username');
            $x_password = $this->encrypt->encode($this->input->post('x_password'));

            $result = $userModel->addUser($x_fullname,$x_username,$x_email,$x_password);

            if($result == 1)
            {
                $data['system_message'] = 'Registeration success!';
            }
            else
            {
                $data['system_message'] = 'There was an error during the registration!';
            }
        }

        $this->load->view('login_header');
        $this->load->view('register',$data);
        $this->load->view('login_footer');
    }

    protected function validateRegister()
    {
        $config = array(
            array(
                'field'   => 'x_fullname',
                'label'   => 'Full name',
                'rules'   => 'required'
            ),
            array(
                'field'   => 'x_email',
                'label'   => 'E-mail',
                'rules'   => 'required'
            ),
            array(
                'field'   => 'x_username',
                'label'   => 'Username',
                'rules'   => 'required'
            ),
            array(
                'field'   => 'x_password',
                'label'   => 'Password',
                'rules'   => 'required|matches[x_passwordconfirm]'
            ),
            array(
                'field'   => 'x_passwordconfirm',
                'label'   => 'Confirm Password',
                'rules'   => 'required'
            )
        );

        return $this->form_validation->set_rules($config);
    }
}