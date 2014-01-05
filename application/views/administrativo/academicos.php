<div class="container">
    <div class="col-md-10 col-md-offset-1">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>RUT</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    
                    $url_agregar = "index.php/academico/agregar/";
                    $buttonagregar = array(
                            'class' => 'btn btn-warning',
                            'value' => 'Añadir (+)'
                        );
                    if ($query == NULL)
                        echo 'Actualmente no se encuentran Academicos en el sistema';
                    else {
                    foreach ($query as $query):?>
                    <tr>    
                        <td><?php echo $query->id_academico; ?></td>
                        <td><?php echo $query->nombre_academico; ?></td>
                        <td><?php echo $query->apellidos_academico; ?></td>
                        <td><?php echo $query->rut_academico; ?></td>

                        <?php 
                        $id = $query->id_academico;
                        $url_eliminar = "index.php/academico/eliminar/".$id;
                        $url_editar = "index.php/academico/editar/".$id;
                        $url_examinar = "index.php/academico/examinarAcademico/".$id;
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