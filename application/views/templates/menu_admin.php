<div class="container">
    <div class="row">
        <div class="col-lg-12" align="center">
            <h4><?php echo 'Portal Administrativo'; ?></h4>
        </div>
            <div class="row">
                <?php
                    $url_academico = "index.php/academico";
                    $url_asignatura = "index.php/asignatura";
                    $buttonacademico = array(
                        'class' => 'btn btn-link',
                        'value' => 'Administrar Academicos'
                        );
                    $buttonasignatura = array(
                        'class' => 'btn btn-link',
                        'value' => 'Administrar Asignaturas'
                        );
                ?>
                <div class="col-md-6" align="right">
                    <?php 
                        echo form_open(base_url($url_academico));
                            echo form_submit($buttonacademico);
                        echo form_close();
                    ?>
                </div>
                <div class="col-md-6" align="left">
                    <?php
                        echo form_open(base_url($url_asignatura));
                            echo form_submit($buttonasignatura);
                        echo form_close();
                    ?>
                </div>
            </div>
    </div>
</div>


