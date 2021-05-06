<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order_Model extends CI_Model {

    function save_ship_info($data,$user_id){
        $query = "INSERT INTO shipping_informations 
                            (first_name,last_name,email,address,address_2,city,state,zipcode,created_at)
                    VALUES  (?,?,?,?,?,?,?,?,?)";
        $values = array(
            $this->security->xss_clean($data['shp_fname']),
            $this->security->xss_clean($data['shp_lname']),
            $this->security->xss_clean($data['shp_email']),
            $this->security->xss_clean($data['shp_address']),
            $this->security->xss_clean($data['shp_address2']),
            $this->security->xss_clean($data['shp_country']),
            $this->security->xss_clean($data['shp_state']),
            $this->security->xss_clean($data['shp_zipcode']),
            date("Y-m-d h:i:s"), 
        );
        $this->db->query($query,$values);
        
        return $this->db->insert_id();
    }

    function save_bill_info($data,$user_id){
        $query = "INSERT INTO billing_informations 
                            (first_name,last_name,email,address,address_2,city,state,zipcode,created_at)
                    VALUES  (?,?,?,?,?,?,?,?,?)";
        $values = array(
            $this->security->xss_clean($data['bill_fname']),
            $this->security->xss_clean($data['bill_lname']),
            $this->security->xss_clean($data['bill_email']),
            $this->security->xss_clean($data['bill_address']),
            $this->security->xss_clean($data['bill_address2']),
            $this->security->xss_clean($data['bill_country']),
            $this->security->xss_clean($data['bill_state']),
            $this->security->xss_clean($data['bill_zipcode']),
            date("Y-m-d h:i:s"), 
        );
        $this->db->query($query,$values);

        return $this->db->insert_id();
    }

    function save_order($user_id,$bill_id,$ship_id,$total,$status){
        $query = "INSERT INTO orders 
                            (user_id,billing_information_id,shipping_information_id,total,status,created_at)
                    VALUES  (?,?,?,?,?,?)";
        $values = array(
            $this->security->xss_clean($user_id),
            $this->security->xss_clean($bill_id),
            $this->security->xss_clean($ship_id),
            $this->security->xss_clean($total),
            $this->security->xss_clean($status),
            date("Y-m-d h:i:s"), 
        );
        $this->db->query($query,$values);

        return $this->db->insert_id();            
    }

    function save_order_details($order){
        $query = "INSERT INTO order_details 
                            (order_id,item_id,total,qty,created_at)
                    VALUES  (?,?,?,?,?,?)";
        $values = array(
            $this->security->xss_clean($order['order_id']),
            $this->security->xss_clean($order['product_id']),
            $this->security->xss_clean($order['total']),
            $this->security->xss_clean($order['quantity']),
            date("Y-m-d h:i:s"), 
        );
        return $this->db->query($query,$values);
    }

    function update_item_inventory($item_id,$qty){
        $query = "UPDATE items SET qty = qty - ? where id = ?";
        $values = array(
            $this->security->xss_clean($qty),
            $this->security->xss_clean($item_id)
        );
        return $this->db->query($query,$values);
    }

}