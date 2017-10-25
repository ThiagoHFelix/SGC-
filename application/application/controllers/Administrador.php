<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Administrador extends CI_Controller {

    /**
     * Construtor padrão
     */
    public function __construct() {

        parent::__construct();
        $this->load->helper(array('funcoes', 'url'));
        $this->load->library(array('session'));
        isSessionStarted();
    }//construct



    /**
     * Function padrao do administrador
     */
    public function index() {
        $this->dashboard();
    }//index



    /**
     * Controla a pagina inicial do administrador
     */
    public function dashboard() {

        $this->load->model('Candidato_model', 'candidato');

        $dados['candidatos'] = $this->candidato->getAll();

        $this->load->view('administrador/dashboard', $dados);
    }//dashboard



    /**
     * Finaliza a sessao do usuario
     */
    public function logout() {

        $this->session->set_userdata('session', FALSE);
        redirect(base_url('application/'));
    }//logout


    /**
     * Registra no sistema que o usuário foi aceito no processo seletivo
     * @param string $email
     */
    public function aceito(int $id = 0) {
        
        if($id === 0):
            show_404();
        endif;

        $this->load->model('Administrador_model','administrador');
        $this->load->model('Candidato_model','candidato');
        
        $candidato = $this->administrador->getWhere(array( 'ID' => $id));
        
        if ($candidato !== NULL):

            $email = $candidato[0]['EMAIL'];

            if ($this->candidato->update($id,array('STATUS' => 'APROVADO'))):

                if ($this->enviarEmail($email, 0)):
                    
                    showMessegeModal('messege_dashboard', 'Aprovação no processo seletivo', 'Um e-mail foi enviado ao usuário o informando sobre sua aprovação no processo seletivo');
               
                else:
                    showMessegeModal('messege_dashboard', 'Aprovação no processo seletivo', 'Ocorreu um erro ao enviar o e-mail ao usuário, CONTATE O ADMINISTRADOR DO SISTEMA');
                endif;

            else:

                showMessegeModal('messege_dashboard', 'Aprovação no processo seletivo', 'Ocorreu um erro interno, CONTATE O ADMINISTRADOR DO SISTEMA');

            endif;

        else:
            show_404();
        endif;
        
        redirect(base_url('application/administrador'));
        
    }//aceito
    
     /**
     * Registra no sistema que o usuário nao foi aceito no processo seletivo
     * @param string $email
     */
    public function naoAceito(int $id = 0) {
        
        if($id === 0):
            show_404();
        endif;

        $this->load->model('Administrador_model','administrador');
        $this->load->model('Candidato_model','candidato');
        
        $candidato = $this->administrador->getWhere(array( 'ID' => $id));
        
        if ($candidato !== NULL):

            $email = $candidato[0]['EMAIL'];

            if ($this->candidato->update($id,array('STATUS' => 'REPROVADO'))):

                if ($this->enviarEmail($email, 1)):
                    
                    showMessegeModal('messege_dashboard', 'Reprovação no processo seletivo', 'Um e-mail foi enviado ao usuário o informando sobre sua reprovação no processo seletivo','red');
               
                else:
                    showMessegeModal('messege_dashboard', 'Reprovação no processo seletivo', 'Ocorreu um erro ao enviar o e-mail ao usuário, CONTATE O ADMINISTRADOR DO SISTEMA','red');
                endif;

            else:

                showMessegeModal('messege_dashboard', 'Reprovação no processo seletivo', 'Ocorreu um erro interno, CONTATE O ADMINISTRADOR DO SISTEMA','red');

            endif;

        else:
            show_404();
        endif;
        
        redirect(base_url('application/administrador'));
        
    }//naoAceito
     

    
    /**
     * Enviar um e-mail para o usuário o informando sobre o processo seletivo
     * @param string $email E-mail do usuário
     * @param int $resposta 0 o usuário fo aceito, Diferente de 0 foi reprovado
     * @return type TRUE se a mensagem foi enviada com sucesso, FALSE na falha
     */
    private function enviarEmail(string $email,int $resposta){
        
        $this->load->library('email');

        $myEmail = $this->session->flashdata('email');
        $myName = $this->session->flashdata('nome');
        
        $this->email->from($myEmail, $myName);
        $this->email->to($email);

        $this->email->subject('Processo seletivo');
        
        if($resposta === 0):
            $this->email->message('Você foi aceito no processo de seleção, por favor entre em contato conosco');
        else:
            $this->email->message('Você foi não aceito no processo de seleção, obrigado');
        endif;

        return $this->email->send();
        
    }//enviaEmail

}//class

