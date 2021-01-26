<?php
require_once 'logica/Persona.php';
require_once 'logica/Pelicula.php';
require_once 'logica/funcion.php';
require_once'logica/horario.php';
$idpelicula = $_GET['idpelicula'];
$pelicula = new Pelicula($idpelicula);
$pelicula->consultar();


?>
<div class="modal-header">
	<h5 class="modal-title">Detalles Pelicula</h5>
	<button type="button" class="close" data-dismiss="modal"
		aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
</div>
<div class="modal-body">
	<table class="table table-striped table-hover">
		<tbody>
			<tr><th width="20%">Titulo</th><td><?php echo $pelicula -> getTitulo(); ?></td></tr>		
			<tr><th width="20%">Sinopsis</th><td><?php echo $pelicula -> getSinopsis(); ?></td></tr>		
			<tr><th width="20%">Imagen</th><td><img src="/cinemateca/imagenes/<?php echo $pelicula -> getImagen(); ?>" height='100px'/></td></tr>	
			<tr><th width="20%">Reparto</th><td><?php echo $pelicula -> getReparto(); ?></td></tr>	
			<tr><th width="20%">Director</th><td><?php echo $pelicula -> getDirector(); ?></td></tr>
			<tr><th width="20%">Genero</th><td><?php echo $pelicula -> getIdgenero(); ?></td></tr>
			<tr><th width="20%">Idioma</th><td><?php echo $pelicula -> getIdidioma(); ?></td></tr>
			
			
			
			
		</tbody>
	</table>
</div>
