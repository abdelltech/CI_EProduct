<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product_c extends CI_Controller {

	function __construct()
    {
        parent::__construct();
    //    $this->load->database();
     //   $this->load->helper(array('form','url','text','string'));
   //     $this->load->library(array('session','form_validation','email'));
        $this->load->model('product_m');
    }
    
	public function index()
	{
        
        $this->load->view('v_head');
		$this->load->view('v_nav');

		$data['title']="Products List";
		$data['product']=$this->product_m->readProducts();
		$this->load->view('v_product', $data);

		$this->load->view('v_foot');

	}


    public function createNewProduct()
    {
        $this->load->view('v_head');
        $this->load->view('admin/v_admin_nav');
        $data['error'] = " ";
        $data['category']=$this->product_m->getTypeProductDropdown();
        $this->load->view('admin/v_add_product', $data);
        $this->load->view('v_foot');
    }

    public function validFormAddProduct()
    {


        $this->form_validation->set_rules('id','id','trim|numeric');
        $this->form_validation->set_rules('name','name','trim|required|min_length[2]|max_length[12]');
        $this->form_validation->set_rules('price', 'price', 'trim|required|numeric|xss_clean');
        $this->form_validation->set_rules('idCategory', 'category', 'required');
        $this->form_validation->set_rules('quantity','quantity','trim|numeric');
        if (empty($_FILES['photo']['name'])) {
            $this->form_validation->set_rules('photo','photo','required');
        }
        

        $this->form_validation->set_error_delimiters('<span class="error">', '</span>');

        $config = array(
            'upload_path' => "./assets/images/",
            'allowed_types' => "*",
            
        );

        $this->load->library('upload', $config);




       if($this->form_validation->run() == False){
            $this->load->view('v_head');
            $this->load->view('admin/v_admin_nav');
               $data['error'] = "";
            $data['category']=$this->product_m->getTypeProductDropdown();
           
            $this->load->view('admin/v_add_product', $data);

            $this->load->view('v_foot');
        }



        else{

             if (!$this->upload->do_upload('photo')) {
                        $this->load->view('v_head');
            $this->load->view('admin/v_admin_nav');

            $data['category']=$this->product_m->getTypeProductDropdown();
                $data['error'] = $this->upload->display_errors();

            $this->load->view('admin/v_add_product', $data);

            $this->load->view('v_foot');
            }else{
             
          


               
            $this->upload->do_upload('photo');
             $data_2 = array('upload_data' => $this->upload->data());

        $data= array(
            'labelProduct'=>$this->input->post('name'),
            'priceProduct'=>$this->input->post('price'),
            'idCategory'=>$this->input->post('idCategory'),
            'qteProduct'=>$this->input->post('quantity'),
            'photoProduct'=> $data_2['upload_data']['file_name']
        );


           $this->product_m->createProduct($data);
           redirect('admin_c');
       }}
    }

        public function updateProduct($id)
    {
        $this->load->view('v_head');
        $this->load->view('admin/v_admin_nav');

        $data=$this->product_m->readProductById($id);
        $data['category']=$this->product_m->getTypeProductDropdown();
        $this->load->view('admin/v_update_product', $data);

        $this->load->view('v_foot');
    }


    public function validFormUpdateProduct()
    {
        $id=$this->input->post('idProduct');
        $data= array(
            'labelProduct'=>$this->input->post('name'),
            'priceProduct'=>$this->input->post('price'),
            'idCategory'=>$this->input->post('idCategory'),
            'qteProduct'=>$this->input->post('quantity'),
            'photoProduct'=>$this->input->post('photo')
        );

        $this->form_validation->set_rules('id','id','trim|numeric');
        $this->form_validation->set_rules('name','name','trim|required|min_length[2]|max_length[12]');
        $this->form_validation->set_rules('price', 'price', 'trim|required|numeric|xss_clean');
        $this->form_validation->set_rules('idCategory', 'category', 'required');
        $this->form_validation->set_rules('quantity','quantity','trim|numeric');

        $this->form_validation->set_error_delimiters('<span class="error">','</span>');


        if($this->form_validation->run() == False){
            $this->load->view('v_head');
            $this->load->view('admin/v_admin_nav');

            $data['idProduct']=$id;
            $data['category']=$this->product_m->getTypeProductDropdown();
            $this->load->view('admin/v_update_product',$data);

            $this->load->view('v_foot');
        }
        else
        {
            $this->product_m->updateProductById($id, $data);
           redirect('admin_c');
        }
    }

    public function  deleteProduct($id){
        if(is_numeric($id))
            $this->product_m->deleteProductById($id);
        redirect('admin_c');
    }
   
}


