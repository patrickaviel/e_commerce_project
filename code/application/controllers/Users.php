<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('User_Model');
    }
	public function login_page() {
		$this->load->view('users/user_login');
	}
    public function registration_page() {
		$this->load->view('users/user_registration');
	}
    public function register() {
        $this->form_validation
            ->set_rules('email','Email','required|trim|valid_email|is_unique[users.email]')
            ->set_rules('contact_no','contact_no','required|trim|min_length[11]')
            ->set_rules('first_name','First Name','required|trim|min_length[2]')
            ->set_rules('last_name','Last Name','required|trim|min_length[2]')
            ->set_rules('password','Password','required|trim|min_length[8]')
            ->set_rules('c_password','Password','required|trim|min_length[8]|matches[password]')
            ->set_rules('house_no','House No','required|trim|numeric|min_length[1]')
            ->set_rules('barangay','Barangay','required|trim|min_length[3]')
            ->set_rules('municipality','Municipality','required|trim|min_length[3]')
            ->set_rules('province','Province','required|trim|min_length[3]')
            ->set_rules('zip','Zip','required|trim|numeric|min_length[3]');

        if($this->form_validation->run()==FALSE){
            $this->load->view('users/user_login');
        }else{
            $form_data = $this->input->post();
            $user_id = $this->User_Model->create_user($form_data);
            $this->User_Model->add_address($form_data,$user_id);
            $user = $this->User_Model->get_user_by_id($user_id);
            $this->session->set_userdata($user); 
            redirect("products/products_page");
        } 
    }
    public function login() {
        $this->form_validation
            ->set_rules('email','Email','required|trim|valid_email')
            ->set_rules('password','First Name','required|trim');

        if($this->form_validation->run()==FALSE){
            $this->login_page();
        }else{
            
            $email = $this->input->post('email');
            $user= $this->User_Model->get_user_by_email($email);

            $result = $this->User_Model->validate_signin_match($user, $this->input->post('password'));
            if($result == "success") 
            {
                //$this->session->set_userdata($user);  
                $this->session->set_userdata($user);           
                redirect("products/products_page");
            }
            else 
            {
                $this->session->set_flashdata('input_errors', $result);
                redirect("login");
            }
        } 
    }

    public function user_profile(){
        if(is_null($this->session->userdata('user_id'))){
            redirect('login');
        }else{
        $this->load->view('Users/user_profile');
    }

    public function save_profile(){
        $this->form_validation
            ->set_rules('email','Email','required|trim|min_length[11]')
            ->set_rules('contact_no','contact_no','required|trim|min_length[11]')
            ->set_rules('first_name','First Name','required|trim|min_length[2]')
            ->set_rules('last_name','Last Name','required|trim|min_length[2]')
            ->set_rules('password','Password','required|trim|min_length[8]')
            ->set_rules('c_password','Password','required|trim|min_length[8]|matches[password]')
            ->set_rules('house_no','House No','required|trim|numeric|min_length[1]')
            ->set_rules('barangay','Barangay','required|trim|min_length[3]')
            ->set_rules('municipality','Municipality','required|trim|min_length[3]')
            ->set_rules('province','Province','required|trim|min_length[3]')
            ->set_rules('zip','Zip','required|trim|numeric|min_length[3]');

        if($this->form_validation->run()==FALSE){
            $this->user_profile();
        }else{
            $form_data = $this->input->post();
            $user_id = $this->input->post('user_id');
            $this->User_Model->update_profile($form_data);
            $user = $this->User_Model->get_user_by_id($user_id);
            $this->session->set_userdata($user);
            $result =   "<div class='alert alert-success' role='alert'>
                            Success!
                        </div>";
            $this->session->set_flashdata('success', $result);
            redirect("users/user_profile");
        } 
        
    }

    public function my_orders(){
        $this->load->view('Users/user_orders');
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect(base_url());   
    }

}
