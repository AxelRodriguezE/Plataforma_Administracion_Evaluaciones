<div class="col-lg-12">
        <h3 class="text-info" align="center">Registro de Evaluaciones</h3>
        <p align="center"><b>Escuela de Informática</b></p>
        <p align="center"><b>Universidad Tecnológica Metropolitana</b></p>
        <br>
    </div>

<div class="container">
        <div class="panel panel-success">
        <div class="panel-heading"><h4>Editar Evaluación</h4></div>
            <div class="row">
                <div class="col-md-10 col-md-offset-1">

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

             $url_volver = "index.php/evaluacion";
             $buttonvolver = array(
                            'class' => 'btn btn-success',
                            'value' => 'Volver'
                        );

        echo '<br>';
echo form_open(base_url('/index.php/evaluacion/editar'));
?>
                <h4><b class="text-danger"><?php echo $query->nombre_tipo; ?></b>
                <?php echo 'creada por ' ?>
                <b class="text-danger"><?php echo $query->nombre_academico .' '. $query->apellidos_academico;?></b>
                <?php echo ','; ?>
                <br><br>
                <?php echo 'para la asignatura '?>
                <b class="text-danger"><?php echo $query->nombre_asignatura; ?></b></h4>
                <?php 
                echo '<br>';
                echo form_label('Titulo:');
                echo form_input($nombre);
                echo form_label('Fecha:');
                echo form_input($fecha);
                echo form_label('Hora:');
                echo form_input($hora);
                
                //Desplegar menu con los tipos de evaluacion existentes en el sistema...
//                echo form_label('Tipo de evaluacion');
//                                
//                $datos_tipo = array(
//                    " " => "Seleccione el tipo de evaluacion"
//                );
//                foreach($query_tipo as $query_tipo){
//                        $datos_tipo[$query_tipo->id_tipo] =  $query_tipo->nombre_tipo;
//                }
                //echo form_dropdown('tipo',  $datos_tipo);
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
            echo '<br>';

    ?>
                </div>
        </div>
    </div>
    <center><?php
         echo form_open(base_url($url_volver));
         echo form_submit($buttonvolver);
         echo form_close();
    ?></center>
</div>