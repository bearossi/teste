<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {


	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function teste2(){
	
		$this->load->view('mypage');
	}
	
	public function exercicio(){
		
		$this->load->view('exercicio');
	}
	
	public function exemplo(){
		
		$this->load->view('exemplo');
	}
	
	public function form(){
		$this->load->view('form');
		
	}
	
	public function doPost(){
		require_once APPPATH."models/user.php";
		$this->load->model('model');
		$m=$this->model;
		$m->insert(new Usuario ($_POST["nome"])); //o nome é o name dentro do form
	}
	public function listar(){
		require_once APPPATH."models/user.php";
		$this->load->model('model');
		$m=$this->model;
		$usuarios=$m->searchAll();
		print_r($usuarios);
		
	}
	
	public function teste(){
		echo $this->session->userdata("_ID"); //capturo a session
		
	}
	
	public function sess(){
		$this->session->set_userdata("_ID","123"); //dou valor pra ele
		echo "Session setada com sucesso";	
		
	}
	
}
