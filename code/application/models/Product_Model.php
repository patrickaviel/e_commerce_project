<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_Model extends CI_Model {

    // load all brands from the table brands
    function get_all_brands() {
        $query = "Select * from brands";
        return $this->db->query($query)->result_array();
    }

    // load all categories from the table categories
    function get_all_categories() {
        $query = "Select * from categories";
        return $this->db->query($query)->result_array();
    }

    // load all items from the table items
    function get_all_items() {
        $query = "Select * from items";
        return $this->db->query($query)->result_array();
    }

    // add new brand to the table brands
    function add_item($data) {

        $query = "INSERT INTO items (name,description,brand_id,category_id,price,qty,created_at) VALUES (?,?,?,?,?,?,?)";
        $values = array(
                    $this->security->xss_clean($data['name']), 
                    $this->security->xss_clean($data['description']),
                    $this->security->xss_clean($data['brand']), 
                    $this->security->xss_clean($data['category']),
                    $this->security->xss_clean($data['price']),
                    $this->security->xss_clean($data['quantity']),    
                    date("Y-m-d h:i:s")
        ); 
        $this->db->query($query,$values);
        return $this->db->insert_id();
    }

    // add new brand to the table brands
    function add_brand($data) {

        $query = "INSERT INTO brands (brand,created_at) VALUES (?,?)";
        $values = array(
                    $this->security->xss_clean($data['brand']), 
                    date("Y-m-d h:i:s")
        ); 
        $this->db->query($query,$values);
        return $this->db->insert_id();
    }

    // add new category to table categories
    function add_category($data) {
        $query = "INSERT INTO categories (category,created_at) VALUES (?,?)";
        $values = array(
                    $this->security->xss_clean($data['category']),
                    date("Y-m-d h:i:s")
        ); 
        return $this->db->query($query,$values);
    }

    // updating the selected category in the database
    function update_category($data){
        $query = "UPDATE categories SET category = ? ,
                                        updated_at = ? 
                                        WHERE id = ?";
                                    
        $values = array(
                    $this->security->xss_clean($data['category']),
                    date("Y-m-d h:i:s"),
                    $this->security->xss_clean($data['category_id'])
        );
        return $this->db->query($query,$values);
    }

    // updating selected brand in the database
    function update_brand($data){
        $query = "UPDATE brands SET brand = ? ,
                                        updated_at = ? 
                                        WHERE id = ?";
                                    
        $values = array(
                    $this->security->xss_clean($data['brand']),
                    date("Y-m-d h:i:s"),
                    $this->security->xss_clean($data['brand_id'])
        );
        return $this->db->query($query,$values);
    }

    function delete_category($id){
        $query = "DELETE FROM categories WHERE id = ?";                           
        $values = array($this->security->xss_clean($id));
        return $this->db->query($query,$values);
    }

    function delete_brand($id){
        $query = "DELETE FROM brands WHERE id = ?";                           
        $values = array($this->security->xss_clean($id));
        return $this->db->query($query,$values);
    }

}