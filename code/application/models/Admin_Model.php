<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_Model extends CI_Model {

    function get_all_orders(){
        // select * from orders LEFT JOIN order_details ON orders.id = order_details.order_id GROUP BY orders.id;
        $query = "SELECT CONCAT(users.first_name,' ',users.last_name) AS name,orders.status,orders.id,orders.total,orders.created_at,
                        billing_informations.first_name as bill_fname,
                        billing_informations.last_name as bill_lname,billing_informations.address as bill_address,
                        billing_informations.city as bill_city,billing_informations.state as bill_state,
                        billing_informations.zipcode as bill_zipcode,
                        shipping_informations.first_name as ship_fname,shipping_informations.last_name as ship_lname,
                        shipping_informations.address as ship_address,shipping_informations.city as ship_city,
                        shipping_informations.state as ship_state,shipping_informations.zipcode as ship_zipcode
                        FROM orders
                        LEFT JOIN billing_informations ON orders.billing_information_id=billing_informations.id
                        LEFT JOIN shipping_informations ON orders.shipping_information_id=shipping_informations.id
                        LEFT JOIN users ON orders.user_id = users.id";

        return $this->db->query($query)->result_array();
    }

    function count_item (){
       $query = "SELECT SUM(qty) as total_items FROM items";
       return $this->db->query($query)->row_array();
    }

    function count_user (){
        $query = "SELECT COUNT(*) as total_users FROM users";
        return $this->db->query($query)->row_array();
     }

     function count_order (){
        $query = "SELECT COUNT(*) as total_orders FROM orders";
        return $this->db->query($query)->row_array();
     }
}