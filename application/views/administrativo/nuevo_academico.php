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
            $button = array(
                'class' => 'btn btn-primary',
                'value' => 'Agregar'
            );


         $url_volver = "index.php/academico";
         $buttonvolver = array(
                            'class' => 'btn btn-success',
                            'value' => 'Volver'
                        );

            echo '<br>';
            echo form_open(base_url('/index.php/academico/agregar'));
                echo form_label('Nombre:');
                echo form_input($nombre);
                echo form_label('Apellidos:');
                echo form_input($apellidos);
                echo form_label('RUT:');
                echo form_input($rut);
                echo "<br>";
                echo form_submit($button);
            echo form_fieldset_close();
            echo form_close();
            echo '<br>';
        ?>
                </div>
        </div>
    </div>
     <?php
         echo form_open(base_url($url_volver));
         echo form_submit($buttonvolver);
         echo form_close();
    ?>
</div>