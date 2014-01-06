<div class="row">
    <div class="col-lg-12">
        <h1 class="text-info" align="center">Acceso al Portal de Evaluaciones</h1>
        <p align="center"><b>Escuela de Informática</b></p>
        <p align="center"><b>Universidad Tecnológica Metropolitana</b></p>
        <br>
    </div>
    <div class="col-md-4"></div>
    <div class="col-md-4">
        
    <?php
        $rut = array(
            'type' => 'text',
            'id' => 'rut',
            'name' => 'rut',
            'class' => 'form-control'
        );
        $password = array(
            'type' => 'password',
            'id' => 'password',
            'name' => 'password',
            'class' => 'form-control'
        );
        $button = array(
            'class' => 'btn btn-primary',
            'value' => 'Ingresar'
        );

        echo form_open(base_url('index.php/evaluacion/'));
            echo form_fieldset('Ingresar datos de usuario');
            echo form_label('Rut: ');
            echo form_input($rut);
            echo ' *Rut sin puntos ni guion';
            echo "<br>";
            echo "<br>";
            echo form_label('Password: ');
            echo form_input($password);
            echo "<br>";
            echo form_submit($button);
            echo form_fieldset_close();
        echo form_close();
    ?> 
        
    </div>
    <div class="col-md-4"></div>
</div>
