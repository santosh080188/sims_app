<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Registration extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
    }

    public function index() {
        //$this->load->helper('url');
        $this->load->view('registration');
    }

    public function register() {
	
        $RegistrationData = array(
                'email' => $this->input->post('email'),
                'first_name' => $this->input->post('name'),
                'last_name' => $this->input->post('nameLast'),
                'password' => md5(trim($this->input->post('password'))),
            );
        $RegistrationData['created_date'] = date('Y-m-d H-i-s');
        $this->db->insert('users', $RegistrationData);
        $id = $this->db->insert_id();
            $sessionData = array(
                'email' => $this->input->post('email'),
                'firstname' => $this->input->post('name'),
                'id' => $id
            );
            $this->session->set_userdata($sessionData);        
        redirect('dashboard/index/', 'Location');
    }
    public function emailvalidation() {
        $email = $_POST['email'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $password = $_POST['password'];
        $confpassword = $_POST['conpassword'];

        if ($email != "" && $firstname != "" && $lastname != "" && $password != "" && $confpassword != "") {
            $result = $this->db->query("SELECT * FROM users where `email` = '$email'");
            //$data = $result->result();
            $resultcount = $result->num_rows();
            //print_r($resultcount)
            $json['temail'] = $json['password'] = 0;
            
            if ($resultcount > 0) {
                $json['temail'] = 1;
            }
            if ($password != $confpassword) {
                $json['password'] = 1;
            }
            echo json_encode($json);
        }
    }

}
