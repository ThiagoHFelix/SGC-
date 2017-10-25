<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Cadastro extends CI_Controller {

    /**
     * Construtor padrao
     */
    public function __construct() {


        parent::__construct();
        //Helper URL
        $this->load->helper(array('url', 'funcoes'));
        $this->load->library(array('form_validation', 'session'));
    }

//construct

    /**
     * Gerencia o cadastro do candidato
     */
    public function candidato() {


        $this->form_validation->set_rules('primeiroNome', 'Primeiro Nome', 'required|trim|max_length[25]');
        $this->form_validation->set_rules('sobrenome', 'Sobrenome', 'required|trim|max_length[30]');
        $this->form_validation->set_rules('cpf', 'CPF', 'required|trim|max_length[14]|min_length[14]');
        $this->form_validation->set_rules('telefone', 'Telefone', 'required|trim|max_length[20]');
        $this->form_validation->set_rules('email', 'E-mail', 'required|trim|max_length[30]');
        $this->form_validation->set_rules('info_ultimo', 'Informações sobre o ultimo trabalho', 'required|trim|max_length[255]');
        $this->form_validation->set_rules('info_qualidade', 'Informações sobre suas qualidades', 'required|trim|max_length[255]');
        $this->form_validation->set_rules('info_emprego', 'Por que quer este emprego', 'required|trim|max_length[255]');


        if ($this->form_validation->run()):


            if ($this->insertCandidato()):

                showMessege('messege_login', 'Seus dados foram registrados com sucesso, a resposta será enviada a seu e-mail, boa sorte.');
                redirect(base_url('application/'));

            else:
                showMessege('cadastro_candidato', 'Não foi possível registrar seus dados, por favor espere alguns minutos e tente novamente');
            endif;




        else:

            showMessege('cadastro_candidato', validation_errors());

        endif;


        $this->load->view('cadastro/candidato');
    }//candidato



    /**
     * Insere os dados do candidato no banco de dados
     * @return type TRUE or FALSE
     */
    private function insertCandidato() {



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
        $this->load->model('Candidato_model', 'candidato');


        return $this->candidato->insert($dados);
    }//insertCandidato



    /**
     * Gerencia o cadastro do administrador
     */
    public function administrador() {
        
        isSessionStarted();

        $this->form_validation->set_rules('primeiroNome', 'Primeiro Nome', 'trim|max_length[25]|required');
        $this->form_validation->set_rules('sobrenome', 'Sobrenome', 'trim|max_length[30]|required');
        $this->form_validation->set_rules('username', 'Nome de usuário', 'trim|max_length[30]|required');
        $this->form_validation->set_rules('password', 'Senha', 'trim|max_length[35]|required|matches[conf_password]');
        $this->form_validation->set_rules('conf_password', 'Confirmação de senha', 'trim|max_length[35]|required|matches[password]');
        $this->form_validation->set_rules('email', 'E-mail', 'trim|max_length[40]|required|valid_email');
        $this->form_validation->set_rules('telefone', 'Telefone', 'trim|max_length[20]|required');

        if ($this->form_validation->run()):


            if ($this->validationUsername()):

                if ($this->insertAdministrador()):

                    showMessege('messege_dashboard', 'O administrador foi registrado com sucesso');
                    redirect(base_url('application/administrador'));

                else:

                    showMessege('messege_cadAdministrador', 'Ocorreu um erro ao registrar o administrador, tente novamente mais tarde');

                endif;

            else:

                showMessege('messege_cadAdministrador', 'O nome de usuário inserido já existe, tente outro');

            endif;



        else:
            showMessege('messege_cadAdministrador', validation_errors());
        endif;


        $this->load->view('administrador/cadastro/administrador');
    }//administrador



    /**
     * Insere administrador no banco de dados
     * @return type TRUE no sucesso,FALSE no fracasso
     */
    private function insertAdministrador() {

        $this->load->model('Administrador_model', 'administrador');

        $dados = array(
            'PRIMEIRO_NOME' => $this->input->post('primeiroNome'),
            'SOBRENOME' => $this->input->post('sobrenome'),
            'USERNAME' => $this->input->post('username'),
            'SENHA' => $this->input->post('password'),
            'TELEFONE' => $this->input->post('telefone'),
            'EMAIL' => $this->input->post('email'),
            'STATUS' => 'ATIVO'
        );

        return $this->administrador->insert($dados);
    }//insertAdministrador



    /**
     * Verifica se o nome de usuário inserido já existe no banco de dados
     * @return boolean TRUE se não existir, FALSE se existir
     */
    private function validationUsername() {
        
        $this->load->model('Administrador_model', 'administrador');
        
        $administradores = $this->administrador->getAll();
        $userName = $this->input->post('username');

        if ($administradores !== NULL):

            foreach ($administradores as $administrador):

                if (strcmp(strtoupper($administrador['USERNAME']), strtoupper($userName)) === 0):
                    return FALSE;
                endif;

            endforeach;

        endif;

        return TRUE;
    }//validationUsername


}//class

