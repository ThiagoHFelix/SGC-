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


    <style>


        /* The Modal (background) */
        .modal {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1; /* Sit on top */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: rgb(0,0,0); /* Fallback color */
            background-color: rgba(0,0,0,0.5); /* Black w/ opacity */
        }


        /* The Close Button */
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        /* Modal Header */
        .modal-header {
            padding: 2px 16px;
            border-bottom: 1px solid black;
        }

        /* Modal Body */
        .modal-body {padding: 2px 16px;}

        /* Modal Footer */
        .modal-footer {
            padding: 2px 16px;
            background-color: #5cb85c;
            color: white;
        }

        /* Modal Content */
        .modal-content {
            position: relative;
            background-color: #fefefe;
            margin: auto;
            margin-top:100px;
            padding: 0;
            border: 1px solid #888;
            width: 80%;
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
            -webkit-animation-name: animatetop;
            -webkit-animation-duration: 0.10s;
            animation-name: animatetop;
            animation-duration: 0.6s
        }

        /* Add Animation */
        @-webkit-keyframes animatetop {
            from {top: -200px; opacity: 0} 
            to {top: 0; opacity: 1}
        }

        @keyframes animatetop {
            from {top: -200px; opacity: 0}
            to {top: 0; opacity: 1}
        }

    </style>


    <body>
        

        <div class="wrapper">

            <?php $this->load->view('administrador/sidebar') ?>
            

            <div class="main-panel">
                
                

                <?php $this->load->view('administrador/navbar'); ?>

                <div class="content">

                    <?php echo $this->session->flashdata('messege_dashboard'); ?>
                    
                    <!----------------- MODAL CONTENT ----------------->
                        <div id="myModal" class="modal">

                            <div class="modal-content">

                                <div class="card">
                                    
                                    <div class="card-header" data-background-color="purple"> 
                                        
                                        <span class="close">&times;</span>
                                        <h4>HEADER</h4>
                                    </div>
                                    <div class="card-body"> <p>BODY</p> </div>
                                    
                                </div>
                               

                            </div>

                        </div>
                        <!----------------- /. MODAL CONTENT ----------------->

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

                                    <?php if (isset($candidatos)): ?>
                                        <?php foreach ($candidatos as $candidato): ?>

                                            <tr> 

                                                <td><?php echo $candidato['ID']; ?></td>
                                                <td><?php echo $candidato['PRIMEIRO_NOME'] . ' ' . $candidato['SOBRENOME']; ?></td>
                                                <td><?php echo $candidato['EMAIL']; ?></td>
                                                <td>

                                                    <a class="btn btn-sm btn-primary" id="myBtn"><i class="material-icons">thumb_up</i></a>
                                                    <a class="btn btn-sm btn-danger" id="myBtn" ><i class="material-icons">thumb_down</i></a>

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



                                // Get the modal
                                var modal = document.getElementById('myModal');

                                // Get the button that opens the modal 
                                var btn = document.getElementById("myBtn");

                                // Get the <span> element that closes the modal
                                var span = document.getElementsByClassName("close")[0];

                                // When the user clicks on the button, open the modal 
                                btn.onclick = function () {
                                    modal.style.display = "block";
                                }

                                // When the user clicks on <span> (x), close the modal
                                span.onclick = function () {
                                    modal.style.display = "none";
                                }

                                // When the user clicks anywhere outside of the modal, close it
                                window.onclick = function (event) {
                                    if (event.target == modal) {
                                        modal.style.display = "none";
                                    }
                                }

    </script>

</html>
