<div class="container">
    <div class="col-lg-12">
        <h1 class="text-info" align="center">Portal de Evaluaciones</h1>
        <p align="center"><b>Escuela de Informática</b></p>
        <p align="center"><b>Universidad Tecnológica Metropolitana</b></p>
        <br>
    </div>
    <div class="row">
        <div class="col-md-3">
            <?php
                $button = array(
                    'class' => 'btn btn-primary',
                    'value' => 'VER EVALUACIONES'
                );
                
                echo form_open(base_url("index.php/publico/"));
                    echo form_fieldset('Buscar por Asignatura');
                    echo form_label('Seleccione una Asignatura:');
                    echo '<br>';
                    $datos_asignatura = array(
                    );
                    foreach($query_asignatura as $query_asignatura){
                        $datos_asignatura[$query_asignatura->id_asignatura] = $query_asignatura->nombre_asignatura .' - Sección '. $query_asignatura->seccion_asignatura;
    //$query_asignatura1->nombre_asignatura;
                    }
                    echo form_dropdown('asignatura',  $datos_asignatura);
                    echo "<br>";
                    echo '<br>';
                    echo form_submit($button);
                    echo form_fieldset_close();
                echo form_close();

            ?>
        </div>
        <div class="col-md-9">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Fecha</th>
                        <th>Hora</th>
                        <th>Asignatura</th>
                        <th>Tipo</th>
                        <th>Titulo</th>
                        <th>Estado</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        date_default_timezone_set('UTC');
                        if ($query == NULL)
                            echo 'Actualmente no se encuentran Evaluaciones en el sistema';
                        else {
                        foreach ($query as $query):?>
                        <tr>  
                            <td><?php echo $query->fecha_evaluacion; ?></td>
                            <td><?php echo $query->hora_evaluacion; ?></td>
                            <td><?php echo $query->nombre_asignatura; ?></td>
                            <td><?php echo $query->nombre_tipo; ?></td>
                            <td><?php echo $query->nombre_evaluacion; ?></td>
                            <td><?php 
                                if(date("Y-m-d") < $query->fecha_evaluacion) {?>
                                <p class="text-info"><?php echo 'Pendiente'; }?></p>
                               <?php 
                                if(date("Y-m-d") > $query->fecha_evaluacion) {?>
                                <p class="text-danger"><b><?php echo 'Finalizada'; }?></b></p>
                            </td>
                        <?php 
                            $id = $query->id_evaluacion;
                            $url_examinar = "index.php/evaluacion/examinarEvaluacion_publico/".$id;
                            $buttonexaminar = array(
                                'class' => 'btn btn-info',
                                'value' => 'Examinar'
                            );
                            ?>
                            <td>
                                <?php
                                    echo form_open(base_url($url_examinar));
                                        echo form_submit($buttonexaminar);
                                    echo form_close();
                                ?>
                            </td>
                        </tr>
                        <?php endforeach; }?>
                </tbody>
            </table>
        </div>
    </div>
</div>

