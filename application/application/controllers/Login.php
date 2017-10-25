<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {

        parent::__construct();
       
        $this->load->helper(array('url','funcoes'));
        $this->load->library(array('session','form_validation'));
        
    }//construct


    /**
     * Validação de dados do login
     */
    public function index() {
         
         
        //XXX Criaçao de regras do login
        $this->form_validation->set_rules('username','Nome do usuário','trim|required|max_length[25]');
        $this->form_validation->set_rules('password','Senha do usuário','trim|required|max_length[35]');
        
        //XXX Validaçao de regras
        if ($this->form_validation->run()):

            if ($this->validationLoginDB()):

                if ($this->statusAccount()):

                    if ($this->startSession()):

                        redirect('/application/administrador');

                    else:
                        showMessege('messege_login', 'Não foi possível iniciar uma sessão devido a um problema interno, por favor tente novamente mais tarde');
                    endif;

                else:
                    showMessege('messege_login', 'Esta conta está inativa no momento, entre em contato com o administrador para mais informações');
                endif;


            else:
                showMessege('messege_login', 'Seu usuário ou senha está incorreto, tente novamente');
            endif;

        else:
            //XXX Somente utiliza a funçao se houver erros, Tambem evita conflito com a mensagem do cadastro de candidato
            if (strcmp(validation_errors(), '') !== 0):
                showMessege('messege_login', validation_errors());
            endif;

        endif;


        $this->load->view('login');
        
    }//index

    
    
    /**
     * Verifica se os dados inseridos no login existem no banco de dados
     * @return boolean Retorna TRUE se o usuário e a senha existirem no banco de dados, Retorna FALSE se não existir
     */
    private function validationLoginDB(){
        
        
        $this->load->model('Administrador_model','administrador');
        
        $userName = $this->input->post('username');
        
        $retorno = $this->administrador->getWhere(array( 'USERNAME' => $userName ))[0];
        
        
        if($retorno !== NULL):
            
            $userPassword = $this->administrador->post('password');
        
            if(strcmp($retorno['SENHA'], $userPassword)  === 0):
                
                return TRUE;
                
            endif;
  
        endif;
        
        return FALSE;
        
    }//validationLoginDB
    
    /**
     * Inicia a sessão com os dados do usuário
     * @return boolean Retorno TRUE se a sessão foi iniciada com sucesso
     */
    private function startSession(){
        
        $userName = $this->input->post('username');
        $retorno = $this->administrador->getWhere(array('USERNAME' => $userName ))[0];
        
        if($retorno !== NULL):
            
            $this->session->set_userdata('nome',$retorno['PRIMEIRO_NOME'].' '.$retorno['SOBRENOME']);
            $this->session->set_userdata('username',$retorno['USERDATA']);
            $this->session->set_userdata('email',$retorno['EMAIL']);
            $this->session->set_userdata('session',TRUE);
            
            return TRUE;
            
        endif;
        
        return FALSE;
        
        
    }//startSession
        
    /**
     * Faz a verificação do status da conta
     * @return boolean Se a conta estiver ativa retorna TRUE, caso contrario retorna FALSE
     */
    private function statusAccount(){
        
        $userName = $this->input->post('username');
        $retorno = $this->administrador->getWhere(array('USERNAME' => $userName ))[0];
        
        if($retorno !== NULL):
            
            if($retorno['STATUS'] === TRUE):
                
                return TRUE;
                
            endif;
            
            
        endif;
        
        return FALSE;
        
    }//statusAccount
    
    
}//class


