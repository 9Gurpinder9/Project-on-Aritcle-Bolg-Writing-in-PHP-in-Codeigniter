<?php

class loginmodel extends CI_Model
{

public function isvalidate($username,$password)
{
 //$this->load->library('database');

$q=$this->db->where(['username'=>$username,'password'=>$password])
->get('users');

//echo"<pre>";
//print_r($q);

if($q->num_rows() >= 1 )
{

return $q->row()->id;

}
else{

	return false;  
}

}
public function articleList($limit,$offset)
{
	$id=$this->session->userdata('id');
 $q=$this->db->select()
 ->from('articles')
 ->where(['user_id'=>$id])
 ->limit($limit,$offset)
 ->get();
return $q->result();

}

public function findArticle($articleid)
{
$q=$this->db->where('id',$articleid)->select()
->get('articles');
return $q->row();
}


public function updateArticle($articleid,Array $article)
{
// 	echo $articleid;
// exit;

return $this->db->where('id',$articleid)->update('articles',$article);
}

public function num_rows()
{
	$id=$this->session->userdata('id');
 $q=$this->db->select()
 ->from('articles')
 ->where(['user_id'=>$id])
 ->get();
return $q->num_rows();

}

public function addArticles($array)
{
	//$t=$array['title'];
//$this->db->insert('articles',['article_title',$t]);

return $this->db->insert('articles',$array);
}

public function addUser($array)
{
return $this->db->insert('users',$array);

}
public function del($id){
return $this->db->delete('articles',['id'=>$id]);

}

public function all_articles_count()
  {

   $q=$this->db->select()
           ->from('articles')
           ->get();
           return $q->num_rows();

  }
  public function all_articleList($limit,$offset)
  {

   $query=$this->db->select()
            ->from('articles')
             ->limit($limit,$offset)
            ->get();
           
           
           return  $query->result();
  }
}
?>