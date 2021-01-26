<?php
$pelicula = new Pelicula();
$peliculas=$pelicula->consultarActuales();

?>

<div class="container">
	<div class="row">
		<?php include 'encabezado.php';?>
		</div>
	<div class="row">
		<div class="col-12">
			<nav class="navbar navbar-expand-lg navbar-light bg-light">
				<a class="navbar-brand"
					href="index.php?pid=<?php echo base64_encode("presentacion/inicio.php")?>"><i
					class="fas fa-home"></i></a>
				<button class="navbar-toggler" type="button" data-toggle="collapse"
					data-target="#navbarSupportedContent"
					aria-controls="navbarSupportedContent" aria-expanded="false"
					aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav mr-auto">
						<li class="nav-item dropdown">
							<div class="dropdown-menu" aria-labelledby="navbarDropdown"></div>
						</li>
						<li class="nav-item"><a class="nav-link"
							href="index.php?pid=<?php echo base64_encode("presentacion/autenticarInicio.php")."&nos=true"?>">ingresar
								usuario</a></li>
					</ul>
					<span class="navbar-text"> </span>
				</div>
			</nav>
		</div>
	</div>

	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header bg-dark text-white">Consultar Pelicula</div>
					<div class="card-body">
						<table class="table table-striped table-hover">
							<thead>
								<tr>
									<th scope="col">titulo</th>
									<th scope="col">imagen</th>
								</tr>
							</thead>
							<tbody>
						<?php
    foreach ($peliculas as $p) {
        echo "<tr>";
        echo "<td>" ."<a href='modalPelicula.php?idpelicula=" . $p->getIdpelicula() . "' data-toggle='modal' data-target='#modalPelicula' >". $p->getTitulo() ."</a> </td>";
        echo "<td>" . (($p->getImagen()!="")?"<img src='/cinemateca/imagenes/" . $p->getImagen() . "' height='50px'>":"") . "</td>";
        echo "</tr>";
    }
    echo "<tr><td colspan='2'>" . count($peliculas) . " registros encontrados</td></tr>"?>
						</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>



	<div class="modal fade" id="modalPelicula" tabindex="-1" role="dialog"
		aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content" id="modalContent"></div>
		</div>
	</div>
	<script>
	$('body').on('show.bs.modal', '.modal', function (e) {
		var link = $(e.relatedTarget);
		$(this).find(".modal-content").load(link.attr("href"));
	});
</script>



</div>