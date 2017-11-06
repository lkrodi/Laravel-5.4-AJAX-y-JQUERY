/*Capturo el nodo de alerta de mensaje y el boton*/
var alerta = $('#alert');
var button = $('.btn-delete');

/*Oculto el nodo de alerta de mensaje inicialmente*/
alerta.hide()

/*Ejecuto todo el código cuando solo le da click*/
button.click( function(e) {

	//Con esto detengo el evento
	e.preventDefault();
	//Condición para elimnar el producto, si retorna false, no pasa nada.
	if (! confirm('¿Estás seguro de eliminar el producto?')) {
		return false;
	}

	// Selecciona al padre para este nodo(<a>), en este caso tr
	var row = $(this).parents('tr');

	// Selecciona al padre para este nodo(<form>), en este caso form
	var form = $(this).parents('form'); 

	//obtener la url
	var url = form.attr('action');

	//Muestro solo el nodo, sin mensaje
	alerta.show('slow');

	/*Ejecuto mi petición AJAX de tipo POST*/
	$.post(url, form.serialize(), function(resp) {
		//la fila desaparecerá suavemente
		row.fadeOut();
		//envío un innerHTML al nodo <span> que muestra el total de productos
		$('#productos-total').html(resp.total);
		//envío el innerHTML a la alerta de mensaje
		alerta.html('<b>'+ resp.mensaje +'</b>');
	}).fail( function() {
		////envío el innerHTML a la alerta de mensaje si ocurre algo mal
		alerta.html('algo salio mal :(');
	});
});
