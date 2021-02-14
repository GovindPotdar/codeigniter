<?php

class Admin extends MY_Controller{

    function formview(){
        if($this->session->userdata('id')!=null){
        redirect('Admin/dashboard');
        }
        else{
        $this->load->view("users/login");
        }
    }
    function dashboard(){
        if($this->session->userdata('id')!=null){
            $data = $this->loginmodel->article_data();
        $this->load->view("users/dashboard",array("data"=>$data));
    }
    else{
        redirect("Admin/formview");
    }
    }
    function index(){
        if($this->input->post('submit')!=null){
        $this->form_validation->set_rules("name","user name","required|max_length[40]");
        $this->form_validation->set_rules("password","password","required|alpha_numeric|max_length[12]");
        $this->form_validation->set_error_delimiters("<P class = 'text-danger'>","</p>");
        if ($this->form_validation->run()){
            $name = $this->input->post('name');
            $password = md5($this->input->post('password'));
            $login_id = $this->loginmodel->login_check($name,$password);
            if($login_id){
                $this->session->set_userdata("id",$login_id);
                redirect("Admin/dashboard");

            }
            else{
                $this->session->set_flashdata("error","username/password incorrect");
                redirect("Admin/formview");
            }
        }
        else{
            // echo validation_errors();
            $this->load->view("users/login");
        }
    }
    else{
        redirect("Admin/formview");
    }
        
    }
    function register(){
            $this->load->view("users/register");
        }

    function mail(){
        $this->form_validation->set_rules("username","username","required|is_unique[user.username]");
        $this->form_validation->set_rules("password","password","required|max_length[12]");
        $this->form_validation->set_rules("firstname","firstname","required|max_length[20]");
        $this->form_validation->set_rules("lastname","lastname","required|max_length[20]");
        $this->form_validation->set_rules("email","email","required|valid_email");
        if($this->form_validation->run()){
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));
        $firstname = $this->input->post('firstname');
        $lastname = $this->input->post('lastname');
        $email = $this->input->post('email');
        $arr = array("username"=>$username,"password"=>$password,"firstname"=>$firstname,"lastname"=>$lastname,"email"=>$email);
        $this->load->model("registermodel");
        $this->registermodel->user_registration($arr);
        // Email sending processs

        // $this->load->library("email");
        // $config['protocol'] = 'sendmail';
        // $config['mailpath'] = '/usr/sbin/sendmail';
        // $config['charset'] = 'iso-8859-1';
        // $config['wordwrap'] = TRUE;
        // $config['smtp_port'] = 587;
        // $this->email->initialize($config);

        
        // $this->email->from("clashwalifeeling1842@gmail.com","abhi goswami");
        // $this->email->to("abhigoswami137@gmail.com");
        // $this->email->subject("hello");
        // $this->email->message("hey bro how are you");
        // if(!$this->email->send()){
        //     show_error($this->email->print_debugger());
        //     exit();
        // }

        redirect("Admin/formview");
        }
        else{
            $this->load->view("users/register");
        }
    }
    function logout(){
        if($this->session->userdata!=null){
            $this->session->unset_userdata('id');
            redirect("Admin/index");
        }
        else{
            
        }
    }

    function delete_article(){
        $id = $this->input->get('id');
        $this->loginmodel->article_delete($id);
        redirect("Admin/dashboard");
    }

    function add_article(){
        if($this->session->userdata('id')!=null){
            $this->load->view("users/add");
        }
        else{
            redirect("Admin/formview");
        }
    }

    function add(){

        if($this->input->post('submit')!=null){
            $this->form_validation->set_rules('title',"title","required|max_length[20]");
            $this->form_validation->set_rules('body',"discription","required|max_length[200]");
            $this->form_validation->set_error_delimiters("<p style='color:red;'>","</p>");
            if($this->form_validation->run()){
                $title = $this->input->post('title');
                $body = $this->input->post('body');
                $arr = array("article_title"=>$title,"article_body"=>$body,"user_id"=>$this->session->userdata('id'));
                $this->loginmodel->article_add($arr);
                redirect("Admin/dashboard");
            }
            else{
                $this->load->view("users/add");
            }
        }
    }
}



?>