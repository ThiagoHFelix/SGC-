<!doctype html>
<html lang="pt_BR">
    <head>
        <meta charset="utf-8" />
        <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png" />
        <link rel="icon" type="image/png" href="../assets/img/favicon.png" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

        <title>SGC | Cadastro Candidato</title>



        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
        <meta name="viewport" content="width=device-width" />


        <!-- Bootstrap core CSS  -->
        <link href="<?php echo base_url('material-dashboard/assets/css/bootstrap.min.css'); ?>" rel="stylesheet" />

        <link href="<?php echo base_url('material-dashboard/assets/css/material-kit.css'); ?>" rel="stylesheet" />


        <!--  Material Dashboard CSS    -->
        <link href="<?php echo base_url('material-dashboard/assets/css/material-dashboard.css'); ?>" rel="stylesheet" />




        <!--     Fonts and icons     -->
        <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>

        <style type="text/css">



            .background_body{
                background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(255,255,255,0.2)), color-stop(100%,rgba(255,255,255,0.2))), url("<?php echo base_url('material-dashboard/assets/img/login_wallpaper.jpeg'); ?>") repeat 0 0;

                background-color: #fff;
                backace-visibility: 10;
                background-size: 1300px;
                display: flex;
            }


        </style>

    </head>

    <body class="signup-page">


        <div class="wrapper">
            <div class="header header-filter background_body" >
                <div class="container">
                    
                    <div class="col-md-1"></div>
                    <div class="col-md-10 ">

                        <div class="card"style="margin-top:50px">
                            <form class="form" method="post" action="<?php echo base_url('application/cadastro/candidato'); ?>">


                                <div class="card-header text-center"  data-background-color="purple">
                                    <h4 class="title">Cadastro de Candidato</h4>
                                    <p class="category">Complete o cadastro, o resultado sera enviado ao seu e-mail </p>
                                </div>

                                <br/>
                                <p class="text-center">Todos os campos são obrigatórios</p>
                                
                                <div class="col-md-12">
                                    
                                    <?php echo $this->session->flashdata('cadastro_candidato'); ?>
                                    
                                </div>

                                <div class="col-md-12" style="padding:15px;">


                                    <div class="col-md-6">

                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">face</i>
                                            </span>
                                            <input type="text" name="primeiroNome" maxlength="25" required class="form-control" value="<?php echo setValue('primeiroNome'); ?>" placeholder="Primeiro Nome...">
                                        </div>
                                        
                                           <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">mail</i>
                                            </span>
                                               <input type="email" name="email" maxlength="30"  value="<?php echo setValue('email'); ?>" required class="form-control" placeholder="E-Mail...">
                                        </div>
                                     

                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">domain</i>
                                            </span>
                                            <textarea class="form-control" name="info_ultimo" maxlength="255"  rows="5" placeholder="Descreva seus ultimos trabalhos na area..." ><?php echo setValue('info_ultimo'); ?></textarea>
                                        </div>  

                                    </div>
                                    <div class="col-md-6">

                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">face</i>
                                            </span>
                                            <input type="text" name="sobrenome" maxlength="30"  value="<?php echo setValue('sobrenome'); ?>" required class="form-control" placeholder="Sobrenome...">
                                        </div> 

                                        
                                        <div class="col-md-6">
                                            <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">perm_phone_msg</i>
                                            </span>
                                            <input type="text" name="telefone" maxlength="20"  value="<?php echo setValue('telefone'); ?>" required class="form-control" placeholder="Telefone...">
                                        </div>  
                                            
                                            
                                        </div>
                                        <div class="col-md-6">
                                            
                                            
                                               <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">fingerprint</i>
                                            </span>
                                            <input type="text" name="cpf" maxlength="14"  value="<?php echo setValue('cpf'); ?>" required class="form-control" placeholder="CPF...">
                                        </div>
                                        </div>
                                        
                                        
                                        

                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">thumb_up</i>
                                            </span>
                                            <textarea class="form-control" name="info_qualidade" maxlength="255"   rows="5" placeholder="Descreva suas qualidades..." ><?php echo setValue('info_qualidade'); ?></textarea>
                                        </div>  

                                    </div>



                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">question_answer</i>
                                        </span>
                                        <textarea class="form-control" name="info_emprego" maxlength="255"  rows="5" placeholder="Por que quer este emprego ?" ><?php echo setValue('info_emprego'); ?></textarea>
                                    </div> 

                                    <div class="col-md-3"></div>
                                    
                                    <div class="col-md-3">
                                        <button class="btn btn-primary " style="width:100%">Registrar</button>
                                    </div>
                                    <div class="col-md-3">
                                        <a href="<?php echo base_url('application/'); ?>" class="btn btn-danger " style="width:100%">Voltar</a>
                                    </div>
                                    
                                    <div class="col-md-3"></div>
                                   


                                </div>
                                 <div class="col-md-1"></div>
                            </form>
                        </div>


                    </div>



                </div>

            </div>





            <?php /* <div class="wrapper">
              <div class="header header-filter background_body" >


              <div class="col-md-12">
              <form class="form" method="" action="">
              <div class="card">
              <div class="header header-primary text-center" style="height: 120px">
              <h4><strong>SGC</strong></h4>
              <p>Sistema de Gerenciamento de Candidatos</p>
              <div class="social-line">

              <!--  <a href="#" class="btn btn-simple btn-just-icon">
              <i class="fa fa-facebook-square"></i>
              </a> -->

              </div>
              </div>
              <p class="category">Created using Roboto Font Family</p>
              <p class="category">Created using Roboto Font Family</p>
              <p class="category">Created using Roboto Font Family</p>
              <p class="category">Created using Roboto Font Family</p>
              <p class="category">Created using Roboto Font Family</p>
              <p class="category">Created using Roboto Font Family</p>
              <p class="category">Created using Roboto Font Family</p>
              <p class="category">Created using Roboto Font Family</p>
              <p class="category">Created using Roboto Font Family</p>
              <p class="category">Created using Roboto Font Family</p>

              </div>
              </form>
              </div>


              </div>



              </div> */ ?>

    </body>

    <!--   Core JS Files   -->
    <script src="<?php echo base_url('material-dashboard/assets/js/jquery-3.1.0.min.js'); ?>" type="text/javascript" ></script>
    <script src="<?php echo base_url('material-dashboard/assets/js/bootstrap.min.js'); ?>" type="text/javascript" ></script>
    <script src="<?php echo base_url('material-dashboard/assets/js/material.min.js'); ?>" type="text/javascript" ></script>


    <!--  Charts Plugin -->
    <script src="<?php echo base_url('material-dashboard/assets/js/chartist.min.js'); ?>" type="text/javascript" ></script>


    <!--  Notifications Plugin    -->
    <script src="<?php echo base_url('material-dashboard/assets/js/bootstrap-notify.js'); ?>" type="text/javascript" ></script>



    <!-- Material Dashboard javascript methods -->
    <script src="<?php echo base_url('material-dashboard/assets/js/material-dashboard.js'); ?>" type="text/javascript" ></script>






</html>
