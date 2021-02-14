<?php 

class Registermodel extends CI_model{

    function user_registration(iterable $arr){
        $this->db->insert('user',$arr);
    }
    
}


?>