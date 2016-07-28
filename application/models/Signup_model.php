<?php
class Signup_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('SignupSystem');
    }

    public function signup($firstname, $lastname, $username, $email, $password, $confirm_password)
    {
        if(!empty($firstname) && !empty($lastname) && !empty($username) && !empty($email) && !empty($password) && !empty($confirm_password))
        {
            $signup = new SignupSystem;
            $signup->process($firstname, $lastname, $username, $email, $password, $confirm_password);
        }
    }

    public function activateUser($unique_id)
    {
        if(!empty($unique_id))
        {
            $signup = new SignupSystem;
            $signup->processActivation($unique_id);
        }
    }
}