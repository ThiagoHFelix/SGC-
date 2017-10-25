<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cadastro extends CI_Controller {
    
    
    
    /**
     * Construtor padrao
     */
    public function __construct(){
        
        
        parent::__construct();
        //Helper URL
        $this->load->helper(array('url','funcoes'));
        $this->load->library(array('form_validation','session'));
        
        
    }//construct
    
    /**
     * Cadastro candidato no banco de dados
     */
    public function candidato(){
        
        
         $this->form_validation->set_rules('primeiroNome','Primeiro Nome','required|trim|max_length[25]');
         $this->form_validation->set_rules('sobrenome','Sobrenome','required|trim|max_length[30]');
         $this->form_validation->set_rules('cpf','CPF','required|trim|max_length[14]|min_length[14]');
         $this->form_validation->set_rules('telefone','Telefone','required|trim|max_length[20]');
         $this->form_validation->set_rules('email','E-mail','required|trim|max_length[30]');
         $this->form_validation->set_rules('info_ultimo','Informações sobre o ultimo trabalho','required|trim|max_length[255]');
         $this->form_validation->set_rules('info_qualidade','Informações sobre suas qualidades','required|trim|max_length[255]');
         $this->form_validation->set_rules('info_emprego','Por que quer este emprego','required|trim|max_length[255]');
        
         
         if($this->form_validation->run()):
             
             
             if($this->insertCandidato()):
                 
                 showMessege('messege_login','Seus dados foram registrados com sucesso, a resposta será enviada a seu e-mail, boa sorte.');
                 redirect(base_url('application/'));
                 
             else:
                 showMessege('cadastro_candidato','Não foi possível registrar seus dados, por favor espere alguns minutos e tente novamente');
             endif;
             
             
             
             
         else:
             
             showMessege('cadastro_candidato',validation_errors());
             
         endif;
        
        
        $this->load->view('cadastro/candidato');
        
    }//candidato
    
    
    
   /**
    * Insere os dados do candidato no banco de dados
    * @return type TRUE or FALSE
    */
    private function insertCandidato(){
        
        
        
        $dados = array(
            
            'PRIMEIRO_NOME' => $this->input->post('primeiroNome'),
            'SOBRENOME' => $this->input->post('sobrenome'),
            'STATUS' => 'ESPERA',
            'CPF' => $this->input->post('cpf'),
            'INFO_TRABALHOS' => $this->input->post('info_ultimo'),
            'INFO_QUALIDADES' => $this->input->post('info_qualidade'),
            'INFO_EMPREGO' => $this->input->post('info_emprego'),
            'TELEFONE' => $this->input->post('telefone'),
            'EMAIL' => $this->input->post('email'),
            
            
            
        );
        
        //Carrego o model do candidato
        $this->load->model('Candidato_model','candidato');
        
        
        return $this->candidato->insert($dados);
        
        
    }//insertCandidato
    
    
    
    public function administrador(){
        
        $this->load->view('administrador/cadastro/administrador');
        
    }//administrador
    
}//class