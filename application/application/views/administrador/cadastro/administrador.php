<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png" />
        <link rel="icon" type="image/png" href="../assets/img/favicon.png" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

        <title>SGC | Registro de administrador</title>

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
    </head>

    <body>

        <div class="wrapper">

            <?php $this->load->view('administrador/sidebar') ?>

            <div class="main-panel">

                <?php $this->load->view('administrador/navbar'); ?>

                <div class="content">



                    <div class="card"  >
                        <form method="POST" action="<?php echo base_url('application/cadastro/administrador'); ?>">

                            <div class="card-header" data-background-color="purple"> 
                                <h4>Registro de Administrador</h4>

                            </div>

                            <div class="card-body">

                                <div class="col-md-12 col-sd-10">
                                    
                                    
                                    <?php echo $this->session->flashdata('messege_cadAdministrador'); ?>

                                    <div class="col-md-6">

                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">face</i>
                                            </span>
                                            <input type="text" name="primeiroNome" maxlength="25" required class="form-control" value="<?php echo setValue('primeiroNome'); ?>" placeholder="Primeiro Nome...">
                                        </div>

                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">perm_phone_msg</i>
                                            </span>
                                            <input type="text" name="telefone" maxlength="20" required class="form-control" value="<?php echo setValue('telefone'); ?>" placeholder="Telefone...">
                                        </div>

                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">face</i>
                                            </span>
                                            <input type="text" name="username" maxlength="25" required class="form-control" value="<?php echo setValue('username'); ?>" placeholder="Nome de usuário...">
                                        </div>

                                    </div>

                                    <div class="col-md-6">

                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">face</i>
                                            </span>
                                            <input type="text" name="sobrenome" maxlength="30" required class="form-control" value="<?php echo setValue('sobrenome'); ?>" placeholder="Sobrenome...">
                                        </div>

                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">email</i>
                                            </span>
                                            <input type="email" name="email" maxlength="40" required class="form-control" value="<?php echo setValue('email'); ?>" placeholder="E-mail...">
                                        </div>

                                        <div class="col-md-6">

                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="material-icons">lock</i>
                                                </span>
                                                <input type="password" name="password" maxlength="35" required class="form-control" value="<?php echo setValue('password'); ?>" placeholder="Senha...">
                                            </div>

                                        </div>
                                        <div class="col-md-6">

                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="material-icons">lock</i>
                                                </span>
                                                <input type="password" name="conf_password" maxlength="35" required class="form-control" value="<?php echo setValue('conf_password'); ?>" placeholder="Confirme a senha...">
                                            </div>

                                        </div>


                                    </div>


                                    <div class="col-md-3"></div>
                                    <div class="col-md-3">

                                        <button class="btn btn-primary" style="width:100%;">Registrar</button>

                                    </div>
                                    <div class="col-md-3">

                                        <button class="btn btn-danger" style="width:100%;">Cancelar</button>

                                    </div>
                                    <div class="col-md-3"></div>


                                </div>



                        </form>
                    </div>




                </div>




            </div>

            <?php $this->load->view('administrador/footer'); ?>
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


<script type="text/javascript">
    $(document).ready(function () {

        // Javascript method's body can be found in assets/js/demos.js
        demo.initDashboardPageCharts();

    });
</script>

</html>
