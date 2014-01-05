<?php
    $rut = array(
        'type' => 'text',
        'id' => 'rut',
        'name' => 'rut',
        'class' => 'form-control'
    );
    $password = array(
        'type' => 'pass',
        'id' => 'password',
        'name' => 'password',
        'class' => 'form-control'
    );
    $button = array(
        'class' => 'btn btn-primary',
        'value' => 'Agregar'
    );

    echo form_open(base_url('index.php/evaluacion/'));
        echo form_label('Rut: ');
        echo form_input($rut);
        echo ' *Rut sin puntos ni guion';
        echo form_label('Password: ');
        echo form_input($password);
        echo form_submit($button);
    echo form_close();
?>