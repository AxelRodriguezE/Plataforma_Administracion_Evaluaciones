<div class="container">
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
            echo form_open(base_url('/index.php/academico/agregar'));
            echo form_fieldset('Nuevo Academico');
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
        ?>
        
  <?php       
        
        $options = array(
                  'small'  => 'Small Shirt',
                  'med'    => 'Medium Shirt',
                  'large'   => 'Large Shirt',
                  'xlarge' => 'Extra Large Shirt',
                );


$shirts_on_sale = array('small', 'large');

echo form_dropdown('shirts', $options, 'large');

// Would produce:
?>
<select name="shirts">
<option value="small">Small Shirt</option>
<option value="med">Medium Shirt</option>
<option value="large" selected="selected">Large Shirt</option>
<option value="xlarge">Extra Large Shirt</option>
</select>
<?php
echo form_dropdown('shirts', $options, $shirts_on_sale);

// Would produce:
?>
<select name="shirts" multiple="multiple">
<option value="small" selected="selected">Small Shirt</option>
<option value="med">Medium Shirt</option>
<option value="large" selected="selected">Large Shirt</option>
<option value="xlarge">Extra Large Shirt</option>
</select>
        
        
    </div>
</div>