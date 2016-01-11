<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{            
            $this->load->library('pagination');
            $config = array();
            $config["base_url"] = base_url() . "dashboard/index";
            $config["total_rows"] = $this->total_rows_count();
            $config["per_page"] = 10;
            $config["uri_segment"] = 3;

            $this->pagination->initialize($config);

            $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            $data["user_product_list"] = $this->fetch_data($config["per_page"], $page);
            $data["links"] = $this->pagination->create_links();
        
            $this->load->view('dashboard',$data);
	}
        public function total_rows_count() {
            return $this->db->count_all("product");
        }
        public function fetch_data($limit, $start) {
            $this->db->limit($limit, $start);
            $query = $this->db->get("product");

            if ($query->num_rows() > 0) {
                return $query->result();
            }
            return false;
        }        
        
}
