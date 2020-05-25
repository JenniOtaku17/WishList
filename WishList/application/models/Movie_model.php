<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Movie_model extends CI_Model {
    
    function __construct(){
        parent::__construct();
        $this->load->database();
        
    }

    public function addMovie($data){

        $this->db->insert('wish', array('id_user'=> $data['id_user'], 'id_movie'=> $data['id_movie']));
    }


}

?>