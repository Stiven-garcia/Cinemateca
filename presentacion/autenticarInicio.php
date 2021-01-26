<?php
$error = 0;
if (isset($_GET['error'])) {
    $error = $_GET['error'];
}
?>


<div class="container">
	<div class="row">
		<?php include 'encabezado.php';?>
		</div>
	<div class="row">
		<div class="col-3"></div>
		<div class="col-6">
			<div class="card">
					<div class="card-header bg-dark text-white">Autenticacion</div>
					<div class="card-body">
						<form
							action="index.php?pid=<?php echo base64_encode("presentacion/autenticar.php") ?>&nos=true"
							method="post">
							<?php if($error==1){?>
							<div class="alert alert-danger" role="alert">El correo o la
								contraseña son incorrectas</div>
							<?php }?>
							<div class="form-group">
								<input type="email" name="correo" class="form-control"
									placeholder="Correo" required="required">
							</div>
							<div class="form-group">
								<input type="password" name="clave" class="form-control"
									placeholder="Clave" required="required">
							</div>
							<button type="submit" class="btn btn-dark">Autenticar</button>
						</form>
						<a
							href=<?php echo "index.php?pid=" . base64_encode("presentacion/inicio.php") . "&nos=true" ?>
							class="text-dark">vuelva al inicio</a>
					</div>
				</div>
		</div>
	</div>
</div>

		