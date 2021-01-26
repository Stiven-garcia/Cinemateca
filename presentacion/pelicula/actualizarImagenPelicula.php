<?php
$exito = "";
$administrador = new Administrador($_SESSION['id']);
$administrador->consultar();
$pelicula = new Pelicula($_GET["idpelicula"]);
$pelicula -> consultar();
if (isset($_POST["actualizar"])) {
    $tipo_foto = $_FILES['imagen']['type'];
    $tam_foto = $_FILES['imagen']['size'];
    
    if ($tam_foto <= 300000) {
        if ($tipo_foto == "image/png" ||$tipo_foto == "image/jpeg"|| $tipo_foto == "image/jpg") {
            if ($pelicula->getImagen()) {
                unlink("C:/xampp/htdocs/cinemateca/imagenes/" . $pelicula->getImagen());
            }
            // ruta de la carpeta destino en el servidor
            $imagen = time() . "." . substr($_FILES['imagen']['type'],  6); // le damos nombre a la foto
            copy($_FILES["imagen"]['tmp_name'], "imagenes/" . $imagen);
            // movemos la imagen de la carpeta temporal al directorio escogido
            // move_uploaded_file($_FILES['imagen']['tmp_name'], $carpeta_destino . $imagen);
            
            $pelicula = new Pelicula($_GET["idpelicula"],"", "", "", "", $imagen, "", "");
            $pelicula->actualizarImagen();
           
        } else {
            $exito = "El tipo de la foto solo puede ser png y jpg";
        }
    } else {
        $exito = "El tamano de la
						foto es muy grande.";
    }
}
include 'presentacion/menuAdministrador.php';
?>
<div class="container">
	<div class="row">
		<div class="col-3"></div>
		<div class="col-6">

			<div class="card">

				<div class="card-header bg-dark text-white">Actualizar Foto
					Paciente</div>
				<div class="card-img-top">
					<img src="/cinemateca/imagenes/<?php echo $pelicula->getImagen()?>" height="200px" />
					<div class="card-body">
						<p class="card-text">imagen de la pelicula</p>
					</div>
				</div>
				<div class="card-body">
				
						<?php
    if (isset($_POST["actualizar"])) {
        ?>
        	<?php if($exito!=""){?>
        	<div class="alert alert-danger" role="alert"><?php echo $exito ?></div>
        	    
        	<?php }else{?>
        	    <div class="alert alert-success" role="alert">imagen
						actualizada</div>
        	<?php }?>		
						<?php } ?>
						
					<form
						action=<?php echo "index.php?pid=" . base64_encode("presentacion/pelicula/actualizarImagenPelicula.php")."&idpelicula=".$_GET["idpelicula"] ?>
						method="post" enctype="multipart/form-data">
						<div class="form-group">
							<input type="file" name="imagen" size="30" class="form-control"
								placeholder="Foto" required="required">
						</div>
						<button type="submit" name="actualizar" class="btn btn-primary">Actualizar</button>
					</form>
				</div>
			</div>
		</div>

	</div>

</div>

