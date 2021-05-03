<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Product_Model');
    }

    public function products_page() {
        $this->load->view('Products/products_page');
    }
    
    public function add_brand(){
        $this->form_validation
            ->set_rules('brand','Brand','required|trim|min_length[3]|is_unique[brands.brand]');

        if($this->form_validation->run()==FALSE){
            $this->load->view('admins/admin_brands');
        }else{
            $form_data = $this->input->post();
            $this->Product_Model->add_brand($form_data);
            $data['brands'] = $this->Product_Model->get_all_brands();
            $this->load->view('Admins/admin_brands',$data);
        } 
    }

    public function add_category(){
        $this->form_validation
            ->set_rules('category','Category','required|trim|min_length[3]|is_unique[categories.category]');

        if($this->form_validation->run()==FALSE){
            $this->load->view('admins/admin_brands');
        }else{
            $form_data = $this->input->post();
            $this->Product_Model->add_category($form_data);
            $data['categories'] = $this->Product_Model->get_all_categories();
            $this->load->view('Admins/admin_brands',$data);
        }
    }

}