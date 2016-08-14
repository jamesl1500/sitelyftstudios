<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact_us extends CI_Controller
{
    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *        http://example.com/index.php/welcome
     *    - or -
     *        http://example.com/index.php/welcome/index
     *    - or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */

    public $res = array();

    public function __construct()
    {
        parent::__construct();
        $this->load->Model('Contact_model');
    }

    public function contactFormProcess()
    {
        if(isset($_POST['fullname']) && isset($_POST['email']) && isset($_POST['subject']) && isset($_POST['message']))
        {
            $fullname = $this->input->post('fullname');
            $email = $this->input->post('email');
            $subject = $this->input->post('subject');
            $message = $this->input->post('message');

            if (!empty($fullname) && !empty($email) && !empty($subject) && !empty($message))
            {
                // Now use the model for authorization
                $this->Contact_model->contactFormProcess($fullname, $email, $subject, $message);
            } else
            {
                $this->res['code'] = 0;
                $this->res['string'] = "Please enter all of the details!";

                echo json_encode($this->res);
                return false;
            }
        }else{
            redirect('/login' ,'refresh');
        }
    }
}