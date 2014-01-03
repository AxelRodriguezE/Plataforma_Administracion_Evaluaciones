<div class="container">
    <div class="jumbotron">
            <p class="text-primary" align="center"><?php echo $query->nombre_asignatura;echo ' (';echo 'Sección ';echo $query->seccion_asignatura; echo ')'; ?></p>
            <p align="center"><?php echo 'Titulo: ';echo $query->nombre_evaluacion; ?></p>
            <p align="center"><?php echo 'Profesor(a) ';echo $query->nombre_academico;echo ' ';echo $query->apellidos_academico; ?></p>
        <?php
            echo 'Tipo de evaluacion: ' ;echo $query->nombre_tipo;
            echo '<br>';
            echo 'Fijada para el día ';echo $query->fecha_evaluacion;
            echo ' a las ';
            echo $query->hora_evaluacion; echo ' horas.';
            echo '<br>';
            echo 'Ponderada al ';echo $query->ponderacion_evaluacion;echo '%';
            echo '<br>';
            
            if(!$query->pauta_evaluacion)
            {
                ?><p align="center" class="text-danger"><?php echo 'Pauta pendiente por subir';
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
                        echo form_label('Ingresar URL de la Pauta');
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
                echo 'Link Pauta de evaluacion: '; echo $query->archivo_pauta;
            }
            echo '<br>';
            echo 'Observaciones:';echo '<br>'; ?>
            <p class="text-danger"><?php echo $query->observacion_evaluacion; ?></p>
    </div>
</div>