<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {
    public function products_page() {
        $this->load->view('Products/products_page');
    }
}