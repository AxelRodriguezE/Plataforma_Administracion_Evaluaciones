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
            
            $id_del_academico = $el_academico->id_academico;
            
            $academico = array(
                'type' => 'hidden',
                'id' => 'academico',
                'name' => 'academico',
                'value' => $id_del_academico
            );
            
            $button = array(
                'class' => 'btn btn-primary',
                'value' => 'Agregar'
            );
            $titulo_form = 'Asignando asignatura al académico: ' . $datos_academico->nombre_academico . ' ' . $datos_academico->apellidos_academico;
            echo form_open(base_url('/index.php/asignatura/agregar'));
            echo form_fieldset($titulo_form);
                echo form_label('Codigo Asignatura:');
                echo form_input($codigo);
                echo form_label('Seccion:');
                echo form_input($seccion);
                echo form_label('Nombre Asignatura:');
                echo form_input($nombre);
                echo "<br>";
                echo form_input($academico);
                echo "<br>";
                echo "<br>";
                echo form_submit($button);
            echo form_fieldset_close();
            echo form_close();
        ?>
    </div>
</div>