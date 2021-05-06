<?php
defined('BASEPATH') OR exit('No direct script access allowed');
   
class StripePaymentController extends CI_Controller {
    
    public function __construct() {
       parent::__construct();
       $this->load->library("session");
       $this->load->helper('url');
    }
    

    public function index()
    {
        $this->load->view('Products/checkout');
    }

    
    public function handlePayment()
    {
        require_once('application/libraries/stripe-php/init.php');
    
        \Stripe\Stripe::setApiKey($this->config->item('stripe_secret'));
     
        \Stripe\Charge::create ([
                "amount" => 2000*50,
                "currency" => "php",
                "source" => $this->input->post('stripeToken'),
                "description" => "Dummy stripe payment." 
        ]);
            
        $this->session->set_flashdata('success', 'Payment has been successful.');
             
        redirect('/make-stripe-payment', 'refresh');
    }
}   