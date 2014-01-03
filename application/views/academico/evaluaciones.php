<div class="container">
    <div class="col-md-12">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Tipo</th>
                    <th>Asignatura</th>
                    <th>Titulo</th>
                    <th>Fecha</th>
                    <th>Estado</th>
                    <th>Pauta</th>
                </tr>
            </thead>
            <tbody>
                
                <?php
                    $url_agregar = "index.php/evaluacion/agregar/";
                    $buttonagregar = array(
                            'class' => 'btn btn-default',
                            'value' => '+'
                        );
                    if ($query == NULL)
                        echo 'Actualmente no se encuentran Evaluaciones en el sistema';
                    else {
                    foreach ($query as $query):?>
                    <tr>    
                        <td><?php echo $query->id_evaluacion; ?></td>
                        <td><?php echo $query->nombre_tipo; ?></td>
                        <td><?php echo $query->nombre_asignatura; ?></td>
                        <td><?php echo $query->nombre_evaluacion; ?></td>
                        <td><?php echo $query->fecha_evaluacion; ?></td>
                        <td>Estado de la evaluacion</td>
                        <td>Estado de pauta</td>

                        <?php 
                        $id = $query->id_evaluacion;
                        $url_eliminar = "index.php/evaluacion/eliminar/".$id;
                        $url_editar = "index.php/evaluacion/editar/".$id;
                        $url_examinar = "index.php/evaluacion/examinarEvaluacion/".$id;
                        $buttoneditar = array(
                            'class' => 'btn btn-success',
                            'value' => 'Editar'
                        );
                        $buttoneliminar = array(
                            'class' => 'btn btn-danger',
                            'value' => 'Eliminar'
                        );
                        $buttonexaminar = array(
                            'class' => 'btn btn-info',
                            'value' => 'Examinar'
                        );
                        ?>
                        <td>
                            <?php
                                echo form_open(base_url($url_editar));
                                    echo form_submit($buttoneditar);
                                echo form_close();
                            ?>
                        </td>
                        <td>
                            <?php
                                echo form_open(base_url($url_eliminar));
                                    echo form_submit($buttoneliminar);
                                echo form_close();
                            ?>
                        </td>
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
        <?php
            echo form_open(base_url($url_agregar));
                echo form_submit($buttonagregar);
            echo form_close();
        ?>
    </div>
</div>