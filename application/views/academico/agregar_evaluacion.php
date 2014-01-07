<div class="col-lg-12">
        <h3 class="text-info" align="center">Registro de Evaluaciones</h3>
        <p align="center"><b>Escuela de Informática</b></p>
        <p align="center"><b>Universidad Tecnológica Metropolitana</b></p>
        <br>
    </div>


<div class="container">
        <div class="panel panel-info">
            <div class="panel-heading"><h4>Agregar Evaluación</h4></div>
            <div class="row">
                <div class="col-md-10 col-md-offset-1">

        <?php
            $nombre = array(
                'type' => 'text',
                'id' => 'nombre',
                'name' => 'nombre',
                'class' =>'form-control'
            );
            $fecha = array(
                'type' => 'date',
                'id' => 'fecha',
                'name' => 'fecha',
                'class' => 'form-control',
                'value' => 'dd-mm-aaaa'
            );
            $hora = array(
                'type' => 'time',
                'id' => 'hora',
                'name' => 'hora',
                'class' =>'form-control',
                'value' => 'HH:MM'
            );
            $ponderacion = array(
                'type' => 'text',
                'id' => 'ponderacion',
                'name' => 'ponderacion',
                'class' => 'form-control'
            );
            $observacion = array(
                'type' => 'text',
                'id' => 'observacion',
                'name' => 'observacion',
                'class' => 'form-control'
            );
            $academico = array(
                'type' => 'hidden',
                'id' => 'academico',
                'name' => 'academico',
                'value' => $id
            );

            $button = array(
                'class' => 'btn btn-primary',
                'value' => 'Agregar'
            );
            echo '<br>';
            echo form_open(base_url('/index.php/evaluacion/agregar'));
//                echo 'Creando una nueva evaluación para:';
//                echo "<br>";
//                echo 'Asignatura:';
//                echo "<br>";
//                echo 'Academico:';
                                //enviar oculto nombre del academico logueado
                
                //rescatar la asignatura que se esta ingresando una evaluacion
//                echo form_label('Seleccione un Académico:');
//                $datos_academico = array(
//                    );
//                foreach($query_academico as $query_academico){
//                        $datos_academico[$query_academico->id_academico] =  $query_academico->nombre_academico .' '. $query_academico->apellidos_academico;
//                }
//                echo "<br>";
//                echo form_dropdown('academico',  $datos_academico);
//                echo "<br>";
                
                echo form_label('Seleccione una Asignatura:');
                $datos_asignatura = array(
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
                echo form_label('Seleccione el Tipo de evaluacion:');
                $datos_tipo = array(
                );
                foreach($query_tipo as $query_tipo){
                        $datos_tipo[$query_tipo->id_tipo] =  $query_tipo->nombre_tipo;
                }

                 $url_volver = "index.php/evaluacion";
                 $buttonvolver = array(
                            'class' => 'btn btn-success',
                            'value' => 'Volver'
                        );

                echo "<br>";
                echo form_dropdown('tipo',  $datos_tipo);
                echo "<br>";
                echo form_label('Ponderación');
                echo form_input($ponderacion);
                echo form_label('Observaciones');
                echo form_input($observacion);
                echo form_input($academico);
                echo form_label('');
                echo "<br>";
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
    ?>
</center>
</div>