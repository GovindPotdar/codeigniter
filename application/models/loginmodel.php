<?php

class Loginmodel extends CI_model{


    function login_check($name,$password){
        $value = $this->db->get_where("user",array("username"=>$name,"password"=>$password));
        
        if(count($value->result_array())){
            $id = $value->result_array()[0]['id'];
            return $id;
        }
        else{
            return False;
        }
    }
    function article_data(){
        $q = $this->db->where("user_id",$this->session->userdata('id'))
        ->from('article')
        ->get();
        return $q->result_array();
    }
    function article_delete($id){
        $this->db->delete("article",array('id'=>$id));
        
    }
    function article_add($arr){
        $this->db->insert('article',$arr);
    }  
}


?>