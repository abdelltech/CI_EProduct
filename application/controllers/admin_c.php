<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_c extends CI_Controller {

    function __construct()
    {
        parent::__construct();
     //   $this->load->database();
      //  $this->load->helper(array('form','url','text','string'));
     //   $this->load->library(array('session','form_validation','email'));
        $this->load->model('product_m');
        //$this->user = ($this->sitemodel->is_logged()) ? $this->sitemodel->get_user($this->session->userdata('lastname')) : false;
    }
    
    public function index()
    {
       /*if($this->session->userdata('droit')!=2){
            redirect('user_c');
        }*/

        $this->load->view('v_head');
        $this->load->view('admin/v_admin_nav');
         $this->load->view('admin/v_admin_index');

        $data['product']=$this->product_m->readProducts();
        $this->load->view('admin/v_admin_product', $data);

        $this->load->view('v_foot');
    }

}