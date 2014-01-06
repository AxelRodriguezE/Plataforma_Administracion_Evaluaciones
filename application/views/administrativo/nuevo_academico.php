<div class="col-lg-12">
        <h3 class="text-info" align="center">Registro de Académicos</h3>
        <p align="center"><b>Escuela de Informática</b></p>
        <p align="center"><b>Universidad Tecnológica Metropolitana</b></p>
        <br>
    </div>

<div class="container">
        <div class="panel panel-info">
            <div class="panel-heading"><h4>Nuevo Académico</h4></div>
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
      
            <?php
            $nombre = array(
                'type' => 'text',
                'id' => 'nombre',
                'name' => 'nombre',
                'class' =>'form-control'
            );
            $apellidos = array(
                'type' => 'text',
                'id' => 'apellidos',
                'name' => 'apellidos',
                'class' => 'form-control'
            );
            $rut = array(
                'id' => 'rut',
                'name' => 'rut',
                'class' =>'form-control'
            );
            //$url_agregar = "index.php/asignatura/asignar_asignatura";
            $buttonagregar = array(
                'class' => 'btn btn-primary',
                'value' => 'Agregar'
            );


         $url_volver = "index.php/academico";
         $buttonvolver = array(
                            'class' => 'btn btn-success',
                            'value' => 'Volver'
                        );

            echo '<br>';
            echo form_open(base_url('/index.php/academico/asignar_asignatura'));
                echo form_label('Nombre:');
                echo form_input($nombre);
                echo form_label('Apellidos:');
                echo form_input($apellidos);
                echo form_label('RUT:');
                echo form_input($rut);
                echo "<br>";
                echo form_label('Al ingresar un academico, se le debe asignar una asignatura');
                echo "<br>";
                echo form_submit($buttonagregar);
            echo form_fieldset_close();
            echo form_close();
            echo '<br>';
        ?>
                </div>
        </div>
    </div>
     
    <center>
     <?php
         echo form_open(base_url($url_volver));
         echo form_submit($buttonvolver);
         echo form_close();
    ?>
</center>
</div>