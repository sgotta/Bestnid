<!DOCTYPE html>
<html lang = "es">
		<section class="col-md-12">
			<form action="agregarCategoria.php" enctype="multipart/form-data" role="form" id="formCategoria" method="post">
				<section class="col-md-2"></section>
				<section class="col-md-8">
					<h4>Nueva categoria:</h4>
				    <div class="form-group" id="divnombre">
					    <input type="text" class="form-control" onkeyup="validarnombrecategoria(this);" id="nombre" name="nombre" placeholder="Nombre de su categoria" maxlength="45" required autocomplete="off">
				    </div>
				    <span id="comprobarnombre"></span>
    			    <div class="form-inline" >
						<div class="form-group">
							<div class="input-group">
								<a href="paneldecontrol.php" class="btn btn-primary" id="btn-registro-cancelar"> Cancelar </a>
							</div>
							<div class="input-group">
								<input type="submit" class="btn btn-primary" id="btn-registro" value="Agregar categoria"/>
							</div>
						</div>
					</div>
				</section>
			</form>
		</section>

		<script src="js/jquery.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/bootbox.min.js"></script>
		<script>
	
		function validarnombrecategoria(nombre){
			$.ajax({
				beforeSend: function(){
					$('#comprobarnombre').html('<p class="text-info">Comprobando...</p>');
				},
				url: 'validarnombrecategoria.php', /*= action*/
				type: 'get', /*= method*/
				/*dataType: 'json',*/
				data: 'nombre='+nombre.value /*parametros para url*/
			})
			.done(function(respuesta){ /*Si funcionó ajax*/
				console.log("Success");
				$('#comprobarnombre').html(respuesta);
				if (respuesta === '<p class="text-success">"Nombre de categoria <strong>OK!</strong>"</p>') {
					console.log("Nombre OK!");
				}else{
					//mantengo el foco en username
					if (nombre.value=='') {
						$('#comprobarnombre').html('<p class="text-info">"Nombre de la categoria no puede estar vacio"</p>');
						console.log("Campo vacio")
					}else{
						console.log("Nombre en uso!")
					};

					$("#divnombre").html(' <input type="text" class="form-control" onchange="validarnombrecategoria(this);" id="nombre" name="nombre" placeholder="Nombre de su categoria" maxlength="45" required autocomplete="off">');
					
					$("#nombre").focus();
				}
			})
			.fail(function(){ /*esto es si falla el llamado de ajax*/
				console.log("Error");
				$('#comprobarnombre').html("Error Ajax.");
			})
			.always(function(){
				console.log("Complete");
				/*setTimeout(function(){
					$('.fa').hide();
				}, 1000);*/
			});
		}

	</script>
</html>