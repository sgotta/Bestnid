<?php 
	if (session_status() != PHP_SESSION_ACTIVE){
		session_start();
	}
	include("conexion.php");
	$con=mysql_connect($host,$user,$pw) or die ("problemas al conectar");
	mysql_select_db($db,$con) or die ("problemas al conectarDB");
	//CANTIDAD DE OFERTAS PARA BADGE
	$bo=mysql_query("SELECT * 
					 FROM oferta
					 WHERE Publicacion_idPublicacion = '$_GET[subID]'") or die ("problemas en consulta:".mysql_error());
	$bo=mysql_num_rows($bo);
	//CANTIDAD DE COMENTARIOS PARA BADGE
	$bc=mysql_query("SELECT * 
					 FROM comentario
					 WHERE Publicacion_numero_publicacion = '$_GET[subID]'") or die ("problemas en consulta:".mysql_error());
	$bc=mysql_num_rows($bc);
	

	//subasta.php?op=1         //DEVUELVO BARRA CON SOLAPAS Y COMENTARIOS U OFERTAS (CON SUS FORMULARIOS CORRESPONDIENTES)
	$barra = '<ul class="nav nav-tabs">';

	//CONSULTA PARA VERIFICAR SI ES DUEÑO O NO
	$barradueño=mysql_query("SELECT * FROM publicacion WHERE idPublicacion = '$_GET[subID]'") or die ("problemas en consulta:".mysql_error());
	$barradueño=mysql_fetch_array($barradueño);

	

	
	if (isset($_GET['op']) && !empty($_GET['op'])) {
		if ($_GET['op']==1){
			$barra = $barra. '<li role="presentation" class="active"><a onclick="comentarios()">Comentarios&nbsp;<span class="badge">'.$bc.'</span></a></li>
				<li role="presentation"><a onclick="ofertas()">Ofertas&nbsp;';
			//SI ES DUEÑO MUESTRO CANTIDAD DE OFERTAS
			if (isset($_SESSION['username']) && !empty($_SESSION['username'])){
				if ($_SESSION['username'] == $barradueño['Usuario_nombre_usuario']){
					$datesql = strtotime($barradueño['fecha_fin']);
					if ((getdate()['year'] < date("Y",$datesql)) 
						OR (getdate()['year'] == date("Y",$datesql) AND getdate()['mon'] < date("n",$datesql))
						OR (getdate()['year'] == date("Y",$datesql) AND getdate()['mon'] == date("n",$datesql) AND getdate()['mday'] < date("j",$datesql))){
						//LA SUBASTA NO FINALIZO, AL DUEÑO NO LE MUESTRO CUANTAS OFERTAS HAY
					}
					else {
						//FINALIZO SUBASTA, MUESTRO BADGE CON CANTIDAD DE OFERTAS
						$barra = $barra. '<span class="badge">'.$bo.'</span>';
					}		
				}
			}
			$barra = $barra.'</a></li> </ul>';
			$com=include("comentarios.php");							
			$barra=$barra.$com;
		}
		else {
			$barra = $barra. '<li role="presentation"><a onclick="comentarios()">Comentarios&nbsp;<span class="badge">'.$bc.'</span></a></li>
				<li role="presentation" class="active"><a onclick="ofertas()">Ofertas&nbsp;';
			//SI ES SUEÑO MUESTRO CANTIDAD DE OFERTAS
			if (isset($_SESSION['username']) && !empty($_SESSION['username'])){
				if ($_SESSION['username'] == $barradueño['Usuario_nombre_usuario']){
					$datesql = strtotime($barradueño['fecha_fin']);
					// date("Y",$datesql)
					// date("n",$datesql)
					// date("j",$datesql)
					// getdate()['year']
					// getdate()['mon']
					// getdate()['mday']
					if ((getdate()['year'] < date("Y",$datesql)) 
						OR (getdate()['year'] == date("Y",$datesql) AND getdate()['mon'] < date("n",$datesql))
						OR (getdate()['year'] == date("Y",$datesql) AND getdate()['mon'] == date("n",$datesql) AND getdate()['mday'] < date("j",$datesql))){
						//LA SUBASTA NO FINALIZO, AL DUEÑO NO LE MUESTRO CUANTAS OFERTAS HAY
					}
					else {
						//FINALIZO SUBASTA, MUESTRO BADGE CON CANTIDAD DE OFERTAS
						$barra = $barra. '<span class="badge">'.$bo.'</span>';
					}		
				}
			}			
			$barra = $barra.'</a></li> </ul>';
			$of=include("ofertas.php");							
			$barra=$barra.$of;
		}
	}
	else {
		$barra = $barra. '<li role="presentation" class="active"><a onclick="comentarios()">Comentarios&nbsp;<span class="badge">'.$bc.'</span></a></li>
				<li role="presentation"><a onclick="ofertas()">Ofertas&nbsp;';
		//SI ES SUEÑO MUESTRO CANTIDAD DE OFERTAS
		if (isset($_SESSION['username']) && !empty($_SESSION['username'])){
			if ($_SESSION['username'] == $barradueño['Usuario_nombre_usuario']){
				$datesql = strtotime($barradueño['fecha_fin']);
				if ((getdate()['year'] < date("Y",$datesql)) 
					OR (getdate()['year'] == date("Y",$datesql) AND getdate()['mon'] < date("n",$datesql))
					OR (getdate()['year'] == date("Y",$datesql) AND getdate()['mon'] == date("n",$datesql) AND getdate()['mday'] < date("j",$datesql))){
					//LA SUBASTA NO FINALIZO, AL DUEÑO NO LE MUESTRO CUANTAS OFERTAS HAY
				}
				else {
					//FINALIZO SUBASTA, MUESTRO BADGE CON CANTIDAD DE OFERTAS
					$barra = $barra. '<span class="badge">'.$bo.'</span>';
				}		
			}
		}
		$barra = $barra.'</a></li> </ul>';
		$com=include("comentarios.php");							
		$barra=$barra.$com;
	}

	echo $barra;
?>

