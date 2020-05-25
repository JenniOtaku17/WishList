<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->helper('form');
        $this->load->model("user_model");
        $this->load->view('header');
        $this->load->helper('url');
        $base_url = load_class('Config')->config['base_url'];
    }

    public function index(){
        return redirect($base_url.'/movie'); 
    }

	public function register()
	{
        $user= $this->session->get_userdata();

        if(isset($user['id'])){
            return redirect($base_url.'/movie'); 
        }else{

            $this->load->view('User/register');
        }
    }
    
    function store(){

        if(($this->input->post('name') != '' and $this->input->post('email') != '' and $this->input->post('password') != '') and ($this->input->post('password')==$this->input->post('confirm'))){
            $base_url = load_class('Config')->config['base_url'];

            $data = array(
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'password' => $this->input->post('password')
            );
            
            if($this->user_model->createuser($data) == TRUE){

                $user= array(
                    'email' => $this->input->post('email'),
                    'password' => $this->input->post('password')
                );

                $result = $this->user_model->login($user);
                if($result != false){
        
                    foreach($result->result() as $row){
                        $session_data = array(
                            'id' => $row->id,
                            'name' => $row->name
                        );

                        $this->session->set_userdata($session_data);
                    }

                $this->load->view('header');
                return redirect()->to($base_url.'movie');
                }
            }

        }else{
            return redirect()->to($base_url.'User/register');
        }
    }

    public function login(){
        $user= $this->session->get_userdata();

        if(isset($user['id'])){
            return redirect($base_url.'/movie'); 
        }else{
            $this->load->view('User/login');
        }
    }

    public function processlogin(){

        $data = array(
            'email' => $this->input->post('email'),
            'password' => $this->input->post('password')
        );

        $result = $this->user_model->login($data);
        if($result != false){

            foreach($result->result() as $row){
                $session_data = array(
                    'id' => $row->id,
                    'name' => $row->name
                );

                $this->session->set_userdata($session_data);
            }
            $this->load->view('header');
            return redirect($base_url.'/movie'); 

        }else{
            $this->session->set_flashdata('error', 'Invalid email or password');
            $this->load->view('User/login');
        }
    }

    public function logout(){

        $user= $this->session->get_userdata();

        if(isset($user['id'])){
            $this->session->unset_userdata('id');
            $this->session->unset_userdata('name');
            $this->session->sess_destroy();
            $this->load->view('header');
            $this->load->view('User/login');
        }else{
            $this->session->set_flashdata('error', 'User must login before access!');
            return redirect($base_url.'/User/login'); 
        }
    }

    
    public function wishList(){

        $user= $this->session->get_userdata();

        if(isset($user['id'])){

            if($this->user_model->existList()){

                $movies = $this->user_model->movieList();
                foreach($movies->result() as $row){
                    $movielist = array(
                        'id'=> $row->id,
                        'id_movie' => $row->id_movie
                    );
                    $this->load->view('User/wishlist', compact("movielist"));
                }

            }else{
                $this->load->view('User/wishlist');
            }
        }else{
            $this->session->set_flashdata('error', 'User must login before access!');
            return redirect($base_url.'/User/login'); 
        }

    }
}

?>