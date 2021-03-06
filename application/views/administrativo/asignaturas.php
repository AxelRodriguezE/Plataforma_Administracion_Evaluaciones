<div class="container">
    <div class="col-md-10 col-md-offset-1">

<div class="col-lg-12">
        <h3 class="text-info" align="center">Registro de Asignaturas</h3>
        <p align="center"><b>Escuela de Informática</b></p>
        <p align="center"><b>Universidad Tecnológica Metropolitana</b></p>
        <br>
    </div>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Codigo</th>
                    <th>Asignatura</th>
                    <th>Seccion</th>
                    <th>Academico</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $url_agregar = "index.php/asignatura/agregar/";
                    $buttonagregar = array(
                            'class' => 'btn btn-warning',
                            'value' => 'Añadir (+)'
                        );
                    if ($query == NULL)
                        echo 'Actualmente no se encuentran Asignaturas en el sistema';
                    else {
                    foreach ($query as $query):?>
                    <tr>    
                        <td><?php echo $query->codigo_asignatura; ?></td>
                        <td><?php echo $query->nombre_asignatura; ?></td>
                        <td><?php echo $query->seccion_asignatura; ?></td>
                        <td><?php echo $query->nombre_academico; echo ' '; echo $query->apellidos_academico;?></td>

                        <?php 
                        $id = $query->id_asignatura;
                        $url_eliminar = "index.php/asignatura/eliminar/".$id;
                        $url_editar = "index.php/asignatura/editar/".$id;
                        $url_examinar = "index.php/".$id;
                        $buttoneditar = array(
                            'class' => 'btn btn-success',
                            'value' => 'Editar'
                        );
                        $buttoneliminar = array(
                            'class' => 'btn btn-danger',
                            'value' => 'Eliminar'
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