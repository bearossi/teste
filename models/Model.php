<?php

class Model extends CI_Model {
    public function insert(Usuario $usu){
        $this->db->insert('Usuario',$usu); //insere registro no bd
        }
    
    public function searchAll(){ 
        $query = $this->db->query("Select * from Usuario"); //User é o nome da tabela
        return $query->result();
    }
    
    public function getUser($nome,$pass){
        $this->db->where('nome',$nome);
        $this->db->where('senha',$senha);
        $a = $this->db->get('Usuario');
        if($a->num_rows()>0){
            if($a->rows()->nome === "root"){
                return "admin";    
            }else{
                return "comum";
            }
            
        }else{
            return false;
        }
    }
}