$(document).ready(function(){
	
	function validarusuario(usuario){

		$.ajax({
			url: 'validarusuario.php', /*= action*/
			type: 'post', /*= method*/
			dataType: 'json',
			data: 'username='+usuario.value, /*parametros para url*/
			beforeSend: function(){
				$('.fa').css('display', 'inline');
			}
		})
		.done(function(){ /*true*/
			console.log("success");
			$('comprobarusuario').html("Correcto");
		})
		.fail(function(){ /*false*/
			console.log("error");
			$('comprobarusuario').html("Falso");
		})
		.always(function(){
			console.log("complete");
			setTimeout(function(){
				$('.fa').hide();
			}, 1000);
		})
	};

});

<script type="text/javascript">
		$( document ).ready(function() {
    		console.log( "ready!" );
		});

		var datosForm = $( "#registro-form" ).serializeArray();

		function validarusuario(usuario){

			$.ajax({
				url: 'validarusuario.php', /*= action*/
				type: 'post', /*= method*/
				dataType: 'json',
				data: 'username='+usuario.value, /*parametros para url*/
				beforeSend: function(){
					$('.fa').css('display', 'inline');
				}
			})
			.done(function(){ /*true*/
				console.log("success");
				$('comprobarusuario').html("Correcto");
			})
			.fail(function(){ /*false*/
				console.log("error");
				$('comprobarusuario').html("Falso");
			})
			.always(function(){
				console.log("complete");
				setTimeout(function(){
					$('.fa').hide();
				}, 1000);
			})
		}
	</script>

	<form action="index.html" method="POST">
        <label for="numero_de_serie">Número de serie:</label>
        <input type="text" id="numero_de_serie" name="numero_de_serie" tabindex="1">
        <label for="nombre_de_producto">Nombre de Producto:</label>
        <input type="text" id="nombre_de_producto" name="nombre_de_producto" tabindex="2">
        <label for="precio_de_producto">Precio de Producto:</label>
        <input type="text" id="precio_de_producto" name="precio_de_producto" tabindex="3">
        <button type="submit">Agregar Producto</button>
	</form>

	<script src="http://code.jquery.com/jquery-git2.js"></script>
	<script>
	        // Al presionar cualquier tecla en cualquier campo de texto, ejectuamos la siguiente función
	        $('input').on('keydown', function(e){
	                // Solo nos importa si la tecla presionada fue ENTER...
	                if(e.keyCode === 13){
		                {
		                        // Obtenemos el número del tabindex del campo actual
		                        var currentTabIndex = $(this).attr('tabindex');
		                        // Le sumamos 1 :P
		                        var nextTabIndex    = parseInt(currentTabIndex) + 1;
		                        // Obtenemos (si existe) el siguiente elemento usando la variable nextTabIndex
		                        var nextField       = $('[tabindex='+nextTabIndex+']');
		                        // Si se encontró un elemento:
		                        if(nextField.length > 0)
		                        {
		                                // Hacerle focus / seleccionarlo
		                                nextField.focus();
		                                // Ignorar el funcionamiento predeterminado (enviar el formulario)
		                                e.preventDefault();
		                        }
		                        // Si no se encontro ningún elemento, no hacemos nada (se envia el formulario)
		                }
		            }
	        });
	</script>

	$("#username").on("keydown",function(event){
			console.log(event.type+": "+event.which);
			if (event.which == 13) {
				validarusuario(this); // ver: console.log(this);
			};
		});



	var d = new Date(); 
	var month = d.getMonth()+1; 
	var day = d.getDate(); //no es day?
	var output = d.getFullYear() + '/' + (month<10 ? '0' : '') + month + '/' + (day<10 ? '0' : '') + day;

Ver más en: http://www.iteramos.com/pregunta/18729/como-obtener-la-fecha-actual-en-jquery