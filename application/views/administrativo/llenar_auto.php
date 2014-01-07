<div class="container">
<div class="row">
    <div class="col-lg-12">
        <h1 class="text-info" align="center">Llenar asignaturas por Académico</h1>
        <p align="center"><b>Escuela de Informática</b></p>
        <p align="center"><b>Universidad Tecnológica Metropolitana</b></p>
        <br>
        <p align="center">Debe indicar el Rut del Académico, el Semestre y Año</p>
        <p align="center">del cual desea autocompletar las Asignaturas</p>
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
        $semestre = array(
            'type' => 'text',
            'id' => 'semestre',
            'name' => 'semestre',
            'class' => 'form-control'
        );
        $año = array(
            'type' => 'text',
            'id' => 'ano',
            'name' => 'ano',
            'class' => 'form-control'
        );
        $button = array(
            'class' => 'btn btn-primary',
            'value' => 'Autocompletar'
        );
        $url_volver = "index.php/asignatura";
        $buttonvolver = array(
            'class' => 'btn btn-success',
            'value' => 'Volver'
        );
        echo form_open(base_url('index.php/academico/autocompletar'));
            echo form_fieldset('Ingresar datos de usuario');
            echo form_label('Rut: ');
            echo form_input($rut);
            echo "<br>";
            echo form_label('Semestre: ');
            echo form_input($semestre);
            echo "<br>";
            echo form_label('Año: ');
            echo form_input($año);
            echo "<br>";
            echo form_submit($button);
            echo form_fieldset_close();
        echo form_close();
    ?> 
        
    </div>
    
    <div class="col-md-4"></div>

</div>
        <center>
        <?php
         echo form_open(base_url($url_volver));
         echo form_submit($buttonvolver);
         echo form_close();
        ?>
        </center>
</div>
