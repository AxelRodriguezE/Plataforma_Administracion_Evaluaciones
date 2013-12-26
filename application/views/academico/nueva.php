esto es para agregar un nuevo academico (entro a nueva.php)

<div class="container">
    <?php
        $nombre = array(
            'type' => 'text',
            'id' => 'nombre',
            'name' => 'nombre',
            'class' =>'form-control'
        );
        $rut = array(
            'id' => 'rut',
            'name' => 'rut',
            'class' =>'form-control'
        );
        $button = array(
            'class' => 'btn btn-primary',
            'value' => 'Agregar'
        );
        echo form_open(base_url('/index.php/academico/agregar'));
        echo form_fieldset('Nuevo Academico');
            echo form_label('Nombre:');
            echo form_input($nombre);
            echo form_label('RUT:');
            echo form_input($rut);
            echo form_submit($button);
        echo form_fieldset_close();
        echo form_close();
    ?>
</div>