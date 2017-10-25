<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Administrador extends CI_Controller {
    
    
    /**
     * Construtor padrão
     */
    public function __construct(){
        
        parent::__construct();
        $this->load->helper(array('funcoes','url'));
        $this->load->library(array('session'));
        
    }//construct
    
    /**
     * Function padrao do administrador
     */
    public function index(){ $this->dashboard(); }//index
    
    /**
     * Controla a pagina inicial do administrador
     */
    public function dashboard(){
        
        $this->load->model('Candidato_model','candidato');
        
        $dados['candidatos'] = $this->candidato->getAll();
        
        $this->load->view('administrador/dashboard',$dados);
        
    }//dashboard
    
    
}//class