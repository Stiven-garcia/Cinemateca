<?php
// require 'logica/Persona.php';
// require 'logica/Paciente.php';
$error = "";
$titulo = "";
$sinopsis = "";
$reparto = "";
$director = "";
$imagen = "";
$idgenero = 0;
$ididioma = 0;

if (isset($_POST["registrar"])) {
    $titulo = $_POST["titulo"];
    $sinopsis = $_POST["sinopsis"];
    $reparto = $_POST["reparto"];
    $director = $_POST["director"];
    $idgenero = $_POST["idgenero"];
    $ididioma = $_POST["ididioma"];

    $tipo_foto = $_FILES['imagen']['type'];
    $tam_foto = $_FILES['imagen']['size'];

    if ($tam_foto <= 300000) {
        if ($tipo_foto == "image/png" ||$tipo_foto == "image/jpeg"|| $tipo_foto == "image/jpg") {
            // ruta de la carpeta destino en el servidor
            $imagen = time() . "." . substr($_FILES['imagen']['type'],  6); // le damos nombre a la foto
            copy($_FILES["imagen"]['tmp_name'], "imagenes/" . $imagen);
            // movemos la imagen de la carpeta temporal al directorio escogido
            // move_uploaded_file($_FILES['imagen']['tmp_name'], $carpeta_destino . $imagen);

            $pelicula = new Pelicula("", $titulo, $sinopsis, $reparto, $director, $imagen, $idgenero, $ididioma);
            if (! $pelicula->existeTitulo()) {
                $pelicula->registrar();
                $error = "";
            } else {
                $error = "la pelicula de titulo " . $titulo . " ya existe";
            }
        } else {
            $error = "El tipo de la foto solo puede ser png y jpg";
        }
    } else {
        $error = "El tamano de la
						foto es muy grande.";
    }
}

$administrador = new Administrador($_SESSION['id']);
$administrador->consultar();
include 'presentacion/menuAdministrador.php';
?>



<div class="container">
	<div class="row"></div>
	<div class="row">
		<div class="col-3"></div>
		<div class="col-6">
			<div class="card">
				<div class="card-header bg-dark text-white">Registro Pelicula</div>
				<div class="card-body">
						<?php
    if ($error == "" && isset($_POST["registrar"])) {
        ?>
						<div class="alert alert-success" role="alert">Pelicula registrada
						exitosamente.</div>
						<?php } else if($error != "" && isset($_POST["registrar"])) { ?>
						<div class="alert alert-danger" role="alert">
							<?php echo $error; ?> 
						</div>
						<?php } ?>
						<form
						action=<?php echo "index.php?pid=" . base64_encode("presentacion/pelicula/agregarPelicula.php")."&nos=true" ?>
						method="post" enctype="multipart/form-data">
						<div class="form-group">
							<input type="text" name="titulo" class="form-control"
								placeholder="Titulo" required="required"
								value="<?php echo $titulo; ?>">
						</div>
						<div class="form-group">
							<textarea class="form-control" name="sinopsis"
								aria-label="With textarea" placeholder="sinopsis"
								required="required" value="<?php  echo $sinopsis?>"></textarea>

						</div>
						<div class="form-group">
							<textarea class="form-control" name="reparto"
								aria-label="With textarea" placeholder="reparto"
								required="required" value="<?php  echo $reparto?>"></textarea>

						</div>
						<div class="form-group">
							<input type="text" name="director" class="form-control"
								placeholder="Director" required="required"
								value="<?php echo $director; ?>">
						</div>
						<div class="form-group">
							<input type="file" name="imagen" size="30" class="form-control"
								placeholder="imagen" required="required">
						</div>
						<div class="input-group mb-3">
							<select class="custom-select" name="idgenero" required="required"
								aria-label="idgenero">
								<option value="1">terror</option>
								<option value="2">comedia</option>
								<option value="3">accion</option>
							</select>
						</div>
						<div class="input-group mb-3">
							<select class="custom-select" name="ididioma" required="required"
								aria-label="idgenero">
								<option value="1">espanol</option>
								<option value="2">ingles</option>
								<option value="3">frances</option>
							</select>
						</div>
						<button type="submit" name="registrar" class="btn btn-primary">Registrar</button>
						<a class="btn btn-primary" href="index.php" role="button">Inicio</a>
					</form>
				</div>
			</div>
		</div>

	</div>

</div>