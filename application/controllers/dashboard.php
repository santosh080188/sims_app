<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function index() {
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
        $data["manufacturer"] = $this->get_manufacturer();
        $this->load->view('dashboard', $data);
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
    public function get_manufacturer() {
        $this->db->group_by("manufacturer");
        $this->db->select("manufacturer as val,id");
        $query = $this->db->get("product");
         if ($query->num_rows() > 0) {
             return $this->create_drop_down($query->result());
        }
        return false;
    }
    public function get_model() {        
        $manufacturer = $this->input->post('manufacturer');
        if($manufacturer != "") {
            $this->db->group_by("model_number");
            $this->db->select("model_number as val,id");
            $query = $this->db->get_where("product",array("manufacturer"=>$manufacturer));
            //echo $this->db->last_query();
             if ($query->num_rows() > 0) {
                 echo $this->create_drop_down($query->result());
            }            
        }
        return false;
    } 
    public function get_maxsip() {        
        $model = $this->input->post('model');
        if($model != "") {
            $this->db->group_by("concurrent_SIP_sessions");
            $this->db->select("concurrent_SIP_sessions as val,id");
            $query = $this->db->get_where("product",array("model_number"=>$model));
            //echo $this->db->last_query();
             if ($query->num_rows() > 0) {
                 echo $this->create_drop_down($query->result());
            }            
        }
        return false;
    } 
    
    public function get_packagesip() {        
        $model = $this->input->post('maxSIP');
        if($model != "") {
            $this->db->group_by("package_concurrent_SIP");
            $this->db->select("package_concurrent_SIP as val,id");
            $query = $this->db->get_where("product",array("concurrent_SIP_sessions"=>$model));
            //$this->db->last_query();
             if ($query->num_rows() > 0) {
                 echo $this->create_drop_down($query->result());
            }            
        }
        return false;
    }
    
    public function get_sku() {
        $this->db->select("id,sku");
        $query = $this->db->get("product");
        
        if ($query->num_rows() > 0) {
            $sku = array();
            foreach ($query->result() as $row) {
                $sku[] = $row->sku;
            }
            echo json_encode($sku);
        } else {
            echo false;
        }
    }
    public function get_quote() {
        //print_r($_POST);
        $manufacturer = $this->input->post('manufacturer');
        $model = $this->input->post('model');
        $maxSIP = $this->input->post('maxSIP');
        $packageSIP = $this->input->post('packageSIP');
        $service_level = $this->input->post('service_level');
        $term = $this->input->post('term');
        $product = $this->input->post('product');
        
        if($product != "") {
            $array = array("sku"=>trim($product),'level_id' => $service_level);
        } else {
            $array = array( 'manufacturer' => $manufacturer, 
                            'model_number' => $model,
                            'concurrent_SIP_sessions' => $maxSIP,
                            'package_concurrent_SIP' => $packageSIP,
                            'level_id' => $service_level);            
        }
        $this->db->select('pricing.*');
        $this->db->where($array); 
        $this->db->from('product');
        $this->db->join('pricing', 'product.id = pricing.product_id');  
        $query = $this->db->get();
        //echo $this->db->last_query();
        if($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data = array('type'=>$row->type,'nrc'=>$row->nrc,'mrc'=>$row->{$term.'M'},);
            }
            echo json_encode($data);
        }
        echo false;
        //echo $this->db->last_query();
    }
    
    public function create_drop_down($object,$selected = 0) {
        $option = "<option value='0'>--- Select ---</option>";
        foreach($object as $row) {
            $option .= "<option value='".$row->id."'>".$row->val."</option>";
        }
        return $option;        
    }

}
