<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signup extends CI_Controller
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

    public function __construct() {
        parent::__construct();
        $this->load->Model('Signup_model');
    }

    public function index()
    {
        // Pass the site info
        $data['site_info'] = $this->config->item('site_info');
        $data['base_url'] = $this->config->item('base_url');
        $data['site_page'] = 'signup';

        // Load stuff
        $data['stylesheet'] = 'signup';
        $data['javascript'] = 'signup';

        // Load header library
        $this->load->library('SignupSystem.php');

        // load the view
        $this->load->view('templates/header.php', $data);
        $this->load->view('home/signup');
        $this->load->view('templates/footer.php');
    }

    /*
     * This will server as the controller function that ajax called to login the user
     */
    public function signupProcess()
    {
        if(isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['confirm_password']))
        {
            $firstname = $this->input->post('firstname');
            $lastname = $this->input->post('lastname');
            $username = $this->input->post('username');
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $confirm_password = $this->input->post('confirm_password');

            if (!empty($firstname) && !empty($lastname) && !empty($username) && !empty($email) && !empty($password) && !empty($confirm_password))
            {
                // Now use the model for authorization
                $this->Signup_model->signup($firstname, $lastname, $username, $email, $password, $confirm_password);
            } else
            {
                $this->res['code'] = 0;
                $this->res['string'] = "Please fill in all of the fields!";

                echo json_encode($this->res);
                return false;
            }
        }else{
            redirect('/signup' ,'refresh');
        }
    }
    
    /*
     * This will activate the users account and send them to the login page
     */
    public function activate($unique_id)
    {
        if(!empty($unique_id))
        {
            // Run the main function
            $this->Signup_model->activateUser($unique_id);
        }else
        {
            redirect('/login' ,'location');
        }
    }
}