<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {
    
    function __construct(){
        parent::__construct();
        $this->load->database();

    }

    function createuser($data){
        try{
            $this->db->insert('user', array('name'=> $data['name'], 'email'=> $data['email'], 'password' => $data['password']));
            return true;

        }catch(Exception $e) {
            return false;
        }
        
    }

    function login($data){
        $this->db->where('email', $data['email']);
        $this->db->where('password', $data['password']);
        $query = $this->db->get('user');

        if($query->num_rows() > 0){
            return $query;
        }else{
            return false;
        }
    }

    function movieList(){
        $user = $this->session->get_userdata();
        $this->db->where('id_user', $user['id']);
        $query = $this->db->get('wish');

        if($query->num_rows() > 0){
            return $query;
        }else{
            return false;
        }
    }

    function existList(){
        $user = $this->session->get_userdata();
        $this->db->where('id_user', $user['id']);
        $query = $this->db->get('wish');

        if($query->num_rows() > 0){
            return true;
        }else{
            return false;
        }
    }

}

?>