<?php
defined('BASEPATH') OR exit('No direct script access allowed');
   
class StripePaymentController extends CI_Controller {
    
    public function __construct() {
       parent::__construct();
       $this->load->library("session");
       $this->load->helper('url');
       $this->load->model('Order_Model');
    }
    

    public function index()
    {
        if(is_null($this->session->userdata('user_id'))){
            redirect('login');
        }else{
            $data['mycart'] = $this->cart->contents();
            $this->load->view('Products/checkout',$data);
        }
    }

    public function handlePayment()
    {
        $total = $this->input->post('total');
        require_once('application/libraries/stripe-php/init.php');
    
        \Stripe\Stripe::setApiKey($this->config->item('stripe_secret'));
     
        \Stripe\Charge::create ([
                "amount" => str_replace(",","",$total)*100,
                "currency" => "php",
                "source" => $this->input->post('stripeToken'),
                "description" => "Dummy stripe payment." 
        ]);
            
        $this->session->set_flashdata('success', 'Payment has been successful.');
        $this->cart->destroy();
        redirect('/make-stripe-payment', 'refresh');
    }
}   