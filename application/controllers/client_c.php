<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Client_c extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper(array('form','url','text','string'));
        $this->load->library(array('session','form_validation','email'));
        $this->load->model('product_m');
    }
    public function index()
    {
       /* if($this->session->userdata('droit')!=1){
            redirect('user_c');
        }*/

        $this->load->view('v_head');
        $this->load->view('client/v_client_nav');
        $this->load->view('client/v_client_index');

        $data['product']=$this->product_m->readProducts();
        $this->load->view('client/v_client_product',$data);

        $this->load->view('v_foot');
    }

    public function addProduct($id)
    {
        $this->load->view('v_head');
        $this->load->view('client/v_client_nav');
        $data=$this->product_m->readProductById($id);
          $data['title']="Add to basket ";
        $data['category']=$this->product_m->getTypeProductDropdown();
        $this->load->view('client/v_client_add_product',$data);
        $this->load->view('v_foot');
    }


}