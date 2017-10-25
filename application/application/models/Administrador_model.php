<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administrador_model extends CI_Model {
    
    
    
    public function __construct(){
        
        
        parent::__construct();
        
        //CARREGANDO BANCO DE DADOS
        $this->load->database();
        
        
    }//construct
    
    
    /**
     * Gera uma consulta no banco de dados com a cláusula where
     * @param array Array com dados da cláusula where
     * @return type Retorna uma matriz e em caso de falha retorna NULL
     */
    public function getWhere(array $dados){
        
        $this->db->where($dados);
        
        $retorno = $this->db->get('ADMINISTRADOR');
        
        if($retorno->num_rows() > 0):
            return $retorno->result_array();
        else:
            return NULL;
        endif;
        
    }//getWhere
    
    /**
     * Insere um novo administrador no banco de dados
     * @param array $dados Array com os dados do administrador
     * @return type TRUE no sucesso, FALSE no fracasso
     */
    public function insert(array $dados){
        
       return $this->db->insert('ADMINISTRADOR',$dados);
        
    }//insert
    
    
    /**
     * Busca todos os administradores no banco de dados
     * @return type TRUE no sucesso, FALSE no fracasso
     */
    public function getAll(){
        
        $administradores = $this->db->get('ADMINISTRADOR');
        
        if($administradores->num_rows() > 0):
            
            return $administradores->result_array();
            
        else:
            return NULL;
        endif;
        
        
    }//getAll
    
    
    
}//class