<?php
  
  class loginmodel extends CI_Model{
      public function validate($username,$password){
          $q=$this->db->where(['username'=>$username,'password'=>$password])
                      ->get('users');
          
         
          if($q->num_rows()){
             return $q->row()->id;
          }            
          else{
              return false;
          }
      }
      //public function articlelist($limit,$offset)
      public function articlelist()
      {
          $id=$this->session->userdata('id');
         $q= $this->db->select()
                    ->from('article')
                    ->where(['user_id'=>$id])
                   // ->limit($limit,$offset)
                    ->get();
         
        return $q->result();
            
      }
      public function all_articleList($limit,$offset){
        $q=$this->db->select()
                    ->from('article')
                    ->limit($limit,$offset)
                    ->get();
        return $q->result(); 
        
      }

      public function all_articles_count(){
        $q=$this->db->select()
                    ->from('article')
                    ->get();
        return $q->num_rows();            
      }


      public function find_article($articleid)
     {
       $q=$this->db->select(['article_title','article_body','id'])
            ->where('id',$articleid)
            ->get('article');
            return $q->row();


      }

  public function update_article($articleid,Array $article)
  {
    
   return $this->db->where('id',$articleid)
                   ->update('article',$article);

  }
      //For pagination

      public function num_rows(){
        $id=$this->session->userdata('id');
        $q= $this->db->select()
                   ->from('article')
                   ->where(['user_id'=>$id])
                   ->get();

       return $q->num_rows();
      }

      public function add_articles($array){

         return $this->db->insert('article',$array);
     
       }

      public function add_user($array){
        return $this->db->insert('users',$array);
      }

      public function del($id){
        return $this->db->delete('article',['id'=>$id]);
      }
  }
?>