<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library("pagination");
        $this->load->model('Product_Model');
    }

    public function products_page() {
        $search = $this->input->get('search');
        $start = (int)$this->input->get('per_page');
        $limit = $this->config->item('per_page');
        $where=[];
        if($search){
            $where['name LIKE'] = '%' .$search. '%';
        }
        $data['items'] = $this->Product_Model->get_items($limit,$start,$where);
        $this->pagination->initialize([
            'base_url'      => current_url() . ($search ? 'search='.$search : ''),
            'total_rows'    => $this->Product_Model->count_items($where)
        ]);
        $data['pagination'] = $this->pagination->create_links();
        $data['categories'] = $this->Product_Model->get_all_categories_count();
        $data['item_count'] = $this->Product_Model->count_all_items();
        $this->load->view('Products/products_page',$data);
    }

    public function item_page($id) {
        $data['item'] = $this->Product_Model->get_item_by_id($id);
        $this->load->view('Products/item_page',$data);
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
            $data['categories'] = $this->Product_Model->get_all_categories();
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
            $data['brands'] = $this->Product_Model->get_all_brands();
            $data['categories'] = $this->Product_Model->get_all_categories();
            $this->load->view('Admins/admin_brands',$data);
        }
    }

    public function add_new_item(){
        $this->form_validation
            ->set_rules('name','Name','required|trim')
            ->set_rules('description','Description','required|trim')
            ->set_rules('category','Category','required|trim')
            ->set_rules('quantity','Quantity','required|numeric')
            ->set_rules('price','Price','required|trim|greater_than[0]');
        if($this->form_validation->run()==FALSE){
            redirect('admin/products');
        }else{
            $ori_filename = $_FILES['image']['name'];
            $new_name = time()."".str_replace(' ', '-', $ori_filename);
            $config = [
                'upload_path'       =>      './product_images/',
                'allowed_types'     =>      'gif|jpg|png',
                'file_name'         =>      $new_name,
            ];
            $this->load->library('upload', $config);
            if ( ! $this->upload->do_upload('image')) {
                $image_error = $this->upload->display_errors();
                $this->session->set_flashdata('image_error', $image_error);
                redirect('admin/products');
            } else {
                $image_filename = $this->upload->data('file_name');
                $form_data = $this->input->post();
                $this->Product_Model->add_item($form_data,$image_filename);
                $this->session->set_flashdata('success', "Successfully added new item!");
                redirect('admin/products');
            }
        } 
    }

    public function add_to_cart() {
		$product_id = $this->input->post('prod_id',TRUE);
        $product_name = $this->input->post('name',TRUE);
		$product_qty = $this->input->post('quantity',TRUE);
		$product_price = $this->input->post('price',TRUE);
		$prod_list = array(
			'id'    => $product_id,
			'name'  => $product_name,
			'price' => $product_price,
			'qty'  	=> $product_qty
		 );
		$this->cart->insert($prod_list);
        $this->session->set_flashdata('success', "Added to cart!");
		redirect('products/item_page/'.$product_id);
	}

    public function checkout() {
        if(is_null($this->session->userdata('user_id'))){
            redirect('login');
        } else {
            $data['mycart'] = $this->cart->contents();
            $this->load->view('Products/checkout_page',$data);
        }
    }

    public function remove_cart_item($id) {
        $data = $this->cart->contents();
		$data[$id]['qty'] = 0;
		$this->cart->update($data);
		redirect('/products/checkout');
    }

    public function delete_item($item_id) {
        $this->Product_Model->delete_item($item_id);
        $this->session->set_flashdata('success', "Item deleted!");
        redirect('admin/products');
    }

    public function edit_item() {
        $this->form_validation
            ->set_rules('product_name','Name','required|trim')
            ->set_rules('product_description','Description','required|trim')
            ->set_rules('product_category','Category','required|trim')
            ->set_rules('product_quantity','Quantity','required|numeric')
            ->set_rules('product_price','Price','required|trim|greater_than[0]');
        if($this->form_validation->run()==FALSE) {
            $this->session->set_flashdata('error', "Error updating the item!");
            redirect('admin/products');
        } else {
            $this->Product_Model->update_item();
            $this->session->set_flashdata('success', "Item updated successfully!");
            redirect('admin/products');
        }
    }

}