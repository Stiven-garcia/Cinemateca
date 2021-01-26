<?php

$error = "";
$administrador = new Administrador($_SESSION['id']);
$administrador->consultar();

include 'presentacion/menuAdministrador.php';

if (isset($_POST["registrar"])) {
    $fecha_inicial = $_POST["f_inicial"];
    $fecha_final = $_POST["f_final"];
    $horarioi1 = "";
    $horarioi2 = "";
    $horarioi3 = "";
    $horarioi4 = "";
    $horarioi5 = "";

    if ($_POST["horarioi1"] && $_POST["horariof1"]) {
        $horarioi1 = $_POST["horarioi1"] . " ; " . $_POST["horariof1"];
        $horario = new Horario($_GET["idpelicula"],"",$horarioi1,);
        $horario -> registrar();
    }
    if ($_POST["horarioi2"] && $_POST["horariof2"]) {
        $horarioi2 = $_POST["horarioi2"] . " ; " . $_POST["horariof2"];
        $horario = new Horario($_GET["idpelicula"],"",$horarioi2,);
        $horario -> registrar();
    }
    if ($_POST["horarioi3"] && $_POST["horariof3"]) {
        $horarioi3 = $_POST["horarioi3"] . " ; " . $_POST["horariof3"];
        $horario = new Horario($_GET["idpelicula"],"",$horarioi3,);
        $horario -> registrar();
    }
    if ($_POST["horarioi4"] && $_POST["horariof4"]) {
        $horarioi4 = $_POST["horarioi4"] . " ; " . $_POST["horariof4"];
        $horario = new Horario($_GET["idpelicula"],"",$horarioi4,);
        $horario -> registrar();
    }
    if ($_POST["horarioi5"] && $_POST["horariof5"]) {
        $horarioi5 = $_POST["horarioi5"] . " ; " . $_POST["horariof5"];
        $horario = new Horario($_GET["idpelicula"],"",$horarioi5,);
        $horario -> registrar();
    }

    $funcion=new Funcion("",$fecha_inicial,$fecha_final,$_GET["idpelicula"]);
    $funcion->registrar();
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
    if ($error == "" && isset($_POST["registrar"])) {
        ?>
						<div class="alert alert-success" role="alert">Funcion registrada
						exitosamente.</div>
						<?php } else if($error != "" && isset($_POST["registrar"])) { ?>
						<div class="alert alert-danger" role="alert">
							<?php echo $error; ?> 
						</div>
						<?php } ?>
						<form
						action=<?php echo "index.php?pid=" . base64_encode("presentacion/Funciones/agregarFuncion.php")."&idpelicula=".$_GET["idpelicula"] ?>
						method="post" >
						<div class="form-group">
							<label for="basic-url">fecha inicial</label> <input type="date"
								name="f_inicial" class="form-control"
								placeholder="Fecha inicial" required="required">
						</div>

						<div class="form-group">
							<label for="basic-url">fecha final</label> <input type="date"
								name="f_final" class="form-control" placeholder="Fecha final"
								required="required">
						</div>
						<label for="basic-url">ingrese los horarios que necesita</label>
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text">horario 1</span>
							</div>

							<input type="time" name="horarioi1" aria-label="First name"
								class="form-control"> <input type="time" name="horariof1"
								aria-label="Last name" class="form-control">
						</div>
						<div class="input-group">
							<div class="input-group-prepend">

								<span class="input-group-text">horario 2</span>
							</div>
							<input type="time" name="horarioi2" aria-label="First name"
								class="form-control"> <input type="time" name="horariof2"
								aria-label="Last name" class="form-control">
						</div>
						<div class="input-group">
							<div class="input-group-prepend">

								<span class="input-group-text">horario 3</span>
							</div>
							<input type="time" name="horarioi3" aria-label="First name"
								class="form-control"> <input type="time" name="horariof3"
								aria-label="Last name" class="form-control">
						</div>
						<div class="input-group">
							<div class="input-group-prepend">

								<span class="input-group-text">horario 4</span>
							</div>
							<input type="time" name="horarioi4" aria-label="First name"
								class="form-control"> <input type="time" name="horariof4"
								aria-label="Last name" class="form-control">
						</div>
						<div class="input-group">
							<div class="input-group-prepend">

								<span class="input-group-text">horario 5</span>
							</div>
							<input type="time" name="horarioi5" aria-label="First name"
								class="form-control"> <input type="time" name="horariof5"
								aria-label="Last name" class="form-control">
						</div>
						<div>
						<label for="basic-url"></label>
						</div>
						
						<button type="submit" name="registrar" class="btn btn-primary">Registrar</button>
						<a class="btn btn-primary" href="index.php" role="button">Inicio</a>
					</form>
				</div>
			</div>
		</div>

	</div>

</div>
