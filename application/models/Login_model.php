<?php
class Login_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('LoginSystem');
    }

    public function login($email, $password)
    {
        if(!empty($email) && !empty($password))
        {
            $login = new LoginSystem;
            $login->process($email, $password);
        }
    }
}