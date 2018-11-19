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
    $('.resumen-evento li:nth-child(1) p').animateNumber({ number: 6}, 1200);
    $('.resumen-evento li:nth-child(2) p').animateNumber({ number: 18}, 1200);
    $('.resumen-evento li:nth-child(3) p').animateNumber({ number: 3}, 1200);
    $('.resumen-evento li:nth-child(4) p').animateNumber({ number: 2}, 1200);
});