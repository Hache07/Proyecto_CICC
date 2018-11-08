/*
var map;
function initMap() {
	map = new google.maps.Map(document.getElementById('mapa'), {
		center: {lat: -17.3940469, lng: -66.233916},
		zoom: 8
	});
}*/

(function() {
	"use strict";

	var regalo = document.getElementById('regalo');
	document.addEventListener('DOMContentLoaded', function() {

		//Campos datos usuario
		var nombre = document.getElementById('nombre');
		var apellido = document.getElementById('apellido');
		var email = document.getElementById('email');

		//Campos pases
		var pase_dia = document.getElementById('pase_dia');
		var pase_dosdias = document.getElementById('pase_dosdias');
		var pase_completo = document.getElementById('pase_completo');

		//Botones y divs
		var calcular = document.getElementById('calcular');
		var botonRegistro = document.getElementById('btnRegistro');
		var errorDiv = document.getElementById('error');
		var lista_productos = document.getElementById('lista-productos');
		var suma = document.getElementById('suma-total');

		//Extras
		var camisas = document.getElementById('camisa_evento');
		var etiquetas = document.getElementById('etiquetas');

		calcular.addEventListener('click', calcularMontos);

		pase_dia.addEventListener('blur', mostrarDias);
		pase_dosdias.addEventListener('blur', mostrarDias);
		pase_completo.addEventListener('blur', mostrarDias);

		nombre.addEventListener('blur', validarCampos);
		apellido.addEventListener('blur', validarCampos);
		email.addEventListener('blur', validarCampos);
		email.addEventListener('blur', validarMail);

		function validarCampos() {
			if(this.value == '') {
				errorDiv.style.display = 'block';
				errorDiv.innerHTML = "Este campo es obligatorio";
				this.style.border = '1px solid red';
				errorDiv.style.border = '1px solid red';
			} else {
				errorDiv.style.display = 'none';
				this.style.border = '1px solid #ccc';
			}
		}

		function validarMail() {
			if (this.value.indexOf("@") > -1) {
				errorDiv.style.display = 'none';
				this.style.border = '1px solid #ccc';
			} else {
				errorDiv.style.display = 'block';
				errorDiv.innerHTML = "Ingrese un email valido";
				this.style.border = '1px solid red';
				errorDiv.style.border = '1px solid red';
			}
		}


		function calcularMontos(event) {
			event.preventDefault();
			if(regalo.value == '') {
				alert("Debes elegir un regalo");
				regalo.focus();
			} else {
				var boletosDias = parseInt(pase_dia.value, 10) || 0,
				boletoDosDias = parseInt(pase_dosdias.value, 10) || 0,
				boletoCompleto = parseInt(pase_completo.value, 10) || 0,
				cantCamisas = parseInt(camisas.value, 10) || 0,
				cantEtiquetas = parseInt(etiquetas.value, 10) || 0;

				var totalPagar = (boletosDias * 30) + (boletoDosDias * 45) + (boletoCompleto * 50) + ((cantCamisas * 10) * .93) + (cantEtiquetas * 2);

				var listadoProductos = [];

				if (boletosDias >= 1) {
					listadoProductos.push('Pases por dias: ' + boletosDias);
				}
				if (boletoDosDias >= 1) {
					listadoProductos.push('Pases por 2 dias: ' + boletoDosDias);
				}
				if (boletoCompleto >= 1) {
					listadoProductos.push('Pases completos: ' + boletoCompleto);
				}
				if (cantCamisas >= 1) {
					listadoProductos.push('Camisetas: ' + cantCamisas);
				}
				if (cantEtiquetas >= 1) {
					listadoProductos.push('Etiquetas: ' + cantEtiquetas);
				}
				
				lista_productos.style.display = "block";
				lista_productos.innerHTML = '';
				for (var i = 0; i < listadoProductos.length; i++) {
					lista_productos.innerHTML += listadoProductos[i] + '<br>';
				}

				suma.innerHTML = '$ ' + totalPagar.toFixed(2);

			}
		}

		function mostrarDias() {
			var boletosDias = parseInt(pase_dia.value, 10) || 0,
			boletoDosDias = parseInt(pase_dosdias.value, 10) || 0,
			boletoCompleto = parseInt(pase_completo.value, 10) || 0;

			var diasElegidos = [];

			if (boletosDias > 0) {
				diasElegidos.push('viernes');
				console.log(diasElegidos);
			}
			if (boletoDosDias > 0) {
				diasElegidos.push('viernes','sabado');
				console.log(diasElegidos);
			}
			if (boletoCompleto > 0) {
				diasElegidos.push('vierner','sabado','domingo');
				console.log(diasElegidos);
			}

			for (var i = 0; i < diasElegidos.length; i++) {
				document.getElementById(diasElegidos[i]).style.display = "block";
			}
		}
	});
})();


$(function() {

	$('programa-evento .info-curso:first').show();
	$('.menu-programa a').on('click', function() {


		var enlace = $(this).attr('href');
		$(enlace).fadeIn(1000);
	});
});

/** Colorbox **/

$('.invitado-info').colorbox({inline:true, width:"50%"});

/** Toastr **/
/**
const alerta = document.querySelector('#alerta');

alerta.addEventListener('click', () => {
	toastr.success('Registro exitoso! ');
})
**/




$(function() {

	/** ANIMATE NUMBER **/
	$('.resumen-evento li:nth-child(1) p').animateNumber({ number: 8 }, 1200);
	$('.resumen-evento li:nth-child(2) p').animateNumber({ number: 15 }, 1200);
	$('.resumen-evento li:nth-child(3) p').animateNumber({ number: 2 }, 1200);
	$('.resumen-evento li:nth-child(4) p').animateNumber({ number: 1 }, 1200);

	$('#number-c').animateNumber({ number: 2 }, 1200);
	$('#number-f').animateNumber({ number: 4 }, 1200);
	$('#number-e').animateNumber({ number: 2800}, 1200);

	/** COUNTDOWN **/
	$('.cuenta-regresiva').countdown('2018/12/27 10:55:00', function(event) {
		$('#dias').html(event.strftime('%D'));
		$('#horas').html(event.strftime('%H'));
		$('#minutos').html(event.strftime('%M'));
		$('#segundos').html(event.strftime('%S'));
	});

});

$(function(){
  $.scrollUp();
});