<?php 
	//DEVUELVO LAS OFERTAS DE LA SUBASTA(DUEÑO SUBASTA) Y EL FORMULARIO PARA REALIZAR LA OFERTA(USUARIO)
	if (session_status() != PHP_SESSION_ACTIVE){
		session_start();
	}

	$ofer = '';
	include("conexion.php");
	$con=mysql_connect($host,$user,$pw) or die ("problemas al conectar");
	mysql_select_db($db,$con) or die ("problemas al conectarDB");

	//CONSULTA DE OFERTAS
	$o=mysql_query("SELECT * FROM oferta WHERE Publicacion_idPublicacion = '$_GET[subID]'") or die ("problemas en consulta:".mysql_error());
	$numOfertas = mysql_num_rows($o); 


	//CONSULTA SOBRE PUBLICACION PARA MOSTRAR OPCION RESPONDER AL DUEÑO DE LA SUBASTA
	$c2=mysql_query("SELECT * FROM publicacion WHERE idPublicacion = '$_GET[subID]'") or die ("problemas en consulta:".mysql_error());
	$reg2=mysql_fetch_array($c2);

	if (isset($_SESSION['username']) && !empty($_SESSION['username'])){
		//SI ES EL DUEÑO Y TERMINO LA SUBASTA MUESTRO LAS OFERTAS 
		if ($_SESSION['username'] == $reg2['Usuario_nombre_usuario']){
			$date = strtotime($reg2['fecha_fin']);
			if ((getdate()['year'] < date("Y",$date)) 
				OR (getdate()['year'] == date("Y",$date) AND getdate()['mon'] < date("n",$date))
				OR (getdate()['year'] == date("Y",$date) AND getdate()['mon'] == date("n",$date) AND getdate()['mday'] <= date("j",$date))){
				//LA SUBASTA NO FINALIZO, AL DUEÑO NO LE MUESTRO LAS OFERTAS QUE HAY
				$ofer = $ofer.'<br><span>***La subasta no ha finalizado***</span><br><br>';
			}
			//FINALIZO SUBASTA, MUESTRO OFERTAS
			else {
				$eligioGanador =  mysql_num_rows(mysql_query("SELECT * FROM oferta WHERE Publicacion_idPublicacion = '$_GET[subID]' AND ganador = 1"));
				//SI NO ELIGIO UNA OFERTA GANADORA SE MUESTRA FORMULARIO PARA ELEGIR
				if ($eligioGanador == 0) {
					//SI HAY AL MENOS UNA OFERTA MUESTRO OPCION PARA ELEGIR GANADOR
					if ($numOfertas > 0) {
						$ofer = '<form action="registrarganador.php?subID='.$_GET['subID'].'" role="form" id="reg-ganador-form" method="post">
									<ul class="list-group">';
						$contador=1;
						while ($reg=mysql_fetch_array($o)){
							$ofer = $ofer.'<div class="radio">
		        								<input type="radio" name="optionsRadios" id="optionsRadios'.$contador.'" value="'.$reg['idOferta'].'">
		        								"Elegir como motivo ganador":
		        								<li class="list-group-item">'.$reg['motivo'].'</li>
		    								</div>';
		    				$contador= $contador+1;
						}
						$ofer = $ofer.'</ul>
									<div class="form-inline pull-right" style="margin-bottom:20px;">
									<div class="form-group">
										<div class="input-group">
											<input type="submit" class="btn btn-primary" id="btn-registro" value="Registrar Ganador"/>
										</div>
									</div>
								  </div><br>
								</form>';
					}
					//LA SUBASTA NO RECIBIO OFERTAS
					else {
						$ofer = $ofer.'<br><span>***La subasta ha finalizado, pero no ha recibido ofertas***</span><br><br>';
					}
				}
				//SI YA ELIGIO MUESTRO LAS SUBASTAS, RESALTANDO LA ELEGIDA PREVIAMENTE
				else {
					$ofer = '<ul class="list-group">';
					while ($reg=mysql_fetch_array($o)){
						if ($reg['ganador']==0){
							$ofer = $ofer.'<li class="list-group-item">'.$reg['motivo'].'</li>';
						}
						else {
							$ofer = $ofer.'<li class="list-group-item" style="background-color: #F68080;">'.$reg['motivo'].'&nbsp(Oferta ganadora)</li>';
						}	
					}
					$ofer = $ofer.'</ul>';
				}
			}	
		}
		else {
			//CONSULTA SI EL USUARIO CONECTADO YA HIZO UNA OFERTA SOBRE LA PUBLICACION
			$c3=mysql_query("SELECT * 
							 FROM oferta
							 WHERE Publicacion_idPublicacion = '$_GET[subID]'
							 AND Usuario_nombre_usuario = '$_SESSION[username]'") or die ("problemas en consulta:".mysql_error());
			$reg3=mysql_fetch_array($c3);
			//SI YA HIZO OFERTA, SE MUESTRA 
			if (mysql_num_rows($c3) == 1){
				$ofer = '<div id="lista-ofertas"><ul class="list-group">';
				$ofer = $ofer.'<li class="list-group-item">'.$reg3['motivo'].'</li>';
				$ofer = $ofer.'</ul>';
				$ofer = $ofer.'<div class="btn-group" role="group" aria-label="...">
					<a onclick= "modificarOferta('.$reg3['idOferta'].')" class="btn btn-default">Modificar oferta</a>
				    <a onclick= "eliminarOferta('.$reg3['idOferta'].')" class="btn btn-default">Eliminar oferta</a>
				</div></div><br><br>';  //data-toggle="modal"
			}
			//SINO, FORMULARIO PARA REALIZAR OFERTA
			else {
				$date = strtotime($reg2['fecha_fin']);
				if ((getdate()['year'] < date("Y",$date)) 
					OR (getdate()['year'] == date("Y",$date) AND getdate()['mon'] < date("n",$date))
					OR (getdate()['year'] == date("Y",$date) AND getdate()['mon'] == date("n",$date) AND getdate()['mday'] <= date("j",$date))){
					//LA SUBASTA NO FINALIZO, MUESTRO FORMULARIO PARA OFERTAR
					$ofer = $ofer.'<form action="ofertar.php?subID='.$_GET['subID'].'" method="post">
						<textarea class="form-control" rows="3" required minlength="1" maxlength="140" placeholder="Motivo" name="motivo"></textarea><br>
						<div class="input-group col-md-2">
							<span class="input-group-addon glyphicon glyphicon-usd"></span>
							<input type="number" step="0.01" min="0.01" class="form-control" placeholder="Precio" name="precio" required minlength="1" autocomplete="on">
						</div><br>
						<button type="submit" class="btn btn-primary" id="btn-registro"> Ofertar </button>
					</form><br>';
					
				}
				//LA SUBASTA FINALIZO, NO SE PUEDE OFERTAR
				else {
					$ofer = $ofer.'<br><span>***La subasta ha finalizado, ya no se pueden realizar ofertas***</span><br><br>';
				}
			}
		}
	}
	else {
		$ofer = $ofer.'<br><span>***Inicia sesion para realizar una oferta***</span><br><br>';
	}
	return $ofer;
?>