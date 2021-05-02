<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admins extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('User_Model');
    }

    public function admin_login() {
        $this->form_validation
            ->set_rules('email','Email','required|trim|valid_email')
            ->set_rules('password','First Name','required|trim');

        if($this->form_validation->run()==FALSE){
            $this->admin_login_page();
        }else{
            
            $email = $this->input->post('email');
            $user= $this->User_Model->get_user_by_email($email);

            $result = $this->User_Model->admin_validate_signin_match($user, $this->input->post('password'));
            if($result == "success") 
            {
                //$this->session->set_userdata($user);  
                $this->session->set_userdata($user);           
                redirect("admins/admin_dashboard");
            }
            else 
            {
                $this->session->set_flashdata('input_errors', $result);
                $this->admin_login_page();
            }
        } 
    }

    public function admin_dashboard(){
        $this->load->view('admins/admin_dashboard');
    }

    public function admin_login_page(){
        $this->load->view('admins/admin_login');
    }

    public function admin_registration_page(){
        $this->load->view('admins/admin_registration');
    }

    public function admin_register(){
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
            // var_dump(validation_errors());
            $this->load->view('Admins/admin_registration');
           
        }else{
            $form_data = $this->input->post();
            $user_id = $this->User_Model->create_admin_user($form_data);
            $this->User_Model->add_address($form_data,$user_id);
            $user = $this->User_Model->get_user_by_id($user_id);
            $this->session->set_userdata($user); 
            redirect("products/products_page");
        } 
    }

}