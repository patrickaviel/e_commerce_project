<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_Model extends CI_Model {

    // load all brands from the table brands
    function get_all_brands() {
        $query = "SELECT * from brands";
        return $this->db->query($query)->result_array();
    }

    // load all categories from the table categories
    function get_all_categories() {
        $query = "SELECT * from categories";
        return $this->db->query($query)->result_array();
    }

    // load all items from the table items
    function get_all_items() {
        $query = "SELECT * FROM items";
        return $this->db->query($query)->result_array();
    }

    // add new brand to the table brands
    function add_item($data,$file_name) {

        $query = "INSERT INTO items (name,description,brand_id,category_id,price,qty,qty_sold,image,created_at) 
                    VALUES (?,?,?,?,?,?,?,?,?)";
        $values = array(
                    $this->security->xss_clean($data['name']), 
                    $this->security->xss_clean($data['description']),
                    $this->security->xss_clean($data['brand']), 
                    $this->security->xss_clean($data['category']),
                    $this->security->xss_clean($data['price']),
                    $this->security->xss_clean($data['quantity']), 
                    $this->security->xss_clean(0),   
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
    function update_category($data) {
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
    function update_brand($data) {
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

    function delete_category($id) {
        $query = "DELETE FROM categories WHERE id = ?";                           
        $values = array($this->security->xss_clean($id));
        return $this->db->query($query,$values);
    }

    function delete_brand($id) {
        $query = "DELETE FROM brands WHERE id = ?";                           
        $values = array($this->security->xss_clean($id));
        return $this->db->query($query,$values);
    }

    function get_items($limit,$start,$where) {
        $this->db->select('items.id, name, description,price,qty,image,categories.category, brands.brand');
        $this->db->from('items');
        $this->db->join('categories', 'items.category_id = categories.id', 'left');
        $this->db->join('brands', ' items.brand_id = brands.id', 'left');
        $this->db->where($where);
        // $this->db->or_like('category', $search);
        $this->db->limit($limit,$start);
        $query = $this->db->get_compiled_select();
        // return $this->db->where($where)->limit($limit,$start)->get('items')->result_array();
        return $this->db->query($query)->result_array();
    }

    function count_items($where) {
        // $this->db->select('items.id, name, description,price,qty,image,categories.category, brands.brand');
        // $this->db->from('items');
        // $this->db->join('categories', 'items.category_id = categories.id', 'left');
        // $this->db->join('brands', ' items.brand_id = brands.id', 'left');
        // // $this->db->where($where);
        // $this->db->like('name', $search);
        // $this->db->or_like('category', $search);
        // $count_reponse  = $this->db->count_all_results();
        // return $count_reponse;
        // return $this->db->join('categories', 'items.category_id = categories.id', 'left')->where($where)->or_like('category', $search)->count_all_results('items');
        return $this->db->where($where)->count_all_results('items');
    }

    function count_all_items() {
        $query = "SELECT * FROM items";
        return $this->db->query($query)->result_array();
    }

    function get_item_by_id($id) {
        $query = "SELECT items.id, name, description,price,qty,image,categories.category, brands.brand FROM `e-shoepify`.items 
                        LEFT JOIN categories ON items.category_id = categories.id
                        LEFT JOIN brands ON items.brand_id = brands.id
                        WHERE items.id = ?";
        $values = array($this->security->xss_clean($id));
        return $this->db->query($query,$values)->row_array();
    }

    function get_all_categories_count() {
        $query = "SELECT count(categories.category) as cat_count,categories.category FROM items
                    INNER JOIN categories ON items.category_id = categories.id 
                    GROUP BY categories.category";
        return $this->db->query($query)->result_array();
    }

    function delete_item($item_id) {
        $query = "DELETE from items WHERE id = ?";
        $values = array($this->security->xss_clean($item_id));
        return $this->db->query($query,$values);
    }

    function update_item() {
        $query = "UPDATE items SET name = ?, description = ?,category_id =?, price = ?, qty = ?, updated_at = NOW()
                    WHERE id = ?";
        $values = array(
            $this->security->xss_clean($this->input->post('product_name')),
            $this->security->xss_clean($this->input->post('product_description')),
            $this->security->xss_clean($this->input->post('product_category')),
            $this->security->xss_clean($this->input->post('product_price')),
            $this->security->xss_clean($this->input->post('product_quantity')),
            $this->security->xss_clean($this->input->post('product_id')),
        );
        return $this->db->query($query,$values);
    }

    function get_item_by_cat($category) {
        // $query = "SELECT items.id, name, description,price,qty,image,categories.category, brands.brand FROM items 
        //                 LEFT JOIN categories ON items.category_id = categories.id
        //                 LEFT JOIN brands ON items.brand_id = brands.id
        //                 WHERE categories.category LIKE %?% LIMIT 5";
        // $values = array($this->security->xss_clean($category));
        // return $this->db->query($query,$values)->result_array();
        $this->db->select("items.id, name, description,price,qty,image,categories.category, brands.brand");
        // from table 'athletes'
        $this->db->from('items');
        // INNER JOIN
        $this->db->join('categories', 'items.category_id = categories.id', 'left');
        $this->db->join('brands', ' items.brand_id = brands.id', 'left');
        $this->db->like('category', $category);
        $this->db->limit(5);
        $query = $this->db->get_compiled_select();
        // execute and return the query
        return $this->db->query($query)->result_array();
    }

}