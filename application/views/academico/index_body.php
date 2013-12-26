<h1>Hello, world!</h1>

<div class="container">
    <table>
	<thead>
					<tr>
						<th>#</th>
						<th>Nombre</th>
						<th>RUT</th>
						<th>Modificar</th>
						<th>Eliminar</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($query as $query):?>
					<tr>
						<td><?php echo $query->id_academico; ?>
						<td><?php echo $query->nombre_academico; ?></td>
						<td><?php echo $query->rut_academico; ?></td>
                                                <button type="button" href="<?php echo base_url(); ?>index.php/academico/editar<?php echo $query->id_academico; ?>" class="btn btn-primary">Modificar</button>
                                                <button type="button" href="<?php echo base_url(); ?>index.php/academico/eliminar<?php echo $query->id_academico; ?>" class="btn btn-primary">Eliminar</button>						
					</tr>
					<?php endforeach;?>
				</tbody>
			</table>    
</div>



    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>