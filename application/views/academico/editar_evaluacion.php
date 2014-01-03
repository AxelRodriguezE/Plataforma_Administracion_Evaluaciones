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
            'value' => $id_academico
        );
        $nombre = array(
            'type' => 'text',
            'id' => 'nombre',
            'name' => 'nombre',
            'class' =>'form-control',
            'value' => $nombre_academico 
        );
        $apellidos = array(
            'type' => 'text',
            'id' => 'apellidos',
            'name' => 'apellidos',
            'class' => 'form-control',
            'value' => $apellidos_academico
        );
        $rut = array(
            'id' => 'rut',
            'name' => 'rut',
            'class' =>'form-control',
            'value' => $rut_academico
        );
        $button = array(
            'class' => 'btn btn-primary',
            'value' => 'Modificar'
        );
        echo form_open(base_url('/index.php/academico/editar'));
        echo form_fieldset('Nuevo Academico');
            echo form_label('Nombre:');
            echo form_input($nombre);
            echo form_label('Apellidos:');
            echo form_input($apellidos);
            echo form_label('RUT:');
            echo form_input($rut);
            echo form_input($id);
            echo form_submit($button);
        echo form_fieldset_close();
        echo form_close();
    ?>
</div>