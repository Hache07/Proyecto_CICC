(function() {
    "use strict";

    var regalo = document.getElementById('regalo');
    document.addEventListener('DOMContentLoaded', function() {

        var nombre = document.getElementById('nombre');
        var apellido = document.getElementById('apellido');
        var email = document.getElementById('email');

        var pase_dia = document.getElementById('pase_dia');
        var pase_dosdias = document.getElementById('pase_dosdias');

        var calcular = document.getElementById('calcular');
        var errorDiv = document.getElementById('error');
        var btnRegistro = document.getElementById('btnRegistro');
        var lista_productos = document.getElementById('lista-productos');
        var suma = document.getElementById('suma-total');

        var camisas = document.getElementById('camisa_evento');

        btnRegistro.disabled = true;

        calcular.addEventListener('click', calcularMontos);
        pase_dia.addEventListener('blur', mostrarDias);
        pase_dosdias.addEventListener('blur', mostrarDias);

        nombre.addEventListener('blur', validarCampos);
        apellido.addEventListener('blur', validarCampos);
        email.addEventListener('blur', validarCampos);
        email.addEventListener('blur', validarMail);

        function validarCampos() {
            if(this.value == '') {
                errorDiv.style.display = "block";
                errorDiv.innerHTML = "Este campo es obligatorio";
                this.style.border = '1px solid #df2f2980';
                errorDiv.style.border = '1px solid rgba(223, 47, 41, .5)';
                errorDiv.style.color = 'white';
            } else {
                errorDiv.style.display = 'none';
                this.style.border = 'none';
            }
        }

        function validarMail() {
            if(this.value.indexOf("@") > -1) {
                errorDiv.style.display = 'none';
                this.style.border = 'none';
            } else {
                errorDiv.style.display = "block";
                errorDiv.innerHTML = "Por favor, introduce una dirección de correo electrónico válida.";
                this.style.border = '1px solid #df2f2980';
                errorDiv.style.border = '1px solid rgba(223, 47, 41, .5)';
                errorDiv.style.color = 'white';
            }
        }

        function calcularMontos(event) {
            event.preventDefault();
            if(regalo.value === '') {
                alert('Selecciona un regalo porfavor');
                regalo.focus();
            } else {
                var boletoDia = parseInt(pase_dia.value, 10) || 0,
                    boletoDos = parseInt(pase_dosdias.value, 10) || 0,
                    cantidadCamisas = parseInt(camisas.value, 10) || 0;

                var totalPagar = (boletoDia * 30) + (boletoDos * 45) + ((cantidadCamisas * 10) * .93);

                var listadoProductos = [];

                if(boletoDia >= 1) {
                    listadoProductos.push(' Estudiante: '+boletoDia);
                }
                if(boletoDos >= 1) {
                    listadoProductos.push(' Docente: '+boletoDos);
                }
                if(cantidadCamisas >= 1) {
                    listadoProductos.push(' Camisas: '+cantidadCamisas);
                }

                lista_productos.style.display = "block";
				lista_productos.innerHTML = '';
				for (var i = 0; i < listadoProductos.length; i++) {
					lista_productos.innerHTML += listadoProductos[i] + '<br>';
                }
                suma.innerHTML = "$ " + totalPagar.toFixed(2);
                btnRegistro.disabled = false;
                document.getElementById('total_pedido').value = totalPagar;
            }
        }
        function mostrarDias() {
            var boletoDia = parseInt(pase_dia.value, 10) || 0,
                boletoDos = parseInt(pase_dosdias.value, 10) || 0;

            var diasElegidos = [];
            if(boletoDia > 0) {
                diasElegidos.push('calendario');
            }
            if(boletoDos > 0) {
                diasElegidos.push('calendario');
            }
            for(var i = 0; i < diasElegidos.length; i++) {
                document.getElementById(diasElegidos[i]).style.display = "block";
            }
        }
    });
})();

$(function(){

    //LETTERING

    $('body.fotos .nave-p a:contains("Galeria")').addClass('activo');
    $('body.c_sistemas .nave-p a:contains("Calendario")').addClass('activo');
    $('body.c_derecho .nave-p a:contains("Calendario")').addClass('activo');
    $('body.c_medicina .nave-p a:contains("Calendario")').addClass('activo');
    $('body.c_arquitectura .nave-p a:contains("Calendario")').addClass('activo');
    $('body.expositores .nave-p a:contains("Expositores")').addClass('activo');

    /** MENU FIJO **/
    var windowHeight = $(window).height();
    var barraAltura = $('.barra-p').innerHeight();

    $(window).scroll(function() {
        var scroll = $(window).scrollTop();
        if(scroll > windowHeight) {
            $('.barra-p').addClass('fixed');
            $('body').css({'margin-top': barraAltura+'px'});
        } else {
            $('.barra-p').removeClass('fixed');
            $('body').css({'margin-top': '0px'});        }
    });

    /** ANIMACIONES PARA LOS NUMEROS ANIMATE NUMBER**/
    $('.resumen-evento li:nth-child(1) p').animateNumber({ number: 6}, 1200);
    $('.resumen-evento li:nth-child(2) p').animateNumber({ number: 18}, 1200);
    $('.resumen-evento li:nth-child(3) p').animateNumber({ number: 3}, 1200);
    $('.resumen-evento li:nth-child(4) p').animateNumber({ number: 2}, 1200);

    $('#number-c').animateNumber({ number: 2}, 1200);
    $('#number-f').animateNumber({ number: 22}, 1200);
    $('#number-e').animateNumber({ number: 2800}, 1200);

    /** CUENTA REGRESIVA COUNTDOWN **/
    $('.cuenta-regresiva').countdown('2018/12/10 09:00:00', function(event){
        $('#dias').html(event.strftime('%D'));
        $('#horas').html(event.strftime('%H'));
        $('#minutos').html(event.strftime('%M'));
        $('#segundos').html(event.strftime('%S'));
    });

    /** COLORBOX **/
    $('.invitado-info').colorbox({inline:true, width:"50%"});

});

$(document).ready(function() {
    $('#ejecuta').click(function() {
        alertify.warning('La pagina esta en proceso de desarrollo');
    });
})



/*
$(document).ready(function() {
    $('#confirm').click(function() {
        alertify.confirm("Confirmar","This is a confirm dialog.",
        function(){
            alertify.success('Ok');
        },
        function(){
            alertify.error('Cancel');
        });
    });
})
*/