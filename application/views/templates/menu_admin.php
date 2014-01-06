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
                    )
                ?>
                <div class="col-md-4" align="right">
                    <?php 
                        echo form_open(base_url($url_academico));
                            echo form_submit($buttonacademico);
                        echo form_close();
                    ?>
                </div>
                <div class="col-md-4" align="center">
                    <?php
                        echo form_open(base_url($url_evaluacion));
                            echo form_submit($buttonevaluacion);
                        echo form_close();
                    ?>
                </div>
                <div class="col-md-4" align="left">
                    <?php
                        echo form_open(base_url($url_asignatura));
                            echo form_submit($buttonasignatura);
                        echo form_close();
                    ?>
                </div>
            </div>
    </div>
</div>


