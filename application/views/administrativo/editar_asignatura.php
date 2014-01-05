<div class="container">
    <div class="col-md-10 col-md-offset-1">
        <div class="alert alert-success">    
        <?php
        $id_asignatura = $query->id_asignatura;
        $codigo_asignatura = $query->codigo_asignatura;
        $seccion_asignatura = $query->seccion_asignatura;
        $nombre_asignatura = $query->nombre_asignatura;
        
        
        $id = array(
            'type' => 'hidden',
            'id' => 'id',
            'name' => 'id',
            'value' => $id_asignatura
        );
        $codigo = array(
            'type' => 'text',
            'id' => 'codigo',
            'name' => 'codigo',
            'class' =>'form-control',
            'value' => $codigo_asignatura 
        );
        $seccion = array(
            'type' => 'text',
            'id' => 'seccion',
            'name' => 'seccion',
            'class' => 'form-control',
            'value' => $seccion_asignatura
        );
        $nombre = array(
            'type' => 'text',
            'id' => 'nombre',
            'name' => 'nombre',
            'class' =>'form-control',
            'value' => $nombre_asignatura
        );
          
        
        
        $button = array(
            'class' => 'btn btn-primary',
            'value' => 'Modificar'
        );
        echo form_open(base_url('/index.php/asignatura/editar'));
        echo form_fieldset('Editar Asignatura');
        ?>
            <h4>
                <?php echo 'Asignatura creada por ' ?>
                <b class="text-danger"><?php echo $query->academico_asignatura?></b>
               
                <br><br>
                </h4>
                <?php 
                echo '<br>';
            echo form_label('Codigo Asignatura:');
            echo form_input($codigo);
            echo form_label('Seccion Asignatura:');
            echo form_input($seccion);
            echo form_label('Nombre Asignatura:');
            echo form_input($nombre);
            echo form_input($id);
            echo '<br>';
            echo form_submit($button);
        echo form_fieldset_close();
        echo form_close();
    ?>
        </div>
    </div>
</div>