<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_Model extends CI_Model {

    function get_user_by_id($id){
        $query  =    "SELECT users.id as user_id,
                            users.email as user_email,
                            users.first_name as user_first_name,
                            users.last_name as user_last_name,
                            users.contact_no as user_contact_no,
                            users.user_level as user_user_level,
                            users.created_at as user_created_at,
                            users.updated_at as user_updated_at,
                            addresses.house_no,
                            addresses.barangay,
                            addresses.municipality,
                            addresses.province,
                            addresses.zip_code
                        FROM addresses
                        LEFT JOIN users ON addresses.user_id = users.id
                        WHERE users.id = ?";
        return $this->db->query($query, $this->security->xss_clean($id))->result_array()[0];
    }

    function get_user_by_email($email){
        $query  =    "SELECT users.id as user_id,
                            users.email as user_email,
                            users.first_name as user_first_name,
                            users.last_name as user_last_name,
                            users.contact_no as user_contact_no,
                            users.user_level as user_user_level,
                            users.created_at as user_created_at,
                            users.updated_at as user_updated_at,
                            addresses.house_no,
                            addresses.barangay,
                            addresses.municipality,
                            addresses.province,
                            addresses.zip_code
                        FROM addresses
                        LEFT JOIN users ON addresses.user_id = users.id
                        WHERE users.email = ?";
        return $this->db->query($query, $this->security->xss_clean($email))->result_array()[0];
    }

    function create_user($data) {
        // Password encryption
        $salt = bin2hex(openssl_random_pseudo_bytes(22));
        $password = $this->security->xss_clean($data['password']);
        $encrypted_password = md5($password . '' . $salt);

        $query = "INSERT INTO users (email,first_name,last_name,contact_no,password,salt,user_level,created_at) VALUES (?,?,?,?,?,?,?,?)";
        $values = array(
                    $this->security->xss_clean($data['email']), 
                    $this->security->xss_clean($data['first_name']),
                    $this->security->xss_clean($data['last_name']),
                    $this->security->xss_clean($data['contact_no']),
                    $encrypted_password,
                    $salt,
                    0,
                    date("Y-m-d h:i:s")
        ); 
        $this->db->query($query,$values);
        return $this->db->insert_id();
    }

    function add_address($data,$id) {
        $query = "INSERT INTO addresses (user_id,house_no,barangay,municipality,province,zip_code,created_at) VALUES (?,?,?,?,?,?,?)";
        $values = array(
                    $id,
                    $this->security->xss_clean($data['house_no']),
                    $this->security->xss_clean($data['barangay']),
                    $this->security->xss_clean($data['municipality']),
                    $this->security->xss_clean($data['province']),
                    $this->security->xss_clean($data['zip']),
                    date("Y-m-d h:i:s")
        ); 
        return $this->db->query($query,$values);
    }

    function validate_signin_match($user, $password) {
        $encrypted_password = md5($password . '' . $user['salt']);
        if($user['password'] == $encrypted_password) {
            return "Success";
        }
        else {
            return "<small class='text-danger'>Please check your email/password.</small>";
        }
    }

    function create_admin_user($data) {
        // Password encryption
        $salt = bin2hex(openssl_random_pseudo_bytes(22));
        $password = $this->security->xss_clean($data['password']);
        $encrypted_password = md5($password . '' . $salt);

        $query = "INSERT INTO users (email,first_name,last_name,contact_no,password,salt,user_level,created_at) VALUES (?,?,?,?,?,?,?,?)";
        $values = array(
                    $this->security->xss_clean($data['email']), 
                    $this->security->xss_clean($data['first_name']),
                    $this->security->xss_clean($data['last_name']),
                    $this->security->xss_clean($data['contact_no']),
                    $encrypted_password,
                    $salt,
                    1,
                    date("Y-m-d h:i:s")
        ); 
        $this->db->query($query,$values);
        return $this->db->insert_id();
    }


}