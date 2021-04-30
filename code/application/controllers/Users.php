<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	public function login_page() {
		$this->load->view('users/user_login');
	}
    public function registration_page() {
		$this->load->view('users/user_registration');
	}
    public function register() {
        $this->form_validation
            ->set_rules('email','Email','required|trim|valid_email|is_unique[users.email]')
            ->set_rules('first_name','First Name','required|trim|alpha|min_length[2]')
            ->set_rules('last_name','Last Name','required|trim|alpha|min_length[2]')
            ->set_rules('password','Password','required|trim|min_length[8]')
            ->set_rules('c_password','Password','required|trim|min_length[8]|matches[password]')
            ->set_rules('house_no','House No','required|trim|numeric|min_length[1]')
            ->set_rules('barangay','Barangay','required|trim|min_length[3]')
            ->set_rules('municipality','Municipality','required|trim|min_length[3]')
            ->set_rules('province','Province','required|trim|min_length[3]')
            ->set_rules('zip','Zip','required|trim|numeric|min_length[3]');

        if($this->form_validation->run()){

        }    
        $this->load->view('users/user_registration');
    }
    public function login() {

    }
    public function admin_login_page(){
        $this->load->view('admins/admin_login');
    }
    public function admin_login(){
        
    }

}
