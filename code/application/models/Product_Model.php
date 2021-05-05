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
    function add_item($data,$file_name) {

        $query = "INSERT INTO items (name,description,brand_id,category_id,price,qty,image,created_at) VALUES (?,?,?,?,?,?,?,?)";
        $values = array(
                    $this->security->xss_clean($data['name']), 
                    $this->security->xss_clean($data['description']),
                    $this->security->xss_clean($data['brand']), 
                    $this->security->xss_clean($data['category']),
                    $this->security->xss_clean($data['price']),
                    $this->security->xss_clean($data['quantity']),  
                    $this->security->xss_clean($file_name),   
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

    function get_items($limit,$start,$where){
        $this->db->select('items.id, name, description,price,qty,image,categories.category, brands.brand');
        $this->db->from('items');
        $this->db->join('categories', 'items.category_id = categories.id', 'left');
        $this->db->join('brands', ' items.brand_id = brands.id', 'left');
        $this->db->where($where);
        $this->db->limit($limit,$start);
        $query = $this->db->get_compiled_select();
        
        // return $this->db->where($where)->limit($limit,$start)->get('items')->result_array();
        return $this->db->query($query)->result_array();
    }

    function count_items($where){
        return $this->db->where($where)->count_all_results('items');
    }

    function get_item_by_id($id) {
        $query = "SELECT items.id, name, description,price,qty,image,categories.category, brands.brand FROM `e-shoepify`.items 
                        LEFT JOIN categories ON items.category_id = categories.id
                        LEFT JOIN brands ON items.brand_id = brands.id
                        WHERE items.id = ?";
        $values = array($this->security->xss_clean($id));
        return $this->db->query($query,$values)->row_array();
    }
}