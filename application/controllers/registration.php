<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Registration extends CI_Controller {
    function __construct()
    {
        // this is your constructor
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url');
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
                'password' => $this->input->post('password'),
            );
        $RegistrationData['created_date'] = date('Y-m-d H-i-s');
        $this->db->insert('users', $RegistrationData);
        redirect('dashboard/index/', 'Location');
    }
    public function emailvalidation() {
        $email = $_POST['email'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $password = $_POST['password'];
        $confpassword = $_POST['conpassword'];

        if ($email != "" && $firstname != "" && $lastname != "" && $password != "" && $confpassword != "") {
            $result = $this->db->query("SELECT sum(CASE WHEN `email` = '$email' THEN 1 END ) AS temail FROM users");
            $data = $result->result();
            //$resultcount = $result->num_rows();
            $json['temail'] = 0;
            //$json['tuser'] = 0;
            $json['password'] = 0;
            if ($data[0]->temail > 0) {
                $json['temail'] = 1;
            }
            if ($password != $confpassword) {
                $json['password'] = 1;
            }
            echo json_encode($json);
        }
    }

}
