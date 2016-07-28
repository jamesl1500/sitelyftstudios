<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller
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
        $this->load->Model('Dashboard_model');
    }

    public function index()
    {
        // Pass the site info
        $data['site_info'] = $this->config->item('site_info');
        $data['base_url'] = $this->config->item('base_url');
        $data['site_page'] = 'dashboard';

        // Load stuff
        $data['stylesheet'] = 'dashboard';
        $data['javascript'] = 'dashboard';

        // Load header library
        //$this->load->library('ForgotPasswordSystem.php');

        // load the view
        $this->load->view('templates/header.php', $data);
        $this->load->view('home/dashboard/index');
        $this->load->view('templates/footer.php');
    }
}