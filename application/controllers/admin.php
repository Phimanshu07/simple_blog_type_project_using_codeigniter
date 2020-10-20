<?php
class Admin extends MY_Controller{
   
  public function __construct()
  {
    parent::__construct();
    if( ! $this->session->userdata('id') )
    return redirect('login');
    
  }
   
    public function logout(){
      $this->session->unset_userdata('id');
      return redirect('login');
    }

    public function welcome(){

      
      $this->load->model('loginmodel');
     
      $this->load->library('pagination');

      $config=[
           'base_url'=> base_url('admin/welcome'),
           'per_page'=>2,
           'total_rows'=>$this->loginmodel->num_rows(),
           'full_tag_open'=>"<ul class='pagination'>",
        'full_tag_close'=>"</ul>",
        'next_tag_open' =>"<li>",
        'next_tag_close' =>"</li>",
        'prev_tag_open' =>"<li>",
        'prev_tag_close' =>"</li>",
        'num_tag_open' =>"<li>",
        'num_tag_close' =>"</li>",
        'first_tag_open'=>"<li>",
        'first_tag_close'=>"</li>",
        'last_tag_open'=>"<li>",
        'last_tag_close'=>"</li>",
        'cur_tag_open' =>"<li class='active'><a>",
        'cur_tag_close' =>"</a></li>"
      ];
      
      $this->pagination->initialize($config);
     // $articles= $this->loginmodel->articlelist($config['per_page'],$this->uri->segment(3));
     $articles= $this->loginmodel->articlelist();
      $this->load->view('admin/dashboard',['articles'=>$articles]);

    }

    public function adduser()
    {
       $this->load->view('admin/addarticle');
    }


    public  function delete(){
      $id=$this->input->post('id');
      $this->load->model('loginmodel');
        if($this->loginmodel->del($id)){
          $this->session->set_flashdata('msg','Deleted  Successfully!');
          $this->session->set_flashdata('msg_class','alert-success');
        }
        else{
          $this->session->set_flashdata('msg','Not Deleted! Please try again');
          $this->session->set_flashdata('msg_class','alert-danger');
        }
        return redirect('admin/welcome');
      
      
    }
     // edit function
     public function edituser($id)
    {
      $this->load->model('loginmodel');
      $article=$this->loginmodel->find_article($id);
      $this->load->view('admin/edit_article',['article'=>$article]);

    } 

    public function updatearticle($article_id)
    {
   if($this->form_validation->run('add_article_rules'))
     {
         $post=$this->input->post(); 
         //$articleid=$post['article_id'];
         //unset($articleid);
         $this->load->model('loginmodel','editupdate');
         if($this->editupdate->update_article($article_id,$post))
         {
            $this->session->set_flashdata('msg','Article Update successfully');
             $this->session->set_flashdata('msg_class','alert-success');
         }
         else
         {
            $this->session->set_flashdata('msg','Articles not update Please try again!!');
            $this->session->set_flashdata('msg_class','alert-danger');
         }
         return redirect('admin/welcome');
        }
     else
     {
       $this->edituser($article_id);
     }
   
    }
    public  function uservalidation()
    {

      $config=[
                
        'upload_path'=>'./Upload/',
        'allowed_types'=>'gif|png|jpg|jpeg',

      ];
      $this->load->library('upload',$config);
      $this->upload->initialize($config);
      if($this->form_validation->run('add_article_rules') && $this->upload->do_upload()){
        
        $post=$this->input->post();

        $data=$this->upload->data();
       
        
        $image_path=base_url("upload/".$data['raw_name'].$data['file_ext']);

        $post['image_path']=$image_path;

        $this->load->model('loginmodel');
        if($this->loginmodel->add_articles($post)){
          $this->session->set_flashdata('msg','Articles Added Successfully!');
          $this->session->set_flashdata('msg_class','alert-success');
        }
        else{
          $this->session->set_flashdata('msg','Articles Are Not Added! Please try again');
          $this->session->set_flashdata('msg_class','alert-danger');
        }
        return redirect('admin/welcome');
      }
      else{
        $upload_error=$this->upload->display_errors();
        $this->load->view('admin/addarticle',compact('upload_error'));
      }
    }


    public function register(){
      $this->load->view('admin/register');
    }

   

    }
?>