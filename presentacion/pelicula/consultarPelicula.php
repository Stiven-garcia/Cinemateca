<?php
$administrador = new Administrador($_SESSION['id']);
$administrador->consultar();
$pelicula = new Pelicula();
$peliculas = $pelicula->consultarTodos();
include 'presentacion/menuAdministrador.php';
?>
<div class="container">
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header bg-dark text-white">Consultar Pelicula</div>
				<div class="card-body">
					<table class="table table-striped table-hover">
						<thead>
							<tr>
								<th scope="col">Id</th>
								<th scope="col">titulo</th>
								<th scope="col">director</th>
								<th scope="col">genero</th>
								<th scope="col">idioma</th>
								<th scope="col">Servicios</th>
							</tr>
						</thead>
						<tbody>
						<?php
    foreach ($peliculas as $p) {
        echo "<tr>";
        echo "<td>" . $p->getIdpelicula() . "</td>";
        echo "<td>" . $p->getTitulo(). "</td>";
        echo "<td>" . $p->getDirector() . "</td>";
        echo "<td>" . $p->getIdgenero() . "</td>";
        echo "<td>" . $p->getIdidioma() . "</td>";
        echo "<td>" . "<a href='modalPelicula.php?idpelicula=" . $p->getIdpelicula() . "' data-toggle='modal' data-target='#modalPelicula' ><span class='fas fa-eye' data-toggle='tooltip' class='tooltipLink' data-placement='left' data-original-title='Ver Detalles' ></span> </a>
                       <a class='fas fa-pencil-ruler' href='index.php?pid=" . base64_encode("presentacion/pelicula/actualizarPelicula.php") . "&idpelicula=" . $p->getIdpelicula() . "' data-toggle='tooltip' data-placement='left' title='Actualizar'> </a>
                       <a class='fas fa-camera' href='index.php?pid=" . base64_encode("presentacion/pelicula/actualizarImagenPelicula.php") . "&idpelicula=" . $p->getIdpelicula() . "' data-toggle='tooltip' data-placement='left' title='Actualizar Foto'> </a>
                       <a class='fas fa-calendar-alt' href='index.php?pid=" . base64_encode("presentacion/Funciones/agregarFuncion.php") . "&idpelicula=" . $p->getIdpelicula() . "' data-toggle='tooltip' data-placement='left' title='agregar Funcion'> </a>
                       <a class='fas fa-edit' href='index.php?pid=" . base64_encode("presentacion/Funciones/editarFuncion.php") . "&idpelicula=" . $p->getIdpelicula() . "' data-toggle='tooltip' data-placement='left' title='editar Funcion'> </a>
              </td>";
        echo "</tr>";
    
    }
    echo "<tr><td colspan='6'>" . count($peliculas) . " registros encontrados</td></tr>"?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>



<div class="modal fade" id="modalPelicula" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" >
		<div class="modal-content" id="modalContent">
		</div>
	</div>
</div>
<script>
	$('body').on('show.bs.modal', '.modal', function (e) {
		var link = $(e.relatedTarget);
		$(this).find(".modal-content").load(link.attr("href"));
	});
</script>

