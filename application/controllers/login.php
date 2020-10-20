<?php 
  class login extends MY_Controller{


    public function __construct()
  {
    parent::__construct();
    if( $this->session->userdata('id') )
    return redirect('admin/welcome');
    
  }
  public function register(){
    $this->load->view('admin/register');
  }

      public function index(){
        $this->form_validation->set_rules('uname','User name','required|alpha');
        $this->form_validation->set_rules('pwd','Password','required|max_length[12]');
        
        if($this->form_validation->run()){
          
          $uname=$this->input->post('uname');
          $pwd=$this->input->post('pwd');
          $this->load->model('loginmodel');
         $id= $this->loginmodel->validate($uname,$pwd);
         if($id){
            
           $this->load->library('session');
           $this->session->set_userdata('id',$id);
           return redirect('admin/welcome');
           
         }
         else{
            $this->session->set_flashdata('Login_Failed!','Invalid Username/Password');
            return redirect('login');
         }
          
        }
        else{
          $this->load->view('Admin/login');
        }
      }

      
      public function sendemail(){

        $this->form_validation->set_rules('username','User Name','required|alpha');
        $this->form_validation->set_rules('password','Password','required|max_length[12]');
        $this->form_validation->set_rules('firstname','First Name','required|alpha');
        $this->form_validation->set_rules('lastname','last Name','required|alpha');
        $this->form_validation->set_rules('email','Email','required|valid_email|is_unique[users.email]');
      $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
        if($this->form_validation->run())
        {
          
          $post=$this->input->post();
          $this->load->model('loginmodel','user_add');
         if($this->user_add->add_user($post)){
           
          $this->session->set_flashdata('user','User Added Successfully!');
          $this->session->set_flashdata('user_class','alert-success');

         }
         else{
          $this->session->set_flashdata('user','User Not Added Please try Again!!');
          $this->session->set_flashdata('user_class','alert-success');
         }
         return redirect('login/index');
        //  $this->load->library('email');
        
        //  $this->email->from(set_value('email'),set_value('fname'));
        //  $this->email->to("himanshuprajapati9768@gmail.com");
        //  $this->email->subject("Registratiion Greeting..");
      
        //  $this->email->message("Thank  You for Registratiion");
        //  $this->email->set_newline("\r\n");
        //  $this->email->send();
      
     //      if (!$this->email->send()) {
       //   show_error($this->email->print_debugger()); }
        //else {
        //  echo "Your e-mail has been sent!";
       // }
        }
        else
        {
         $this->load->view('Admin/register');
        }
       }
  }

  
?>