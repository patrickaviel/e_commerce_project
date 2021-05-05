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
        $this->load->view('Products/products_page',$data);
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

            // var_dump(validation_errors());
            // echo "error";
            $data['brands'] = $this->Product_Model->get_all_brands();
            $data['categories'] = $this->Product_Model->get_all_categories();
            $data['items'] = $this->Product_Model->get_all_items();
            $this->session->set_flashdata('error', "Error adding new item!");
            $this->load->view('Admins/admin_products',$data);
        }else{
            $ori_filename = $_FILES['image']['name'];
            
            $new_name = time()."".str_replace(' ', '-', $ori_filename);
            $config = [
                'upload_path'       =>      './product_images/',
                'allowed_types'     =>      'gif|jpg|png',
                'file_name'         =>      $new_name,
            ];

            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload('image'))
            {
                    $image_error = $this->upload->display_errors();
                    $data['brands'] = $this->Product_Model->get_all_brands();
                    $data['categories'] = $this->Product_Model->get_all_categories();
                    $data['items'] = $this->Product_Model->get_all_items();
                    $this->session->set_flashdata('image_error', $image_error);
                    $this->load->view('Admins/admin_products', $data);
            }
            else
            {
                    $image_filename = $this->upload->data('file_name');
                    $form_data = $this->input->post();
                    // var_dump($image_filename);
                    // var_dump($form_data);
                    $this->Product_Model->add_item($form_data,$image_filename);

                    $data['brands'] = $this->Product_Model->get_all_brands();
                    $data['categories'] = $this->Product_Model->get_all_categories();
                    $data['items'] = $this->Product_Model->get_all_items();
                    $this->session->set_flashdata('success', "Successfully added new item!");
                    $this->load->view('Admins/admin_products',$data);
            }
        } 
    }

    public function add_to_cart() {
		$product_id = $this->input->post('prod_id',TRUE);
		// $product_name = "Hello";
        $product_name = $this->input->post('name',TRUE);
		$product_qty = $this->input->post('quantity',TRUE);
		$product_price = $this->input->post('price',TRUE);
		
		$prod_list = array(
			'id'    => $product_id,
			'name'  => $product_name,
			'price' => $product_price,
			'qty'  	=> $product_qty
		 );

        // var_dump($prod_list);
        
		$this->cart->insert($prod_list);
        var_dump($this->cart->contents());
		// redirect('products/item_page/'.$product_id);
	}

}