<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by Josef Friedrich Baldo
 * Date: 24/02/2018
 * Time: 5:04 PM
 */
class user extends CI_Controller
{

    public function accessLevel()
    {
        if (!$this->session->userdata('access_level'))
        {
            return false;
        }
        else
        {
            return $this->session->userdata('access_level');
        }
    }

    protected function superKey()
    {
        return $this->config->item('encryption_key');
    }

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
                    $full_name = $userData['result']['firstname'] . ' ' . $userData['result']['middlename'] . ' ' . $userData['result']['lastname'] . ' ' . $userData['result']['extname'];
                    $newdata = array(
                        'user_id' => $userData['result']['uid'],
                        'user_data' => $full_name,
                        'access_level' => $userData['result']['access_level']
                    );

                    $this->session->set_userdata($newdata);

                    $system_message = 'Login success!';
                    $data['system_message'] = $system_message;

                    redirect('landregistration/index','location');
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
                $data['system_message'] = 'Your username or password is incorrect!';
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

        $data['access_level'] = $this->accessLevel();

        $userlist = new User_model();

        $data['system_message'] = '';
        $data['userlist'] = $userlist->getAllUsers();

        $this->load->view('header');
        $this->load->view('navbar',$data);
        if ($this->accessLevel() == -1)
        {
            $this->load->view('sidebar');
        }
        $this->load->view('userlist',$data);
        $this->load->view('footer');
    }

    public function adduser()
    {
        if (!$this->session->userdata('user_data')){
            redirect('user','location');
        }

        $data['access_level'] = $this->accessLevel();

        $userlist = new User_model();

        $data['system_message'] = 'asdasdasd';
        $data['userlist'] = $userlist->getAllUsers();

        $this->load->view('header');
        $this->load->view('navbar',$data);
        if ($this->accessLevel() == -1)
        {
            $this->load->view('sidebar');
        }
        $this->load->view('adduser',$data);
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

        $agencySelector = $this->agency_selector('x_group_code',NULL,'form-control',TRUE);

        $this->validateRegister();

        if(!$this->form_validation->run())
        {
            $data['system_message'] = false;
            $data['agencySelector'] = $agencySelector;
        }
        else
        {
            $x_lastname = $this->input->post('x_lastname');
            $x_firstname = $this->input->post('x_firstname');
            $x_middlename = $this->input->post('x_middlename');
            $x_extname = $this->input->post('x_extname');
            $x_group_code = $this->input->post('x_group_code');
            $x_email = $this->input->post('x_email');
            $x_username = $this->input->post('x_username');
            $x_password = $this->encrypt->encode($this->input->post('x_password'));

            $result = $userModel->addUser($x_lastname,$x_firstname,$x_middlename,$x_extname,$x_username,$x_email,$x_password,$x_group_code);

            if($result == 1)
            {
                /*$data['system_message'] = 'Registration success!';
                $data['agencySelector'] = $agencySelector;*/
                redirect('user/index/?system_message=rs');
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
                'field'   => 'x_lastname',
                'label'   => 'Last name',
                'rules'   => 'required'
            ),
            array(
                'field'   => 'x_firstname',
                'label'   => 'First name',
                'rules'   => 'required'
            ),
            array(
                'field'   => 'x_middlename',
                'label'   => 'Middle name',
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
                'field'   => 'x_group_code',
                'label'   => 'Office/Division',
                'rules'   => 'callback_groupcode_checkvalue'
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

    public function updateUser($uid)
    {
        if (!$this->session->userdata('user_data')){
            redirect('user','location');
        }

        $session_uid = $this->session->userdata('user_id');

        $userData = new User_model();

        $accountData = $userData->getUserDetails($session_uid);

        $userRecordData = $userData->getUserDetails($uid);

        $agencySelector = $this->agency_selector('x_group_code',$userRecordData['GroupCode'],'form-control');

        $userID = $accountData['uid'];
        $full_name = $accountData['firstname'] . ' ' . $accountData['middlename'] . ' ' . $accountData['lastname'] . ' ' . $accountData['extname'];
        $GroupCode = $accountData['GroupCode'];
        $accEmail = $accountData['email'];

        $this->validateUpdateUserInput();

        if (!$this->form_validation->run())
        {
            $data = array(
                'system_message' => 'Please check the following fields',
                'fullName' => $full_name,
                'groupCode' => $GroupCode,
                'emailz' => $accEmail,
                'userRecordData' => $userRecordData,
                'agencySelector' => $agencySelector
            );

            $data['access_level'] = $this->accessLevel();

            $this->load->view('header');
            $this->load->view('navbar',$data);
            if ($this->accessLevel() == -1)
            {
                $this->load->view('sidebar');
            }
            $this->load->view('useredit',$data);
            $this->load->view('footer');
        }
        else
        {
            $requesting_person = $userID;
            $x_uid = $userRecordData['uid'];

            if($userRecordData['username'] == $this->input->post('x_username'))
            {
                $x_username = $userRecordData['username'];
            }
            else
            {
                $x_username = $this->input->post('x_username');
            }

            if($userRecordData['email'] == $this->input->post('x_email'))
            {
                $x_email = $userRecordData['email'];
            }
            else
            {
                $x_email = $this->input->post('x_email');
            }

            if($this->encrypt->decode($userRecordData['passwd']) == $this->encrypt->decode($this->input->post('x_password')))
            {
                $x_password = $userRecordData['passwd'];
            }
            else
            {
                $x_password = $this->encrypt->encode($this->input->post('x_password'));
            }

            if($userRecordData['lastname'] == $this->input->post('x_lastname'))
            {
                $x_lastname = $userRecordData['lastname'];
            }
            else
            {
                $x_lastname = $this->input->post('x_lastname');
            }

            if($userRecordData['firstname'] == $this->input->post('x_firstname'))
            {
                $x_firstname = $userRecordData['firstname'];
            }
            else
            {
                $x_firstname = $this->input->post('x_firstname');
            }

            if($userRecordData['middlename'] == $this->input->post('x_middlename'))
            {
                $x_middlename = $userRecordData['middlename'];
            }
            else
            {
                $x_middlename = $this->input->post('x_middlename');
            }

            if($userRecordData['extname'] == $this->input->post('x_extname'))
            {
                $x_extname = $userRecordData['extname'];
            }
            else
            {
                $x_extname = $this->input->post('x_extname');
            }

            if($userRecordData['activated'] == $this->input->post('x_activated'))
            {
                $x_activated = $userRecordData['activated'];
            }
            else
            {
                $x_activated = $this->input->post('x_activated');
            }

            if($userRecordData['access_level'] == $this->input->post('x_access_level'))
            {
                $x_access_level = $userRecordData['access_level'];
            }
            else
            {
                $x_access_level = $this->input->post('x_access_level');
            }

            if($userRecordData['locked_status'] == $this->input->post('x_locked_status'))
            {
                $x_locked_status = $userRecordData['locked_status'];
            }
            else
            {
                $x_locked_status = $this->input->post('x_locked_status');
            }

            if($userRecordData['GroupCode'] == $this->input->post('x_group_code'))
            {
                $x_group_code = $userRecordData['GroupCode'];
            }
            else
            {
                $x_group_code = $this->input->post('x_group_code');
            }

            $addResult = $userData->updateUser($x_uid,$x_username,$x_email,$x_password,$x_activated,$x_access_level,$requesting_person,$x_locked_status,$x_group_code,$x_lastname,$x_firstname,$x_middlename,$x_extname);

            if ($addResult == 1)
            {
                $data['system_message'] = 'User successfully edited!';
                $data['userlist'] = $userData->getAllUsers();
                $data['access_level'] = $this->accessLevel();

                $this->load->view('header');
                $this->load->view('navbar',$data);
                if ($this->accessLevel() == -1)
                {
                    $this->load->view('sidebar');
                }
                $this->load->view('userlist',$data);
                $this->load->view('footer');
            }
            else
            {
                $data = array(
                    'system_message' => 'There was an error editing the record, please try again',
                    'fullName' => $full_name,
                    'groupCode' => $GroupCode,
                    'emailz' => $accEmail,
                    'access_level' => $this->accessLevel()
                );

                $this->load->view('header');
                $this->load->view('navbar',$data);
                if ($this->accessLevel() == -1)
                {
                    $this->load->view('sidebar');
                }
                $this->load->view('useredit',$data);
                $this->load->view('footer');
            }
        }
    }

    protected function validateUpdateUserInput()
    {
        $config = array(
            array(
                'field'   => 'x_username',
                'label'   => 'Username',
                'rules'   => 'required'
            ),
        );

        return $this->form_validation->set_rules($config);
    }

    protected function agency_selector($name_id,$selected_value = NULL,$class = 'form-control',$is_required = FALSE)
    {
        $selector = new User_model();
        if($is_required)
        {
            $html = '<select class="'.$class.'" name="'.$name_id.'" id="'.$name_id.'" required>';
        }
        else
        {
            $html = '<select class="'.$class.'" name="'.$name_id.'" id="'.$name_id.'">';
        }
        $html .= '<option value="0">Please select</option>';
        $text = '';
        foreach($selector->getLibAgencyGroup() as $i => $rowData)
        {
            if($selected_value == $rowData->GroupCode)
            {
                $text = 'selected';
            }
            else
            {
                $text = '';
            }
            $html .= '<option '.$text.' value="'.$rowData->GroupCode.'">'.$rowData->GroupName .'</option>';
        }
        $html .= '</select>';
        return $html;
    }

    public function groupcode_checkvalue($str)
    {
        if ($str == "0")
        {
            $this->form_validation->set_message('groupcode_checkvalue', 'The Office/Division field is required.');
            return false;
        }
        else
        {
            return true;
        }
    }

    public function changepassword()
    {
        if (!$this->session->userdata('user_data')){
            redirect('user','location');
        }

        $session_uid = $this->session->userdata('user_id');

        $userData = new User_model();

        $accountData = $userData->getUserDetails($session_uid);

        $userID = $accountData['uid'];
        $full_name = $accountData['firstname'] . ' ' . $accountData['middlename'] . ' ' . $accountData['lastname'] . ' ' . $accountData['extname'];
        $GroupCode = $accountData['GroupCode'];
        $accEmail = $accountData['email'];

        $this->validateChangePassword();

        if (!$this->form_validation->run())
        {
            $data = array(
                'system_message' => '',
                'fullName' => $full_name,
                'groupCode' => $GroupCode,
                'emailz' => $accEmail,
                'access_level' => $this->accessLevel(),
                'accountData' => $accountData
            );
        }
        else
        {
            $form_old_password = $this->input->post('x_old_password');
            $db_old_password = $this->encrypt->decode($accountData['passwd']);
            $form_new_password = $this->input->post('x_new_password');

            if($form_old_password == $db_old_password)
            {
                $changeResult = $userData->changePword($session_uid,$this->encrypt->encode($form_new_password),$session_uid);

                if($changeResult == 1)
                {
                    $data = array(
                        'system_message' => 'Password successfully changed!',
                        'fullName' => $full_name,
                        'groupCode' => $GroupCode,
                        'emailz' => $accEmail,
                        'access_level' => $this->accessLevel(),
                        'accountData' => $accountData,
                        'values' => $values
                    );
                }
                else
                {
                    $data = array(
                        'system_message' => 'There was an error saving your new password',
                        'fullName' => $full_name,
                        'groupCode' => $GroupCode,
                        'emailz' => $accEmail,
                        'access_level' => $this->accessLevel(),
                        'accountData' => $accountData
                    );
                }
            }
            else
            {
                $data = array(
                    'system_message' => 'Please enter your previous correct password',
                    'fullName' => $full_name,
                    'groupCode' => $GroupCode,
                    'emailz' => $accEmail,
                    'access_level' => $this->accessLevel(),
                    'accountData' => $accountData
                );
            }
        }
        $this->load->view('header');
        $this->load->view('navbar',$data);
        if ($this->accessLevel() == -1)
        {
            $this->load->view('sidebar');
        }
        $this->load->view('userchangepassword',$data);
        $this->load->view('footer');
    }

    protected function validateChangePassword()
    {
        $config = array(
            array(
                'field'   => 'x_old_password',
                'label'   => 'Old Password',
                'rules'   => 'required'
            ),
            array(
                'field'   => 'x_new_password',
                'label'   => 'New password',
                'rules'   => 'required|matches[x_confirm_password]'
            ),
            array(
                'field'   => 'x_confirm_password',
                'label'   => 'Confirm password',
                'rules'   => 'required'
            )
        );

        return $this->form_validation->set_rules($config);
    }
}