<?php

$error = "";
$administrador = new Administrador($_SESSION['id']);
$administrador->consultar();

include 'presentacion/menuAdministrador.php';
$funcion= new funcion("","","",$_GET["idpelicula"]);
$funcion->consultar();
if (isset($_POST["actualizar"])) {
    $fecha_inicial = $_POST["f_inicial"];
    $fecha_final = $_POST["f_final"];
   

    
    $funcion=new Funcion("",$fecha_inicial,$fecha_final,$_GET["idpelicula"]);
    $funcion->actualizar();
}

?>

<div class="container">
	<div class="row"></div>
	<div class="row">
		<div class="col-3"></div>
		<div class="col-6">
			<div class="card">
				<div class="card-header bg-dark text-white">Registro Funcion</div>
				<div class="card-body">
						<?php
    if ($error == "" && isset($_POST["actualizar"])) {
        ?>
						<div class="alert alert-success" role="alert">Funcion registrada
						exitosamente.</div>
						<?php } else if($error != "" && isset($_POST["actualizar"])) { ?>
						<div class="alert alert-danger" role="alert">
							<?php echo $error; ?> 
						</div>
						<?php } ?>
						<form
						action=<?php echo "index.php?pid=" . base64_encode("presentacion/Funciones/editarFuncion.php")."&idpelicula=".$_GET["idpelicula"] ?>
						method="post" >
						<div class="form-group">
							<label for="basic-url">fecha inicial</label> <input type="date"
								name="f_inicial" class="form-control"
								placeholder="Fecha inicial" required="required" value="<?php echo $funcion->getFecha_inicial()?>">
						</div>

						<div class="form-group">
							<label for="basic-url">fecha final</label> <input type="date"
								name="f_final" class="form-control" placeholder="Fecha final"
								required="required" value="<?php echo $funcion->getFecha_final()?>">
						</div>
						
						
						<button type="submit" name="actualizar" class="btn btn-primary">actualizar</button>
						<a class="btn btn-primary" href="index.php" role="button">Inicio</a>
					</form>
				</div>
			</div>
		</div>

	</div>

</div>