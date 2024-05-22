<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("User_model");
        $this->load->library('form_validation');
    }
    public function index()
    {
        $data = array(
            'title' => 'View Data User',
            'user' => $this->User_model->getAll(),
            'content'=> 'user/index'
        );
        $this->load->view('template/main',$data);
    }

    public function add()
    {
        $data = array(
            'title' => 'View Data User',
            'content'=> 'user/add_form'
        );
        $this->load->view('temple/main',$data);
    }
}