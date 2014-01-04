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
                        <td><?php echo $query->nombre_tipo; ?></td>
                        <td><?php echo $query->nombre_evaluacion; ?></td>
                        <td><?php echo $query->fecha_evaluacion; ?></td>
                        <td>
                            <?php
                            if($query->pauta_evaluacion)
                                echo 'Pauta disponible';
                            else
                                echo 'Pauta pendiente';
                            ?>
                        </td>
                    </tr>
                    <?php endforeach; } ?>
                </tbody>

            </table>
    </div>
</div>

