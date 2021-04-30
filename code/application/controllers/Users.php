<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	public function login_page() {
		$this->load->view('users/user_login');
	}
    public function registration_page() {
		$this->load->view('users/user_registration');
	}

}
