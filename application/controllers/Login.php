<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller
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
        $this->load->Model('Login_model');
    }

    public function index()
    {
        // Pass the site info
        $data['site_info'] = $this->config->item('site_info');
        $data['base_url'] = $this->config->item('base_url');
        $data['site_page'] = 'login';

        // Load stuff
        $data['stylesheet'] = 'login';
        $data['javascript'] = 'login';

        // Load header library
        $this->load->library('LoginSystem.php');

        // load the view
        $this->load->view('templates/header.php', $data);
        $this->load->view('home/login');
        $this->load->view('templates/footer.php');
    }

    /*
     * This will server as the controller function that ajax called to login the user
     */
    public function loginProcess()
    {
        if(isset($_POST['email']) && isset($_POST['password']))
        {
            $email = $this->input->post('email');
            $password = $this->input->post('password');

            if ($email != "" && $password != "" && !empty($email) && !empty($password))
            {
                // Now use the model for authorization
                $this->Login_model->login($email, $password);
            } else
            {
                $this->res['code'] = 0;
                $this->res['string'] = "Please enter a email and password";

                echo json_encode($this->res);
                return false;
            }
        }else{
            redirect('/login' ,'refresh');
        }
    }
}