<?php
$administrador = new Administrador($_SESSION['id']);
$administrador->consultar();
$pelicula = new pelicula($_GET["idpelicula"]);
$pelicula->consultar();
if (isset($_POST["actualizar"])) {
    $titulo = $_POST["titulo"];
    $sinopsis = $_POST["sinopsis"];
    $reparto = $_POST["reparto"];
    $director = $_POST["director"];
    $idgenero = $_POST["idgenero"];
    $ididioma = $_POST["ididioma"];
    
    
    $pelicula = new Pelicula($_GET["idpelicula"], $titulo, $sinopsis, $reparto, $director, "", $idgenero, $ididioma);
    $pelicula->actualizar();
}
include 'presentacion/menuAdministrador.php';
?>
<div class="container">
	<div class="row"></div>
	<div class="row">
		<div class="col-3"></div>
		<div class="col-6">
			<div class="card">
				<div class="card-header bg-dark text-white">Actualizar  Pelicula</div>
				<div class="card-body">
						<?php
						if (isset($_POST["actualizar"]) ) {
                        ?>
						<div class="alert alert-success" role="alert">Pelicula actualizada
						exitosamente.</div>
						<?php } ?>
						<form
						action=<?php echo "index.php?pid=" . base64_encode("presentacion/pelicula/actualizarPelicula.php")."&idpelicula=". $_GET["idpelicula"]?>
						method="post" enctype="multipart/form-data">
						<div class="form-group">
							<input type="text" name="titulo" class="form-control"
								placeholder="Titulo" required="required"
								value="<?php echo $pelicula -> getTitulo() ?>">
						</div>
						<div class="form-group">
							<textarea class="form-control" name="sinopsis"
								aria-label="With textarea" placeholder="sinopsis"
								required="required" ><?php  echo $pelicula -> getSinopsis()?></textarea>

						</div>
						<div class="form-group">
							<textarea class="form-control" name="reparto"
								aria-label="With textarea" placeholder="reparto"
								required="required" ><?php  echo $pelicula -> getReparto()?></textarea>

						</div>
						<div class="form-group">
							<input type="text" name="director" class="form-control"
								placeholder="Director" required="required"
								value="<?php echo $pelicula -> getDirector(); ?>">
						</div>
						<div class="input-group mb-3">
							<select class="custom-select" name="idgenero" required="required"
								aria-label="idgenero">
								<option selected >genero</option>
								<option value="1">terror</option>
								<option value="2">comedia</option>
								<option value="3">accion</option>
							</select>
						</div>
						<div class="input-group mb-3">
							<select class="custom-select" name="ididioma" required="required"
								aria-label="idgenero">
								<option selected>idioma</option>
								<option value="1">espanol</option>
								<option value="2">ingles</option>
								<option value="3">frances</option>
							</select>
						</div>
						<button type="submit" name="actualizar" class="btn btn-primary">Actualizar</button>
						<a class="btn btn-primary" href="index.php" role="button">Inicio</a>
					</form>
				</div>
			</div>
		</div>

	</div>

</div>
