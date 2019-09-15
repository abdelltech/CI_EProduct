<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users_c extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper(array('form','url','text','string'));
        $this->load->library(array('session','form_validation','email'));
        $this->load->model('users_m');
        $this->load->model('product_m');
    }

    public function check_access(){
        if( $this->session->userdata('access')==2){
            redirect('admin_c');
           // echo $this->session->userdata('access');
        }
        if( $this->session->userdata('access')==1){
            
           redirect('client_c');
        }
    }

    public function index()
    {
        $this->check_access();

    }


           public function signup()
    {
            
        $this->load->view('v_head');
        $this->load->view('v_nav');

       
        $this->load->view('v_form_signup');

        $this->load->view('v_foot');
    }

      public function validateFormSignup(){
 

        $this->form_validation->set_rules('login','login','required');
        $this->form_validation->set_rules('pass','pass','required');
        $this->form_validation->set_rules('email', 'email', 'required');
        
        $this->form_validation->set_error_delimiters('<span class="error">','</span>');


        $data= array(
            'login'=>$this->input->post('login'),
            'pass'=>$this->input->post('pass'),
            'email'=>$this->input->post('email')
        );

       if($this->form_validation->run() == False){
            $this->load->view('v_head');
            $this->load->view('v_nav');
            $this->load->view('v_form_signup');
            $this->load->view('v_foot');
        }
        else
        {



           $this->users_m->createMembre($data);
           redirect('users_c/signin');
       }
   }

    public function signin()
    {
        $this->check_access();
        $this->load->view('v_head');
        $this->load->view('v_nav');
        $this->load->view('v_form_signin');
        $this->load->view('v_foot');
    }


    public function validateFormSignin()
    {
        $this->form_validation->set_rules('login','login','trim|required');
        $this->form_validation->set_rules('pass','Mot de passe','trim|required');

        $data= array(
                'login'=>$this->input->post('login'),
                'pass'=>$this->input->post('pass')
        );

        if($this->form_validation->run() == False){   
            $this->load->view('v_head');
            $this->load->view('v_nav');
            $this->load->view('v_form_signin');
            $this->load->view('v_foot');
        }
        else {
            $data_session=array();
            if(($data_session=$this->users_m->verif_connexion($data)) != False)                         
               {
                   $this->session->set_userdata($data_session);
                   redirect('users_c');
               }
               else{
                   $data['error']="Login or Password Error !";
                   $this->load->view('v_head');
                   $this->load->view('v_nav');
                   $this->load->view('v_form_signin',$data);
                   $this->load->view('v_foot');
               }
        }      
    }


  
    public function updateAccount($id)
    {
        $this->load->view('v_head');
        $this->load->view('client/v_client_nav');

        $data=$this->users_m->readMembreById($id);
        $this->load->view('v_edit_account', $data);

        $this->load->view('v_foot');
    }

   public function validateFormUpdateAccount(){
             $id=$this->input->post('id');
        $data= array(
            'login'=>$this->input->post('login'),
            'email'=>$this->input->post('email'),
            'pass'=>$this->input->post('pass'),
        );

        
        $this->form_validation->set_rules('login','login','required');
        $this->form_validation->set_rules('pass','pass','required');
        $this->form_validation->set_rules('email', 'email', 'required');
        
        $this->form_validation->set_error_delimiters('<span class="error">','</span>');


        if($this->form_validation->run() == False){
                   $this->load->view('v_head');
        $this->load->view('client/v_client_nav');

        $data=$this->users_m->getUserByID($id);
        $this->load->view('v_edit_account', $data);

        $this->load->view('v_foot');
        }
        else
        {
            $this->users_m->updateAccountById($id, $data);
            redirect('client_c');
        }
   }

    


     public function signout()
    {
        $this->session->sess_destroy();
        redirect('product_c/index');
    }

  /*  public function valid_deconnexion(){
        if( $this->session->userdata('access')==2){
            redirect('admin_c');
        }
        if( $this->session->userdata('access')==1){
            redirect('client_c');
        }
        print_r($this->session->all_userdata());
        $data['titre']="deconnexion";
        $this->load->view('users_index',$data);
    }*/
    


}