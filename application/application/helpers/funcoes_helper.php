<?php

/*
 * Created by Thiago Henrique Felix
 */



if(!function_exists('showMessege')){

    /**
     * Cria uma mensagem de erro utilizando flashdata
     * @param type $flashName Nome do flash
     * @param type $message Mensagem
     */
     function showMessege($flashName,$message){

         $ci =& get_instance();

        //Declaração de variaveis
        $string_error =  NULL;

        //XXX Para não mostrar a div alert-danger sem mensagem
        //Verifico se existe erro
        if(strcmp($message,'') !== 0){

            $string_error = "<div class=' alert text-center  alert-info'>". $message." </div>";
           // $string_error = "<div class=' alert text-center  alert-".$type."'>". $message." </div>";
          //  $string_error = "<p class=\"login-box-msg \" style=\"color:red\">".$message."</p>";
        }

        $ci->session->set_flashdata($flashName,$string_error);
        
       

    }//showMessege


}//if 




if (!function_exists('setValue')):

    /**
     * Retorna o valor do input
     * @param type $value Nome do input
     * @return string
     */
    function setValue($value = NULL) {
        $CI = & get_instance();
        if (isset($CI->input->post()[$value])):
            return $CI->input->post()[$value];
        endif;
        return '';
    }

endif;



if (!function_exists('isSessionStarted')):

    /**
     * Verifico se a sessão já foi iniciada
     */
    function isSessionStarted(string $entidade = NULL) {
        $CI = & get_instance();
        //Verifico se uma sessão já existe, se a url for inserida diretamente
        //Sessão não iniciada
        
        if(strcmp(strtoupper($entidade),'ADMINISTRADOR')):
            
            if (($CI->session->userdata('logged_in') == FALSE) && (strcmp(strtoupper($CI->session->userdata('entidade')),'ADMINISTRADOR') != 0) ):
                
                redirect(base_url(), 'reflesh');
                
            endif;
            
        endif;
        
        
        if ($CI->session->userdata('logged_in') == NULL):
            redirect(base_url(), 'reflesh');
        endif;
    }

//isSessionStarted




endif;

if(!function_exists('getVersion')):


    function getVersion($paramer){

        if(strcmp($paramer, 'n') == 0):
            return '0.1';
        endif;

        return 'Release 0.1';

    }//getVersion



endif;
