<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png" />
        <link rel="icon" type="image/png" href="../assets/img/favicon.png" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

        <title>SGC | Administrador Dashboard</title>

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



                        <div class="card" >
                            
                            <div class="card-header" data-background-color="purple">
                                <h4 class="title">Lista de Candidatos</h4>
                                <p class="category">Data da busca:  <script>document.write(new Date())</script></p>
                            </div>
                            
                            <div class="card-body" style="height:400px;overflow: auto" >
                                
                                <table class="table table-hover">
                                    <thead style="color:blue">
                                    <th>ID</th>
                                    <th>Nome</th>
                                    <th>E-Mail</th>
                                    <th>Ações</th>
                                    </thead>
                                    <tbody>
                                       
                                       <?php if(isset($candidatos)): ?>
                                           <?php foreach($candidatos as $candidato): ?>
                                       
                                        <tr> 
                                        
                                            <td><?php echo $candidato['ID']; ?></td>
                                            <td><?php echo $candidato['PRIMEIRO_NOME'].' '.$candidato['SOBRENOME']; ?></td>
                                            <td><?php echo $candidato['EMAIL']; ?></td>
                                            <td>
                                                
                                                <a class="btn btn-sm btn-primary"><i class="material-icons">thumb_up</i></a>
                                                <a class="btn btn-sm btn-danger"><i class="material-icons">thumb_down</i></a>
                                            
                                            </td>
                                        </tr>

                                           <?php endforeach; ?>
                                       <?php endif; ?>
                                       
                                    </tbody>
                                </table>
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
