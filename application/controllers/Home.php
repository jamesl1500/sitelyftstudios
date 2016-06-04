<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		// Pass the site info
		$data['site_info'] = $this->config->item('site_info');
		$data['base_url'] = $this->config->item('base_url');
		$data['site_page'] = 'index';
		
		// Load stuff
		$data['stylesheet'] = 'home';

		// load the view
		$this->load->view('templates/header.php', $data);
		$this->load->view('home');
		$this->load->view('templates/footer.php');
	}

	public function login()
	{
		// Pass the site info
		$data['site_info'] = $this->config->item('site_info');
		$data['base_url'] = $this->config->item('base_url');
		$data['site_page'] = 'login';

		// Load stuff
		$data['stylesheet'] = 'login';

		// Load header library
		$this->load->library('Login.php');

		// load the view
		$this->load->view('templates/header.php', $data);
		$this->load->view('home/login');
		$this->load->view('templates/footer.php');
	}

	public function signup()
	{
		$this->load->view('home/signup');
	}

	public function forgot_password()
	{
		$this->load->view('home/forgot_password');
	}
}
