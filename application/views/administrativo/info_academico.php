<div class="container">
    <div class="jumbotron">
            
        <p class="text-primary" align="center"><b><?php echo $academico_actual->nombre_academico .' '. $academico_actual->apellidos_academico; ?></b></p>
            <?php
                echo 'Actualmente tiene asignadas las siguientes asignaturas: ';
                echo '<br>';
                foreach ($query as $query1):
                    echo $query1->nombre_asignatura;
                    echo '<br>';
                endforeach;
            ?>
        <hr/>
            <p class="text-info">Evaluaciones realizadas:</p>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Asignatura</th>
                        <th>Tipo</th>
                        <th>Titulo</th>
                        <th>Fecha</th>
                        <th>Estado</th>
                        <th>Pauta</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($query == NULL)
                        echo 'Actualmente no se encuentran Evaluaciones en el sistema';
                    else {
                    foreach ($query as $query):?>
                    <tr>
                        <td><?php echo $query->nombre_asignatura; ?></td>
                        <td><?php
                        if(isset($query->nombre_tipo))
                            echo $query->nombre_tipo;
                        else 
                            echo 'Dato no ingresado'; ?></td>
                        <td><?php 
                        if(isset($query->nombre_evaluacion))
                            echo $query->nombre_evaluacion;
                        else
                            echo 'Dato no ingresado'; ?></td>
                        <td><?php 
                        if(isset($query->fecha_evaluacion))
                            echo $query->fecha_evaluacion;
                        else
                            echo 'Dato no ingresado'; ?></td>
                        <td><?php
                        if(isset($query->fecha_evaluacion))
                        {
                            if(date("Y-m-d") < $query->fecha_evaluacion) {?>
                            <p class="text-info"><?php echo 'Pendiente'; }?></p>
                           <?php 
                            if(date("Y-m-d") > $query->fecha_evaluacion) {?>
                            <p class="text-danger"><b><?php echo 'Finalizada'; } }?></b></p>
                        </td>
                        <td>
                            <?php
                            if(isset($query->pauta_evaluacion))
                            {
                                if($query->pauta_evaluacion)
                                    echo 'Pauta disponible';
                                else
                                    echo 'Pauta pendiente';
                            }
                            $url_volver = "index.php/academico";
                            $buttonvolver = array(
                               'class' => 'btn btn-success',
                               'value' => 'Volver'
                                );
                            ?>

                        </td>
                    </tr>
                    <?php endforeach; } ?>
                </tbody>

            </table>
    </div>

    <?php
         echo form_open(base_url($url_volver));
         echo form_submit($buttonvolver);
         echo form_close();
    ?>
</div>

