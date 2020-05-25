<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Movie extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model("movie_model");
        $this->load->view('header');
        $this->load->helper('url');
        $base_url = load_class('Config')->config['base_url'];
    }

	public function index()
	{
        $user= $this->session->get_userdata();
        if(isset($user['id'])){
            $this->load->view('Movies/list');
        }else{
            $this->session->set_flashdata('error', 'Failed operation, please try again!');
            return redirect($base_url.'/User/register'); 
        }

    }
    
    public function add($id_movie){

        $user = $this->session->get_userdata();
        
        $data = array(
            'id_user' => $user['id'],
            'id_movie' => $id_movie
        );

        $this->movie_model->addMovie($data);
        $this->load->view('Movies/list');

    }

}

?>