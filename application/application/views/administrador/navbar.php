<nav class="navbar navbar-transparent navbar-absolute">
    <div class="container-fluid">

        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <a href="<?php echo base_url('application/administrador/logout');  ?>" style="color:black" >
                        Sair
                        <i class="material-icons" >exit_to_app</i>
                    </a>

            </ul>
            <ul class="nav navbar-nav navbar-left">
                <a href="#" class="simple-text" style="color:black; font-size: 12pt">
                    <?php
                    $nome = $this->session->userdata('nome');
                    if (isset($nome)):
                        echo $nome;
                    else:
                        echo 'Error: Nome não encontrado';
                    endif;
                    ?>
                </a>
                
            </ul>

        </div>
    </div>
</nav>