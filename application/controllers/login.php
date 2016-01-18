<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller {
    public function index() {
        $this->load->helper('url');
        $this->load->view('login');
    }

    public function signin() {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $query = $this->db->query("SELECT * FROM users WHERE email = '$email' && password = md5('$password')");
        $rowcount = $query->num_rows();
        $json['tpassword'] = $json['temail'] = 0;        
        if ($rowcount == 1) {
            $row = $query->result();
            $json['tpassword'] = $json['temail'] = 1;            
            $sessionData = array(
                'email' => $this->input->post('email'),
                'firstname' => $row[0]->first_name,
                'id' => $row[0]->id
            );
            echo json_encode($json);
            $this->session->set_userdata($sessionData);
        } else {
            echo json_encode($json);
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('login/index/', 'Location');
    }

}
