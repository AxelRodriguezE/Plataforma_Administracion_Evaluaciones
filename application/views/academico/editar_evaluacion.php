<div class="container">
    <?php
        $id_evaluacion = $query->id_evaluacion;
        $nombre_evaluacion = $query->nombre_evaluacion;
        $fecha_evaluacion = $query->fecha_evaluacion;
        $hora_evaluacion = $query->hora_evaluacion;
        $ponderacion_evaluacion = $query->ponderacion_evaluacion;
        $observacion_evaluacion = $query->observacion_evaluacion;

        $id = array(
            'type' => 'hidden',
            'id' => 'id',
            'name' => 'id',
            'value' => $id_evaluacion
        );
        $nombre = array(
                'type' => 'text',
                'id' => 'nombre',
                'name' => 'nombre',
                'class' =>'form-control',
                'value' => $nombre_evaluacion
            );
            $fecha = array(
                'type' => 'date',
                'id' => 'fecha',
                'name' => 'fecha',
                'class' => 'form-control',
                'value' => $fecha_evaluacion
            );
            $hora = array(
                'type' => 'time',
                'id' => 'hora',
                'name' => 'hora',
                'class' =>'form-control',
                'value' => $hora_evaluacion
            );
            $ponderacion = array(
                'type' => 'text',
                'id' => 'ponderacion',
                'name' => 'ponderacion',
                'class' => 'form-control',
                'value' => $ponderacion_evaluacion
            );
            $observacion = array(
                'type' => 'text',
                'id' => 'observacion',
                'name' => 'observacion',
                'class' => 'form-control',
                'value' => $observacion_evaluacion 
            );
            
        $button = array(
            'class' => 'btn btn-primary',
            'value' => 'Modificar'
        );
echo form_open(base_url('/index.php/evaluacion/editar'));
            echo form_fieldset('Editar Evaluación');
                echo form_label('Academico');
                
                $datos_academico = array(
                    " " => "Seleccione el Academico"
                    );
                foreach($query_academico as $query_academico){
                        $datos_academico[$query_academico->id_academico] =  $query_academico->nombre_academico .' '. $query_academico->apellidos_academico;
                }
                echo "<br>";
                echo form_dropdown('academico',  $datos_academico);
                echo "<br>";
                
                echo form_label('Asignatura');
                
                $datos_asignatura = array(
                    " " => "Seleccione la Asignatura"
                );
                foreach($query_asignatura as $query_asignatura){
                        $datos_asignatura[$query_asignatura->id_asignatura] =  $query_asignatura->nombre_asignatura;
                }
                echo "<br>";
                echo form_dropdown('asignatura',  $datos_asignatura);
                echo "<br>";


                echo form_label('Titulo:');
                echo form_input($nombre);
                echo form_label('Fecha:');
                echo form_input($fecha);
                echo form_label('Hora:');
                echo form_input($hora);
                echo form_label('Tipo de evaluacion');
                                
                $datos_tipo = array(
                    " " => "Seleccione el tipo de evaluacion"
                );
                foreach($query_tipo as $query_tipo){
                        $datos_tipo[$query_tipo->id_tipo] =  $query_tipo->nombre_tipo;
                }
                echo "<br>";
                echo form_dropdown('tipo',  $datos_tipo);
                echo "<br>";
                echo form_label('Ponderación');
                echo form_input($ponderacion);
                echo form_label('Observaciones');
                echo form_input($observacion);
                
                echo form_label('');
                echo "<br>";
                echo form_input($id);
                echo form_submit($button);
            echo form_fieldset_close();
            echo form_close();

    ?>
</div>