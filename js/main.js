 // JavaScript source code
 /*function inicializar() {
    //Opciones del mapa
    var OpcionesMapa = {
        center: new google.maps.LatLng(38.3489719, -0.4780289000000266),
        mapTypeId: google.maps.MapTypeId.SATELLITE, //ROADMAP  SATELLITE HYBRID TERRAIN
        mapMaker: true,
        zoom: 16
    };
 
    var miMapa;
    //constructor
    miMapa = new google.maps.Map(document.getElementById('mapa'), OpcionesMapa);

    //Añadimos el marcador
    var Marcador = new google.maps.Marker({
                    position: new google.maps.LatLng(38.3489719, -0.4780289000000266),
                    map: miMapa,
                    title:"Santa Barbara"
                });
}
 
function CargaScript() {
    var script = document.createElement('script');
    script.src = 'https://maps.googleapis.com/maps/api/js?sensor=false&callback=inicializar';
    document.body.appendChild(script);                 
}
 
window.onload = CargaScript;*/

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
    $('.cuenta-regresiva').countdown('2018/11/26 09:00:00', function(event){
        $('#dias').html(event.strftime('%D'));
        $('#horas').html(event.strftime('%H'));
        $('#minutos').html(event.strftime('%M'));
        $('#segundos').html(event.strftime('%S'));
    });

    /** COLORBOX **/
    $('.invitado-info').colorbox({inline:true, width:"50%"});

});