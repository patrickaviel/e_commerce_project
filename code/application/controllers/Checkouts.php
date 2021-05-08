<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkouts extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // load Order_Model
        $this->load->model('Order_Model');
    }
     
	public function create_order()
	{
        // get user id from input
		$user_id = $this->input->post('user_id');
        // get all form data from post
        $form_data = $this->input->post();
        //  save and retreive billing id
        $bill_id = $this->Order_Model->save_ship_info($form_data);
        // save and retreive shipping id
        $ship_id = $this->Order_Model->save_bill_info($form_data);
        // get total from post
        $total = $this->security->xss_clean($this->input->post('total'));
        // set status to 'Order in Process'
        $status = 'Order in Process';
        // save and retreive order id
        $order_id = $this->Order_Model->save_order($user_id,$bill_id,$ship_id,$total,$status);
        // // save order details to database
        // $this->Order_Model->save_order_details($order_id,$item_id,$total,$qty);
        // load items from cart
        $mycart = $this->cart->contents();
        // insert items from cart using loop
        foreach ($mycart as $item) {
            $order_detail = array(
                'order_id' => $order_id,
                'product_id' => $item['id'],
                'quantity' => $item['qty'],
                'price' => $item['price'],
                'total' =>$item['price']*$item['qty']
                );
            // insert item
            $this->Order_Model->update_item_inventory($item['id'],$item['qty']);
            $order_detail_id = $this->Order_Model->save_order_details($order_detail);
        }
        // destroy cart after inserting items
        // $this->cart->destroy();
        // displaying message after succcessfully inserting items
        $this->session->set_flashdata('success_purchase', "<h3>Your order was placed successfully!</h3>");

        $data['mycart'] = $this->cart->contents();
        redirect('StripePaymentController',$data);
	}

    function view_order($order_id) {
        $data['items'] = $this->Order_Model->get_items_by_order($order_id);
        $data['details'] = $this->Order_Model->get_ship_bill_details($order_id);
        $this->load->view('Users/user_order_details',$data);
    }

    function view_order_admin($order_id) {
        $data['items'] = $this->Order_Model->get_items_by_order($order_id);
        $data['details'] = $this->Order_Model->get_ship_bill_details($order_id);
        $this->load->view('Admins/admin_view_order',$data);
    }

}
