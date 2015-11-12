<?php
class Login extends CI_Controller {
    
    public function entrar() {
        $this->load->view("formlogin");
        
    }
    
    public function nova(){
        $a = $this->session->userdata("_NOME");
        $this->load->view("comumview");
        echo "<h1>Nome do usuário:" . $nome . "</h1>";
        
        redirect("/login/logout");
    }
  
    
    public function  logout(){
        $this->session->unset_userdata("_ID");
        $this->session->unset_userdata("_NOME");//limpa os dados
        echo "<h1> ATÉ LOGO!!</h1>";
    }
    
    public function page(){
        if(($this->session->userdata("_NOME")) != null){ //se ele tiver um nome ele está autenticado
        echo "<h1> PAGINA DE USUÁRIO</h1>";
        }else{
            redirect("/login/entrar");
        }
    }
    
    public function auth(){
        $nome = $_POST["nome"];  //[nome] e [senha] são os 'names' do form
        $pass = $_POST["senha"];
        $this->load->model("model");
        $usr = $this->model->getUser($nome,$pass);
        
        if($usr === "admin"){
            $this->session->set_userdata("_ID","admin");
            redirect("/login/admin");
        }else{
            $this->session->set_userdata("_ID","comum");
            $this->session->set_userdata("_NOME",$nome);
            redirect("/login/comum/");
            
        }
       
    }
        public function comum(){
         $nome = $this->session->userdata("_NOME");
         if(isset($nome))
         echo "<h1> Bem vindo ". $nome . " </h1>";
         else
         echo "<h1>Visitante.</h1>";
    }
    
    public function admin(){
        $a = $this->session->userdata("_ID"); 
        if($a === 'admin'){
            echo "<h1>BEM-VINDO ADMIN! :) </h1>";
            
        }else{
            echo "<h1>VOCÊ NÃO ESTA AUTORIZADO!</h1>";
        }
    }
    
    public function msg(){
        $a = $this->session->userdata("_NOME" );
        if($a === 'admin'){
            echo "<h1>Bem-vindo". $nome ."</h1>" ;
        }
    }
}
?>