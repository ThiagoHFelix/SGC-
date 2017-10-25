<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Candidato_model extends CI_Model {
    
    
    /**
     * Construtor padrao
     */
    public function __construct(){
        
        
        parent::__construct();
        
        //CARREGANDO BANCO DE DADOS
        $this->load->database();
        
        
    }//construct
    
    /**
     * Insere um novo candidato no banco de dados
     * @param array $dados Dados do candidato
     * @return type TRUE or FALSE
     */
    public function insert(array $dados){
        
        return $this->db->insert('CANDIDATO',$dados);
        
    }//insert
    
    /**
     * Busca todos os candidatos no banco de dados
     * @return type Retorna uma matriz, se nao encontrar nada retorna NULL
     */
    public function getAll(){
        
        $candidatos = $this->db->get('CANDIDATO');
        
        if($candidatos->num_rows() > 0):
            return $candidatos->result_array();
        else:
            return NULL;
        endif;
        
    }//getAll
    
     /**
     * Atualiza uma tupla na tabela CANDIDATO
     * @param int $id ID do CANDIDATO
     * @param array $dados Array de dados a serem alterados 
     * @return type TRUE no sucesso, FALSE na falha
     */
    public function update(int $id,array $dados){
        
        $this->db->where(array( 'ID' => $id));
        return $this->db->update('CANDIDATO',$dados);
        
        
    }//update
    
    
    
}//class