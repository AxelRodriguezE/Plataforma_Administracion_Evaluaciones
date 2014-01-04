<div class="container">
    <div class="jumbotron">
            
            <p class="text-primary" align="center"><b><?php echo $query->nombre_asignatura;echo ' (';echo 'Sección ';echo $query->seccion_asignatura; echo ')'; ?></b></p>
            <br>
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>
                        <?php echo 'Profesor(a) ';echo $query->nombre_academico;echo ' ';echo $query->apellidos_academico; ?>
                    </th>
                    <th>
                        <?php echo 'Titulo: ';echo $query->nombre_evaluacion; ?>
                    </th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo 'Tipo de evaluacion:'; ?></td>
                        <td><?php echo $query->nombre_tipo; ?></td>
                    </tr>
                    <tr>
                        <td><?php echo 'Fecha de evaluacion:'; ?></td>
                        <td>
                            <?php 
                            date_default_timezone_set('UTC');
                            echo $query->fecha_evaluacion;
                            
                            if(date("Y-m-d") < $query->fecha_evaluacion) {?>
                            <a class="text-info"><b><?php echo '(Pendiente)'; }?><b></a>
                           <?php 
                            if(date("Y-m-d") > $query->fecha_evaluacion) {?>
                            <a class="text-danger"><b><?php echo '(Finalizada)'; }?></b></a>
                        </td>
                    </tr>
                    <tr>
                        <td><?php echo 'Hora aproximada:'; ?></td>
                        <td><?php echo $query->hora_evaluacion; echo ' horas.'; ?></td>
                    </tr>
                    <tr>
                        <td><?php echo 'Ponderación:'; ?></td>
                        <td><?php echo $query->ponderacion_evaluacion;echo '%'; ?></td>
                    </tr>
                    <tr>
                        <td>
                            <?php
                            if($query->pauta_evaluacion)
                                echo 'Pauta disponible';
                            else
                                echo 'Pauta pendiente';
                            ?>
                        </td>
                        <td>
                            <?php
                            if(!$query->pauta_evaluacion)
                            {
                                ?><p align="center" class="text-danger"><?php echo 'Ingresar URL del documento';
                                    $id_evaluacion = $query->id_evaluacion;
                                    $id_asignatura = $query->id_asignatura;
                                    $titulo_pauta = $query->nombre_tipo .' '. $query->nombre_asignatura .' '. $query->nombre_evaluacion;
                                    $url = "index.php/evaluacion/subir_pauta/";
                                    $pauta = array(
                                        'type' => 'text',
                                        'id' => 'pauta',
                                        'name' => 'pauta',
                                        'class' => 'form-control'
                                    );
                                    $titulo = array(
                                        'type' => 'hidden',
                                        'id' => 'titulo',
                                        'name' => 'titulo',
                                        'value' => $titulo_pauta 
                                    );
                                    $id_eval = array(
                                        'type' => 'hidden',
                                        'id' => 'id_evaluacion',
                                        'name' => 'id_evaluacion',
                                        'value' => $id_evaluacion
                                    );
                                    $id_asign = array(
                                        'type' => 'hidden',
                                        'id' => 'id_asignatura',
                                        'name' => 'id_asignatura',
                                        'value' => $id_asignatura
                                    );
                                    $button = array(
                                        'class' => 'btn btn-danger',
                                        'value' => 'Subir'
                                    );
                                    echo form_open(base_url($url));
                                        echo form_input($pauta);
                                        echo form_input($titulo);
                                        echo form_input($id_eval);
                                        echo form_input($id_asign);
                                        echo form_submit($button);
                                    echo form_close();
                                ?>
                                </p>
                            <?php
                                }
                                else
                                {
                                    $url_pauta = $query->archivo_pauta;
                                    echo anchor($url_pauta, 'DESCARGAR PAUTA', 'title="Link descarga Pauta de la Evaluacion"');
                                }
                            ?>
                        </td>
                    </tr>
                <tr>
                    <td><?php echo 'Observaciones:'; ?></td>
                    <td><p class="text-danger"><?php echo $query->observacion_evaluacion; ?></p></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>