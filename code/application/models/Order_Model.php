<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order_Model extends CI_Model {

    function save_ship_info($data){
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

    function save_bill_info($data){
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
                    VALUES  (?,?,?,?,?)";
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
        $query = "UPDATE items SET qty = qty - ?, qty_sold = qty_sold + ? where id = ?";
        $values = array(
            $this->security->xss_clean($qty),
            $this->security->xss_clean($qty),
            $this->security->xss_clean($item_id)
        );
        return $this->db->query($query,$values);
    }

    function get_all_orders($user_id){
        // select * from orders LEFT JOIN order_details ON orders.id = order_details.order_id GROUP BY orders.id;
        $query = "SELECT * from orders WHERE user_id=?";
        $values = array(
            $this->security->xss_clean($user_id),
        );
        return $this->db->query($query,$values)->result_array();
    }

    function get_items_by_order($order_id) {
        // $query = "SELECT * FROM orders 
        //             LEFT JOIN order_details ON orders.id = order_details.order_id 
        //             GROUP BY order_details.id 
        //             HAVING orders.user_id=1,orders.id=1";
        // $query = "SELECT orders.id as order_id,,orders.total as order_total,items.id as item_id,items.name,items.price,items.description,brands.brand,categories.category,items.category_id,order_details.qty,order_details.total,
        //                     billing_informations.first_name as bill_fname,billing_informations.last_name as bill_lname,billing_informations.address as bill_address,billing_informations.city as bill_city,billing_informations.state as bill_state,billing_informations.zipcode as bill_zipcode,
        //                     shipping_informations.first_name as ship_fname,shipping_informations.last_name as ship_lname,shipping_informations.address as ship_address,shipping_informations.city as ship_city,shipping_informations.state as ship_state,shipping_informations.zipcode as ship_zipcode
        //                 FROM order_details
        //                 LEFT JOIN items ON order_details.item_id = items.id
        //                 LEFT JOIN brands ON items.brand_id = brands.id
        //                 LEFT JOIN categories ON items.category_id = categories.id
        //                 LEFT JOIN orders ON order_details.order_id = orders.id
        //                 LEFT JOIN billing_informations ON orders.billing_information_id = billing_informations.id
        //                 LEFT JOIN shipping_informations ON orders.shipping_information_id = shipping_informations.id
        //                 WHERE order_details.order_id = ?";
        $query = "SELECT orders.id as order_id,orders.total as order_total,items.id as item_id,items.name,items.price,items.description,items.image,
                                    brands.brand,categories.category,items.category_id,order_details.qty,order_details.total
                        FROM order_details
                        LEFT JOIN items ON order_details.item_id = items.id
                        LEFT JOIN brands ON items.brand_id = brands.id
                        LEFT JOIN categories ON items.category_id = categories.id
                        LEFT JOIN orders ON order_details.order_id = orders.id
                        WHERE order_details.order_id = ?";
        $values = array(
            $this->security->xss_clean($order_id)
        );
        return $this->db->query($query,$values)->result_array();
    }

    function get_ship_bill_details($order_id){
        $query = "SELECT orders.id,DATE_FORMAT(orders.created_at, '%d %b %Y %r') as order_date,orders.total,billing_informations.first_name as bill_fname,billing_informations.last_name as bill_lname,billing_informations.address as bill_address,billing_informations.city as bill_city,billing_informations.state as bill_state,billing_informations.zipcode as bill_zipcode,
                        shipping_informations.first_name as ship_fname,shipping_informations.last_name as ship_lname,shipping_informations.address as ship_address,shipping_informations.city as ship_city,shipping_informations.state as ship_state,shipping_informations.zipcode as ship_zipcode,orders.status
                        FROM orders
                        LEFT JOIN billing_informations ON orders.billing_information_id=billing_informations.id
                        LEFT JOIN shipping_informations ON orders.shipping_information_id=shipping_informations.id
                        where orders.id = ?";
        $values = array(
            $this->security->xss_clean($order_id)
        );
        return $this->db->query($query,$values)->row_array();  
    }

    function update_status($data) {
        if($data['status'] == 1){
            $status = "Order in Process";
        }elseif($data['status'] == 2){
            $status = "Shipped";
        }else{
            $status = "Cancelled";
        }
        $query = "UPDATE orders SET status = ?,updated_at=NOW() where id = ?";
        $values = array(
            $status,
            $data['order_id']
        );
        return $this->db->query($query,$values);
    }

}