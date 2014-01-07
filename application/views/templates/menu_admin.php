<div class="container">
    <div class="row">
        <div class="col-lg-12" align="center">
            <h4><?php echo 'Portal Administrativo'; ?></h4>
        </div>
            <div class="row">
                <?php
                    $url_academico = "index.php/academico";
                    $url_asignatura = "index.php/asignatura";
                    $url_evaluacion = "index.php/evaluacion";
                    $url_autocompletar = "index.php/academico/autocompletar";
                    $buttonacademico = array(
                        'class' => 'btn btn-link',
                        'value' => 'Administrar Academicos'
                        );
                    $buttonasignatura = array(
                        'class' => 'btn btn-link',
                        'value' => 'Administrar Asignaturas'
                        );
                    $buttonevaluacion = array(
                        'class' => 'btn btn-link',
                        'value' => 'Mis Evaluaciones'
                        );
                    $buttonautocompletar = array(
                        'class' => 'btn btn-link',
                        'value' => 'Autocompletar Asignatura/Académico'
                        );        
                ?>
                <div class="col-md-3" align="center">
                    <?php 
                        echo form_open(base_url($url_academico));
                            echo form_submit($buttonacademico);
                        echo form_close();
                    ?>
                </div>
                <div class="col-md-3" align="center">
                    <?php
                        echo form_open(base_url($url_evaluacion));
                            echo form_submit($buttonevaluacion);
                        echo form_close();
                    ?>
                </div>
                <div class="col-md-3" align="center">
                    <?php
                        echo form_open(base_url($url_asignatura));
                            echo form_submit($buttonasignatura);
                        echo form_close();
                    ?>
                </div>
                <div class="col-md-3" align="center">
                    <?php
                        echo form_open(base_url($url_autocompletar));
                            echo form_submit($buttonautocompletar);
                        echo form_close();
                    ?>
                </div>
            </div>
    </div>
</div>


