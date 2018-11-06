/*
$(document).ready(function() {
	$('#contenido').append("Con JQuery es mas facil");
});

document.addEventListener('DOMContentLoaded', function(event) {

});
*/

$(function() {
	'use strict';

	var proximosVieajes = ['Londres', 'Paris', 'Valencia', 'Madrid', 'Barcelona'];

	console.log(proximosVieajes);

	$.each(proximosVieajes, function(i, v) {
		if(i == 0) {
			$('aside').append('<h2>Proximos viajes</h2>');
		}
		$('aside').append('<li>' + v + '</li>');
	});
});