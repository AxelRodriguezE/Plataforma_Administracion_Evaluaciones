<div class="container">
    <div class="col-md-10 col-md-offset-1">
        <?php
            $codigo = array(
                'type' => 'text',
                'id' => 'codigo',
                'name' => 'codigo',
                'class' =>'form-control'
            );
            $seccion = array(
                'type' => 'text',
                'id' => 'seccion',
                'name' => 'seccion',
                'class' => 'form-control'
            );
            $nombre = array(
                'type' => 'text',
                'id' => 'nombre',
                'name' => 'nombre',
                'class' =>'form-control'
            );

                $datos_academico = array(
                    " " => "Seleccione el Academico"
                    );
                foreach($query_academico as $query_academico){
                        $datos_academico[$query_academico->id_academico] =  $query_academico->nombre_academico .' '. $query_academico->apellidos_academico;
                }
            
//             $academico = array(
//                'type' => 'text',
//                'id' => 'academico',
//                'name' => 'academico',
//                'class' =>'form-control'
//                               
//            );
            
            $button = array(
                'class' => 'btn btn-primary',
                'value' => 'Agregar'
            );

             $url_volver = "index.php/asignatura";
             $buttonvolver = array(
                            'class' => 'btn btn-success',
                            'value' => 'Volver'
                        );


            echo form_open(base_url('/index.php/asignatura/agregar'));
            echo form_fieldset('Nueva Asignatura');
                echo form_label('Codigo Asignatura:');
                echo form_input($codigo);
                echo form_label('Seccion:');
                echo form_input($seccion);
                echo form_label('Nombre Asignatura:');
                echo form_input($nombre);
                echo "<br>";
                echo form_label('Academico: ');
                echo form_dropdown('academico',  $datos_academico);
                echo "<br>";
                echo "<br>";
                echo form_submit($button);
            echo form_fieldset_close();
            echo form_close();
        ?>

<br></br>
 <?php
         echo form_open(base_url($url_volver));
         echo form_submit($buttonvolver);
         echo form_close();
    ?>

    </div>


</div>