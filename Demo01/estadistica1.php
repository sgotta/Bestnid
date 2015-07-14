<!DOCTYPE html>
<html lang = "es">
		<section class="col-md-12">
			<form action="javascript:mostrarEstadistica1(document.forms.formAdmin);" enctype="multipart/form-data" role="form" id="formAdmin" method="post">
				<section class="col-md-2"></section>
				<section class="col-md-8">
					<h4>Elegir fecha de inicio: </h4>
					<div class="input-append date" id="dp3" data-date-format="yyyy/mm/dd">
 						<input class="datepicker" size="16" type="text" name="inicio" value="dd-mm-yyyy" >
						<span class="add-on"><i class="icon-th"></i></span>
					</div>
					<h4>Elegir fecha de fin: </h4>
					<div class="input-append date" id="dp3"  data-date-format="yyyy-mm-dd">
 						<input class="datepicker" size="16" type="text" name="fin" value="dd-mm-yyyy">
						<span class="add-on"><i class="icon-th"></i></span>
					</div>
					<br><br>
    			    <div class="form-inline">
						<div class="form-group">
							<div class="input-group">
								<a href="paneldecontrol.php" class="btn btn-primary" id="btn-registro-cancelar"> Cancelar </a>
							</div>
							<div class="input-group">
								<input type="submit" class="btn btn-primary" id="btn-registro" value="Buscar"/>
							</div>
						</div>
					</div>
				</section>
			</form>
		</section>
		
		<script src="js/bootstrap-datepicker.js"></script>
		<script>
		$( document ).ready(function() {
    		console.log( "Ready" );
    		$(".datepicker").datepicker({
			});
    	});

		</script>
</html>