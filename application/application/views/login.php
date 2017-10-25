<!doctype html>
<html lang="pt_BR">
    <head>
        <meta charset="utf-8" />
        <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png" />
        <link rel="icon" type="image/png" href="../assets/img/favicon.png" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

        <title>SGC | Login</title>

        <!-- Canonical SEO -->
        <link rel="canonical" href="https://www.creative-tim.com/product/material-kit"/>

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
               
                background-size: 1300px;
                display: flex;
            }


        </style>

    </head>

    <body class="signup-page">

        <div class="wrapper">
            <div class="header header-filter background_body" >
                <div class="container">
                    <div class="row">



                        <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">

                            
                            
                            <div class="card card-signup">
                                <form class="form" method="POST" action="<?php echo base_url('application/');  ?>">
                                    <div class="header header-primary text-center" style="height: 120px">
                                        <h4><strong>SGC</strong></h4>
                                        <p>Sistema de Gerenciamento de Candidatos</p>
                                        <div class="social-line">

                                            <!--  <a href="#" class="btn btn-simple btn-just-icon">
                                                      <i class="fa fa-facebook-square"></i>
                                              </a> -->

                                        </div>
                                    </div>

                                    <div class="content">



                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">face</i>
                                            </span>
                                            <input type="text" name="username" required  value="<?php echo setValue('username'); ?>"  class="form-control" placeholder="Nome do Usuário...">
                                        </div>

                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">lock_outline</i>
                                            </span>
                                            <input type="password" required name="password" value="<?php echo setValue('password'); ?>" placeholder="Senha..." class="form-control" />
                                        </div>


                                    </div>

                                    <div class="col-md-12" >

                                        <div class="col-md-6">

                                            <button class="btn btn-primary" style="width:100%">Entrar</button>
                                        </div>
                                        <div class="col-md-6">

                                            <a href="<?php echo base_url('application/cadastro/candidato'); ?>"style="width:100%" class="btn btn-danger">Candidatar-se</a>
                                        </div>



                                    </div>

                                </form>
                                
                                
                               
                            </div>
                        </div>
                         <div class="col-md-12">

                                <?php echo $this->session->flashdata('messege_login'); ?>

                            </div>
                    </div>
                </div>



            </div>

        </div>


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
